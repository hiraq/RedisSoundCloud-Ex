<?php

//setup redis
$redis = new \Redis\Data();       
$data = $redis->getRedis()->lRange('terms',0,-1);

/*
 * dump data if exists
 */
if ($data) {
    
    $collections = array();    
    $loop = function($term) use($redis) {
        
        $total = $redis->getRedis()->get('total_'.$term);
        if ($total > 0) {
            
            $data = array();
            for($i=0;$i < $total;$i++) {                
                $data[] = $redis->getRedis()->hmGet($term.':'.$i,array('artwork','title','permalink_url','genre'));                                
            }
            
            return $data;
            
        }
        
    };        
    
    foreach($data as $term) {
        $collections[$term] = array(
            'hits' => $redis->getRedis()->get($term),
            'total' => $redis->getRedis()->get('total_'.$term),
            'data' => $loop($term)
        );
    }
    
    //dump variables
    \Core\Debug::vars($collections);
    
} else {
    echo 'Data not available';
}