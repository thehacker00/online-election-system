<?php
    session_start();
    include 'connection.php';
    error_reporting(0);
    if(isset($_REQUEST['login-btn']))
    {
        $email=$_REQUEST['email'];
        $pass=$_REQUEST['pass'];


        $lgn="select * from candidate where email='$email' AND password='$pass'";
        $res=$con->query($lgn);
        $result = mysqli_fetch_row($res);
        $chk=$res->num_rows;
        if($chk==1)
        {
            $_SESSION['email']=$email;
            
            
            ?>
            <script type="text/javascript">
                alert('Login Success');
                window.location="can_docs.php";
            </script>
            <?php
        }
        
        else
        {
            ?>
            <script type="text/javascript">
                alert('Please, Enter valid email and password');
                window.location="index.php";
            </script>
            <?php
        }
        
    }
?>

<!-- voter login -->

<?php
    // session_start();
    include 'connection.php';
    
    if(isset($_REQUEST['login']))
    {
        $user_id=$_REQUEST['unm'];
        $pass=$_REQUEST['pass'];


        $lgn="select * from voter where user_id='$user_id' AND password='$pass'";
        $res=$con->query($lgn);
        $result = mysqli_fetch_row($res);
        $chk=$res->num_rows;
        if($chk==1)
        {
            $_SESSION['user_id']=$user_id;
            
            
            ?>
            <script type="text/javascript">
                alert('Login Success');
                window.location="vc_list.php";
            </script>
            <?php
        }
        
        else
        {
            ?>
            <script type="text/javascript">
                alert('Please, Enter valid UserID and password');
                window.location="index.php";
            </script>
            <?php
        }
    
    }
?>

<!-- VOTER REG -->

<?php

