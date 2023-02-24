<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Camera auction site</title>
        <link rel="stylesheet" href="indexstylesheet.css">
        <link rel="icon" type="image/x-icon" href="camera.ico">
    </head>
    <body>
        <div class="indexcontent">
            <h1>Camera auction website</h1>
            <h2>Welcome to the camera auction website!</h2>
            <p>Welcome to your one stop destination for all things camera equipment. Here you can sell your old equipment you no longer use or perhaps upgrade to the latest and greatest</p>
            <break></break>
            <break></break>
            <button type="button" onclick="location.href='login.php'">Login</button>
            <button type="button" onclick="location.href='register.php'">Register</button>
        </div>
    </body>
</html>

<?php
session_start();
$_SESSION['username'] = "";
?>