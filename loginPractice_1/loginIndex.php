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
    <div>
        <Label for="Username">Username</Label>
    <form action="includes/login.inc.php" method="post" autocomplete="off"> <!-- false para nd na mag pakita ang mga na entered users-->
            <input type="text" name="uid"> 
        </form>
    </div>

    <div>
        <label for="Password">Password</label>
    <form action="" method="post">
            <input type="password" name="pwd">
        </form>
    </div>

    <div class="button-login">
        <form action="" method="post">
            <button type="submit" name="login">Login</button>
        </form>
    </div>

</div>
</body>
</html>