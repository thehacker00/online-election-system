<?php
error_reporting(0);
session_start();
include './connection.php';
if(!isset($_SESSION['user_id']))
	header('location:index.php');
	
    $user_id = $_SESSION['user_id'];
    
    $qry = mysqli_query($con,"SELECT v_name FROM voter WHERE user_id = '$user_id'");
    $row = mysqli_fetch_array($qry);
    
    $v_name = $row['v_name'];
           
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
          <a href="v_winner.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one">
                    <span>Winners </span>
               </div>
          </a>
</div>
<br><br>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

<hr align ="centre" style="width:70%;" noshade="5.5">
<form id="form1" name="form1" method="post" action="">
 
  <div class="container"  align="center">
    
    <table >
    <tr>
        <td width="107"><label> CITY :</label></td>
        <td width="174">

        <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $databaseName = "oes";

        $conn= mysqli_connect($hostname, $username, $password, $databaseName);
        $country_result = $conn->query('select * from city');
        ?>
        <div class="select">
        <select id="city_id" name="city_id">
        
        <option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Select city</option>
        <?php
        if ($country_result->num_rows > 0) {
        // output data of each row
        while($row = $country_result->fetch_assoc()) {
        ?>
        <option value="<?php echo $row["city_id"]; ?>"><?php echo $row["city_name"]; ?></option>
        <?php
        }
        }
        ?>
        </select>
        </br>
        </td>
        </tr>
        </div>
        <tr>
                <td width="107"><label> Seat name:</label></td>
                <td width="174">
        <div class="select">
        <select name="s_id" id="s_id">
        <option value=''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Seat Name</option>
        </select>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script>
        $('#city_id').on('change', function(){
        var city_id = this.value;
        $.ajax({
        type: "POST",
        url: "get_seat.php",
        data:'city_id='+city_id,
        success: function(result){
        $("#s_id").html(result);
        }
        });
        });
        </script>

        </div>
        </td>
        </tr>
     </table>
     <br>
     <button style="width: 30%; margin-left:25px;border-radius:15px;" type="submit" name="Submit" value="Submit">Submit</button><br>
</div>
</form>
<hr align ="centre" style="width:70%;" noshade="5.5">


<?php 
if(isset($_POST['Submit']))
{

$s_id =$_POST["s_id"];
$qry2 = mysqli_query($con,"SELECT s_name FROM seat WHERE s_id = '$s_id'");
$row1 = mysqli_fetch_array($qry2);
$s_name = $row1['s_name'];
    
$sql = "SELECT s.s_name, s.city_id, c.c_id, c.c_name, p.p_name, count(*) FROM vote v,seat s, candidate c, party p WHERE v.s_id = s.s_id and v.c_id = c.c_id and c.p_id = p.p_id AND s_name = '$s_name' GROUP BY s.s_name, s.city_id, c.c_id, c.c_name, p.p_name ORDER BY s.s_name, count(*) DESC LIMIT 0,1 ";  
 $result = mysqli_query($con, $sql);
?>


<div>
	    <table class="table table-dark table-hover" border="1" align="center"align="center" style="width:950px; line-height:40px;">
        <tr style="text-align: center;font-family: 'Playfair Display', serif;">
              <th colspan="6"><h2>Winner</h2></th>
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
            }
          ?>
  </table>

</div>



</div>
</body>
</html>
