<?php

class Recovery{
    private function new_password() {
        $new_password = bin2hex(random_bytes(8));
        echo $new_password;
        return $new_password;
    }

    private function encrypt_password($rawpassword) {
        $raw_pass = $rawpassword;
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '1234567891011121';
        $encryption_key = '6927926';
        $encrypted_psswd = openssl_encrypt($raw_pass, $ciphering,
            $encryption_key, $options, $encryption_iv);
        echo "\n {$encrypted_password}";
        return $encrypted_password;
    }

    private function update_db($encrypted_uname, $encrypted_password) {
        include 'db_connect.php';
        $sql = "UPDATE users SET password = '{$encrypted_password}' WHERE username = '{$encrypted_uname}'";
        $result = mysqli_query($link, $sql);
        echo "\n {$result}";
        return True;
    }

    private function email_user($email, $newpassword, $username) {
        $command = escapeshellcmd("python3 user_email.py {$email}, ,{$username}, {$newpassword}");
        $output = shell_exec($command);
        echo "\n {$output}";
        return $output;
    }

    public function commandcentre($email, $uname, $encrypted_uname) {
        $newpassword = $this->new_password();
        $testingfile = fopen("phppassword.txt", "w");
        fwrite($testingfile, "New plain text password: {$newpassword}\n");
        $encrypted_password = $this->encrypt_password($newpassword);
        fwrite($testingfile, "New encrypted password: {$encrypted_password}\n");
        $this->update_db($encrypted_uname, $encrypted_password);
        $this->email_user($email, $newpassword, $uname);
        return "All done";
    }
}
?>