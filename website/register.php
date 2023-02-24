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
?>



