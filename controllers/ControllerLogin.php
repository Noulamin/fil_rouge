<?php
    class ControllerLogin{
        
        public function __construct($url){
            $status = "";
            redirection_admin();
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);
                $item = new Administrateur();
                $data = $item->getAdminByUsernameAndPassword($username, md5($password));
                if(!$data){
                    $status = "incorrect username or password !!";
                }else{
                    if($data->active == '0')
                    {
                        $status = "User not activated yet !!";
                    }
                    else
                    {
                        $_SESSION['user'] = $data;
                        header("Location: ".URL."dashboard");
                    }
                }
            }
            require_once("./views/viewLogin.php");
        }
    }
?>