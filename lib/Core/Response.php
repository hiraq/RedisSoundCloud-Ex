<?php

namespace Core {
    
    final class Response {
        
        private $__request;
        
        /**
         * Initialize Request
         * @param \Core\Request $request
         */
        public function __construct(\Core\Request $request) {
            $this->__request = $request;
        }
        
        /**
         * Get request object
         * @return \Core\Request
         */
        public function getRequestObject() {
            return $this->__request;
        }
        
        /**
         * Listen request
         * and load requested file 
         * based on http request
         * 
         * @throws PageException
         */
        public  function listen() {
            
            $homePage = $this->__request->isHomePage();
            $fileToInclude = '';
            
            /*
             * check if at homepage
             */
            if ($homePage) {
                $fileToInclude = 'home.php';
            } else {
                
                /*
                 * check requested action
                 * if not detected then throw exception
                 */
                $action = $this->__request->getAction();
                if (empty($action)) {
                    throw new \Core\Exception\PageException('Page not found');
                } else {                    
                    $fileToInclude = strtolower($action).'.php';                    
                }
                
            }
            
            if (!empty($fileToInclude)) {
                
                //load requested file
                \Core\Import::file($fileToInclude);
                
            }
            
        }
        
    }
    
}