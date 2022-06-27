<?php
    class Invoices extends Model{
        public function getBills(){
            return $this->getAll("bills");
        }

        public function pay($product_id,$amount,$product_name,$corporation){
            $db = self::getdb();
            $user_data = $db->query('SELECT * FROM `users` WHERE `id` = '.$_SESSION['user']->id);
            $user_actual_balance = $user_data->fetch(PDO::FETCH_OBJ)->balance - $amount;
            
            if($product_name == "Amount requested")
            {
                $db = self::getdb();
                
                $user_data = $db->query('SELECT * FROM `users` WHERE `id` = '.$_SESSION['user']->id);
                $recipient_data = $db->query('SELECT * FROM `users` WHERE `id` = '.$corporation[0]);
                echo "fef ";
                $user_actual_balance = $user_data->fetch(PDO::FETCH_OBJ)->balance - $amount;
                $recipient_actual_balance = $recipient_data->fetch(PDO::FETCH_OBJ)->balance + $amount;

                if(($user_actual_balance + $amount) < $amount){
                    $_SESSION["red_message"] = "Insufficient account balance.";
                    return;
                }

                $db->query("UPDATE `users` SET `balance` = $user_actual_balance WHERE `id` = ".$_SESSION['user']->id);
                $db->query("UPDATE `users` SET `balance` = $recipient_actual_balance WHERE `id` = $corporation[0]");
                $_SESSION['user']->balance = $user_actual_balance;
                $recipient_data = $db->query('SELECT * FROM `users` WHERE `id` = '.$corporation[0]);

                //Send transactions
                $r_data = $recipient_data->fetch(PDO::FETCH_OBJ);
                $db->query("INSERT INTO `transactions`(`recipient`, `amount`, `user_id`) VALUES ('".$r_data->name."','"."- $".$amount."','".$_SESSION['user']->id."')");
                $db->query("INSERT INTO `transactions`(`recipient`, `amount`, `user_id`) VALUES ('".$_SESSION['user']->name."','"."+ $".$amount."','".$r_data->id."')");
                $db->query("DELETE FROM `bills` WHERE id = $product_id");
                $_SESSION["green_message"] = "$".$amount." has been successfully paid to ".$r_data->name.".";
            }
            else
            {
                //var_dump($user_data->fetch(PDO::FETCH_OBJ)->balance);
                if(($user_actual_balance + $amount) < $amount){
                    $_SESSION["red_message"] = "Insufficient account balance.";
                    return;
                }

                $db->query("INSERT INTO `transactions`(`recipient`, `amount`, `user_id`) VALUES ('".$corporation.", ".$product_name."','"."- $".$amount."','".$_SESSION['user']->id."')");
                $db->query("UPDATE `users` SET `balance` = $user_actual_balance WHERE `id` = ".$_SESSION['user']->id);
                $db->query("DELETE FROM `bills` WHERE id = $product_id");
                $_SESSION["green_message"] = "$$amount has been successfully paid for $product_name.";
                $_SESSION['user']->balance = $user_actual_balance;
            }
        }
    }
?>