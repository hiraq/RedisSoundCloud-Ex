<?php

namespace Core {
    
    final class Request {
        
        private $__uri;
        private $__uriParams;
        private $__host;
        private $__hostScheme;
        
        /**
         * Read server request uri
         */
        public function __construct() {
            $this->__uri = $_SERVER['REQUEST_URI'];
            $this->__uriParams = $_GET;
            $this->__host = $_SERVER['HTTP_HOST'];
            $this->__hostScheme = $_SERVER['SERVER_PORT'] == 80 ? 'http://' : 'https://';
        }
        
        /**
         * 
         * @return string
         */
        public function getUri() {
            return $this->__uri;
        }
        
        /**
         * Get action param
         * @return null|string
         */
        public function getAction() {
            
            if (is_array($this->__uriParams) 
                    && !empty($this->__uriParams) 
                    && isset($this->__uriParams['action']) 
                    && !empty($this->__uriParams['action'])) {
                
                return $this->__uriParams['action'];
                
            }
            
        }
        
        /**
         * Get host
         * @return string
         */
        public function getHost() {
            return $this->__host;
        }
        
        /**
         * Setup global uri
         */
        public function setupGlobalUri() {
            define('URI_HOST',$this->__hostScheme.$this->__host.'/');
            define('URI_PUBLIC',URI_HOST.'public/');            
        }
        
        static public function setAction($action) {
            return URI_HOST.'?action='.$action;
        }
        
        /**
         * Check if requested page is home page or not
         * @return boolean
         */
        public function isHomePage() {
            
            $action = $this->getAction();
            if (empty($action)) {
                
                if ($this->__uri == '/') {
                    return true;
                } else {
                    return false;
                }
                
            }
            
            return false;
            
        }   
        
        /**
         * Check if current request is ajax
         * @return boolean
         */
        static public function isAjaxRequest() {
            
            /*
             * only set on ajax request
             */
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
                    && $_SERVER['HTTP_X_REQUESTED_WITH']) {
                return true;
            }
            
            return false;
        }
        
    }
    
}
