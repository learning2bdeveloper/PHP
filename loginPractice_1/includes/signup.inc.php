<?php

if(isset($_POST['signup'])) {
 
    //Grabbing the data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $repeatPwd = $_POST['repeatpwd'];
    $email = $_POST['email'];

    //Instantiate SignupContr class
    include_once '../classes/database.classes.php';
    include_once '../classes/signup.classes.php';
    include_once '../classes/signup.controller.php';
    
    $signup = new SignupController($uid, $pwd, $repeatPwd, $email);

    //Running Error Handlers and users signup 

    $signup->signupUser();

    //Going back to front page
    header("location: ../_index.php?error=none");
}