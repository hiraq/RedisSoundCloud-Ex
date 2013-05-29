<?php

namespace Core {
    
    final class Import {
        
        /**
         * Include file from 'includes' folder
         * 
         * @param string $file
         * @throws \Core\Exception\PageException
         */
        static public function file($file,$params=array()) {
            
            $filepath = INC.strtolower($file);
            
            if (file_exists($filepath)) {
                
                if (!empty($params) && is_array($params)) extract($params);
                require_once($filepath);
                
            } else {
                throw new \Core\Exception\PageException('Unknown request');
            }
            
        }
        
    }
    
}