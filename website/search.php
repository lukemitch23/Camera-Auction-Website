<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Search</title>
        <link rel="stylesheet" href="searchstylesheet.css">
        <link rel="icon" type="image/x-icon" href="camera.ico">
    </head>
    <body>
        <?php include 'navbar.php'; ?>

        <div class="homecontent">
            <div class="messagecontent">
                <h2>Search</h2>
            </div>
            <div class="searchform">
                <form action="search.php" method="post" enctype="multipart/form-data">
                    <label for="search">Enter the model that you would like:</label>
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

If($_POST){
    if ($_POST['search'] == " "){
        echo "<div class='content'>
                <h2> </h2>
                <h2>No text entered</h2>
            </div>"; 
    } else {
        $sql = "SELECT * FROM listings WHERE make LIKE '%{$_POST['search']}%' OR model LIKE '%{$_POST['search']}%'";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $date1 = new DateTime("now");
                $date2 = new DateTime($row['end_date']);
                $interval = $date1->diff($date2);
                $new_interval = $interval->m." months, ".$interval->d." days ";
                echo "<div class='listing'>
                <div class='listinginfo'>
                    <h2>{$row['make']} {$row['model']}</h2>
                    <br>
                    <h3>£{$row['price']}</3>
                    <br>
                    <p>Time left: $new_interval</p>
                    <br>
                    <p>{$row['description']}</p>
                    <br>
                    <div class='viewbutton'>
                        <a href='view_listing.php?listingID={$row['listingID']}'>View</a>
                    </div>
                </div>
                <div class='listingimage'>
                    <img src='{$row['image']}' alt='{$row['make']} {$row['model']}'>
                    <br>
                </div>
            </div>";
            }
        } else {
            echo "<div class='content'>
                    <h2>No results found</h2>
                </div>";
        }
        if (isset($_POST['view'])) {
            $_COOKIE['listingID'] = $row['listingID'];
        }
    }
}
?>

