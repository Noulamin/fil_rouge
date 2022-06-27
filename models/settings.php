<?php
    class Settings extends Model
    {
        public function update_user($post)
        {
            $db = self::getdb();
            $db->query("UPDATE `users` SET `username`='".$post["username"]."',`password`='".md5($post["Password"])."',`email`='".$post["email"]."',`name`='".$post["fullname"]."',`birth_day`='".$post["birthday"]."',`phone`='".$post["phonenumber"]."' WHERE `id` = ".$_SESSION['user']->id);
            $_SESSION["green_message"] = "successfully updated";
        }
    }
?>
