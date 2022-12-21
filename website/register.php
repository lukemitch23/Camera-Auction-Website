<!DOCTYPE html>
<html lang="en">
    <head>
         <meta charset="UTF-8">
         <title>Register</title>
         <link rel="stylesheet" href="stylesheet_old.css">
    </head>
    <body>
        <div class="header">
            <h1>Camera auction site</h1>
        </div>
        <div class="content">
            <h2>Register</h2>
            <form action="register.php" method="post">
                <label for="username">Username</label>
                <input type="text" name="uname" id="uname">
                <label for="password">Password</label>
                <input type="password" name="psswd" id="psswd">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
                <label for="cardnumber">Card number</label>
                <input type="number" name="cardnumber" id="cardnumber">
                <label for="cvc">CVC</label>
                <input type="number" name="cvc" id="cvc">
                <label for="expiry">Expiry date</label>
                <input type="text" placeholder="MM/YYYY" id="expiry" name="expiry">
                <input type="submit" value="Register">
            </form>
        </div>
    </body>
</html>

<?php
session_start();
include 'db_connect.php';

If($_POST){
    if ($_POST['uname'] == "" or $_POST['psswd'] == "" or $_POST['email'] == "" or $_POST['cardnumber'] == "" or $_POST['cvc'] == "" or $_POST['expiry'] == ""){
        echo "<div class='content'>
                <h2> </h2>
                <h2>One or more fields are empty</h2>
            </div>";
    } else {
        if (($_POST['cardnumber'] > 1000000000000000) && ($_POST['cardnumber'] < 9999999999999999) && ($_POST['cvc'] > 100) && ($_POST['cvc'] < 999)){
            $uname = $_POST['uname'];
            $psswd = $_POST['psswd'];
            $email = $_POST['email'];
            $cardnumber = $_POST['cardnumber'];
            $cvc = $_POST['cvc'];
            $expiry = $_POST['expiry'];
            $sql = "INSERT INTO users (username, password, email, cardnumber, cvc, expire) VALUES ('$uname', '$psswd', '$email', '$cardnumber', '$cvc', '$expiry')";
            $result = mysqli_query($link, $sql);
            if ($result) {
                echo "Registration successful";
                $sql = "SELECT * FROM users WHERE username = '$uname'";
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_assoc($result);
                echo $row['userid'];
                $_SESSION['username'] = $row['username'];
                sleep(5);
                header("Location: home.php");
            } else {
                echo "Registration failed";
            }
        } else {
            echo "The card number or CVC is incorrect";
        }
    }
}
?>




