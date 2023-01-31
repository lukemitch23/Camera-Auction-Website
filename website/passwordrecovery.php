<?php

class Recovery{
    public function new_password() {
        $new_password = bin2hex(random_bytes(8));
        return $new_password;
    }

    public function encrypt_password() {
        $raw_pass = $this->new_password();
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '1234567891011121';
        $encryption_key = '715655524310713512439317';
        $encrypted_uname = openssl_encrypt($raw_pass, $ciphering,
                $encryption_key, $options, $encryption_iv);
        return $encrypted_uname;
    }

    public function update_db($encrypted_uname, $encrypted_password) {
        include 'db_connect.php';
        $sql = "UPDATE users SET password = '{$encrypted_password}' WHERE username = '{$encrypted_uname}'";
        $result = mysqli_query($link, $sql);
        return True;
    }

    public function email_user($email, $newpassword) {
        $command = escapeshellcmd('python3 user_email.py luke@helloluke.co.uk, luke');
        $output = shell_exec($command);
        return $output;
    }

    public function commandcentre($email, $uname, $encrypted_uname) {
        $newpassword = $this->new_password();
        $encrypted_password = $this->encrypt_password();
        $this->update_db($encrypted_uname, $encrypted_password);
        $this->email_user($email, $newpassword);
        return "All done!";
    }
}

$recoveryobject = new Recovery();
$useremail = 'luke@helloluke.co.uk';
$result = $recoveryobject->commandcentre($useremail, 'luke', 'fkX8dg==');
echo $result;
?>