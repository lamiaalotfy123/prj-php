<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="wrapper">
        <form action="login.php" method="post">
            <h1>Welcom  Back To Lamia's Schools</h1>
            <div class="input-box">

                <input type="text" id="username" name="username" placeholder="username" required>

            </div>
            <div class="input-box">

                <input type="password" id="id" name="id" placeholder="ID" required>

            </div>
            <div class="remeber-forgot">
                <label>
                    <input type="checkbox">
                    Remember Me
                </label>
                <a href="#">Forgot ID ?</a>
            </div>
            <button type="submit" class="btn"> Login</button>
        </form>
    </div>
</body>

</html>

<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $id = $_POST['id']; 
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    $connection = new PDO("mysql:dbname=storedb;host=localhost", 'root', '');
    $statement = $connection->prepare('SELECT * FROM students WHERE student_name = ? AND id = ?');
    $statement->execute([$username, $id]);

    if ($user = $statement->fetch(PDO::FETCH_ASSOC)) {

        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
    } else {
      
        echo "<p style='color: red;'>Invalid username or ID!</p>";
    }
}

?>