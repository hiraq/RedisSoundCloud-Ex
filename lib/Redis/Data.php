<?php

namespace Redis {
    
    final class Data {
        
        private $__redis;
        
        /**
         * Setup and connect to Redis server
         * @throws \Core\Exception\SystemException
         */
        public function __construct() {
            
            if (class_exists('Redis')) {
                
                $this->__redis = new \Redis();
                $connect = $this->__redis->connect('127.0.0.1');
                
                if (!$connect) {
                    throw new \Core\Exception\SystemException('Cannot connect to redis instance.');
                }
                
            } else {
                throw new \Core\Exception\SystemException('Redis extension not installed');
            }                
            
        }
        
        /**
         * Get redis object
         * @return Redis
         */
        public function getRedis() {
            return $this->__redis;
        }
        
        /**
         * Close connection to redis server
         */
        public function close() {
            $this->__redis->close();
        }
        
    }
    
}