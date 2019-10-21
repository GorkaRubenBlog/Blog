<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "blog";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT USUCOD, USUNOMB FROM usuarios";
$result = mysqli_query($conn, $sql);
echo mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "bai";
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>