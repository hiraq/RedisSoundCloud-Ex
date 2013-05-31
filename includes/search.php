<?php

if (\Core\Request::isAjaxRequest()) {        
    
    //get search query
    $query = $_POST['query'];
    
    //setup redis
    $redis = new \Redis\Data();       
    
    //make query as tag, count & update increment
    $redis->getRedis()->incr($query);   
    
    //insert into search term list
    $redis->getRedis()->rPush('terms',$query);
    
    //get soundcloud api id & secret
    $configs = \Core\Config::get('soundcloud');
    
    /*
    * search via soundcloud api
    */    
    $client = new \Services_Soundcloud($configs['client_id'],$configs['client_secret']);
    $tracks = $client->get('tracks',array('q' => $query,'limit' => 10));

    $response = array();    
    
    if ($tracks) {

       $results = json_decode($tracks);   
       $i=0;
       $redis->getRedis()->set('total_'.$query,count($results));
       
       foreach($results as $result) {
       
           $i++;
           
           /*
            * get oembed data
            */
           $result = (array) $result;
           $client->setCurlOptions(array(CURLOPT_FOLLOWLOCATION => 1));
           $oembed = json_decode($client->get('oembed',array('url' => $result['permalink_url'],'auto_play' => true)));
           
           /*
            * setup response
            */
           $response[] = array(
               'embed' => $oembed->html,
               'artwork' => $result['artwork_url']
           );   
           
           /*
            * setup results into hash
            * using transactions
            */           
            $redis->getRedis()->multi()
                    ->hMset($query.':'.$i,array(
                        'embed' => $oembed->html,
                        'artwork' => $result['artwork_url'],
                        'title' => $result['title'],
                        'permalink' => $result['permalink_url'],
                        'genre' => $result['genre']
                    ))
                    ->exec();                              

       }

    }

    //send response
    echo json_encode($response);
    
}