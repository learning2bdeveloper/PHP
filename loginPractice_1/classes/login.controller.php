<?php

class LoginController extends Login{
    
    private $uid;
    private $pwd;

    public function __construct($uid, $pwd) {

        $this->uid = $uid;
        $this->pwd = $pwd;

    }

    public function loginUser() {
        if($this->emptyInput() == false) {
            header("location: ../_index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->uid, $this->pwd);
    }
    // checking if one user input is not filled.
private function emptyInput() {
    $result = "";
    if(empty($this->uid) || empty($this->pwd)) {
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
    }

} 

?>