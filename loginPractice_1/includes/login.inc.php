<?php

if(isset($_POST['login'])) {
 
    //Grabbing the data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $repeatPwd = $_POST['repeatpwd'];
    $email = $_POST['email'];

    //Instantiate SignupContr class
    include_once '../classes/database.classes.php';
    include_once '../classes/login.classes.php';
    include_once '../classes/login.controller.php';
    
    $signup = new LoginController($uid, $pwd);

    //Running Error Handlers and users signup 

    $signup->loginUser();

    //Going back to front page
    header("location: ../loginIndex.php?error=none");
}