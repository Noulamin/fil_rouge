<?php
    class ControllerStarted{
        
        public function __construct($url){
            $status = "";
            $admin = new Administrateur();
            redirection_admin();
            
            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                $first = htmlspecialchars($_POST['first']);
                $last = htmlspecialchars($_POST['last']);
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $phone = htmlspecialchars($_POST['phone']);
                $birthday = htmlspecialchars($_POST['birthday']);
                $gender = htmlspecialchars($_POST['gender']);
                $password = htmlspecialchars($_POST['password']);
                
                $check = $admin->get_started($first,$last,$name,$email,$phone,$birthday,$gender,md5($password));
                if(!$check){
                    $_SESSION['red_message'] = "User name already exist.";
                    //header("Location: ".URL."started");
                }else{
                    $_SESSION['green_message'] = "Request has been send.";
                    //header("Location: ".URL."login");
                }                
            }
            require_once("./views/viewStarted.php");
        }
    }
?>