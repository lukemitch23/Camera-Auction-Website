<!DOCTYLE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Camera auction site</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <h1>Camera auction site</h1>
        <h2>Welcome to the camera auction site, please login to coninue.</h2>
        <h3>If you don't have an account, please register.</h3>
        <p>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </p>
    </body>
</html>

<?php
include 'db_connect.php';
$sql = "SELECT * FROM listings WHERE end_date < CURRENT_DATE()";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        unlink('images/' . $row['image']);
        $sql = "INSERT INTO sold (make, model, price) VALUES ('{$row['make']}', '{$row['model']}', '{$row['price']}')";
        mysqli_query($link, $sql);
        $sql = "DELETE FROM listings WHERE listingID = {$row['listingID']}";
        mysqli_query($link, $sql);
    }
}
?>