$conn = mysqli_connect("localhost", "root", "", "oes");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['Submit']))
{
    if ($_POST['password'] !== $_POST['cnf_pass']) {?>
        <script>
        alert('password and confirm password does not match!');
        window.location = "index.php";   
        </script>
        <?php
    }
    else{

$seat_id= $_POST["seat_id"];
$g_id= uniqid('IND-');
$vn = $_POST["textfield2"];
$e =$_POST["textfield3"];
$u_id =$_POST["textfield"];
$p =$_POST["password"];
$rb =$_POST["radiobtn"];
$dob =$_POST["textfield6"];
$ph_no =$_POST["textfield4"];


    $sql = "INSERT INTO voter (generic_id, v_name, email, user_id, password, s_id, dob, gender, ph_no)
    VALUES ('$g_id', '$vn', '$e' , '$u_id' , '$p', '$seat_id', '$dob', '$rb','$ph_no')";

if (mysqli_query($conn, $sql)) 
{
?>
<script>
 alert("Registered successfully");
 </script>
 <?php
} 
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}
mysqli_close($conn);
?>




<!-- CAn REg -->
<?php

$conn = mysqli_connect("localhost", "root", "", "oes");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit']))
{
    if ($_POST['password'] !== $_POST['cnf_pass']) {?>
        <script>
        alert('password and confirm password does not match!');
        window.location = "index.php";   
        </script>
        <?php
    }
    else {

        $p_name =$_POST["p_name"];
        $qry = mysqli_query($con,"SELECT p_id FROM party WHERE p_name = '$p_name'");
        $row = mysqli_fetch_array($qry);
    
        $p_id = $row['p_id'];
    $cn = $_POST["textfield2"];
    $e =$_POST["textfield3"];
    $p =$_POST["password"];
    $an =$_POST["textfield5"];
    $s_id= $_POST["s_id"];
    
        if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
            $image = $_FILES['image']['name'];
            $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
            $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
            $uploadDirectory .= $image;
            move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
        }
    
        $sql = "INSERT INTO candidate (c_name, email, password, aadhar_no, p_id, s_id, p_symbol, reg_date, verify_status)
        VALUES ('$cn', '$e', '$p' , '$an' , '$p_id', '$s_id','$image', now(), 'Pending')";
    

if (mysqli_query($conn, $sql)) {
    ?>
    <script type="text/javascript">
            alert('Registered successfully..!');
            window.location="index.php";
    </script>
    <?php
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}
mysqli_close($conn);
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Slab&display=swap" rel="stylesheet">
<link href="'https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300';" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">

<link rel="stylesheet" href="CSS/index.css">
<link rel="stylesheet" href="CSS/styles.css">
<link rel="stylesheet" href="CSS/sidebar.css">
<link rel="stylesheet" href="CSS/scrollbtn.css">


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>OES</title>




<!--  side bar script -->

<script>function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>


</head>

<body style="background-color:white;">

<style>

body
    {

        
        background-image:url();
        background-repeat: no-repeat; 
        background-attachment: fixed;
        background-size: 100% 100%;
    }
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


<div id="mySidebar" class="sidebar" style="cursor: pointer;">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a>CANDIDATE:</a>
  <a onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Login</a>
  <a onclick="document.getElementById('id04').style.display='block'" style="width:auto;">Registration</a>
  <br><hr style="width:80%;text-align:left;margin-left:0">
  <a>VOTER:</a>

  <a onclick="document.getElementById('id03').style.display='block'" style="width:auto;">Login</a>
  <a onclick="document.getElementById('id05').style.display='block'" style="width:auto;">Registration</a>
  <br><hr style="width:80%;text-align:left;margin-left:0">
  <a>ADMIN:</a>

  <a href="admin.php" .style.display='block' style="width:auto;">Login</a>
  

</div>
<table width="100%"  cellspacing="00" cellpadding="00">

<tr>
    <th width="12%" scope="col"><img src="bootstrap/img/images.png" alt="LOGO" width="100" height="58"/></th>
    <th width="7%" scope="col"></th>
    <th width="51%" scope="col"><h1 style="font-family:  'Abhaya Libre';color:navy">E-VOTING SYSTEM</h1></th>
    <th width="13%" scope="col"><font size="5" color="navy">&nbsp;</font></th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr>
</table>

<div align="center" style="cursor: pointer;">


    <div id='cssmenu'>
    <ul align="left">

    <li><a class="openbtn" onclick="openNav()" >☰ LOGIN</a></li>
     <li><a href="#about" >☰ About</a></li>
     <li><a href="#about" >☰ Contact US</a></li>
     <li><a href="#" >☰ Toll Free 1950</a></li>

    <!--<li><a class="openbtn" onclick="openNav()" >☰ About Us</a></li>
    <li><a class="openbtn" onclick="openNav()" >☰ Contact </a></li> -->
    </ul>
</div>



            <!-- scroll btn -->
<script>

//////////////
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

 // Get the modal
 var modal = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modal = document.getElementById('id04');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modal = document.getElementById('id05');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<!--                      Candidate Login                          -->

<div id="id02" class="modal" style="font-family: 'Abhaya Libre';">

        <form class="modal-content animate" method="post">
            

<form class="modal-content"  id="myform" action="" method="POST">
 
 <div class="container">
     <br>
     <br>
     <br>
     <h1>Candidate Login</h1>
    
    <table >

        <tr>
            <td><i class="fa fa-user icon"style="font-size: 150%;margin-left:10%"></i></td>
          <td><input style="width: 100%; margin-left:10%" type="text"  name="email" placeholder="Enter email" required></td>
        </tr>

        <tr>
            <td><i class="fa fa-lock icon"style="font-size: 150%;"></i></td>
            <td><input style="width: 100%; margin-left:10%" type="password" name="pass" placeholder="Enter password" required></td>
        </tr>

        <tr>
          <td><div align="right"></div></td>
          
      </tr>
  </table>

  
<button style="width: 40%;" type="reset" name="reset" >Reset</button>
<button style="width: 40%;"type="submit" name="login-btn" >Login</button>


<div class="container" style="background-color:#f0e2e2">
                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                
<!-- <h4>Haven't registered yet... <a href="c_reg.php">Register here</a></h4></span>  -->
</div>

</div>
</div>
</form>




    <!--                      Voter Login                           -->

<div id="id03" class="modal"style="font-family: 'Abhaya Libre';">

    <form class="modal-content animate" method="post">
            

<form class="modal-content" id="myform" action="" method="POST">
 
 <div class="container">
     <br>
     <br>
     <br>
     <h1>VOTER Login</h1>
    <table >
        <tr>
        
            <td width=""><i class="fa fa-user icon" style="font-size: 150%;" ></i></td>
           <td width=""><input style="width: 100%; margin-left:10%" type="text"  name="unm" placeholder="Enter UserID" required></td>
        </tr>
        <tr>
            <td ><i class="fa fa-lock icon" style="font-size: 160%;"></i></td>
            <td><input style="width: 100%; margin-left:10%" type="password" name="pass" placeholder="Enter password" required></td>
        </tr>
        
        <tr>
          <td><div align="right"></div></td>
          
      </tr>
  </table>

  
<button style="width: 40%;" type="reset" name="reset" >Reset</button>
<button style="width: 40%;" type="submit" name="login" >Login</button>


<div class="container" style="background-color: #f0e2e2">
                <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
                
</div>
 </div>
 </div>
 

</form>



                                        <!-- Candidate registration -->

<div id="id04" class="modal" style="font-family: 'Abhaya Libre';">
    <form class="modal-content animate" method="post" enctype="multipart/form-data">
        <form  class="modal-content "  id="myform" name="form1" method="post" enctype="multipart/form-data" >
                <div >
                    <div  class="container" >
                    <h1 >Candidate Registration </h1>
                        <table style="text-align:center;width:300px"  border="0">
                            <tr>
                                <td>Candidate Name: </td>
                                <td><input type="text" name="textfield2" required ></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="text" name="textfield3" required></td>
                            </tr>
                            <tr>
                                <td>Password:</td>
                                <td><input type="password" name="password" required></td>
                            </tr>
                            <tr>
                                <td>Confirm Password:</td>
                                <td><input type="password" name="cnf_pass" required></td>
                            </tr>
                            <tr>
                                <td>Aadhar Number:</td>
                                <td><input type="text" name="textfield5" required></td>
                            </tr>
                            <tr>
                                <td>Party Name: </td>
                                <td>
                                    <div class="select">
                                    <select id="slct" name="p_name">
                                        <option disabled selected>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- Select Party --</option>
                                    <?php
                                    include "connection.php";  
                                    $records = mysqli_query($con, "SELECT p_name From party");  

                                    while($data = mysqli_fetch_array($records))
                                    {
                                        echo "<option value='". $data['p_name'] ."'>" .$data['p_name'] ."</option>"; 
                                    }   
                                    ?>  
                                </select>
                                     </div>
                                </label></td>
                                
                            </tr>
                            
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

                            <!-- <table class="container" > -->
                                <tr>
                                <br>
                                <td>Party Symbol:</td>
                                <td> <input style="margin-left: 15%; margin-top:5%" type="file" name="image" required> </td>
                            </tr>
                            <!-- </table> -->
                            </table>
                               
                            <label>
    <button style=" width:30%; " type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Cancel</button>
    <strong><button  style=" width:30%; color:white;font-size:10px" type="submit" name="submit">SUBMIT</button></strong>
    </label>
       
    </div>    
     </div>   
     </form>
    </form>  
</div>


                                        <!-- VOTER registration -->

<div id="id05" class="modal" style="font-family: 'Abhaya Libre';">
    <form class="modal-content animate" method="post">
        <form  class="modal-content "  id="myform" name="form1" method="post" enctype="multipart/form-data" >
                <div >
                    <div  class="container" style="height: 700px;" >
                    <h1 style="margin: top 20%;" >VOTER Registration </h1>
                        <table style="text-align:center;width:300px;margin-top:0%" >
                            <tr>
                            <td>Voter Name: </td>
                            <td><input type="text" name="textfield2" required /></td>
                            </tr>
                            <tr>
                            <td>Email :</td>
                            <td><input type="text" name="textfield3" required></td>
                            </tr>
                            <tr>
                            <td>User ID:</td>
                            <td><input type="text" name="textfield" required/></td>
                            </tr>
                            <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password" required/></td>
                            </tr>
                            <tr>
                            <td>Confirm Password:</td>
                            <td><input type="password" name="cnf_pass" required></td>
                            </tr>
                            <tr>
                            <td>Gender:</td>
                            <td><label  class="containerrrr">Male
                            <input name="radiobtn" type="radio" value="Male" />
                            <span class="checkmark"></span>
                            </label>
                            
                            <label  class="containerrrr">Female
                            <input name="radiobtn" type="radio" value="Female" />
                            <span class="checkmark"></span>
                            </label></td>
                            </tr>
                            
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
                            <select id="c_id" name="c_id">
                            
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
                            <select name="seat_id" id="seat_id">
                            <option value=''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Seat Name</option>
                            </select>
                            
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                            <script>
                            $('#c_id').on('change', function(){
                            var c_id = this.value;
                            $.ajax({
                            type: "POST",
                            url: "get_seats.php",
                            data:'c_id='+c_id,
                            success: function(result){
                            $("#seat_id").html(result);
                            }
                            });
                            });
                            </script>

                            </div>
                            </td>
                            </tr>
                            <!-- <table class="container" > -->
                            <tr>
                            <td>Date Of Birth:</td><br>
                            <td><label>
                                <input type="date" name="textfield6" required/>
                            </label></td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td><label>
                                <input type="text" name="textfield4" required/>
                                </label></td>
                            </tr>
                            </table>

    <label>
    <button style=" width:30%; " type="button" onclick="document.getElementById('id05').style.display='none'" class="cancelbtn">Cancel</button>
    <strong><button  style=" width:30%; color:white;font-size:10px" type="submit" name="Submit">SUBMIT</button></strong>
    </label>
       
       
    </div>    
     </div>   
     </form>
    </form>  
</div>
<br>
<button style="width:65px;height:55px" onclick="topFunction()" id="myBtn" title="Go to top">TOP</button>

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
<p align="left" style="margin-left:45px;font-family: 'Playfair Display', serif;font-size:50px">Leading Parties</p>

<a href="#"><img align="left" src="bootstrap\img\congress.png" style="margin-left:45px;border-radius:55%;width:235px;height:230px"></a>
<a href="#"><img align="centre" src="bootstrap/img/bjp.png" style="border-radius:55%;width:235px;height:230px"></a>
<a href="#"><img align="right" src="bootstrap/img/aap1.jpg" style="margin-right:45px;width:235px;height:230px"></a>

<br>
<br>
<br>
<br>
<hr align ="centre" style="width:80%;text-align:left;" noshade="5.5">

<br>
<img align="left" src="bootstrap\img\mod4.jpg" style="width:450px;height:320px;margin-left:90px;">

<h1 style="font-family:'Abhaya Libre';font-size:45px;margin-right:80px;margin-top:30px">NARENDRA MODI </h1>
<strong><p style="margin-left:470px;margin-right:90px;font-size:20px;font-family:'Courier New', Courier, monospace;"> Prime Minister Narendra Modi turned 70 today. In the six years as prime minister, Narendra Modi is credited to have introduced some long-awaited reforms in the country. Here's a list of five of PM Modi's achievements and some of the challenges his government faces.&nbsp;&nbsp;<a href="modi.php">More details...</a></p></strong>

<br><br><br><br><br><br><br><br>
<img align="right" src="bootstrap\img\ak1.png" style="width:400px;height:300px;margin-left:90px;margin-right:50px;">

<h1 style="font-family:'Abhaya Libre';font-size:45px;margin-right:80px;font-family: 'Playfair Display', serif;">Arvind Kejriwal</h1>
<strong><p style="margin-left:40px;margin-right:90px;font-size:20px;font-family:'Courier New', Courier, monospace;"> Arvind Kejriwal (born 16 August 1968) is an Indian politician and a former bureaucrat who is the current and 7th Chief Minister of Delhi since February 2015. He was also the Chief Minister of Delhi from December 2013 to February 2014, stepping down after 49 days of assuming power. <br>Currently, he is the national convener of the Aam Aadmi Party, which won the 2015 Delhi Assembly elections with a historic majority, obtaining 67 out of 70 assembly seats.<a href="ak.php">More details...</a></p></strong>


<br><br><br><br><br><br>
<img align="left" src="bootstrap\img\rg1.png" style="margin-left:100px;border-radius:15%;width:319px;height:300px;margin-right:100px;">


<h1 style="font-family:'Abhaya Libre';font-size:45px;margin-right:80px;margin-top:30px">Rahul Gandhi  </h1>
<strong><p style="margin-left:470px;margin-right:90px;font-size:20px;font-family:'Courier New', Courier, monospace;"> Rahul Gandhi (born 19 June 1970) is an Indian politician and a member of the Indian Parliament, representing the constituency of Wayanad, Kerala in the 17th Lok Sabha.<br> A member of the Indian National Congress, he served as the President of the Indian National Congress from 16 December 2017 to 3 July 2019.&nbsp;&nbsp;<br><a href="rg.php">More details...</a></p></strong>


<br><br><br><br><br>

<img align="right" src="bootstrap\img\vote.jpg" style="margin-left:100px;border-radius:15%;width:319px;height:300px;margin-right:100px;">
<h1 style="font-family:'Abhaya Libre';font-size:45px;margin-right:80px;font-family: 'Playfair Display', serif;">Vote </h1>
<strong><p style="margin-left:40px;margin-right:90px;font-size:20px;font-family:'Courier New', Courier, monospace;"> Elections and the way they operate are important because voting is the agreed procedure for legitimizing governments.<br>There is no such thing as a right not to vote. The right to vote is fundamental: it is protective of all other rights, and its existence defines the very structure of representative democracy.</p><a class="openbtn" onclick="openNav()" >Login-for Vote ...</a></strong>

<br><br><br><br><br><br><br>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

<div id="about"  style="background-color:black;width:100%;height: 70%;font-family:'Courier New', Courier, monospace; ">
<img align="center"style="margin-left: 20px;" src="bootstrap/img/images.png" alt="LOGO" width="150px" height="100px"/>
<table>

<tr>


<th style="width:999px;color:#f0e2e2;font-size:28px;font-weight: lighter;">About</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th style="width:999px;color:#f0e2e2;font-size: 28px;font-weight: lighter;">Contact-Us</th>


</tr><br>
</table>
<table >
<tr>
<hr align ="centre" style="width:90%;" noshade="5.5">
<th style=" width: 999px;color:#f0e2e2;font-size:20px;font-family:'Courier New', Courier, monospace;font-weight: lighter;"><p style="margin-left:70px ;">Electronic voting (also known as e-voting) is voting that uses electronic means to either aid or take care of casting and counting votes.</p></th>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<th style="width:899px;color:#f0e2e2;font-size: 25px;"></th>

<th align="left" style="width:899px;color:#f0e2e2;font-size: 16px;font-weight: lighter;"><br><br> &nbsp;&nbsp;&nbsp;&nbsp;
<i class='fas fa-map-marker-alt' style='font-size:20px'></i>&nbsp;&nbsp; &nbsp;Gandhinagar, Gujarat 382010.<br><br>&nbsp;&nbsp;&nbsp;&nbsp;
<i class='fas fa-phone-alt' style='font-size:20px'></i>&nbsp;&nbsp; (O) 079-23252149 <br><br>&nbsp;&nbsp;&nbsp;&nbsp;
<i class='far fa-clock' style='font-size:20px'></i>&nbsp;&nbsp; 10:30 AM to 6:10 PM <br><br>&nbsp;&nbsp;&nbsp;&nbsp;
<i class='fa fa-envelope' style='font-size:20px'></i> &nbsp; commi-sec @gujarat.gov.in<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sec-sec @gujarat.gov.in</th>




</tr>
</table>




<br><br>
<div>
<hr align ="centre" style="width:90%;" noshade="5.5">
<br><br>
<a href="https://www.facebook.com/">
<i style="color: whitesmoke;font-size:25px" class="icon ion-social-facebook"></i></a>&nbsp;&nbsp;<span style='font-size:10px;color:white;margin-bottom:50px'>&#8226;&nbsp;&nbsp;</span>
<a href="https://twitter.com/?lang=en"><i style="color: whitesmoke;font-size:25px;" class="icon ion-social-twitter"></i></a>&nbsp;&nbsp;<span style='font-size:10px;color:white;'>&#8226;&nbsp;&nbsp;</span>
<a href="https://www.snapchat.com/"><i style="font-size:25px;color: whitesmoke;"class="icon ion-social-snapchat"></i></a>&nbsp;&nbsp;<span style='font-size:10px;color:white;'>&#8226;&nbsp;&nbsp;</span>
<a href="https://www.instagram.com/"><i style="color: whitesmoke;font-size:25px;"class="icon ion-social-instagram"></i></a>

<p style="color:whitesmoke"class="float-end navbar-left">&copy;&nbsp;2021 Company, ONLINE   ELECTION   SYSTEM.</p>
</div>
<br>

</div>


</body>
</html>