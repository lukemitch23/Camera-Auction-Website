<?php
    session_start();
    include 'db_connect.php';
    
    $uname = $_POST['uname'];
    $psswd = $_POST['psswd'];
    $email = $_POST['email'];
    $cardnumber = $_POST['cardnumber'];
    $cvc = $_POST['cvc'];
    $expiry = $_POST['expiry'];

    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234567891011121';
        $encryption_key = '6927926';
    $encrypted_uname = openssl_encrypt($uname, $ciphering,
            $encryption_key, $options, $encryption_iv);
    $encrypted_psswd = openssl_encrypt($psswd, $ciphering,
            $encryption_key, $options, $encryption_iv);
    $encrypted_email = openssl_encrypt($email, $ciphering,
            $encryption_key, $options, $encryption_iv);
    $encrypted_cardnumber = openssl_encrypt($cardnumber, $ciphering,
            $encryption_key, $options, $encryption_iv);
    $encrypted_cvc = openssl_encrypt($cvc, $ciphering,
            $encryption_key, $options, $encryption_iv);
    $encrypted_expiry = openssl_encrypt($expiry, $ciphering,
            $encryption_key, $options, $encryption_iv);
    $key = $encryption_key;




    if ($uname == "" or $psswd == "" or $email == "" or $cardnumber == "" or $cvc == "" or $expiry == "") {
        echo "<div class='content'>
                <h2> </h2>
                <h2>One or more fields are empty</h2>
            </div>";
    } else {
        if (($cardnumber > 1000000000000000) && ($cardnumber < 9999999999999999) && ($cvc > 100) && ($cvc < 999)) {
                $sql = "SELECT * FROM users WHERE username = '" . $encrypted_uname . "' OR email = '" . $encrypted_email . "' OR cardnumber = '" . $encrypted_cardnumber . "' OR cvc = '" . $encrypted_cvc . "'";
                $result = mysqli_query($link, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo "<div class='content'>
                            <h2> </h2>
                            <h2>User already exists</h2>
                        </div>";
                } else {
                        $sql = "SELECT * FROM users WHERE username = '" . $encrypted_uname . "'";
                        $result = mysqli_query($link, $sql);
                        if (mysqli_num_rows($result) > 0) {
                                echo "User already exists";
                        } else {
                                $sql = "INSERT INTO users (username, password, email, cardnumber, cvc, expire, enckey) VALUES ('" . $encrypted_uname . "', '" . $encrypted_psswd . "', '" . $encrypted_email . "', '" . $encrypted_cardnumber . "', '" . $encrypted_cvc . "', '" . $encrypted_expiry . "', '" . $key . "')";
                                if (mysqli_query($link, $sql)) {
                                echo "<div class='content'>
                                        <h2> </h2>
                                        <h2>Registration successful</h2>
                                        </div>";
                                header("Location: home.php");
                                } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($link);
                                }
                        }
                }
        } else {
            echo "<div class='content'>
                    <h2> </h2>
                    <h2>Card number or CVC is invalid</h2>
                </div>";
        }
    }
?>
