<?php

class Signup extends Database {
    
    protected function setUser($uid, $pwd, $email) {
        $stmt = $this->connect()->prepare("INSERT INTO users(users_uid, users_pwd, users_email) VALUES (:n, :m, :l);");

        $hashedPwd = hash('md5', $pwd);

        $stmt->bindParam('n', $uid);
        $stmt->bindParam('m', $hashedPwd);
        $stmt->bindParam('l', $email);
        if(!$stmt->execute()) {
            $stmt = null;
            header("location: ../_index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    protected function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare("SELECT users_uid FROM users WHERE users_uid = :n OR users_email = :m;");
        $stmt->bindParam('n', $uid);
        $stmt->bindParam('m', $email);

        if(!$stmt->execute()) {
            $stmt = null;
            header("location: ../_index.php?error=stmtfailed");
            exit();
        }

        //Checking to see if there is a user already exist in the database, then don't signup the user
        $resultChecker = "";
        if($stmt->rowCount() > 0) {
            $resultChecker = false;
        }else {
            $resultChecker = true;
        }
        return $resultChecker;
    }
}