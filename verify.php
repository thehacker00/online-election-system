<?php

$conn = mysqli_connect("localhost", "root", "", "oes");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['Submit']))
{
$c_id = $_GET['c_id'];
$rb =$_POST["radiobtn"];


    $sql = "UPDATE candidate SET verify_status ='$rb' WHERE c_id= '$c_id'";

if (mysqli_query($conn, $sql)) 
{
?>
<script>
 alert("Status updated successfully");
 window.location="can_detail.php";
 </script>
 <?php
} 
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

?>

<html>

<body style="background-color:whitesmoke;">
<head>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Slab&display=swap" rel="stylesheet">
<link rel="stylesheet" href="CSS/p_list.css">
<link rel="stylesheet" href="CSS/index.css">

</head>
<style>
/* The container */

.containerrrr {
    display: block;
    position: relative;
    padding-left: 15px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 17px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}


/* Hide the browser's default radio button */

.containerrrr input {
    position: static;
    opacity: 0;
    cursor: pointer;
    margin-left: 5%;
}


/* Create a custom radio button */

.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #eee;
    border-radius: 50%;
}


/* On mouse-over, add a grey background color */

.containerrrr:hover input~.checkmark {
    background-color: #ccc;
}


/* When the radio button is checked, add a blue background */

.containerrrr input:checked~.checkmark {
    background-color: #2196F3;
}


/* Create the indicator (the dot/circle - hidden when not checked) */

.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}


/* Show the indicator (dot/circle) when checked */

.containerrrr input:checked~.checkmark:after {
    display: block;
}


/* Style the indicator (dot/circle) */

.containerrrr .checkmark:after {
    top: 6px;
    left: 6px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
}

</style>


<table width="100%"  cellspacing="00" cellpadding="00">
<tr>
    <th width="7%" scope="col"></th>
    <th width="32%" scope="col"><img src="bootstrap/img/images.png" alt="LOGO" width="100" height="58"/></th>
    
    <th width="50%" scope="col"><h1 style="font-family:  'Abhaya Libre';color:navy">E-VOTING SYSTEM</h1></th>
    <th width="20%" scope="col"><p style="font-family: 'Josefin Slab', serif; width:90%;color:navy" class="style2"><i class="fa fa-user icon"style="font-size: 15px;"></i>  WELCOME ADMIN</th></p>
  </tr>
  
</table> 

<!-- <div class="box-1">
           <a href="can_detail.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one">
                    <span >BACK</span>
               </div>
          </a>
          <a href="p_list.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one">
                    <span>HOME</span>
               </div>
          </a>
</div> -->

<div style="background-color:rgb(199, 202, 202) ;border-radius :20px; margin-left: 35%;  width: 37%; height:70%">
  <br><br><div align="center"> <h2 style="font-family: 'Josefin Slab';color:navy">Verification Status: </h2>
  <br><br>
    <table width="371" border="0">
    <form name="form1" method="post" action="">
      <tr>
      <td><label  class="containerrrr">&nbsp;&nbsp;&nbsp;&nbsp;ACCEPTED
							<input name="radiobtn" type="radio" value="Accepted" required/>
  							<span class="checkmark"></span>
							</label>
      </td>
      <td>
							<label  class="containerrrr">&nbsp;&nbsp;&nbsp;&nbsp; REJECTED
							<input name="radiobtn" type="radio" value="Rejected" required />
  							<span class="checkmark"></span>
							</label></td>
        
      </tr>
      <tr>
      <td align="center"><br>
      <a href="can_detail.php" style="font-family:'Abhaya Libre';color:white;padding-left:0px;"><button>Back</a></button>
      </td>
      <td align="left"><br>
      <button input type="submit" name="Submit" value="Submit"> SUBMIT </button>
      </td>
      </tr>
    </form>
    </table>

    
  </div>

</html>