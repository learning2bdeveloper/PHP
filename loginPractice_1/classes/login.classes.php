<?php

class Login extends Database {

    protected function getUser($uid, $pwd) {
        $stmt = $this->connect()->prepare("SELECT users_pwd FROM users WHERE users_uid = :u OR users_email = :e;");

        $stmt->bindParam('u', $uid);

        if(!$stmt->execute()) {
            $stmt = null;
            header("location: ../_index.php?error=stmtfailed");
            exit();
        }

        //checking if the input of the user (username) is found in the database; if not then error.
        if($stmt->rowCount() == 0) {

            $stmt = null;
            header("location: ../loginIndex.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll();
        $checkedpwd = password_verify($pwd, $pwdHashed[0]['users_pwd']);
        
        if($checkedpwd == false) {

            $stmt = null;
            header("location: ../loginIndex.php?error=wrongpassword");
            exit();
        }else if($checkedpwd == true) {

            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE users_uid = :u OR users_email = :e AND users_pwd = :p;");

            $stmt->bindParam('u', $uid);
            $stmt->bindParam('e', $uid);
            $stmt->bindParam('p', $pwd);

            if(!$stmt->execute()) {
                $stmt = null;
                header("location: ../loginIndex.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../loginIndex.php?error=noUser");
                exit();
            }
            
            $user = $stmt->fetchAll();

            session_start();
            $_SESSION["userid"] = $user[0]["user_id"];
            $_SESSION["useruid"] = $user[0]["user_uid"];

            $stmt = null;
        }
        

    }
}
?>