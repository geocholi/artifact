<?php require_once "connect.php"; ?>


<?php

session_start();

$pg = $_GET['pg'];
$id = $_GET['sql'];

$_SESSION["id"] = $_GET['sql'];

$xID = $_SESSION["id"] ;

   $sql = "Select * from users where id='$id'";
    
    $result = mysqli_query($conn, $sql); 
    $num = mysqli_num_rows($result);

    while($row = mysqli_fetch_assoc($result)) {

        $txtFname=  $row["fname"];
        $txtLname=  $row["lname"];

     }

     if ($pg == 6)

        {
            $id = $_GET['sql'];
            $pstID = $_GET['PstID'];
            $Xid = $_GET['s'];
            $sql = "UPDATE content_tble SET xApproval='$Xid' WHERE id='$pstID'";
            $result = mysqli_query($conn, $sql); 

            echo " <script language='JavaScript'>
            location.href='contents.php?sql=$id';
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
                               <table style="margin-top:20px;" width="1000px" border="1px">
                                    <tr>
                                        <td wdith="100%">                                                 
                                           

                                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

                                        <table id="myTable" wdith="100%">
                                        <tr class="header">
                                            <th style="width:60%;">Title</th>
                                            <th style="width:40%;">Location</th>
                                            <th style="width:40%;">&nbsp;</th>
                                            <th style="width:40%;">&nbsp;</th>
                                        </tr>
    
<?php

$sql = "Select * from content_tble";
$result = mysqli_query($conn, $sql); 
 $num = mysqli_num_rows($result);


while($row = mysqli_fetch_assoc($result)) {
    $xg = $row["xApproval"];

?>
                                         <tr>
                                            <td><?php echo $row["title"]; ?></td>
                                            <td><?php echo $row["location"]; ?></td>
                                            <td><a style="color:#000" href= "viewcontents.php?PstID=<?php echo $row["id"];?>&&pg=6&&sql=<?php echo $id;?>">View</a></td>
                                            <td>
                                                <?php
                                                if($row["xApproval"] == "0")
                                                    {
                                                ?>
                                                    <a style="color:#000" href= "contents.php?PstID=<?php echo $row["id"];?>&&pg=6&&s=1&&sql=<?php echo $id;?>">Approve  </a>
                                                <?php
                                                    }
                                                else
                                                    {
                                            ?>
                                                <a style="color:#000" href= "contents.php?PstID=<?php echo $row["id"];?>&&pg=6&&s=0&&sql=<?php echo $id;?>">Dis-Approve</a>
                                                <?php
                                                    }
                                                ?>
                                                                                      
                                            </td>
                                        </tr>
<?php

                                            

     }
?>
                                       
                                        </table>


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