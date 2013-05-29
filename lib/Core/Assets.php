<?php

namespace Core {
    
    final class Assets {
        
        /**
         * load bootstrap css file
         * @param string $css
         */
        static public function bootstrapCss($css) {
            echo URI_PUBLIC.'bootstrap/css/'.$css;
        }
        
        /**
         * load bootstrap js file
         * @param string $js
         */
        static public function bootstrapJs($js) {
            echo URI_PUBLIC.'bootstrap/js/'.$js;
        }
        
        /**
         * load bootstrap image file
         * @param string $img
         */
        static public function bootstrapImg($img) {
            echo URI_PUBLIC.'bootstrap/img/'.$img;
        }
        
        /**
         * load js
         * @param string $js
         */
        static public function js($js) {
            echo URI_PUBLIC.'js/'.$js;
        }
        
        /**
         * load image
         * @param string $img
         */
        static public function image($img) {
            echo URI_PUBLIC.'images/'.$img;
        }
        
    }
    
}