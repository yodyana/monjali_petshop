
<?php
include_once("db_connect.php");
if (!empty($_POST['rating']) && !empty($_POST['itemId'])) {
    //  $itemId = $_POST['itemId'];
    //  $userID = 1234567;  
    $id_pelanggan = $_POST['id_pelanggan'];
    $insertRating = "INSERT INTO item_rating (id_pelanggan ,ratingNumber, title, comments, created, modified) VALUES ('" . $_POST['id_pelanggan'] . "','" . $_POST['rating'] . "', '" . $_POST['title'] . "', '" . $_POST["comment"] . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "')";
    mysqli_query($conn, $insertRating) or die("database error: " . mysqli_error($conn));
    echo "rating saved!";
}
?> 