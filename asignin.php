<?php
	session_start();
	include 'connection.php';
	
	if(isset($_REQUEST['login-btn']))
	{
		$unm=$_REQUEST['unm'];
		$pass=$_REQUEST['pass'];
		
		
	
		
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
				window.location="aindex.php";
			</script>
			<?php
		}
		
		else
		{
			?>
			<script type="text/javascript">
				alert('Please, Enter valid email and password');
				window.location="asignin.php";
			</script>
			<?php
		}
		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
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
#robot{
    font-family: 'Bebas Neue', cursive;
    
  }
  .topnav {
  overflow: hidden;
  background-color: rgb(13, 129, 224);
  font-family: 'Roboto Condensed', sans-serif;
}

.topnav a {
  float: left;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-style: italic;
}

    </style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body style="background-color:powderblue;">
<table width="100%" border="0"cellspacing="00" cellpadding="00">
    <tr bgcolor="rgb(13, 129, 224)">
    <th width="13%" scope="col">&nbsp;</th>
    <th width="62%" scope="col"><font id="robot" size="8" color="White"> ONLINE DISCUSSION FORUM</th>
	<th width="13%" scope="col"><font size="5" color="White"></th>
</table>
	<div align="center">
    <div class="topnav">
    <a href=#>ADMIN LOGIN</a>
<form id="myform" action="" method="POST">
</div>

<p>&nbsp;</p>
 <p>&nbsp;</p>
<div style="background-color: rgb(153, 204, 255); border:3px solid rgba(11, 90, 238, 0.726); margin-left: 00%; alignment-adjust: central; width: 30%">
    <p>&nbsp;</p>
    <table border="0" align="left">
		<tr>
			<td width="419"><em><strong>Email</strong></em></td>
	      <td width="299"><input type="text"  name="unm" placeholder="enter email"></td>
		</tr>
		<tr>
			<td><em><strong>Password</strong></em></td>
			<td><input type="password" name="pass" placeholder="enter password"></td>
		</tr>
		<tr>
			<td><a href="welcome.php" style="cursor:pointer;"></a></td>
		  <td>
		    <div align="left">
		    <input type="reset" name="reset" value="Reset">
		    &nbsp;
			<input type="submit" name="login-btn" value="Login" />
		    </div>

		</tr>
  </table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
