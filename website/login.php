<!DOCTYPE html>
<html lang="en">
    <head>
         <meta charset="UTF-8">
         <title>Login</title>
         <link rel="stylesheet" href="stylesheet_old.css">
    </head>
    <body>
        <h1>Camera auction site</h1>
        <div class="content">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <label for="username">Username</label>
                <input type="text" name="uname" id="uname">
                <label for="password">Password</label>
                <input type="password" name="psswd" id="psswd">
                <input type="submit" value="Login">
            </form>
        </div>
    </body>
</html>

<?php
session_start();
include 'db_connect.php';
If($_POST){
    if ($_POST['uname'] == "" or $_POST['psswd'] == ""){
        echo "<div class='content'>
                <br></br>
                <h3>One or more fields are empty</h3>
            </div>";
    } else {
    if (isset($_POST['uname']) && isset($_POST['psswd'])) {
        $uname = $_POST['uname'];
        $psswd = $_POST['psswd'];
        $sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$psswd'";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "Login successful";
            $_SESSION['username'] = $uname;
            echo "<h4> Welcome " . $_SESSION['username'] . "</h4>";
            sleep(2);
            header("Location: home.php");
        } else {
            echo "Details are incorrect please try again";
        }
    }
    }
}
?>

