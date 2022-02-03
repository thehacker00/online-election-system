<?php
include 'connection.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/p_list.css">
<link rel="stylesheet" href="CSS/e_sch.css">

<title>Election Schedule</title>

</head>

<body style="background-color:whitesmoke;">

<table width="100%"  cellspacing="00" cellpadding="00">
<tr >
    <th width="7%" scope="col"></th>
    <th width="32%" scope="col"><img src="bootstrap/img/images.png" alt="LOGO" width="100" height="58"/></th>
    <th width="51%" scope="col"><h1 style="font-family:  'Abhaya Libre';color:navy">E-VOTING SYSTEM</h1></th>
    <th width="20%" scope="col"><p style="font-family: 'Josefin Slab', serif; width:90%;color:navy" class="style2"><i class="fa fa-user icon"style="font-size: 15px;"></i>  WELCOME ADMIN</th></p>
  </tr>
</table> 


<script>
// -----------------------------------------------
        // Get the modal
        var modal = document.getElementById('id00');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

<p>
<?php

$conn = mysqli_connect("localhost", "root", "", "oes");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['Submit']))
{
    $e_name =$_POST["e_name"];
	$qry = mysqli_query($con,"SELECT e_id FROM election WHERE e_name = '$e_name'");
	$row = mysqli_fetch_array($qry);
	$e_id = $row['e_id'];

  $s_name =$_POST["s_name"];
   $qry1 = mysqli_query($con,"SELECT s_id FROM seat WHERE s_name = '$s_name'");
	 $rows = mysqli_fetch_array($qry1);
	 $s_id = $rows['s_id'];

$vd = $_POST["textfield"];
$st =$_POST["textfield2"];
$et =$_POST["textfield3"];
$rsd =$_POST["textfield4"];
$red =$_POST["textfield5"];
$wd =$_POST["textfield6"];

    

    $sql = "INSERT INTO election_schedule (e_id, s_id, voting_date, start_time, end_time, reg_start_date, reg_end_date, withdraw_date) 
    VALUES ('$e_id', '$s_id', '$vd' , '$st' , '$et', '$rsd', '$red', '$wd')";

if (mysqli_query($conn, $sql)) {?>
    <script>
    alert("Election Scheduled successfully");
    </script>
    <?php
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
?>
</p>
<div class="box-1">
           <a href="a_logout.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one">
                    <span ><i class="fa fa-sign-out" aria-hidden="true" style="font-size:30px" ></i></span>
               </div>
          </a>
           <a href="p_list.php">
               <div class="btn btn-one"  >
               
               <span>Party Details</span> 
     
               </div>
           </a>
           <a href="e_reg.php">
               <div class="btn btn-one">
    
               <span>Elections</span>
               </div> 
           </a>
           <a href="e_sch.php">
               <div class="btn btn-one btn-a">
    
              <span>Election Schedule</span>

              </div>
           </a>
           <a href="can_detail.php">
                <div class="btn btn-one">
    
                  <span>Verification</span>
                </div>
           </a>
           <a href="a_result.php">
                <div class="btn btn-one">
    
                   <span>Results</span>

                 </div>
           </a>
           <a href="s_reg.php">
                <div class="btn btn-one">
    
                   <span>ADD SEAT </span>

                 </div>
           </a>
           
           <a href="p_list.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one">
                    <span >BACK</span>
               </div>
          </a>

</div>
<br>
<br>
<button style="width: 25%; margin-left:37%" a onclick="document.getElementById('id00').style.display='block'" style="width:auto;">Election Schedule</button></a>



<div id="id00" class="modal"style="font-family: 'Abhaya Libre';">

		<form class="modal-content animate" method="post">
    <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
 
  <div  class="container" align="center">
    
    <h1 style="font-family: 'Abhaya Libre';" > Election Schedule </h1>
    <table >
     <tr>
        <td>Election Name: </td>
        <td>
        <div style="margin-left:12%"  align="center" class="select" >  
        <select id="slct" name="e_name" required>
    		<option  disabled selected require>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -- Select Election --</option>
    	<?php
        include "connection.php";  
        $records = mysqli_query($con, "SELECT e_name From election");  

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['e_name'] ."'>" .$data['e_name'] ."</option>"; 
        }	
    	?>  
 		 </select>
        </div>
        </td>
     </tr>
     <tr>
        <td> Seats: </td>
        <td>
          <div style="margin-left:12%" class="select">
          <select id="slct"  name="s_name" required>
    		<option disabled selected >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- Select Seat --  </option>
    	<?php
        include "connection.php";  
        $records1 = mysqli_query($con, "SELECT s_name From seat");  

        while($data1 = mysqli_fetch_array($records1))
        {
          echo "<option value='". $data1['s_name'] ."'>" .$data1['s_name'] ."</option>"; 
        }	
    	?>  
 		 </select>
      </div></td>
      </tr>
      
      <tr>
        <td>Voting Date :</td>
        <td><input type="date" name="textfield" required/></td>
      </tr>
      <tr>
        <td>Start time:</td>
        <td><input type="time" name="textfield2" required/></td>
      </tr>
      <tr>
        <td>End time:</td>
        <td><input type="time" name="textfield3"required /></td>
      </tr>
      <tr>
        <td>Registration Start Date:</td>
        <td><input type="date" name="textfield4"required /></td>
      </tr>
      <tr>
        <td>Registration End Date:</td>
        <td><input type="date" name="textfield5" required/></td>
      </tr>
      <tr>
        <td>Withdraw Date: </td>
        <td><input type="date" name="textfield6" required/></td>
      </tr>
    </table>
 
    <button style="width: 40%;" type="reset" name="reset" >Reset</button>
    <button style="width: 40%;" type="submit" name="Submit" value="Submit">Submit</button><br>
	  <button type="button" onclick="document.getElementById('id00').style.display='none'" class="cancelbtn">Cancel</button>

    </div>
    

</form>
    </form>
    </div>
</body>
</html>