<?php
include "db.conn.php";
session_start();
$stmt = $db_conn->prepare("SELECT * FROM fiets WHERE id = '$fiets_id'");
$stmt->execute();
$fiets_id = $_SESSION['id'];
error_reporting(0);
require "menuUser.php";
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <!-- <link href="CSS/tasks.css" rel="stylesheet"> -->
    <title>Starter Template · Bootstrap v5.0</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="CSS/nav.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/starter-template/">
    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<script src="https://kit.fontawesome.com/ace718374c.js" crossorigin="anonymous"></script>
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


  

    
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>
  <body>
 

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
      <form class="d-flex">
        <button data-trigger="#my_offcanvas2" class="btn btn-warning" type="button" backgroundcolor="darkred">  Menu  </button>
      </form>
    </div>
  </div>
</nav>
<div class="container">
 <div class="card">
   <div class="card-head">
     <h3>Mijn Fiets reparaties</h3>
    </div>
    <table class="tableTasks">
                <tr>
                    <th>titel</th>
                    <th>datum</th>
                    <th>tijdstip</th>
                    <th>opmerkingen</th>
                    <th>kosten</th>
               
                    
    </tr>
  
                <?php
                       $stmttasks = $db_conn->prepare("SELECT * FROM reparatie WHERE user_id = '$fiets_id'");
                       $stmttasks->execute();
                         foreach($stmttasks as $rows){
                        
                          $idname = $rows['id'];
                            echo "<tr><td>" . $rows['titel']."</td>";
                            echo "<td>" . $rows['datum']."</td>";
                            echo "<td>" . $rows['tijdstip']."</td>";
                            echo "<td>" . $rows['opmerkingen']."</td>";
                            echo "<td>" . $rows['kosten']."</td></tr>";
                             }
                       ?>
       
          </table>
          
      </div>
                          </div>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
 
  </body>
</html>
      



