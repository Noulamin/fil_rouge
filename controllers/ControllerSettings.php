<?php
    class ControllerSettings{
        public function __construct($url){
            redirection_login();
            $data = new Settings();

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                if($url[1] == "update"){
                    $data->update_user([...$_POST]);
                    header("Location: ".URL."settings");
                    die();
                }
            }
                    
            $_SESSION['link'] = 'settings';
            require_once(ROOT.'views/liste_Settings.php');
        }
    }
?>