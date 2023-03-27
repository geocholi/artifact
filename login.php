<?php
// Include config file
require_once "connect.php";

$pg = $_GET['pg'];
$sql= $_GET['sql'];

if ($pg == 2)

{


    $txtEmail = $_POST["txtEmail"];
    $txtPassword = $_POST["txtPassword"]; 
    $date =  'current_timestamp()';
             
     
    $sql = "Select * from users where email='$txtEmail' and xpassword = '$txtPassword'";
     
     $result = mysqli_query($conn, $sql); 
     $num = mysqli_num_rows($result);
 
     while($row = mysqli_fetch_assoc($result)) {
 
         $customerID =  $row["id"];
 
      }
 
     if ($num != 0)
         {
             echo " <script language='JavaScript'>
             location.href='welcome.php?sql=$customerID';
             </script>";
 
         }
 
     else
 
         {
            $sql="Incorrect login details! Try again";
             echo " <script language='JavaScript'>
             location.href='login.php?sql=$sql';
             </script>";
 
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
                        <h2>Login</h2>
                                <p style="color:red;">&nbsp; <?php echo $sql; ?></p>

                                <form action="login.php?pg=2" method="post" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td>Email Address</td>
                                        <td><input type="text" name="txtEmail"></td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td><input type="password" name="txtPassword"></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2"><input type="submit" value="Login" name="submit"></td>
                                    </tr>

                                    
                                </table
                                </form>
                     
                    
                    <?php include 'fotter.php';?>
                </td>
            </tr>
        </table>
        

    </body>
</html>