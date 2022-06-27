<?php
class ControllerInvoices{
    public function __construct($url){
        redirection_login();
        $bills = new Invoices();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //var_dump($url."<b>"); 
                //var_dump($_POST); 
            if($url[1] == "pay"){
                $bills->pay($_POST['id'],$_POST['amount'],$_POST['name'],$_POST['corporation']);
                header("Location: ".URL."invoices");
                die();
            }
        }
        $liste_of_bills = $bills->getBills();
        
        $_SESSION['link'] = 'invoices';
        require_once(ROOT.'views/liste_Invoices.php');
    }
}