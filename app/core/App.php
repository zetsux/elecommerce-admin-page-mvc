<?php
    class App {
        protected $controller = 'Home';
        protected $method = 'index';
        protected $params = [];

        public function __construct() {
            $url = $this->urlParse();
            
            /* Controller Handling,
                Check if the controller file with the name from url exist */
            if (isset($url[0])) {
                if (file_exists('../app/controllers/' . $url[0] . '.php')) {
                    $this->controller = $url[0];

                    //Remove already used element from url array
                    unset($url[0]);
                }
            }

            require_once ('../app/controllers/' . $this->controller . '.php');

            //Instantiate class to call the method later
            $this->controller = new $this->controller;

            /* Method Handling,
                Check if the method with the name from url exist in the controller */
            if (isset($url[1])) {
                if (method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            /* Parameter Handling,
                Check if the method with the name from url exist in the controller */
            if (!empty($url)) {
                // Insert the values left in array to params var
                $this->params = array_values($url);
            }

            // Run Controller & Method + Send Params if exist
            call_user_func_array([$this->controller, $this->method], $this->params);
        }

        public function urlParse() {
            if (isset($_GET['url'])) {
                // Get URL, remove the last trailing slash, and filter it from bad characters
                $url = filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }
?>