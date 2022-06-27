<?php
    class Router{
        public function __construct(){
            try{
                spl_autoload_register(
                    function($class)
                    {
                        include_once('models/'.$class.'.php');
                    }
                );

                $url = '';
                if(isset($_GET['url'])){
                    $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                    $controller = ucfirst(strtolower($url[0]));
                    $controllerClass = "Controller".$controller;
                    $controllerFile = "controllers/". $controllerClass .".php";

                    if(isset($_SESSION['user']))
                    {
                        if(($_SESSION['user']->role == "user") && ($controller == "Admin"))
                        {
                            $errorMsg = "<h1>Error 404 : Page Not Found.</h1>";
                            require_once(ROOT.'views/viewError.php');
                            return;
                        }
                    }

                    if(file_exists($controllerFile)) 
                    {
                        require_once(ROOT.$controllerFile);
                        $this->ctrl = new $controllerClass($url);
                    }
                    else
                    {
                        throw new Exception('<h1>Error 404 : Page Not Found.</h1>');
                    }
                }
                else{  // route par défaut(ici on peut verifier les sessions)
                    require_once(ROOT.'controllers/ControllerAccueil.php');
                    $this->ctrl = new ControllerAccueil($url);
                }
            }
            catch(Exception $e){
                $errorMsg = $e->getMessage();
                require_once(ROOT.'views/viewError.php');
            }
        }
    }
?>