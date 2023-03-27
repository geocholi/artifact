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
                    <table>
                        <tr>
                            <td valign="top">
                                
                                <img src="images/1.png">
                            </td>
                        </tr>
                    </table>
                     <table>
                        <tr>
                            <td valign="top">
                                <table align="left" style="padding-right:10px;">
                                    <tr>
                                        <td align="left"><img src="images/2.png" height="200px;"></td>
                                    </tr>
                                </table>
                                <Span style="font-size:30px;font-weight:bold">Welcome to Artifact</span><br>
                                An artifact is an object made by a human being. Artifacts include art, tools, and clothing made 
                                by people of any time and place. The term can also be used to refer to the remains of an object, 
                                such as a shard of broken pottery or glassware.<br><br>

                                Artifacts are immensely useful to scholars who want to learn about a culture.
                                 Archaeologists excavate areas in which ancient cultures lived and use the artifacts 
                                 found there to learn about the past. Many ancient cultures did not have a written
                                  language or did not actively record their history, so artifacts sometimes provide 
                                  the only clues about how the people lived.
                                
                            </td>
                        </tr>
                    </table>
                    <table width="100%">
                        <tr>
                            <td valign="top" style="font-family: Verdana, Geneva, Tahoma, sans-serif;font-size:12px;"><br>
                            <h1>Antifacts</h1>
                            <?php

$sql = "Select * from content_tble order by ID desc";
$result = mysqli_query($conn, $sql); 
$num = mysqli_num_rows($result);

while($row = mysqli_fetch_assoc($result)) {

?>              
                                <div class="container">
                                <img src="pictures/<?php echo $row["pic"]; ?>" alt="Avatar" style="width:90px">
                                <b><p><span><?php echo $row["title"]; ?></span> <?php echo $row["location"]; ?></p></b>
                                    <p>
                                    <?php echo $row["msg"]; ?>  
                                         
                                   </p>
                                   <span>
                                    <input type="button" value="Read More >>" width="300px;" style="background-color: $000;color:$fff;width: 200px;height: 30px;" onclick="window.location.href='blogview.php?id=<?php echo $row["id"]; ?>';">
                                  </span>
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