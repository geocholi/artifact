<?php
// Include config file
require_once "connect.php";

$pg = $_GET['pg'];
$sql= $_GET['sql'];
$id = $_GET['sql'];


$sql = "Select * from users where id='$id'";
    
    $result = mysqli_query($conn, $sql); 
    $num = mysqli_num_rows($result);

    while($row = mysqli_fetch_assoc($result)) {

        $txtFname=  $row["fname"];
        $txtLname=  $row["lname"];

     }



?>
<html>
    <head>
        <title>Welcome to Antifacts</title>
    </head>
    
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/main.css">
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
                            <td valign="top" style="padding-left:20px"  width="90%">
                                <h3>Welcome <?php echo $txtFname ." ". $txtLname; ?></h3>
                               <p style="width:400px;font-family:Tahoma">
                                This is a Mini profile where you can upload Antifacts,  
                                giving detail meaning of each Antifacts for online users to review
                             </p>
                               
                            </td>
                        </tr>
                    </table>
                  
                     
                    
                    <?php include 'fotter.php';?>
                </td>
            </tr>
        </table>
        

    </body>
</html>