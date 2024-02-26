<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="template/loginn.css">
</head>

<body>

    <?php 
    session_start();
    if(empty($_SESSION['username'])){ ?>
    <div class="wrapper">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="input-box">
                <input type="text" placeholder="username" name="username" required />
            </div>
            <div class="input-box">
                <input type="password" placeholder="password" name="password" required />
            </div>

            <button type="submit" class="btn">login</button>
        </form>
    </div>
</body>

</html>
<?php 
    if(!empty($_POST['username'])&&!empty($_POST['password'])){
        $userName = $_POST['username'];
        $password = $_POST['password'];
        if($userName == 'admin' && $password == '123456'){
            $_SESSION['username'] = $userName;
            header("Location: index.php");
        }else{
            echo "<center><span style='color: darkred;'>Wrong username or password</span></center>";
        }
    }
    ?>
</div>
</div>
<?php } else {
  echo "<h3> You Are Already Logged In! go to <a href='logout.php'>logout</a> </h3>";
} ?>
<?php
require_once "template/footer.php";
?>