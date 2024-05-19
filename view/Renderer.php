<?php

if (!class_exists('Renderer')) {
    class Renderer {
        private static $content = '';

        public static function start() {
            ob_start();
        }

        public static function end() {
            self::$content = ob_get_clean();
        }

        public static function render() {
            echo self::$content;
        }
    }
}

?>
