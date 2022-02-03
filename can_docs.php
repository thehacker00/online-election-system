<?php
session_start();
include './connection.php';
if(!isset($_SESSION['email']))
	header('location:index.php');
	
	
	
			$email = $_SESSION['email'];
			
			$qry = mysqli_query($con,"SELECT c_name, c_id FROM candidate WHERE email = '$email'");
			$row = mysqli_fetch_array($qry);
			
			$c_name = $row['c_name'];
            $c_id = $row['c_id'];

?>

<?php

if(isset($_POST['img'])){
	
	//code for image uploading
	if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
		$image = $_FILES['image']['name'];
		$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
		$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
		$uploadDirectory .= $image;
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
	 }
 
     include './connection.php';
     $sql ="INSERT INTO candidate_docs (c_id,c_photo) values ('$c_id','$image')";
     mysqli_query($con, $sql);
     $con->close();
     header('Location:can_docs.php'); 
	}


if(isset($_POST['doc1']))
{
    {
        if (isset($_FILES['doc1']))
        {
            $file= $_FILES['doc1'];
            //file properties
            $file_name=$file['name'];
            $file_temp=$file['tmp_name'];
            $file_size=$file['size'];
            $file_error=$file['error'];
            // work out the extension
            $file_ext = explode('.', $file_name);
            $file_ext=  strtolower(end($file_ext));
            $allowed= array('docx','doc','txt','pdf');
            
            if(in_array($file_ext, $allowed))
            {
                if($file_error===0)
                {
                    if($file_size<=9999999999)
                    {
                        $file_name_new=uniqid('',TRUE).'.'.$file_ext;
                        $file_destination='./docs/'.$file_name_new;
                        if(move_uploaded_file($file_temp, $file_destination))
                        {
                            //echo $file_destination;
                            include './connection.php';
                            $sql = "UPDATE candidate_docs SET income='$file_name' WHERE c_id= '$c_id'";
                            mysqli_query($con, $sql);
                            $con->close();
                            header('Location:can_docs.php'); 
                        }
                    }
                }
            }
        }
    }   
}
    elseif(isset($_POST['doc2']))
 {
if (isset($_FILES['doc2']))
{
    $file= $_FILES['doc2'];
    //file properties
    $file_name=$file['name'];
    $file_temp=$file['tmp_name'];
    $file_size=$file['size'];
    $file_error=$file['error'];
    // work out the extension
    $file_ext = explode('.', $file_name);
    $file_ext=  strtolower(end($file_ext));
    $allowed= array('docx','doc','txt','pdf');
    
    if(in_array($file_ext, $allowed))
    {
        if($file_error===0)
        {
            if($file_size<=9999999999)
            {
                $file_name_new=uniqid('',TRUE).'.'.$file_ext;
                $file_destination='./docs/'.$file_name_new;
                if(move_uploaded_file($file_temp, $file_destination))
                {
                    //echo $file_destination;
                    include './connection.php';
                    $sql = "UPDATE candidate_docs SET affidavit='$file_name' WHERE c_id= '$c_id'";
                    mysqli_query($con, $sql);
                    $con->close();
                    header('Location:can_docs.php'); 
                }
            }
        }
    }
}
}


elseif(isset($_POST['doc3']))
 {
if (isset($_FILES['doc3']))
{
    $file= $_FILES['doc3'];
    //file properties
    $file_name=$file['name'];
    $file_temp=$file['tmp_name'];
    $file_size=$file['size'];
    $file_error=$file['error'];
    // work out the extension
    $file_ext = explode('.', $file_name);
    $file_ext=  strtolower(end($file_ext));
    $allowed= array('docx','doc','txt','pdf');
    
    if(in_array($file_ext, $allowed))
    {
        if($file_error===0)
        {
            if($file_size<=9999999999)
            {
                $file_name_new=uniqid('',TRUE).'.'.$file_ext;
                $file_destination='./docs/'.$file_name_new;
                if(move_uploaded_file($file_temp, $file_destination))
                {
                    //echo $file_destination;
                    include './connection.php';
                    $sql = "UPDATE candidate_docs SET form_a='$file_name' WHERE c_id= '$c_id'";
                    mysqli_query($con, $sql);
                    $con->close();
                    header('Location:can_docs.php'); 
                }
            }
        }
    }
}
}
 
