<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Price recommendation</title>
        <link rel="stylesheet" href="searchstylesheet.css">
        <link rel="stylesheet" href="messagestylesheet.css">
        <link href="camera.ico" rel="icon" type="image/x-icon" />
    </head>
    <body>
        <?php include 'navbar.php'; ?>
        <div class="homecontent">
        <div class="messagecontent">
                <h2>Search</h2>
            </div>
            <div class="searchform">
                <form action="pricerec.php" method="post" enctype="multipart/form-data">
                    <label for="search">Enter the make and model that you would like:</label>
                    <br>
                    <input type="text" name="search" id="search">
                    <div class="submitsearch">
                        <input type="submit" value="Search">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>


<?php
include 'db_connect.php';

$command = escapeshellcmd('python3 priceupdating.py');
$output = shell_exec($command);

If($_POST){
    if ($_POST['search'] == ""){
        echo "<div class='content'>
                <br></br>
                <h2>No text entered</h2>
            </div>"; 
    } else {
        $sql = "SELECT * FROM prices WHERE make LIKE '%{$_POST['search']}%' OR model LIKE '%{$_POST['search']}%'";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='messagebox'>
                <div class='fromuser'>
                    <h3>{$row['make']} {$row['model']}</h3>
                </div>
                <div class='usermessage'>
                    <h3>£{$row['recprice']}</h3>
                </div>
            </div>";
            }
        } else {
            echo "<div class='content'>
                    <h2>No results found</h2>
                </div>";
        }
    }
    
}
?>

