<?php
session_start();
include "db.conn.php";

error_reporting(0);
require "menuUser.php";
$userid = $_SESSION['id'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php




echo "Beste " . $_GET['klantnaam'] , " uw fietsreparatie is klaar en kost " .  $_GET['kosten']; 

        


      
        
?>
        
      </table>


</body>
</html>