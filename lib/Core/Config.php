<?php

namespace Core {
    
    final class Config {
        
        /**
         * Get configuration values
         * @param string $name
         * @return array
         * @throws \Core\Exception\SystemException
         */
        static public function get($name) {
            
            $filepath = CONFIG.'conf.'.strtolower($name).'.php';            
            $return = '';
            
            if (file_exists($filepath)) {
                $return = require_once($filepath);
            } else {
                throw new \Core\Exception\SystemException('Configuration for: '.$name.' not found.');
            }
            
            return $return;
            
        }
        
    }
    
}