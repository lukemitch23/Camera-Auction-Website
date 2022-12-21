<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'server');
define('DB_PASSWORD', 'server123');
define('DB_NAME', 'site');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

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