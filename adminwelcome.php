<?php
// Include config file
require_once "connect.php";

$pg = $_GET['pg'];
$sql= $_GET['sql'];
$id = $_GET['sql'];


$sql = "Select * from admin_tble where id='$id'";
    
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
                <table height="200px" bgcolor="#000" width="100%">
                    <tr>
                        <td valign="top"><h1 style="color:#fff">Admnistrator Portal</h1></td>
                        <td valign="top"> </td>                     
                       
                    </tr>
                    <tr>
                        <td colspan="2" style="color:#fff" align="center">
                            <table style="color:#fff">
                                <tr>
                                    <td><a href="index.php">Home |</a> </td>
                                    <td><a href="exhibition.php">Exhibitions | </a></td>
                                    <td><a href="blog.php">Blog | </a> </td>
                                    <td><a href="membership.php">Membership | </a></td>
                                    <td><a href="#">Support Us </a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </table>

                <table witdth="100%">
                        <tr>
                            <td valign="top">
                                 <div class="vertical-menu">
                                 <a href="adminwelcome.php?sql=<?php echo $id ; ?>" class="active">Home</a>
                                    <a href="userlisting.php?sql=<?php echo $id ; ?>">Users Log</a>
                                    <a href="contents.php?sql=<?php echo $id ; ?>">Contents</a>
                                    <a href="adminusers.php?sql=<?php echo $id ; ?>">Admin Users</a>
                                    <a href="index.php">Log out</a> 
                                </div>
                            </td>
                            <td valign="top" style="padding-left:20px"  width="90%">
                                <h3>Welcome <?php echo $txtFname ." ". $txtLname; ?></h3>
                               <p style="width:400px;font-family:Tahoma">
                                Welcome to the Admin Portal 
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