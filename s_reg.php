<?php
include 'connection.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Slab&display=swap" rel="stylesheet">
<link href="'https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300';" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="CSS/p_list.css">
<link rel="stylesheet" href="CSS/e_sch.css">

<title>Seat Registration</title>

</head>

  <?php
include './connection.php';
if(isset($_POST['Submit']))
{
  $c_name = $_POST['c_name'];
			
  $qry = mysqli_query($con,"SELECT city_id FROM city WHERE city_name = '$c_name'");
  $row = mysqli_fetch_array($qry);
        
  $c_id = $row['city_id'];

$sn = $_POST["textfield"];
$st =$_POST["textfield4"];
$lat =$_POST["textfield5"];
$lon =$_POST["textfield6"];

    

    $sql = "INSERT INTO seat (s_name, city_id, state, latitude, longitude) 
    VALUES ('$sn' , '$c_id', '$st', '$lat', '$lon')";

if (mysqli_query($con, $sql)) {?>
    <script>
    alert("Seat added successfully");
    </script>
    <?php
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($con);
?>


<body style="background-color:whitesmoke;">

<table width="100%"  cellspacing="00" cellpadding="00">
<tr >
    <th width="7%" scope="col"></th>
    <th width="32%" scope="col"><img src="bootstrap/img/images.png" alt="LOGO" width="100" height="58"/></th>
    <th width="51%" scope="col"><h1 style="font-family:  'Abhaya Libre';color:navy">E-VOTING SYSTEM</h1></th>
    <th width="20%" scope="col"><p style="font-family: 'Josefin Slab', serif; width:90%;color:navy" class="style2"><i class="fa fa-user icon"style="font-size: 15px;"></i>  WELCOME ADMIN</th></p>
  </tr>
</table> 

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
                <div class="btn btn-one";>
    
                   <span class="active">ADD SEAT </span>

                 </div>
           </a>
           
           <a href="p_list.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one">
                    <span >BACK</span>
               </div>
          </a>

</div>




<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
  <p>&nbsp;</p>
<!-- <div style="background-color: rgb(153, 204, 255); border:3px solid rgba(11, 90, 238, 0.726); margin-left: 0%; alignment-adjust: central; width: 50%; height:50%"> -->
  <div align="center">
    <table width="371" border="0">
      
      <tr>
        <td>Seat Name: </td>
        <td><input type="text" name="textfield" required /></td>
      </tr>
      
      <tr>
        <td> City: </td>
        <td>
          <div style="margin-left:12%" class="select">
          <select id="slct"  name="c_name" required>
    		<option disabled selected >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- Select City --  </option>
    	<?php
        include "connection.php";  
        $records1 = mysqli_query($con, "SELECT city_name From city");  

        while($data1 = mysqli_fetch_array($records1))
        {
          echo "<option value='". $data1['city_name'] ."'>" .$data1['city_name'] ."</option>"; 
        }	
    	?>  
 		 </select>
      </div></td>
      </tr>
      <tr>
        <td>State: </td>
        <td><input type="text" name="textfield4" required /></td>
      </tr>
      <tr>
        <td>Latitude: </td>
        <td><input type="text" name="textfield5"  required/></td>
      </tr>
      <tr>
        <td>Longitude: </td>
        <td><input type="text" name="textfield6" required /></td>
      </tr>
    </table>
  </div>
  <p>
    <label>
    <div align="center">
    <button style="width: 10%;" type="reset" name="reset" >Reset</button>
      <button style="background-color: navy;color:white;width:10%;" input type="submit" name="Submit" value="Submit">SUBMIT </button>
    </div>
    </label>
  </p>
</form>
</body>
</html>
