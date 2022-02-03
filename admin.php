<?php

// PARTY REGISTRATION --------------------------------------
include 'connection.php';

if(isset($_POST['sub'])){
	$pn=$_POST['p_name'];
	$psn=$_POST['p_sh_name'];


	//code for image uploading
	if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
		$image = $_FILES['image']['name'];
		$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
		$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "img/";
		$uploadDirectory .= $image;
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
	}

	$i="insert into party(p_name,p_shortname,symbol)values('$pn','$psn','$image')";
		
        if(mysqli_query($con, $i)){
        ?>    
        <script type="text/javascript">
            alert('inserted successfully..!');
            window.location="p_list.php";
        </script>
        <?php
		// echo "inserted successfully..!";
	}
}


function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
  }


// ADMIN LOGIN PHP -------------------------------------
  
	session_start();
	include 'connection.php';
	
	if(isset($_REQUEST['lgn-btn']))
	{
		$unm=$_REQUEST['email'];
		$pass=$_REQUEST['password'];
		
		
	
		
		$lgn="select * from admin where email='$unm' AND password='$pass'";
		$res=$con->query($lgn);
		$result = mysqli_fetch_row($res);
		$chk=$res->num_rows;
		if($chk==1)
		{
			$_SESSION['email']=$unm;
			
			
			?>
			<script type="text/javascript">
				alert('Login Success');
				window.location="p_list.php";
			</script>
			<?php
		}
		
		else
		{
			?>
			<script type="text/javascript">
				alert('Please, Enter valid email and password');
				window.location="admin.php";
			</script>
			<?php
		}
		
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width, initial-scale=1.0">
	<link href='https://fonts.googleapis.com/css?family=Abhaya Libre' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="CSS/index.css">
	<link rel="stylesheet" href="CSS/styles.css">
	<link rel="stylesheet" href="CSS/scrollbtn.css">


	<title>ADMIN LOGIN</title>
</head>
<style>

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


<body style="background-color:whitesmoke;">

<table width="100%"  cellspacing="00" cellpadding="00">

<tr align="left">
    <th width="7%" scope="col"></th>
    <th width="32%" scope="col"><img src="bootstrap/img/images.png" alt="LOGO" width="100" height="58"/></th>
    <th width="51%" scope="col"><h1 style="font-family: 'Abhaya Libre';color:navy">E-VOTING SYSTEM</h1></th>
    <th width="20%" scope="col">
    
  </tr>
</table>


<div align="center" style="cursor: pointer;">


    <div id='cssmenu'>
	<ul align="left">

    <li><a onclick="document.getElementById('id02').style.display='block'" style="width:auto;"style="color:rgb(87, 22, 22)"  >☰ ADMIN LOGIN</a></li>
     

    <!--  -->
    <li><a href="index.php" >☰ HOME </a></li> 
	</ul>
</div>
<!-- 
<div class="box-1">
           <a onclick="document.getElementById('id02').style.display='block'" style="width:auto;"style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one btn-a">
                    <span >ADMIN LOGIN</span>
               </div>
          </a>
		  <a href="index.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one">
                    <span  style="font-size:18px" >HOME</span>
               </div>
          </a>
         
</div> -->
<br><br><br><br>

<img align="left" src="bootstrap\img\sec.jpg" style="width:300px;height:250px;margin-left:90px;">
<div style="font-family:'Courier New', Courier, monospace;">
<h1 style="font-family:'Abhaya Libre';font-size:45px;margin-right:80px;margin-left:470px;margin-top:5x">Shri Sanjay Prasad</h1>
<strong><p style="margin-left:470px;margin-right:90px;font-size: 20px;">[  State Election Commissioner ]</p></h2></strong>

<p style="margin-left:470px;margin-right:90px;font-size:20px;"> State Election Commission, Gujarat was constituted in September 1993 under Article 243K of the Constitution of India. State Election Commission has been entrusted with the function of conducting free, fair and impartial elections to the local bodies in the state.

<br><br>
Moreover, to satisfy high expectations of citizen should be one of the priorities of any public authority. SEC, Gujarat by utilizing the advanced Information Technology has launched its own Website to serve as an important link between Electoral Machinery and citizen by allowing an easy access to the information regarding provisions of Election Laws and Rules, Statistics of elections, electoral rolls etc.
SEC has operationalised this Website with broader perspective to disseminate information for the wider use. Any valuable suggestion would be welcome from the stake holders.
</p>
</div>
<br><br><br>
<script type="text/javascript" src="validation/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="validation/jquery.bvalidator.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
	$(function(event){
		$(document).ready(function () {
	        $('#myform').bValidator();
	        $("input[type=text]").val('');
	    });
		$('#myform').ready(function(){
			$("input[type=text]").val("");
			$("input[type=password]").val("");
		});
		
		$('#myform').submit(function(event){
			if($("input[type=text]").val() == "" || $("input[type=password]").val() == ""){
				alert("All fields are required !!!!!!!!!!!!");
				event.preventDefault();
			}
		});
	});
</script>

<script>
        // Get the modal
        var modal = document.getElementById('id02');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
<div>
	

	<div  id="id02" class="modal">

		<form class="modal-content animate" method="post">
			

			<div align="left"class="container">
				<h1 style="text-decoration: rgba(0, 0, 0, 0.4);">ADMIN LOGIN</h1>
				<i class="fa fa-user icon"></i>
				<input type="text" placeholder="Enter Email" name="email" required>
				
				<i class="fa fa-lock icon" style="width: 10%;"></i>
				<input type="password" placeholder="Enter Password" name="password" required>

				<button type="submit" name="lgn-btn">Login</button>
				<label>
			<input type="checkbox" checked="checked" name="remember"> Remember me </label>
			</div>
			<div class="container" style="background-color:#f0e2e2">
				<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
				
			</div>
		</form>
	</div>
</div>


</body>
</html>

