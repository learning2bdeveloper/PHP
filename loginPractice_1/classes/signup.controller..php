<?php

class SignupController extends Signup{
    
    private $uid;
    private $pwd;
    private $repeatPwd;
    private $email;

    public function __construct($uid, $pwd, $repeatPwd, $email) {

        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->repeatPwd = $repeatPwd;
        $this->email = $email;

    }

    private function signUser() {
        if($this->emptyInput() == false) {
            header("Location: ../_index.php?error=emptyinput");
            exit();
        }

        if($this->invalidUid() == false) {
            header("Location: ../_index.php?error=invalidUid");
            exit();
        }

        if($this->invalidEmail() == false) {
            header("Location: ../_index.php?error=invalidEmail");
            exit();
        }

        if($this->pwdMatch() == false) {
            header("Location: ../_index.php?error=passwordnotmatch");
            exit();
        }

        if($this->uidTakenCheck() == false) {
            header("Location: ../_index.php?error=userhasbeentaken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }
    // checking if one user input is not filled.
private function emptyInput() {
    $result = "";
    if(empty($this->uid) || empty($this->pwd) || empty($this->repeatPwd) || empty($this->email)) {
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
}

//pattern matching meaning only these letters and numbers are allowed
private function invalidUid() {
    $result = "";
    if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
}

//validating if user email is the correct email
private function invalidEmail() {
    $result = "";
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
}

//checking if the password and passwordRepeat is the same	
private function pwdMatch() {
    $result = "";
    if($this->pwd !== $this->repeatPwd) {
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
}

//checking if the username and email are already created in the database
private function uidTakenCheck() {
    $result = "";
    if(!$this->checkUser($this->uid, $this->email)) {
        $result = false;
    }else {
        $result = true;
    }
    return $result;
    }
}    