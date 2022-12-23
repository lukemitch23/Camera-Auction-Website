<?php
    session_start();
    include 'db_connect.php';
    
    $uname = $_POST['uname'];
    $psswd = $_POST['psswd'];
    $email = $_POST['email'];
    $cardnumber = $_POST['cardnumber'];
    $cvc = $_POST['cvc'];
    $expiry = $_POST['expiry'];

    $key = sodium_crypto_secretbox_keygen();
    $encfunc = random_bytes( SODIUM_CRYPTO_SECRETBOX_NONCEBYTES );
    $encrypted_uname = sodium_crypto_secretbox($uname, $encfunc, $key);
    $encrypted_psswd = sodium_crypto_secretbox($psswd, $encfunc, $key);
    $encrypted_email = sodium_crypto_secretbox($email, $encfunc, $key);
    $encrypted_cardnumber = sodium_crypto_secretbox($cardnumber, $encfunc, $key);
    $encrypted_cvc = sodium_crypto_secretbox($cvc, $encfunc, $key);
    $encrypted_expiry = sodium_crypto_secretbox($expiry, $encfunc, $key);
    $encoded = base64_encode( $encfunc . $encrypted_uname . $encrypted_psswd . $encrypted_email . $encrypted_cardnumber . $encrypted_cvc . $encrypted_expiry . $key );

    if ($uname == "" or $psswd == "" or $email == "" or $cardnumber == "" or $cvc == "" or $expiry == "") {
        echo "<div class='content'>
                <h2> </h2>
                <h2>One or more fields are empty</h2>
            </div>";
    } else {
        if (($cardnumber > 1000000000000000) && ($cardnumber < 9999999999999999) && ($cvc > 100) && ($cvc < 999)) {
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
                header("Location: login.php");
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($link);
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