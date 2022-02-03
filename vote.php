<?php

session_start();
include './connection.php';
if(!isset($_SESSION['user_id']))
	header('location:index.php');
	
	
	
			$user_id = $_SESSION['user_id'];
			
			$qry = mysqli_query($con,"SELECT v_name, s_id FROM voter WHERE user_id = '$user_id'");
			$row = mysqli_fetch_array($qry);
			
			$v_name = $row['v_name'];
            $s_id = $row['s_id'];


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/p_list.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate List</title>
</head>
<body>
<body style="background-color: white;">
<table  width="100%" height="100%" align="center">
	
<tr >
    <th width="7%" scope="col"></th>
    <th width="32%" scope="col"><img src="bootstrap/img/images.png" alt="LOGO" width="100" height="58"/></th>
    <th width="51%" scope="col"><h1 style="font-family:  'Abhaya Libre';color:navy">E-VOTING SYSTEM</h1></th>
    <th width="20%" scope="col">
      <p style="font-family: 'Abhaya Libre'; width:90%; color:navy; font-size: 20px;" class="style2"><i class="fa fa-user icon"style="font-size: 20px;"></i>  Welcome <?php echo $row['v_name']; ?> </p></th>
      
  </tr>
</table>
<div class="box-1">
<a href="v_logout.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one">
                    <span ><i class="fa fa-sign-out" aria-hidden="true" style="font-size:25px" ></i></span>
               </div>
          </a>
          <a href="vc_list.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one  btn-a">
                    <span style="font-size:18px" >Candidates List</span>
               </div>
          </a>
          <a href="vote.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one">
                    <span  style="font-size:18px" >VOTE</span>
               </div>
          </a>
          <a href="v_result.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one btn-a">
                    <span > Election Result</span>
               </div>
          </a>
          <a href="voter_result.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one btn-a">
                    <span>Your Area Result </span>
               </div>
          </a>
          <a href="winner.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one">
                    <span>Winners </span>
               </div>
          </a>
</div>  

</div>

  <p align="center">&nbsp;</p>
  <div align="center">
  <?php 

 $sql = "SELECT c_id, c_name, p_name, p_shortname, s_id, p_symbol FROM candidate INNER JOIN party ON party.p_id = candidate.p_id where s_id = '$s_id' AND verify_status= 'Accepted' ";  
 $result = mysqli_query($con, $sql); 
?> 

</div>


    <div>
    <script src="jquery-3.1.1.min.js">
        </script>
        <script>
            var thisDay = new Date().getDate();
            var thisTime = new Date().getHours();

            function checkButton()
            {
                if ((thisTime >=9 && thisTime<=24) && (thisDay>=12 && thisDay<=15)) 
                {
                    $("#add").prop("disabled", true);
                }
                printAlert();

            }

            function printAlert() {
                window.alert('We are not accepting entries right now.');
                window.location='vc_list.php';
            }
    </script>
	    <table class="table table-dark table-hover" border="1" align="center"align="center" style="width:950px; line-height:40px;">
      <tr style="text-align: center;font-family: 'EB Garamond', serif;">
              <th colspan="6"><h2>Candidate Details</h2></th>
      </tr>
      <tr style="font-family: 'Playfair Display', serif;text-align:center">
	         
            <th style="width:700px">Candidate Name </th>
    	      <th style="width:900px">Party Name </th>
    	      <th style="width:560px">Party ShortName</th>
              <th style="width:500px">Party Symbol</th>
              <th style="width:500px">Seat Name</th>
              <th style="width:500px">Vote Here</th>
              
             

  	    </tr>

           <?php
   $counter = 0;
   while($rows=mysqli_fetch_assoc($result)) 
		{ 
            $s_id = $rows['s_id'];
            $qry1 = mysqli_query($con,"SELECT s_name FROM seat WHERE s_id = '$s_id'");
			$data1 = mysqli_fetch_array($qry1);
            $s_name = $data1['s_name'];
        
		?>
           <tr style="font-family: 'Josefin Slab', serif;">
      
      <td><div align="center"><?php echo $rows['c_name']; ?></div></td>
      <td><div align="center"><?php echo $rows['p_name']; ?></div></td>
      <td><div align="center"><?php echo $rows['p_shortname']; ?></div></td>
      <td><div align="center">
      <img  src="./bootstrap/img/<?php echo $rows['p_symbol']; ?>" width="100px" height="89px"></p>
      </div></td>
      <td><div align="center"><?php echo $data1['s_name']; ?></div></td>
      <td > <a align ="center"href="votes.php?c_id=<?php echo $rows['c_id'];?>&s_id=<?php echo $rows['s_id'];?>&c_name=<?php echo $rows['c_name'];?>"
      <button align ="center"class="btn btn-success"  style="font-size:18px; margin-left: 9%; line-height: 35px;color:navy"><strong>VOTE</a>
      </button>
    
      </tr>
           <?php 
               } 
          ?>
  </table>


</div>
</body>
</html>