elseif(isset($_POST['doc4']))
 {
if (isset($_FILES['doc4']))
{
    $file= $_FILES['doc4'];
    //file properties
    $file_name=$file['name'];
    $file_temp=$file['tmp_name'];
    $file_size=$file['size'];
    $file_error=$file['error'];
    // work out the extension
    $file_ext = explode('.', $file_name);
    $file_ext=  strtolower(end($file_ext));
    $allowed= array('docx','doc','txt','pdf');
    
    if(in_array($file_ext, $allowed))
    {
        if($file_error===0)
        {
            if($file_size<=9999999999)
            {
                $file_name_new=uniqid('',TRUE).'.'.$file_ext;
                $file_destination='./docs/'.$file_name_new;
                if(move_uploaded_file($file_temp, $file_destination))
                {
                    //echo $file_destination;
                    include './connection.php';
                    $sql = "UPDATE candidate_docs SET form_b='$file_name' WHERE c_id= '$c_id'";
                    mysqli_query($con, $sql);
                    $con->close();
                    header('Location:can_docs.php'); 
                }
            }
        }
    }
}
}

elseif(isset($_POST['doc5']))
 {
if (isset($_FILES['doc5']))
{
    $file= $_FILES['doc5'];
    //file properties
    $file_name=$file['name'];
    $file_temp=$file['tmp_name'];
    $file_size=$file['size'];
    $file_error=$file['error'];
    // work out the extension
    $file_ext = explode('.', $file_name);
    $file_ext=  strtolower(end($file_ext));
    $allowed= array('docx','doc','txt','pdf');
    
    if(in_array($file_ext, $allowed))
    {
        if($file_error===0)
        {
            if($file_size<=9999999999)
            {
                $file_name_new=uniqid('',TRUE).'.'.$file_ext;
                $file_destination='./docs/'.$file_name_new;
                if(move_uploaded_file($file_temp, $file_destination))
                {
                    //echo $file_destination;
                    include './connection.php';
                    $sql = "UPDATE candidate_docs SET caste_certificate='$file_name' WHERE c_id= '$c_id'";
                    mysqli_query($con, $sql);
                    $con->close();
                    header('Location:can_docs.php'); 
                }
            }
        }
    }
}
}

elseif(isset($_POST['doc6']))
 {
if (isset($_FILES['doc6']))
{
    $file= $_FILES['doc6'];
    //file properties
    $file_name=$file['name'];
    $file_temp=$file['tmp_name'];
    $file_size=$file['size'];
    $file_error=$file['error'];
    // work out the extension
    $file_ext = explode('.', $file_name);
    $file_ext=  strtolower(end($file_ext));
    $allowed= array('docx','doc','txt','pdf');
    
    if(in_array($file_ext, $allowed))
    {
        if($file_error===0)
        {
            if($file_size<=9999999999)
            {
                $file_name_new=uniqid('',TRUE).'.'.$file_ext;
                $file_destination='./docs/'.$file_name_new;
                if(move_uploaded_file($file_temp, $file_destination))
                {
                    //echo $file_destination;
                    include './connection.php';
                    $sql = "UPDATE candidate_docs SET security_deposit='$file_name' WHERE c_id= '$c_id'";
                    mysqli_query($con, $sql);
                    $con->close();
                    header('Location:can_docs.php'); 
                }
            }
        }
    }
}
}

elseif(isset($_POST['doc7']))
 {
if (isset($_FILES['doc7']))
{
    $file= $_FILES['doc7'];
    //file properties
    $file_name=$file['name'];
    $file_temp=$file['tmp_name'];
    $file_size=$file['size'];
    $file_error=$file['error'];
    // work out the extension
    $file_ext = explode('.', $file_name);
    $file_ext=  strtolower(end($file_ext));
    $allowed= array('docx','doc','txt','pdf');
    
    if(in_array($file_ext, $allowed))
    {
        if($file_error===0)
        {
            if($file_size<=9999999999)
            {
                $file_name_new=uniqid('',TRUE).'.'.$file_ext;
                $file_destination='./docs/'.$file_name_new;
                if(move_uploaded_file($file_temp, $file_destination))
                {
                    //echo $file_destination;
                    include './connection.php';
                    $sql = "UPDATE candidate_docs SET property='$file_name' WHERE c_id= '$c_id'";
                    mysqli_query($con, $sql);
                    $con->close();
                    header('Location:can_docs.php'); 
                }
            }
        }
    }
}
}

