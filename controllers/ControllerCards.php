<?php
class ControllerCards{
    public function __construct($url){
        redirection_login();
        $cards = new Cards();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //var_dump($url."<b>"); 
            //var_dump($_POST); 
            if($url[1] == "send"){
                $dashboard->send_money($_POST['recipient'],$_POST['amount']);
                header("Location: ".URL."dashboard");
                die();
            }
        }
        
        $liste_of_cards = $cards->getCards();
        $_SESSION['link'] = 'cards';
        require_once(ROOT.'views/liste_cards.php');
    }
}