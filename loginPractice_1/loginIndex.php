<?php session_start()?>
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

<h2>Log in</h2>
            <?php
                if(isset($_SESSION["useruid"])) 
                {
            ?>
                <h1>Welcome, </h1> <a href="#"></a><?php echo $_SESSION["useruid"];?>
                <a href="includes/logout.inc.php">Logout</a>
                    
            <?php
                }
            ?>
        
    <form method="POST" action="includes/login.inc.php" autocomplete="off"> <!-- false para nd na mag pakita ang mga na entered users-->
    <div>  
        <Label for="Username">Username</Label>
            <input type="text" name="uid"> 
    </div>

    <div>
        <label for="Password">Password</label>
            <input type="password" name="pwd">
            <a href="includes/logout.inc.php">Logout</a>
    </div>

    <div class="button-login">
            <button type="submit" name="login">Login</button>
    </div>
    </form>
</div>
</body>
</html>