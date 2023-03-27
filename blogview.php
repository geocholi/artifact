<?php
// Include config file
require_once "connect.php";

?>
<html>
    <head>
        <title>Welcome to Antifacts</title>
    </head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/main.css">
    <body bgcolor="#f0f0f0">
        <table align="center" width="80%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                <?php include 'banner.php';?>

                <table width="100%">
                        <tr>
                            <td valign="top" style="font-family: Verdana, Geneva, Tahoma, sans-serif;font-size:12px;"><br>
                            <h1>Online Community</h1>

 <?php

$sql = "Select * from content_tble order by ID desc";
$result = mysqli_query($conn, $sql); 
$num = mysqli_num_rows($result);

while($row = mysqli_fetch_assoc($result)) {

    $title= $row["title"];
    $location= $row["location"];
    $msg= $row["msg"];
    $xDate = $row["xDate"];
    $img = $row["pic"];


?>              
                                <div class="container">
                                        <table align="left" style="margin-right:10px;">
                                        <tr>
                                            <td align="left">
                                                <img src="pictures/<?php echo $img ?>" width="200px;">
                                            </td>
                                        </tr>
                                    </table>
                                    <b>Title</b>:  <?php echo $title; ?><br><br>
                                    <b>Dated Posted</b>:  <?php echo $xDate; ?><br><br>
                                    <b>Location</b>:  <?php echo $location; ?><br><br>
                                    <b>Story</b>:  <?php echo $msg; ?>
                                  </div>
                                  
                                 <br><br>
<?php

   
}

?>
                                  
                    
                            </td>
                        </tr>
                    </table>
                     
                    
                    <?php include 'fotter.php';?>
                </td>
            </tr>
        </table>
        

    </body>
</html>