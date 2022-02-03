<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "oes";

$conn = mysqli_connect($hostname, $username, $password, $databaseName);
//require_once('connection.php');
$city_id = $_POST['c_id'];
if($city_id!='')
{
$states_result = $conn->query('select * from seat where city_id='.$city_id.'');
$options = "<option value='seat_id'>Select seat</option>";
while($row = $states_result->fetch_assoc()) {
$options .= "<option value='".$row['s_id']."'>".$row['s_name']."</option>";
}
echo $options;
}?>
