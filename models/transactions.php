<?php
    class Transactions extends Model{
        public function get_all_transactions()
        {
            $db = self::getdb();
            $query = $db->query('SELECT * FROM `transactions` WHERE `user_id` = '.$_SESSION['user']->id);
            $data_ = $query->fetchAll(PDO::FETCH_OBJ);
            $data = array_reverse($data_);
            return $data;
        }
    }
?>