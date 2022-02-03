<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "oes");



$q = "select * from party"; 
$res=mysqli_query($conn,$q);


?>


<!DOCTYPE html> 
<html> 
	<head> 
		<title> Party List  </title> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Slab&display=swap" rel="stylesheet">
<link href="'https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300';" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/p_list.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	</head> 
<script>$("table tr").hide();
$("table tr").each(function(index){
	$(this).delay(index*500).show(1000);
});



</script>


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
                <div class="btn btn-one">
    
                   <span>ADD SEAT </span>

                 </div>
           </a>
</div>



     <!-- <div style="background-color: rgb(153, 204, 255); border:3px solid rgba(11, 90, 238, 0.726); margin-left: 25%; alignment-adjust: central; width: 50%"> -->
     
     
     
     
     
     
     
     <p>&nbsp;</p>




     <div class="container" align="center">
<form method="post" action="c_doc_list.php">
  <div align="center">
     <table style="font-family: 'Josefin Slab', serif;" class="table table-dark table-hover" border="1" align="center">
        <th colspan="6"><h2 align="center">PARTY LIST</h2>
         </th>
      <tr>
    	<th> <div align="center">Party ID</div></th>
      	<th><div align="center">Party name</div></th>
	  	<th ><div align="center">Party short name </div></th>
      	<th width="20%" > <div align="center">symbol </div></th>
    	
  	  </tr>
</div>


  <?php 
   $counter = 0;
   while($rows=mysqli_fetch_assoc($res)) 
		{ 
		?>
  <tr>
   
    <td height="95"><div align="center"><?php echo $rows['p_id']; ?></div></td>
	<td><div align="center"><?php echo $rows['p_name']; ?></div></td>
    <td><div align="center"><?php echo $rows['p_shortname']; ?></div></td>
    <td><div align="center">
      <p><img  src="./bootstrap/img/<?php echo $rows['symbol']; ?>" width="25%" height="22%"></p>
      </div></td>
  </tr>
  <?php 
               } 
          ?>
    </table>
    <p>&nbsp;</p>

 
</body>
</html>