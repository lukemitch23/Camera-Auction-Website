<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Enc test</title>
        <link rel="icon" type="image/x-icon" href="camera.ico">
    </head>
    <body>
        <form action="encryptiontest.php" method="post">
            <label for="string">Enter a string:</label>
            <input type="text" name="string" id="string">
            <input type="submit" value="Submit">
    </body>
</html>

<?php
session_start();
include 'db_connect.php';

if($_POST){
    $simple_string = $_POST['string'];
    echo "Original String: " . $simple_string;
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption_key = "GeeksforGeeks";
    $encryption = openssl_encrypt($simple_string, $ciphering,
            $encryption_key, $options, $encryption_iv);
    echo "Encrypted String: " . $encryption . "\n";
    $decryption_iv = '1234567891011121';
    $decryption_key = "GeeksforGeeks";
    $decryption=openssl_decrypt ($encryption, $ciphering, 
        $decryption_key, $options, $decryption_iv);
    echo "Decrypted String: " . $decryption;
}