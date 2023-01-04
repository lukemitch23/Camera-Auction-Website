<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="indexstylesheet.css">
        <link href="favicon.ico" rel="icon" type="image/x-icon" />
    </head>
    <body>
        <div class="indexcontent">
            <h1>Camera auction website</h1>
            <h2>Welcome returning user</h2>
            <break></break>
            <break></break>
            <div class="loginform">
                <form action="encryptlogin.php" method="post">
                    <label for="username">Username:</label>
                    <br>
                    <input type="text" name="uname" id="uname">
                    <br>
                    <label for="password">Password:</label>
                    <br>
                    <input type="password" name="psswd" id="psswd">
                    <br>
                    <input type="submit" value="Login">
                </form>
            </div>
        </div>
    </body>
</html>

<?php
session_start();
include 'db_connect.php';

?>


