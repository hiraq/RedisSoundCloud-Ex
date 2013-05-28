<?php

namespace Core {
    
    final class Debug {
        
        /**
         * Disable/enable php error message
         */
        public function init() {
            
            if (defined('DEBUG_LEVEL') && DEBUG_LEVEL >= 1) {
                ini_set('display_errors','On');
                error_reporting(-1);
            } else {
                ini_set('display_errors','Off');
                error_reporting(0);
            }
            
        }
        
        /**
         * Debugging variables
         * @param string|int|array|object|null $var
         */
        static public function vars($var) {
            echo '<pre>';
            print_r($var);
            echo '</pre>';
        }
        
        /**
         * Var dump
         * @param string|int|array|object|null $var
         */
        static public function dump($var) {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
        }
        
    }
    
}