<!DOCTYPE html>
<html lang="en">
    <head>
         <meta charset="UTF-8">
         <title>Register</title>
         <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <div class="header">
            <h1>Camera auction site</h1>
        </div>
        <div class="content">
            <h2>Register</h2>
            <form action="register.php" method="post">
                <label for="username">Username</label>
                <input type="text" name="uname" id="username">
                <label for="password">Password</label>
                <input type="password" name="psswd" id="password">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
                <input type="submit" value="Register">
            </form>
        </div>
    </body>
</html>

<?php
session_start();
include 'db_connect.php';

If($_POST){
    if (isset($_POST['uname']) && isset($_POST['psswd']) && isset($_POST['email'])) {
        $uname = $_POST['uname'];
        $psswd = $_POST['psswd'];
        $email = $_POST['email'];
        if ($uname == "" or $psswd == "" or $email == ""){
          echo "<h4>Part of the form is blank</h4>";
        }
        $sql = "INSERT INTO users (username, password, email) VALUES ('$uname', '$psswd', '$email')";
        $result = mysqli_query($link, $sql);
        if ($result) {
            echo "Registration successful";
            $sql = "SELECT userid FROM users WHERE username = '$uname'";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_assoc($result);
            echo $row['userid'];
            $_SESSION["userID"] = $row['userid'];
            sleep(5);
            header("Location: home.php");
        } else {
            echo "Registration failed";
        }
        echo "end of program";
    }
}
?>




