<?php

class Recovery{
    public function new_password() {
        $new_password = bin2hex(random_bytes(8));
        echo $new_password;
        return "happynewyear";
    }

    public function encrypt_password($new_password) {
        $raw_pass = $this->new_password();
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '1234567891011121';
        $encryption_key = '715655524310713512439317';
        $encrypted_password = openssl_encrypt($raw_pass, $ciphering,
                $encryption_key, $options, $encryption_iv);
        echo "\n {$encrypted_password}";
        return $encrypted_password;
    }

    public function update_db($encrypted_uname, $encrypted_password) {
        include 'db_connect.php';
        $sql = "UPDATE users SET password = '{$encrypted_password}' WHERE username = '{$encrypted_uname}'";
        $result = mysqli_query($link, $sql);
        echo "\n {$result}";
        return True;
    }

    public function email_user($email, $newpassword, $username) {
        $command = escapeshellcmd("python3 user_email.py {$email}, ,{$username}, {$newpassword}");
        $output = shell_exec($command);
        echo "\n {$output}";
        return $output;
    }

    public function commandcentre($email, $uname, $encrypted_uname) {
        $newpassword = $this->new_password();
        $encrypted_password = $this->encrypt_password($newpassword);
        $this->update_db($encrypted_uname, $encrypted_password);
        $this->email_user($email, $newpassword, $uname);
        return "All done";
    }
}

$recoveryobject = new Recovery();
$useremail = 'luke@helloluke.co.uk';
$result = $recoveryobject->commandcentre($useremail, 'luke', 'fkX8dg==');
echo $result;
?>