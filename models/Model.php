<?php
    abstract class Model{
        
        protected static function getdb(){
            return new PDO('mysql:dbname=bank_db;host=localhost;port=3306','root','');
        }

        protected function getAll($table){
            $db = self::getdb();
            $query = $db->query("SELECT * FROM $table WHERE `user_id` = ".$_SESSION['user']->id);
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            $query = null;
            $db = null;
            return $data;
        }
    }
?>