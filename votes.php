<?php 
session_start();
include './connection.php';

if(!isset($_SESSION['user_id']))
	header('location:index.php');
	
	$user_id = $_SESSION['user_id'];
			
		$qry = mysqli_query($con,"SELECT v_id FROM voter WHERE user_id = '$user_id'");
		$row = mysqli_fetch_array($qry);
	
        $v_id = $row['v_id'];

$c_id = $_GET['c_id'];
$s_id = $_GET['s_id'];
$c_name = $_GET['c_name'];

$sql = "INSERT INTO vote (vote_date, vote_time, v_id, s_id, c_id) 
VALUES (now(), now(), '$v_id' , '$s_id' , '$c_id')";

if (mysqli_query($con, $sql)) 
{
?>
<script>
 alert("You have selected: <?php echo $_GET['c_name'];?>");
 window.location="vote.php";
 </script>
 <?php
} 
else 
{?>
 <script>
 alert("Already Voted!!!");
 window.location="vc_list.php";
 </script>
 <?php
}


?>
