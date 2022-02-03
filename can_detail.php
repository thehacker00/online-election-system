
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>



<link rel="stylesheet" href="CSS/p_list.css">


</head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
 <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Slab&display=swap" rel="stylesheet">




<title>Candidate Details </title>



</head>

<!-- ..................... -->
<?php
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "oes");
	if(!isset($_SESSION['email']))
	header('location:index.php');

?>

<body>



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

  <p align="center">&nbsp;</p>
  <div align="center">
  <?php 

 $sql = "SELECT c_id, c_name, p_name, p_shortname, reg_date, verify_status FROM candidate INNER JOIN party ON party.p_id = candidate.p_id ORDER BY (CASE verify_status
 WHEN 'Pending' 	 THEN 1
 WHEN 'Accepted' 	 THEN 2
 WHEN 'Rejected'	 THEN 3
 WHEN 'Withdrawed'	 THEN 4
 ELSE 100 END) ASC";  
 $result = mysqli_query($conn, $sql); 
?> 

</div>
	<div>
	
    <!-- <button><a onclick="document.getElementById('id07').style.display='block'" style="width:auto;">verify</a></button> -->
<div>
	    <table class="table table-dark table-hover" border="1" align="center"align="center" style="width:950px; line-height:40px;">
      <tr style="text-align: center;font-family: 'EB Garamond', serif;">
              <th colspan="6"><h2>Candidate Details</h2></th>
      </tr>
      <tr style="font-family: 'Playfair Display', serif;text-align:center">
	         <th style="width:10px"> Candidate ID </th>
            <th style="width:700px">Candidate Name </th>
    	      <th style="width:900px"> Party Name </th>
    	      <th style="width:500px">Party shortName</th>
    	      <th width="150"> Registration Date </th>	
    	      <th width="150"> Verification Status </th>	

  	    </tr>
           <?php
   $counter = 0;
   while($rows=mysqli_fetch_assoc($result)) 
		{ 
		?>
           <tr style="font-family: 'Josefin Slab', serif;">
             <td><div align="center"><?php echo $rows['c_id'] ?></div></td>
      <td><div align="center"><?php echo $rows['c_name']; ?></div></td>
      <td><div align="center"><?php echo $rows['p_name']; ?></div></td>
      <td><div align="center"><?php echo $rows['p_shortname']; ?></div></td>
      <td><div align="center"><?php echo $rows['reg_date']; ?></div></td>
      <td><div align="center"><?php echo $rows['verify_status']; ?></div></td>
	  
	 <?php 
echo "<Td><a href='c_doc_list.php?c_id=".$rows['c_id']."' style='color:orange;font-size:17px'>Show Documents</a></td>";
 echo "<Td><a  href='verify.php?c_id=".$rows['c_id']."' style='color:orange;font-size:17px''>Verify Status</a></td>";
?>

           </tr>
           <?php 
               } 
          ?>
  </table>


</div>


</body>
</html>
