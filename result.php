<?php
include './connection.php';



$result = mysqli_query($con,"select * FROM vote");
$row = mysqli_fetch_array($result);

$total = $row[0];
echo "Total rows: " . $total;

?>