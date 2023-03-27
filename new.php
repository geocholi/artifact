<?php
// Include config file
require_once "connect.php";

$pg = $_GET['pg'];
$sql= $_GET['id'];
$id = $_GET['sql'];
$rsp = $_GET['rsp'];


$sql = "Select * from users where id='$id'";
    
$result = mysqli_query($conn, $sql); 
$num = mysqli_num_rows($result);

while($row = mysqli_fetch_assoc($result)) {

    $txtFname=  $row["fname"];
    $txtLname=  $row["lname"];

 }

 if ($pg == 2)

     {
        $txtTitle = $_POST['txtTitle'];
        $txtLocation = $_POST['txtLocation'];
        $txtDesc = $_POST['txtDesc'];
        $txtID = $_POST['txtID'];
       
        $fileName = $_FILES['image']['fileToUpload'];

        $target_dir = "pictures/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
       
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
       
        // Check if file already exists
        if (file_exists($target_file)) {
          $uploadOk = 0;
          $sql = "Sorry, file already exists.";
          echo " <script language='JavaScript'>
          location.href='new.php?rsp=$sql&&sql=$txtID';
          </script>";
        }
        
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
          $uploadOk = 0;
          $sql = "Sorry, your file is too large.";
          echo " <script language='JavaScript'>
          location.href='new.php?rsp=$sql&&sql=$txtID';
          </script>";
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
          $uploadOk = 0;
          $sql = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          echo " <script language='JavaScript'>
          location.href='new.php?rsp=$sql&&sql=$txtID';
          </script>";
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          $sql = "Sorry, your file was not uploaded.";
          echo " <script language='JavaScript'>
          location.href='new.php?rsp=$sql&&sql=$txtID';
          </script>";
        // if everything is ok, try to upload file
         } else {
    
    

                     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
          
                        {
                         $txtPic = $_FILES["fileToUpload"]["name"];
            
                        $sql = "INSERT INTO content_tble (title, location, msg, userID, pic) VALUES ('$txtTitle', '$txtLocation', '$txtDesc', '$txtID', '$txtPic')";
                        
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            $sql = "Record Entered Sucessfully,";
                            echo " <script language='JavaScript'>
                            location.href='new.php?rsp=$sql&&sql=$txtID';
                            </script>";
                         }
                        else{
                            $sql = "Record was not processed,  contact web administrator";
                            echo " <script language='JavaScript'>
                            location.href='new.php?rsp=$sql&&sql=$txtID';
                            </script>";
                        }
                    
                        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    }
                
                    else {
                        $sql = "Sorry, there was an error uploading your file.";
                            echo " <script language='JavaScript'>
                            location.href='new.php?rsp=$sql&&sql=$txtID';
                            </script>";
                        
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
    <script  type="javascript" src="javascript/table.js"></script>
    <link rel="stylesheet" href="css/table.css">
    <style>
.vertical-menu {
  width: 200px; /* Set a width if you like */
}

.vertical-menu a {
  background-color: #eee; /* Grey background color */
  color: black; /* Black text color */
  display: block; /* Make the links appear below each other */
  padding: 12px; /* Add some padding */
  text-decoration: none; /* Remove underline from links */
}

.vertical-menu a:hover {
  background-color: #ccc; /* Dark grey background on mouse-over */
}

.vertical-menu a.active {
  background-color: #000; /* Add a green color to the "active/current" link */
  color: white;
} 
.
 </style>
    <body bgcolor="#f0f0f0">
        <table align="center" width="80%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                <?php include 'banner.php';?>

                <table witdth="100%">
                        <tr>
                            <td valign="top">
                            <div class="vertical-menu">
                                    <a href="welcome.php?sql=<?php echo $id ; ?>" class="active">Home</a>
                                    <a href="new.php?sql=<?php echo $id ; ?>">Add New</a>
                                    <a href="listing.php?sql=<?php echo $id ; ?>">Antifact Lisitng</a>
                                    <a href="index.php">Log out</a>
                                    
                                </div>
                            </td>
                            <td valign="top" style="padding-left:20px"  width="100%">
                            <div class="wrapper">
                                            <h2>Create a Post</h2> - <span style="color:red"><?php echo $rsp; ?></span>
                                            
                                            <form action="new.php?pg=2" method="post" enctype="multipart/form-data">
                                            <table>
                                                <tr>
                                                    <td>Title</td>
                                                    <td><input type="text" name="txtTitle"> <input type="hidden" name="txtID" value="<?php echo $id; ?>"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Location</td>
                                                    <td><input type="text" name="txtLocation"></td>
                                                </tr>
                                                <tr>
                                                    <td>Description</td>
                                                    <td>
                                                        <textarea style="width:500px;height:200px;" name="txtDesc"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td>Upload Antifacts</td>
                                                    <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><input type="submit" value="Submit" name="submit"></td>
                                                </tr>
                                                

                                             </table
                                             </form>
                    </div>

                            </td>
                        </tr>
                    </table>
                    </table>
                  
                     
                    
                    <?php include 'fotter.php';?>
                </td>
            </tr>
        </table>
        

    </body>
</html>