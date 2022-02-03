<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "oes");


$c_id = $_GET['c_id'];

if (isset($_POST['doc']))
{
    $file=$_POST['file_name1'];
    if(!empty($file)){
    header('Content-type:doc/pdf');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    readfile('docs/'.$file);
    exit();}
 else {
    echo 'no file';
    }
}

elseif (isset($_POST['doc2']))
{
    $file=$_POST['file_name2'];
    if(!empty($file)){
    header('Content-type:doc/pdf');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    readfile('docs/'.$file);
    exit();}
 else {
    
}
}

elseif (isset($_POST['doc3']))
{
    $file=$_POST['file_name3'];
    if(!empty($file)){
    header('Content-type:doc/pdf');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    readfile('docs/'.$file);
    exit();}
 else {
    
}
}

elseif (isset($_POST['doc4']))
{
    $file=$_POST['file_name4'];
    if(!empty($file)){
    header('Content-type:doc/pdf');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    readfile('docs/'.$file);
    exit();}
 else {
    
}
}

elseif (isset($_POST['doc5']))
{
    $file=$_POST['file_name5'];
    if(!empty($file)){
    header('Content-type:doc/pdf');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    readfile('docs/'.$file);
    exit();}
 else {
    
}
}

elseif (isset($_POST['doc6']))
{
    $file=$_POST['file_name6'];
    if(!empty($file)){
    header('Content-type:doc/pdf');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    readfile('docs/'.$file);
    exit();}
 else {
    
}
}

elseif (isset($_POST['doc7']))
{
    $file=$_POST['file_name7'];
    if(!empty($file)){
    header('Content-type:doc/pdf');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    readfile('docs/'.$file);
    exit();}
 else {
    
}
}

elseif (isset($_POST['doc8']))
{
    $file=$_POST['file_name8'];
    if(!empty($file)){
    header('Content-type:doc/pdf');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    readfile('docs/'.$file);
    exit();}
 else {
    
}
}

elseif (isset($_POST['doc9']))
{
    $file=$_POST['file_name9'];
    if(!empty($file)){
    header('Content-type:doc/pdf');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    readfile('docs/'.$file);
    exit();}
 else {
    
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Candidate docs List</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Slab&display=swap" rel="stylesheet">
<link rel="stylesheet" href="CSS/p_list.css">

</head>

<body style="background-color: whitesmoke" >

<table width="100%"  cellspacing="00" cellpadding="00">
<tr >
    <th width="7%" scope="col"></th>
    <th width="32%" scope="col"><img src="bootstrap/img/images.png" alt="LOGO" width="100" height="58"/></th>
    <th width="51%" scope="col"><h1 style="font-family:  'Abhaya Libre';color:navy">E-VOTING SYSTEM</h1></th>
    <th width="20%" scope="col"><p style="font-family: 'Josefin Slab', serif; width:90%;color:navy" class="style2"><i class="fa fa-user icon"style="font-size: 15px;"></i>  WELCOME ADMIN</th></p>
  </tr>
</table> 

<style>
  
input[type=text]{
    width: 100%;
    height: 10%;
    padding: 9px 10px;
    /* margin: 8px 0; */
    display: inline-block;
    border: 1px solid rgb(255, 249, 249);
    border-radius: 10px;
    box-sizing: border-box;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
}


</style>


<div class="box-1">
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
</div>
<p align="center">&nbsp;</p>
<div class="container" align="center">
<form method="post" action="c_doc_list.php">
  <div align="center">
    
    <table style="font-family: 'Josefin Slab', serif;" class="table table-dark table-hover" width="426" border="1" >
    <thead>
      <tr style="text-align: center;font-family: 'EB Garamond', serif;">
        <th >Document Name </th>
        <th>File Name </th>
        <th>Action</th>
      </tr>
    </thead>
    <tr>
        
        <div align="center">
          <?php
	
	$sql="select * from candidate_docs where c_id='$c_id' ";
     $rec=mysqli_query($conn, $sql);
  
     while ($std=mysqli_fetch_assoc($rec))
    {
?>



	   <strong><td  width="320"> <div align="center">Income </div></td>
	   <?php echo "<td>"?>
          <input style="width: 100%; text-align:center; " name="file_name1" value="<?php echo $std["income"]?>" type="text" readonly />
        </div>
        <td width="142"> <input  type="submit" value="Download" name="doc"/></td>
      </tr>
      <tr>
      <td> <div align="center">Affidavit </div></td>
      <?php echo "<td>"?><input  style="width: 100%; text-align:center; " name="file_name2" value="<?php echo $std["affidavit"]?>" type="text" readonly />
      <td><input type="submit" value="Download" name="doc2"/></td>
      </tr>
      <tr>
      <td> <div align="center">Form A </div></td>
      <?php echo "<td>"?><input  style="width: 100%; text-align:center; "name="file_name3" value="<?php echo $std["form_a"]?>" type="text" readonly />
      <td><input type="submit" value="Download" name="doc3"/></td>
      </tr>
      <tr>
      <td> <div align="center">Form B </div></td>
      <?php echo "<td>"?><input  style="width: 100%;  text-align:center; "name="file_name4" value="<?php echo $std["form_b"]?>" type="text" readonly />
      <td><input type="submit" value="Download" name="doc4"/></td>
      </tr>
      <tr>
      <td> <div align="center">Caste certificate </div></td>
      <?php echo "<td>"?><input  style="width: 100%;  text-align:center; " name="file_name5" value="<?php echo $std["caste_certificate"]?>" type="text" readonly />
      <td><input type="submit" value="Download" name="doc5"/></td>
      </tr>
      <tr>
      <td> <div align="center">Security deposit </div></td>
      <?php echo "<td>"?><input  style="width: 100%;  text-align:center; " name="file_name6" value="<?php echo $std["security_deposit"]?>" type="text" readonly />
      <td><input type="submit" value="Download" name="doc6"/></td>
      </tr>
      <tr>
      <td> <div align="center">Property </div></td>
      <?php echo "<td>"?><input  style="width: 100%;  text-align:center; " name="file_name7" value="<?php echo $std["property"]?>" type="text" readonly />
      <td><input type="submit" value="Download" name="doc7"/></td>
      </tr>
      <tr>
      <td> <div align="center">Oath letter </div></td>
      <?php echo "<td>"?><input  style="width: 100%; text-align:center; " name="file_name8" value="<?php echo $std["outh_letter"]?>" type="text" readonly />
      <td><input type="submit" value="Download" name="doc8"/></td>
      </tr>
      <tr>
      <td> <div align="center">Candidate Information </div></td>
      <?php echo "<td>"?><input  style="width: 100%; text-align:center; " name="file_name9" value="<?php echo $std["can_info"]?>" type="text" readonly />
      <td><input type="submit" value="Download" name="doc9"/></td>
      </tr>
      </strong>
  <?php
}
?>
    </table>
</div>
  </div>
