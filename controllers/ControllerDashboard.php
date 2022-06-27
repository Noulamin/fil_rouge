<?php
    class ControllerDashboard{

        public function __construct($url){
            redirection_login();
            $dashboard = new Dashboard();
            $transactions = new Transactions();

            $all_users = $dashboard->get_All_users();
            $list_transactions = $transactions->get_all_transactions();

            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                //var_dump($url."<b>"); 
                //var_dump($_POST); 
                if($url[1] == "send"){
                    $dashboard->send_money($_POST['recipient'],$_POST['amount']);
                    header("Location: ".URL."dashboard");
                    die();
                }

                if($url[1] == "request"){
                    $dashboard->request_money($_POST['recipient'],$_POST['amount']);
                    header("Location: ".URL."dashboard");
                    die();
                }
            }
                
            $_SESSION['link'] = 'Dashboard';
            require_once(ROOT.'views/viewDashboard.php');
        }
    }
?>