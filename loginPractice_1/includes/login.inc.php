<?php

if(isset($_POST['login'])) {
 
    //Grabbing the data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    //Instantiate SignupContr class
    include_once '../classes/database.classes.php';
    include_once '../classes/login.classes.php';
    include_once '../classes/login.controller.php';
    
    $login = new LoginController($uid, $pwd);

    //Running Error Handlers and users login 

    $login->loginUser();

    //Going back to front page
    header("location: ../loginIndex.php?error=noneproblem");
    exit();
}