<?php
    class ControllerTransactions{
        public function __construct($url){
            redirection_login();
            $transactions = new Transactions();
            $list_transactions = $transactions->get_all_transactions();
            $_SESSION['link'] = 'transaction';
            require_once(ROOT.'views/liste_transactions.php');
        }
    }
?>