<?php

namespace Core {
    
    final class Assets {
        
        /**
         * load css file
         * @param string $css
         */
        static public function bootstrapCss($css) {
            echo URI_PUBLIC.'bootstrap/css/'.$css;
        }
        
        /**
         * load js file
         * @param string $js
         */
        static public function bootstrapJs($js) {
            echo URI_PUBLIC.'bootstrap/js/'.$js;
        }
        
        /**
         * load image file
         * @param string $img
         */
        static public function bootstrapImg($img) {
            echo URI_PUBLIC.'bootstrap/img/'.$img;
        }
        
    }
    
}