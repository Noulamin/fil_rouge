<?php
    class Dashboard extends Model{
        function get_All_users()
        {
            $db = self::getdb();
            $query = $db->query('SELECT * FROM `users` WHERE `active` = 1 && `id` != '.$_SESSION['user']->id);
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }

        function send_money($id,$amount)
        {
            $db = self::getdb();
            $user_data = $db->query('SELECT * FROM `users` WHERE `id` = '.$_SESSION['user']->id);
            $recipient_data = $db->query('SELECT * FROM `users` WHERE `id` = '.$id);
            $user_actual_balance = $user_data->fetch(PDO::FETCH_OBJ)->balance - $amount;
            $recipient_actual_balance = $recipient_data->fetch(PDO::FETCH_OBJ)->balance + $amount;

            if($amount == 0)
            {
                $_SESSION["red_message"] = "Enter amount that greater than 0 :) .";
                return;
            }
            else 
            if(($user_actual_balance + $amount) < $amount)
            {
                $_SESSION["red_message"] = "Insufficient account balance.";
                return;
            }

            $db->query("UPDATE `users` SET `balance` = $user_actual_balance WHERE `id` = ".$_SESSION['user']->id);
            $db->query("UPDATE `users` SET `balance` = $recipient_actual_balance WHERE `id` = $id");
            $_SESSION['user']->balance = $user_actual_balance;
            $recipient_data = $db->query('SELECT * FROM `users` WHERE `id` = '.$id);

            //Send transactions
            $r_data = $recipient_data->fetch(PDO::FETCH_OBJ);
            $db->query("INSERT INTO `transactions`(`recipient`, `amount`, `user_id`) VALUES ('".$r_data->name."','"."- $".$amount."','".$_SESSION['user']->id."')");
            $db->query("INSERT INTO `transactions`(`recipient`, `amount`, `user_id`) VALUES ('".$_SESSION['user']->name."','"."+ $".$amount."','".$r_data->id."')");
            $_SESSION["green_message"] = "$".$amount." has been successfully sent to ".$r_data->name.".";
        }

        function request_money($id,$amount)
        {
            $db = self::getdb();
            $user_data = $db->query('SELECT * FROM `users` WHERE `id` = '.$_SESSION['user']->id);
            $recipient_data = $db->query('SELECT * FROM `users` WHERE `id` = '.$id);
            $user_actual_balance = $user_data->fetch(PDO::FETCH_OBJ)->balance - $amount;
            $recipient_actual_balance = $recipient_data->fetch(PDO::FETCH_OBJ)->balance + $amount;

            if($amount == 0)
            {
                $_SESSION["red_message"] = "Enter amount that greater than 0 :) .";
                return;
            }

            $recipient_data = $db->query('SELECT * FROM `users` WHERE `id` = '.$id);
            $r_data = $recipient_data->fetch(PDO::FETCH_OBJ);
            $db->query("INSERT INTO `bills`(`product`, `corporation`, `amount`, `user_id`) VALUES ('Amount requested','".$_SESSION['user']->id.$_SESSION['user']->name."','$amount','$r_data->id')");
            //$db->query("INSERT INTO `bills`(`product`, `corporation`, `amount`, `user_id`) VALUES ('Amount requested','".$r_data->name."','$amount','".$_SESSION['user']->id."')");
            $db->query("INSERT INTO `transactions`(`recipient`, `amount`, `user_id`) VALUES ('Requested amount, ".$r_data->name."','"."$".$amount."','".$_SESSION['user']->id."')");
            $_SESSION["green_message"] = "$".$amount." has been successfully requested from ".$r_data->name.".";
        }
    }
?>