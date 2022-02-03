<?php
include 'connection.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
<title>VOTER Registration</title>
</head>

<body style="background-color:powderblue;">
<p>
  <?php

$conn = mysqli_connect("localhost", "root", "", "oes");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['Submit']))
{
	$s_name =$_POST["s_name"];
	$qry = mysqli_query($con,"SELECT s_id FROM seat WHERE s_name = '$s_name'");
	$row = mysqli_fetch_array($qry);
	$s_id = $row['s_id'];


$g_id= uniqid('IND-');
$vn = $_POST["textfield2"];
$e =$_POST["textfield3"];
$u_id =$_POST["textfield"];
$p =$_POST["textfield5"];
$rb =$_POST["radiobtn"];
$dob =$_POST["textfield6"];
$ph_no =$_POST["textfield4"];


    $sql = "INSERT INTO voter (generic_id, v_name, email, user_id, password, s_id, dob, gender, ph_no)
    VALUES ('$g_id', '$vn', '$e' , '$u_id' , '$p', '$s_id', '$dob', '$rb','$ph_no')";

if (mysqli_query($conn, $sql)) 
{
?>
<script>
 alert("Registered successfully");
 </script>
 <?php
} 
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
?>
</p>
<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
  <p>&nbsp;</p>
<div style="background-color: rgb(153, 204, 255); border:3px solid rgba(11, 90, 238, 0.726); margin-left: 25%; alignment-adjust: central; width: 50%; height:50%">
  <div align="center">
    <table width="371" border="0">
      <tr>
        <td width="141">&nbsp;</td>
        <td width="156"><label></label></td>
      </tr>
      <tr>
        <td><em><strong>Voter Name: </strong></em></td>
        <td><input type="text" name="textfield2" /></td>
      </tr>
      <tr>
        <td><em><strong>Email:</strong></em></td>
        <td><input type="text" name="textfield3" /></td>
      </tr>
      <tr>
        <td><em><strong>User ID:</strong></em></td>
        <td><input type="text" name="textfield" /></td>
      </tr>
      <tr>
        <td><em><strong>Password:</strong></em></td>
        <td><input type="password" name="textfield5" /></td>
      </tr>
      <tr>
        <td><em><strong>Gender:</strong></em></td>
        <td><label>
          <input name="radiobtn" type="radio" value="Male" />
				Male</label> <label>
		  <input name="radiobtn" type="radio" value="Female" />
				Female</label></td>
      </tr>
	  <td><em><strong>Seat ID: </strong></em></td>
        <td><label>
          <select name="s_name">
    		<option disabled selected>-- Select Seat Name --</option>
    	<?php
        include "connection.php";  
        $records = mysqli_query($con, "SELECT s_name From seat");  

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['s_name'] ."'>" .$data['s_name'] ."</option>"; 
        }	
    	?>  
 		 </select>
        </label></td>
      </tr>
      <tr>
        <td><em><strong>Date Of Birth: </strong></em></td>
		  <td><label>
		    <input type="date" name="textfield6" />
		  </label></td>
	</tr>
      <tr>
        <td><em><strong>Phone Number: </strong></em></td>
        <td><label>
          <input type="text" name="textfield4" />
        </label></td>
      </tr>
    </table>
    <label></label>
  </div>
  <p>
    <label>
    <div align="center">
      <input type="submit" name="Submit" value="Submit" />
    </div>
    </label>
  </p>
</form>
</body>
</html>
