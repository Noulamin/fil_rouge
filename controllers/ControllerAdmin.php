<?php
class ControllerAdmin{
    public function __construct($url){
        redirection_login();
        $admin = new Administrateur();

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {

            if($url[1] == "active")
            {
                $admin->activate_user($_POST['id']);
                header("Location: ".URL."admin");
                die();
            }
        }
        
        $liste_of_requests = $admin->get_requests();
        $_SESSION['link'] = 'admin';
        require_once(ROOT.'views/liste_Admin.php');
    }
}