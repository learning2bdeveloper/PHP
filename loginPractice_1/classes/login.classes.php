<?php

class Login extends Database {

    protected function getUser($uid, $pwd) {
        $stmt = $this->connect()->prepare("SELECT users_pwd FROM users WHERE users_uid = :u OR users_email = :u");

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
         $checkedpwd = $pwdHashed[0]['users_pwd'];
        //$checkedpwd = $pwdHashed;//password_verify($pwd, $pwdHashed[0]['users_pwd']);
        
        if($checkedpwd !== md5($pwd)) {

            $stmt = null;
            header("location: ../loginIndex.php?error=wrongpassword");
            exit();

        }else if($checkedpwd === md5($pwd)) {

            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE users_uid = :u OR users_email = :u AND users_pwd = :p;");

            $stmt->bindParam('u', $uid);
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
            
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['userid'] = $data[0]['users_id'];
            $_SESSION['useruid'] = $data[0]['users_uid'];

            if($_SESSION["useruid"] == null) {
                header("location: ../_index.php?error=sessionNull");
                exit();
            }
         $stmt = null;
        }
       
    }
}
?>