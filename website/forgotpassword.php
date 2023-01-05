<html>
    <head>
        <meta charset="UTF-8">
        <title>Forgot password</title>
        <link rel="stylesheet" href="indexstylesheet.css">
        <link href="favicon.ico" rel="icon" type="image/x-icon" />
    </head>
    <body>
        <div class="indexcontent">
            <h1>Camera auction website</h1>
            <h2>Forgot password</h2>
            <break></break>
            <break></break>
            <div class="loginform">
                <form action="forgotpassword.php" method="post">
                    <label for="username">Username:</label>
                    <br>
                    <input type="text" name="uname" id="uname">
                    <br>
                    <label for="email">Email:</label>
                    <br>
                    <input type="text" name="email" id="email">
                    <br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </body>
</html>

<?php
session_start();
include 'db_connect.php';

If($_POST){
    if(isset($_POST['uname']) && isset($_POST['email'])){
        $uname = $_POST['uname'];
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '1234567891011121';
        $encryption_key = '715655524310713512439317';
        $encrypted_uname = openssl_encrypt($uname, $ciphering,
                $encryption_key, $options, $encryption_iv);
        $sql = "SELECT * FROM users WHERE username = '" . $encrypted_uname . "'";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) == 0) {
            echo "Username not found";
        } else {
            $row = mysqli_fetch_assoc($result);
            $email = $row['email'];
            $decyptemail = openssl_decrypt($email, $ciphering,
                    $encryption_key, $options, $encryption_iv);
            if($decryptemail == $_POST['email']){
                $command = escapeshellcmd('python3 websiteemail.py ' . $email . ' ' . $uname);
                $output = shell_exec($command);
                echo $output;
                echo "Email has been sent";
            } else {
                echo "Email is incorrect";
            }
        }
    }
}
?>