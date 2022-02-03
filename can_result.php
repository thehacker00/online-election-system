<?php
session_start();
include './connection.php';
if(!isset($_SESSION['email']))
	header('location:index.php');
	
	
	
			$email = $_SESSION['email'];
			
			$qry = mysqli_query($con,"SELECT c_name, c_id, s_id FROM candidate WHERE email = '$email'");
			$row = mysqli_fetch_array($qry);
			
			$c_name = $row['c_name'];
            $c_id = $row['c_id'];
            $s_id = $row['s_id'];

            $qry3 = mysqli_query($con,"SELECT s_name FROM seat WHERE s_id = '$s_id'");
			$row3 = mysqli_fetch_array($qry3);

            $s_name= $row3['s_name'];
           
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Slab&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="CSS/p_list.css">
    <link rel="stylesheet" href="CSS/index.css">
	<!-- navbar -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- table -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<title>Results </title>
</head>

<body style="background-color:whitesmoke;">
<style>
select {
    -webkit-appearance: none;
    -moz-appearance: none;
    -ms-appearance: none;
    appearance: none;
    outline: 0;
    box-shadow: none;
    border: 0 !important;
    /* background: #whitesmoke;
    background-image: none; */
}


/* Remove IE arrow */

select::-ms-expand {
    display: none;
}


/* Custom Select */

.select {
    content: '\25BC';
    position: relative;
    display: flex;
    width: 195px;
    height: 39px;
    line-height: 1;
    background: #ffffff;
    overflow: hidden;
    border-radius: .7em;
}




</style>

<table width="100%"  cellspacing="00" cellpadding="00">

<tr align="left">
    <th width="7%" scope="col"></th>
    <th width="32%" scope="col"><img src="bootstrap/img/images.png" alt="LOGO" width="100" height="58"/></th>
    <th width="51%" scope="col"><h1 style="font-family: 'Abhaya Libre';color:navy">E-VOTING SYSTEM</h1></th>
    <th width="20%" scope="col">
    <p style="font-family: 'Abhaya Libre'; width:90%; color:navy; font-size: 20px;" class="style2"><i class="fa fa-user icon"style="font-size: 20px;"></i>  Welcome <?php echo $row['c_name']; ?> </p></th>  
  </tr>
</table>

<div class="box-1">
           <a href="c_logout.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one">
                    <span ><i class="fa fa-sign-out" aria-hidden="true" style="font-size:30px" ></i></span>
               </div>
          </a>
          <a href="can_docs.php" style="color:rgb(87, 22, 22);font-size:15px;">  
                <div class="btn btn-one btn-a">
                    <span > Documents Upload </span>
               </div>
          </a>
          <a href="withdraw.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one btn-a">
                    <span > Withdraw Form</span>
               </div>
          </a>
          <a href="resultstat.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one btn-a">
                    <span > Election Result</span>
               </div>
          </a>
          <a href="can_result.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one">
                    <span>Your Result </span>
               </div>
          </a>
          <a href="winner.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one">
                    <span>Winners </span>
               </div>
          </a>
</div>
<br><br>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

<hr align ="centre" style="width:70%;" noshade="5.5">
<br>


<?php 

    $sql = "SELECT s.s_name, s.city_id, c.c_id, c.c_name, p.p_name, count(*) FROM vote v,seat s, candidate c, party p WHERE v.s_id = s.s_id and v.c_id = c.c_id and c.p_id = p.p_id AND s_name = '$s_name' GROUP BY s.s_name, s.city_id, c.c_id, c.c_name, p.p_name ORDER BY s.s_name, count(*) DESC ";  
 $result = mysqli_query($con, $sql);
?>


<div>
	    <table class="table table-dark table-hover" border="1" align="center"align="center" style="width:950px; line-height:40px;">
        <tr style="text-align: center;font-family: 'Playfair Display', serif;">
              <th colspan="6"><h2>Your Seat RESULT</h2></th>
      </tr>
      <tr style="font-family: 'Playfair Display', serif;text-align:center">
	         
    	      
              <th style="width:700px">Candidate ID</th>
              <th style="width:900px"> City Name </th>
            <th style="width:700px">Seat Name  </th>

              <th style="width:700px">Candidate Name</th>
              <th style="width:900px">Party Name</th>
              <th style="width:700px">VOTE </th>
              
             

  	    </tr>


<?php
   while($rows=mysqli_fetch_assoc($result)) 
		{ 


            $c_id = $rows['city_id'];
            $qry1 = mysqli_query($con,"SELECT city_name FROM city WHERE city_id = '$c_id'");
			$data1 = mysqli_fetch_array($qry1);
            $city_name = $data1['city_name'];
        
?>
<tr style="font-family: 'Josefin Slab', serif;">
      
      <td><div align="center"><?php echo $rows['c_id']; ?></div></td>
      <td><div align="center"><?php echo $data1['city_name']; ?></div></td>
      <td><div align="center"><?php echo $rows['s_name']; ?></div></td>

      <td><div align="center"><?php echo $rows['c_name']; ?></div></td>
      <td><div align="center"><?php echo $rows['p_name']; ?></div></td>
      <td><div align="center"><?php echo $rows['count(*)']; ?></div></td>
      
            

           </tr>
           <?php 
               } 
            
          ?>
  </table>
  <br>
  <hr align ="centre" style="width:70%;" noshade="5.5">

</div>



</div>
</body>
</html>