elseif(isset($_POST['doc8']))
 {
if (isset($_FILES['doc8']))
{
    $file= $_FILES['doc8'];
    //file properties
    $file_name=$file['name'];
    $file_temp=$file['tmp_name'];
    $file_size=$file['size'];
    $file_error=$file['error'];
    // work out the extension
    $file_ext = explode('.', $file_name);
    $file_ext=  strtolower(end($file_ext));
    $allowed= array('docx','doc','txt','pdf');
    
    if(in_array($file_ext, $allowed))
    {
        if($file_error===0)
        {
            if($file_size<=9999999999)
            {
                $file_name_new=uniqid('',TRUE).'.'.$file_ext;
                $file_destination='./docs/'.$file_name_new;
                if(move_uploaded_file($file_temp, $file_destination))
                {
                    //echo $file_destination;
                    include './connection.php';
                    $sql = "UPDATE candidate_docs SET outh_letter='$file_name' WHERE c_id= '$c_id'";
                    mysqli_query($con, $sql);
                    $con->close();
                    header('Location:can_docs.php'); 
                }
            }
        }
    }
}
}

elseif(isset($_POST['doc9']))
 {
if (isset($_FILES['doc9']))
{
    $file= $_FILES['doc9'];
    //file properties
    $file_name=$file['name'];
    $file_temp=$file['tmp_name'];
    $file_size=$file['size'];
    $file_error=$file['error'];
    // work out the extension
    $file_ext = explode('.', $file_name);
    $file_ext=  strtolower(end($file_ext));
    $allowed= array('docx','doc','txt','pdf');
    
    if(in_array($file_ext, $allowed))
    {
        if($file_error===0)
        {
            if($file_size<=9999999999)
            {
                $file_name_new=uniqid('',TRUE).'.'.$file_ext;
                $file_destination='./docs/'.$file_name_new;
                if(move_uploaded_file($file_temp, $file_destination))
                {
                    //echo $file_destination;
                    include './connection.php';
                    $sql = "UPDATE candidate_docs SET can_info='$file_name' WHERE c_id= '$c_id'";
                    mysqli_query($con, $sql);
                    $con->close();
                    header('Location:can_docs.php'); 
                }
            }
        }
    }
}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	body
	{
        /* background-color:white; */
		background-repeat: no-repeat; 
		background-attachment: fixed;
		background-size: 100% 100%;
	}
.style1 {
	font-size: xx-large;
	font-weight: bold;
	color: #0000CC;
}
.style2 {
	font-size: x-large;
	font-weight: bold;
	color: #000099;
}
</style>
<title>Candidate documents</title>
</head>
<div>
<body>
    
    <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Slab&display=swap" rel="stylesheet">
<link href="'https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300';" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link rel="stylesheet" href="CSS/p_list.css">


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body style="background-color: white;">
<table  width="100%" height="100%" align="center">
	
<tr >
    <th width="7%" scope="col"></th>
    <th width="32%" scope="col"><img src="bootstrap/img/images.png" alt="LOGO" width="100" height="58"/></th>
    <th width="51%" scope="col"><h1 style="font-family:  'Abhaya Libre';color:navy">E-VOTING SYSTEM</h1></th>
    <th width="20%" scope="col">
      <p style="font-family: 'Abhaya Libre'; width:90%; color:navy; font-size: 20px;" class="style2"><i class="fa fa-user icon"style="font-size: 20px;"></i>  Welcome <?php echo $row['c_name']; ?> </p></th>
      
  </tr>
</table>
<div class="box-1">
           <a href="c_logout.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one">
                    <span ><i class="fa fa-sign-out" aria-hidden="true" style="font-size:30px" ></i></span>
               </div>
          </a>
          <a href="can_docs.php" style="color:rgb(87, 22, 22);font-size:15px;">  
                <div class="btn btn-one btn-a">
                    <span > Documents Upload </span>
               </div>
          </a>
          <a href="withdraw.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one btn-a">
                    <span > Withdraw Form</span>
               </div>
          </a>
          <a href="resultstat.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one btn-a">
                    <span > Election Result</span>
               </div>
          </a>
          <a href="can_result.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one">
                    <span>Your Result </span>
               </div>
          </a>
          <a href="winner.php" style="color:rgb(87, 22, 22)">  
                <div class="btn btn-one">
                    <span>Winners </span>
               </div>
          </a>
</div>




        <br>
        <br>
        <br>
      
        <form method="post" action="can_docs.php" enctype="multipart/form-data">
          

          <table style="font-family: 'Josefin Slab', serif; width:90%;" class="table table-dark table-hover"  align="center" border="1" >
          <th colspan="6" ><h2 align="center">Candidate Documents</h2>
         </th>
        <tr>
          <td width="153"align="center">Candidate photo</td>
          <td width="227"><div align="center"><span style="border-radius: 10px;">
              <input type="file" name="image"/>
          </span></div></td>
          <td width="75"><span style=" border-radius: 10px;">
            <input type="submit" name="img" value="upload"/>
          </span></td>
        </tr>
        <tr>
          <td align="center">Income Certificate</td>
          <td><div align="center"><span style=" border-radius: 10px;">
              <input type="file" name="doc1"/>
          </span></div></td>
          <td><span style=" border-radius: 10px;">
            <input type="submit" name="doc1" value="upload"/>
          </span></td>
        </tr>
        <tr>
          <td align="center">Affidavit</td>
          <td><div align="center"><span style=" border-radius: 10px;">
              <input type="file" name="doc2"/>
          </span></div></td>
          <td><span style="border-radius: 10px;">
            <input type="submit" name="doc2" value="upload"/>
          </span></td>
        </tr>
        <tr>
          <td align="center">Form A </td>
          <td><div align="center"><span style=" border-radius: 10px;">
              <input type="file" name="doc3"/>
          </span></div></td>
          <td><span style=" border-radius: 10px;">
            <input type="submit" name="doc3" value="upload"/>
          </span></td>
        </tr>
        <tr>
          <td align="center">Form B </td>
          <td><div align="center"><span style=" border-radius: 10px;">
              <input type="file" name="doc4"/>
          </span></div></td>
          <td><span style=" border-radius: 10px;">
            <input type="submit" name="doc4" value="upload"/>
          </span></td>
        </tr>
        <tr>
          <td align="center">Caste Certificate </td>
          <td><div align="center"><span style=" border-radius: 10px;">
              <input type="file" name="doc5"/>
          </span></div></td>
          <td><span style="border-radius: 10px;">
            <input type="submit" name="doc5" value="upload"/>
          </span></td>
        </tr>
        <tr>
          <td align="center">Security Deposit </td>
          <td><div align="center"><span style=" border-radius: 10px;">
              <input type="file" name="doc6"/>
          </span></div></td>
          <td><span style="border-radius: 10px;">
            <input type="submit" name="doc6" value="upload"/>
          </span></td>
        </tr>
        <tr>
          <td align="center">Property</td>
          <td><div align="center"><span style=" border-radius: 10px;">
              <input type="file" name="doc7"/>
          </span></div></td>
          <td><span style=" border-radius: 10px;">
            <input type="submit" name="doc7" value="upload"/>
          </span></td>
        </tr>
        <tr>
          <td align="center">Oath Letter </td>
          <td><div align="center"><span style=" border-radius: 10px;">
              <input type="file" name="doc8"/>
          </span></div></td>
          <td><span style=" border-radius: 10px;">
            <input type="submit" name="doc8" value="upload"/>
          </span></td>
        </tr>
        <tr>
          <td align="center">Candidate Information </td>
          <td><div align="center"><span style=" border-radius: 10px;">
              <input type="file" name="doc9"/>
          </span></div></td>
          <td><span style=" border-radius: 10px;">
            <input type="submit" name="doc9" value="upload"/>
          </span></td>
        </tr>
          </table>
      <br />
      <!-- <a class="active" href="c_logout.php">LOG OUT</a> -->
    </div>

    
    </form>

</body>
</html>