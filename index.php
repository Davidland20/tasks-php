<?php
    require_once("server.php");


    class Route {

        private function formatUrl () {
            $url = $_SERVER['PATH_INFO'];
            $urlTrim = trim($url, '/');
            return explode('/', $urlTrim);
        }

        public function getMethod () {
            return $_SERVER['REQUEST_METHOD'];
        }

        public function getAction () {
            $urlTab = $this->formatUrl();
            $action = $urlTab[1];
            if ($action) {
                echo 'Action : '.$action;
            }
        }

        public function getController () {

            $urlTab = $this->formatUrl();
            $controller = $urlTab[0];
            
            global $app;
            $path = $app.'/controllers/'.$controller.'.php';

            if ( is_file($path) ) {
                require_once $path;
            }
            else {
                require_once $app."/views/404.php";
            }
        }
    }

?>