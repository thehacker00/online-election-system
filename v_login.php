<?php
	session_start();
	include 'connection.php';
	
	if(isset($_REQUEST['login-btn']))
	{
		$unm=$_REQUEST['unm'];
		$pass=$_REQUEST['pass'];


		$lgn="select * from voter where user_id='$unm' AND password='$pass'";
		$res=$con->query($lgn);
		$result = mysqli_fetch_row($res);
		$chk=$res->num_rows;
		if($chk==1)
		{
			$_SESSION['user_id']=$unm;
			
			
			?>
			<script type="text/javascript">
				alert('Login Success');
				window.location="c_login.php";
			</script>
			<?php
		}
		
		else
		{
			?>
			<script type="text/javascript">
				alert('Please, Enter valid UserID and password');
				window.location="c_login.php";
			</script>
			<?php
		}
		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
<title>Candidate LOGIN</title>
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
	<!-- <link rel="stylesheet" type="text/css" href="validation/bvalidator.css"> -->

<style type="text/css">
body {margin:0;}
	

.topnav{
overflow: hidden;
background-color: rgb(255, 98, 98);
font-family: 'Roboto Condensed', sans-serif;

}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  border-bottom: 3px solid transparent;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
  transition: 0.5s;

}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}


input[type=text],
input[type=reset],
input[type=submit],
input[type=password] {
    width: 90%;
    height: 40%;
    padding: 12px;
    margin: 10px 0;
	margin-left: 12px;
    display: inline-block;
    border: 1px solid rgb(255, 249, 249);
    border-radius: 10px;
    box-sizing: border-box;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
}

input[type=text]:focus,
input[type=reset]:focus,
input[type=submit]:focus,
input[type=password]:focus {
    border: 1px solid rgba(81, 203, 238, 1);
    box-shadow: 0 0 5px rgba(81, 203, 238, 1);
    /* margin: 5px 1px 3px 0px;
            padding: 3px 0px 3px 3px; */
}

.container {
    padding: 20px;
    margin: 30px;
    border-radius: 5%;
}

.modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(192, 24, 24);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
    padding-top: 60px;
}
.modal-content {
    background-color: #ffeaea;
    margin: 0% auto 15% auto;
    ;
    /* 5% from the top, 15% from the bottom and centered */
    /* border: 1px solid #888; */
    width: 35%;
    height: 50%;
    border-radius: 10%;
    /* Could be more or less, depending on screen size */
}

.modal-cont {
    background-color: #ffeaea;
    margin: 0% auto 15% auto;
    ;
    /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 40%;
    height: 86%;
    border-radius: 5%;
    /* Could be more or less, depending on screen size */
}

button {
    background-color: whitesmoke;
    color: black;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    /* width: 100%; */
    border-radius: 15px;
}

button:hover {
	background-color: black;
	color: white;
	opacity: 0.5;
	transition: 0.3s;
}


/* The Close Button (x) */

.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 30px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
    transition: 0.4s;
}


/* Add Zoom Animation */

.animate {
    -webkit-animation: animatezoom 0.7s;
    animation: animatezoom 0.7s
}

@-webkit-keyframes animatezoom {
    from {
        -webkit-transform: scale(0)
    }
    to {
        -webkit-transform: scale(1)
    }
}

@keyframes animatezoom {
    from {
        transform: scale(0)
    }
    to {
        transform: scale(1)
    }
}


/* Change styles for span and cancel button on extra small screens */

@media screen and (max-width: 300px) {
    span.psw {
        display: block;
        float: none;
    }
    .cancelbtn {
        width: 100%;
    }
}

.error {
    color: #FF0000;
}



</style>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Voter Login</title>
</head>

<body style="background-color:white;">

<!-- 
<table width="100%" border="0"cellspacing="00" cellpadding="00">
    <tr bgcolor="rgb(13, 129, 224)">
    <th width="13%" scope="col">&nbsp;</th>
    <th width="62%" scope="col"><font id="robot" size="8" color="White"> ONLINE ELECTION SYSTEM</th>
	<th width="13%" scope="col"><font size="5" color="White"></th>
	</table>
 -->

<div align="center">
    <div class="topnav">
    <!-- <a  href="http://localhost/oes/c_login.php">Candidate LOGIN</a> -->
    <a href="http://localhost/oes/c_reg.php">Candidate Registration</a>
    
    <a onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Candidate Login</a>
    
</div>


<p>&nbsp;</p>

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


	<!--                      Voter Login                           -->

	<div id="id02" class="modal">

		<form class="modal-content animate" method="post">
			

<form class="modal-content" id="myform" action="" method="POST">
 
 <div class="container">
	 <h1>VOTER Login</h1>
    <table >
		<tr>
		
			<td width=""><strong>UserID</strong></td>
	      <td width=""><input type="text"  name="unm" placeholder="Enter UserID" required></td>
		</tr>
		<tr>
			<td><strong>Password </strong></td>
			<td><input type="password" name="pass" placeholder="Enter password" required></td>
		</tr>
			
		<tr>
		  <td><div align="right"></div></td>
		  
	  </tr>
  </table>

  
<button type="reset" name="reset" >Reset</button>
<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn" style="background-color: red;" >Cancel</button>
<button type="submit" name="login-btn" >Login</button>
<h4>Haven't registered yet... <a href="c_reg.php">Register here</a></h4>


</form>

</div>

</body>
</html>
