<?php
    class Administrateur extends Model{
        public function getAdminByUsernameAndPassword($username, $password)
        {
            $db = self::getdb();
            if($db == null){
                return;
            }

            $sql = "SELECT * FROM `users` WHERE username = :username && password = :password";
            $check = $db->prepare($sql);
            $check->execute([
                ":username" => $username,
                ":password" => $password
            ]);
            $data = $check->fetch(PDO::FETCH_OBJ);
            $check = null;
            $db = null;
            return $data;
        }
        
        public function get_started($first,$last,$name,$email,$phone,$birthday,$gender,$password)
        {
            $db = self::getdb();

            $check = $db->prepare("SELECT * FROM `users` WHERE username = :username");
            $check->execute([
                ":username" => $name
            ]);
            $data = $check->fetch(PDO::FETCH_OBJ);

            if(!$data){
                $db->query("INSERT INTO `users`(`active`, `username`, `gender`, `password`, `email`, `name`, `birth_day`, `phone`, `role`)
                    VALUES ('0','$name','$gender','$password','$email','$first $last','$birthday','$phone','user')");
                return true;
            }else{
                return false;
            }
        }

        public function get_requests()
        {
            $db = self::getdb();
            $data = $db->query("SELECT * FROM `users` WHERE `active` = '0'");
            return $data->fetchAll(PDO::FETCH_OBJ);
        }

        public function activate_user($user_id)
        {
            $db = self::getdb();
            $db->query("UPDATE `users` SET `active` = '1' WHERE `id` = ".$user_id);
            $_SESSION["green_message"] = "User successfully activated";
        }
    }
?>