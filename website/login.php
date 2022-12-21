<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="indexstylesheet.css">
        <link href="favicon.ico" rel="icon" type="image/x-icon" />
    </head>
    <body>
        <div class="indexcontent">
            <h1>Camera auction website</h1>
            <h2>Welcome returning user</h2>
            <break></break>
            <break></break>
            <div class="loginform">
                <form action="login.php" method="post">
                    <label for="username">Username:</label>
                    <br>
                    <input type="text" name="uname" id="uname">
                    <br>
                    <label for="password">Password:</label>
                    <br>
                    <input type="password" name="psswd" id="psswd">
                    <br>
                    <input type="submit" value="Login">
                </form>
            </div>
        </div>
    </body>
</html>

<?php
session_start();
include 'db_connect.php';
If($_POST){
    if ($_POST['uname'] == "" or $_POST['psswd'] == ""){
        echo "<div class='content'>
                <br></br>
                <h3>One or more fields are empty</h3>
            </div>";
    } else {
    if (isset($_POST['uname']) && isset($_POST['psswd'])) {
        $uname = $_POST['uname'];
        $psswd = $_POST['psswd'];
        $sql = "SELECT * FROM users WHERE username = '$uname'";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($psswd, $row['password'])){
                $_SESSION['username'] = $uname;
                echo "<h4> Welcome " . $_SESSION['username'] . "</h4>";
                sleep(2);
                header("Location: home.php");
            } else{
                echo "Details are incorrect please try again";
            }
        } else {
            echo "Details are incorrect please try again";
        }
    }
    }
}
?>


