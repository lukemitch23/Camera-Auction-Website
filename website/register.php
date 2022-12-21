<!DOCTYPE html>
<html lang="en">
    <head>
         <meta charset="UTF-8">
         <title>Register</title>
         <link rel="stylesheet" href="indexstylesheet.css">
         <link rel="icon" type="image/x-icon" href="camera.ico">
    </head>
    <body>
        <div class="indexcontent">
        <h1>Camera auction website</h1>
            <h2>We're so happy you're joining us!</h2>
            <div class="registerform">
                <form action="encryptregister.php" method="post">
                    <div class="formleft">
                        <label for="username">Username</label>
                        <br>
                        <input type="text" name="uname" id="uname">
                        <br>
                        <label for="password">Password</label>
                        <br>
                        <input type="password" name="psswd" id="psswd">
                        <br>
                        <label for="email">Email</label>
                        <br>
                        <input type="email" name="email" id="email">
                        <br>
                    </div>
                    <div class="formright">
                        <label for="cardnumber">Card number</label>
                        <br>
                        <input type="number" name="cardnumber" id="cardnumber">
                        <br>
                        <label for="cvc">CVC</label>
                        <br>
                        <input type="number" name="cvc" id="cvc">
                        <br>
                        <label for="expiry">Expiry date</label>
                        <br>
                        <input type="text" placeholder="MM/YYYY" id="expiry" name="expiry">
                        <br>
                    </div>
                    <input type="submit" value="Register">
                </form>
            </div>
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
            ##check the user does not exist
            $sql = "SELECT * FROM users WHERE username = '" . $_POST['uname'] . "'";
            $result = mysqli_query($link, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "User already exists";
            } else {
                $uname = $_POST['uname'];
                $psswd = $_POST['psswd'];
                $email = $_POST['email'];
                $cardnumber = $_POST['cardnumber'];
                $cvc = $_POST['cvc'];
                $expiry = $_POST['expiry'];
                $encryptpassword = password_hash($psswd, PASSWORD_DEFAULT);
                $encryptemail = password_hash($email, PASSWORD_DEFAULT);
                $encryptcardnumber = password_hash($cardnumber, PASSWORD_DEFAULT);
                $encryptcvc = password_hash($cvc, PASSWORD_DEFAULT);
                $encryptexpirey = password_hash($expiry, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (username, password, email, cardnumber, cvc, expire) VALUES ('$uname', '$encryptpassword', '$encryptemail', '$encryptcardnumber', '$encryptcvc', '$encryptexpirey')";
                $result = mysqli_query($link, $sql);
                if ($result) {
                    echo "Registration successful";
                    $sql = "SELECT * FROM users WHERE username = '$uname'";
                    $result = mysqli_query($link, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['username'] = $row['username'];
                    sleep(5);
                    header("Location: home.php");
                } else {
                    echo "Registration failed";
                }
            }
        } else {
            echo "The card number or CVC is incorrect";
        }
    }
}
?>


