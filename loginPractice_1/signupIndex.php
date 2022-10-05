<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>
<body>


<div class="box-head">
    <h1>Hello</h1>
</div>

<div class="box-1">

    <h2>Sign up</h2>
    <div>
        <Label for="Username">Username</Label>
    <form action="/includes/signup.inc.php" method="POST" autocomplete="off"> 
            <input type="text" name="uid"> <!-- false para nd na mag pakita ang mga na entered users-->
    </div>

    <div>
        <label for="Password">Password</label>
            <input type="password" name="pwd">
    </div>

    <div>
        <label for="RetypePassword">RetypePassword</label>
            <input type="password" name="repeatpwd">
    </div>
    
    <div>
        <label for="Email">Email</label>
            <input type="email" name="email">
    </div>

    <div class="button-signup">
            <button type="submit" name="signup">Sign up</button>   
    </div>
    </form>
</div>

</body>
</html>