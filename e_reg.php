<?php
include 'connection.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- <html xmlns="http://www.w3.org/1999/xhtml"> -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="CSS/p_list.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->




<link rel="stylesheet" href="CSS/e_sch.css">

<title>  ADD Election </title>

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

<p>
  <?php

$conn = mysqli_connect("localhost", "root", "", "oes");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['Submit']))
{


$en = $_POST["textfield2"];


    $sql = "INSERT INTO election (e_name) VALUES ('$en')";

if (mysqli_query($conn, $sql)) {?>
<script>
    alert("Added successfully");
    window.location="p_list.php";
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
<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
  <p>&nbsp;</p>
<div style="background-color:rgb(250, 232, 232) ;border-radius :20px; margin-left: 35%;  width: 37%; height:70%">
  <div align="center">
    <table width="371" border="0">


    
      <br>
      <tr>
        <td> ELECTION NAME :</td>
        <td><input type="text" name="textfield2" required/></td>
      </tr>

    </table>
  </div>
  <p>
    <label>
    <div align="right">
   
      <button style="background-color: white;color:black;width:30%;margin-right:20px" input type="submit" name="Submit" value="Add"> ADD  </button>
    </div>
    </label>
  </p>
</form>
</body>
</html>
