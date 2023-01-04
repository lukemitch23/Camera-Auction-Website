<?php
$uname = $_POST['uname'];
$psswd = $_POST['psswd'];

if(($uname == "") or ($psswd == "")){
    echo "One or more fields are empty";
} else {
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption_key = '715655524310713512439317';
    $encrypted_uname = openssl_encrypt($uname, $ciphering,
            $encryption_key, $options, $encryption_iv);
    $encrypted_psswd = openssl_encrypt($psswd, $ciphering,
            $encryption_key, $options, $encryption_iv);


    $sql = "SELECT * FROM users WHERE username = '" . $encrypted_uname . "' AND password = '" . $encrypted_psswd . "'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "Login successful";
        $_SESSION['username'] = $row['username'];
        header("Location: home.php");
    } else {
        echo "Details are incorrect please try again";
    }
}

?>