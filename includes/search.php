<?php

if (\Core\Request::isAjaxRequest()) {        
    
    //get search query
    $query = $_POST['query'];
    
    //setup redis
    $redis = new \Redis\Data();       
    
    //make query as tag, increment count
    $redis->getRedis()->incr($query);        
    
    //get soundcloud api id & secret
    $configs = \Core\Config::get('soundcloud');
    
    /*
    * search via soundcloud api
    */    
    $client = new \Services_Soundcloud($configs['client_id'],$configs['client_secret']);
    $tracks = $client->get('tracks',array('q' => 'tiesto','limit' => 10));

    $response = array();
    if ($tracks) {

       $results = json_decode($tracks);              
       foreach($results as $result) {

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

       }

    }

    //send response
    echo json_encode($response);
    
}