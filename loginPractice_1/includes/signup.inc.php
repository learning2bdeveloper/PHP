<?php

if(isset($_POST['signup'])) {
 
    //Grabbing the data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $repeatPwd = $_POST['repeatpwd'];
    $email = $_POST['email'];

    //Instantiate SignupContr class
    include '../classes/database.classes.php';
    include '../classes/signup.controller..php';
    include '../classes/signup.classes.php';
    
    $signup = new SignupController($uid, $pwd, $pwdRepeat, $email);

    //Running Error Handlers and users signup 

    //Going back to front page
}