<?php
include 'connection.php';
error_reporting(0);

?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>CANDIDATE REGISTRATION</title>

    </head>

    

<?php

$conn = mysqli_connect("localhost", "root", "", "oes");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['Submit']))
{
    if ($_POST['password'] !== $_POST['cnf_pass']) {?>
        <script>
        alert('password and confirm password should not match!');   
        </script>
        <?php
    }


    $p_name =$_POST["p_name"];
    $qry = mysqli_query($con,"SELECT p_id FROM party WHERE p_name = '$p_name'");
    $row = mysqli_fetch_array($qry);
    $p_id = $row['p_id'];
$cn = $_POST["textfield2"];
$e =$_POST["textfield3"];
$p =$_POST["password"];
$an =$_POST["textfield5"];
$pid =$_POST["textfield6"];

    if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
        $image = $_FILES['image']['name'];
        $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
        $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
        $uploadDirectory .= $image;
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
    }

    $sql = "INSERT INTO candidate (c_name, email, password, aadhar_no, p_id, symbol, reg_date, verify_status)
    VALUES ('$cn', '$e', '$p' , '$an' , '$pid', '$image', now(), 'Pending')";

if (mysqli_query($conn, $sql)) {
    ?>
    <script type="text/javascript">
            alert('Registered successfully..!');
            window.location="p_list.php";
    </script>
    <?php
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
?>


<style>

input[type=text],
input[type=file],
input[type=longint],
input[type=password] {
    width: 100%;
    height: 30%;
    padding: 12px ;
    margin: 8px 0;
    margin-left: 10%;
    display: inline-block;
    border: 1px solid rgb(255, 249, 249);
    border-radius: 10px;
    box-sizing: border-box;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
    
}

input[type=text]:focus,
input[type=file]:focus,
input[type=longint]:focus,
input[type=password]:focus {
    border: 1px solid rgba(81, 203, 238, 1);
    box-shadow: 0 0 5px rgba(81, 203, 238, 1);
    /* margin: 5px 1px 3px 0px;
            padding: 3px 0px 3px 3px; */
}


.container {
    padding: 8px;
    margin: 5px;
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
    width: 40%;
    height: 20%;
    border-radius: 10%;
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


/* drop down content */


.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}


</style>

<body style="background-color: rgb(253, 169, 169);">

            <form  class="modal-content" id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
                <p>&nbsp;</p>
                <div >
                    <div  class="container " style="margin-left: 10%;">
                    <h1 style="text-decoration: rgba(0, 0, 0, 0.4);margin-left: 10%; font-family: 'Abhaya Libre';">Candidate Registration </h1>
                        <table style="text-align:center" width="371" border="0">
                            
                            <tr>
                                <td><strong>Candidate Name </strong></td>
                                <td><input type="text" name="textfield2" required ></td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td><input type="text" name="textfield3" required></td>
                            </tr>
                            <tr>
                                <td><strong>Password</strong></td>
                                <td><input type="password" name="password" required></td>
                            </tr>
                            <tr>
                                <td><strong>Confirm Password</strong></td>
                                <td><input type="password" name="cnf_pass" required></td>
                            </tr>
                            <tr>
                                <td><strong>Aadhar Number</strong></td>
                                <td><input type="longint" name="textfield5" required></td>
                            </tr>
                            <tr>
                                <td><strong>Party Name: </strong></td>
                                <td><label>
                                    <select name="p_name">

                                    
                                    
                                        <option disabled selected>-- Select Party --</option>
                                    <?php
                                    include "connection.php";  
                                    $records = mysqli_query($con, "SELECT p_name From party");  

                                    while($data = mysqli_fetch_array($records))
                                    {
                                        echo "<option value='". $data['p_name'] ."'>" .$data['p_name'] ."</option>"; 
                                    }	
                                    ?>  
                                </select>

                                </label></td>
                                
                            </tr>
                            <!-- <table class="container" > -->
                                <tr>
                                <td><strong>Image</strong></td>
                                <td> <input type="file" name="image" required> </td>
                            </tr>
                            <!-- </table> -->
                            </table>
                                </div>    
                                </div>
                               
                        <label>
    <!-- <input style="margin-left:40%" type="submit" name="Submit" value="Submit" /> -->
    
    <button style="margin-left:40%" type="submit" name="Submit" >SUBMIT</button>
    <h4 style="text-align: center;" >Already Registered ?.. <a href="c_login.php">LOGIN here</a></h4>
    </label>
        <br>
            </form>
            <p>&nbsp; </p>
    
    
        </body>

    </html>