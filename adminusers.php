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

 if ($pg == 7)

 {

    $txtFname = $_POST['txtFname'];
    $txtLname = $_POST['txtLname'];
    $txtEmail = $_POST['txtEmail'];
    $txtPassword = $_POST['txtPassword'];
    $pstID = $_POST['txtID'];
    
    $sql = "INSERT INTO admin_tble (fname, lname, email, xpassword) VALUES ('$txtFname', '$txtLname', '$txtEmail', '$txtPassword')";
    $result = mysqli_query($conn, $sql);

     echo " <script language='JavaScript'>
     location.href='adminusers.php?sql=$pstID';
     </script>";

 }

?>
<?php

 if ($pg == 6)

    {
        $pstID = $_GET['PstID'];
        $id = $_GET['sql'];
        $s = $_GET['s'];
       $sql = "UPDATE admin_tble SET xApproval='$id' WHERE id='$pstID'";
        $result = mysqli_query($conn, $sql); 

        echo " <script language='JavaScript'>
        location.href='adminusers.php?sql=$s';
        </script>";

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
                            <td valign="top" width="20%">
                            <div class="vertical-menu">
                                    <a href="adminwelcome.php?sql=<?php echo $id ; ?>" class="active">Home</a>
                                    <a href="userlisting.php?sql=<?php echo $id ; ?>">Users Log</a>
                                    <a href="contents.php?sql=<?php echo $id ; ?>">Contents</a>
                                    <a href="adminusers.php?sql=<?php echo $id ; ?>">Admin Users</a>
                                    <a href="index.php">Log out</a> 
                                </div>
                            </td>
                            <td valign="top" style="padding-left:20px"  width="80%">
                                <h3>Welcome <?php echo $txtFname ." ". $txtLname; ?></h3>
                               <p style="width:400px;font-family:Tahoma">
                               <a href="adminusers.php?PstID=<?php echo $id ; ?>&&pg=3&&sql=1" style="color:red;text-decoration:underline;"> Create User</a>
                               <table style="margin-top:20px;" width="1000px" border="1px">
                                    <tr>
                                        <td wdith="100%">                                                 
                                          

<?php

 if ($pg ==3)
 
 {
?>

                            <form action="adminusers.php?pg=7" method="post" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td>FirstName</td>
                                        <td>
                                            <input type="text" name="txtFname"> 
                                            <input type="hidden" name="txtID" value="<?php echo $id ;?>">
                                        </td>
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
                                        <td colspan="2"><input type="submit" value="Create account" name="submit"></td>
                                    </tr>

                                    
                                </table
                                </form>

<?php

 }
?>

<?php
if ($pg !=3)
{
?>
                                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

                                        <table id="myTable" wdith="100%">
                                        <tr class="header">
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>&nbsp;</th>
                                        </tr>
    
    <?php

   $sql = "Select * from admin_tble";
    $result = mysqli_query($conn, $sql); 
    $num = mysqli_num_rows($result);
    if ($num == 0)

        {
    
    ?>
                                        <tr>
                                                <td colspan="4"> No record Found</td>
                                        </tr>

<?php


        }
    else
        {
    

    while($row = mysqli_fetch_assoc($result)) {

    ?>



                                        <tr>
                                            <td><?php echo $row["fname"]; ?></td>
                                            <td><?php echo $row["lname"]; ?></td>
                                            <td><?php echo $row["email"]; ?></td>
                                
                                            <td>
                                                <?php
                                                if($row["xApproval"] == "0")
                                                    {
                                                ?>
                                                    <a style="color:#000" href= "adminusers.php?PstID=<?php echo $row["id"]; ?>&&pg=6&&sql=1&&s=<?php echo $id ;?>">Approve  </a>
                                                <?php
                                                    }
                                                else
                                                    {
                                            ?>
                                                <a style="color:#000" href= "adminusers.php?PstID=<?php echo $row["id"]; ?>&&pg=6&&sql=0&&s=<?php echo $id ;?>">Dis-Approve</a>
                                                <?php
                                                    }
                                                ?>
                                                                                      
                                            </td>
                                        </tr>
<?php

}  

     }
?>
                                         </table>
                            
<?php   

}   
?>


                             </p>
                               
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