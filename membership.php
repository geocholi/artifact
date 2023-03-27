<?php
// Include config file
require_once "connect.php";

$pg = $_GET['pg'];
$sql= $_GET['sql'];

if ($pg == 2)

{


    $txtFname = $_POST['txtFname'];
    $txtLname = $_POST['txtLname'];
    $txtEmail = $_POST['txtEmail'];
    $txtPassword = $_POST['txtPassword'];
    $txtLocation = $_POST['txtLocation'];
    $date =  'current_timestamp()';
    $fileName = $_FILES['image']['fileToUpload'];
    
    $target_dir = "pictures/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
             echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                 echo "File is not an image.";
                 $uploadOk = 0;
            }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
     } else {


           echo  $sql = "Select * from users where email='$txtEmail'";
    
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result); 
                if($num != 0) {
                    $sql = "Email account exist";
                    echo " <script language='JavaScript'>
                    location.href='memberships.php?sql=$sql';
                    </script>";
        
                }
                    else
                {

                 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
      
                    {
                     $txtPic = $_FILES["fileToUpload"]["name"];
        
                  $sql = "INSERT INTO users (fname, lname, email, xlocation, pic, xpassword) VALUES ('$txtFname', '$txtLname', '$txtEmail', '$txtLocation','$txtPic', '$txtPassword')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        $sql = "Your record was created sucessfully,  Please login";
                        echo " <script language='JavaScript'>
                        location.href='login.php?sql=$sql';
                        </script>";
                     }
                    else{
                        $sql = "Record was not processed,  contact web administrator";
                        echo " <script language='JavaScript'>
                        location.href='memberships.php?sql=$sql';
                        </script>";
                    }
                
                    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                }
            
                else {
                    $sql = "Sorry, there was an error uploading your file.";
                        echo " <script language='JavaScript'>
                        location.href='memberships.php?sql=$sql';
                        </script>";
                    
                    }
                 }
    }
 
}
?>
<html>
    <head>
        <title>Welcome to Antifacts</title>
    </head>
    
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/main.css">
    <body bgcolor="#f0f0f0">
        <table align="center" width="80%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                <?php include 'banner.php';?>

                        <div class="wrapper">
                                <h2>Sign Up</h2>
                                <p>Please fill this form to create an account.</p>

                                <form action="membership.php?pg=2" method="post" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td>FirstName</td>
                                        <td><input type="text" name="txtFname"></td>
                                    </tr>
                                    <tr>
                                        <td>LastName</td>
                                        <td><input type="text" name="txtLname"></td>
                                    </tr>
                                    <tr>
                                        <td>Email Address</td>
                                        <td><input type="text" name="txtEmail"></td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td><input type="password" name="txtPassword"></td>
                                    </tr>
                                    <tr>
                                        <td>Location</td>
                                        <td><input type="text" name="txtLocation"></td>
                                    </tr>
                                    <tr>
                                        <td>Profile Picture</td>
                                        <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2"><input type="submit" value="Create account" name="submit"></td>
                                    </tr>

                                    
                                </table
                                </form>
                     
                    
                    <?php include 'fotter.php';?>
                </td>
            </tr>
        </table>
        

    </body>
</html>