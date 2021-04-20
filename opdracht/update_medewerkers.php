<?php
require "db.conn.php";
session_start();
error_reporting(0);
require "menu.php";
$klusid = $_GET['id'];

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link href="CSS/login.css" rel="stylesheet">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <!-- <link href="CSS/tasks.css" rel="stylesheet"> -->
    <title>Dashboard Handige Mannen</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <link href="CSS/nav.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/starter-template/">
    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/ace718374c.js" crossorigin="anonymous"></script>
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>
  <body class="text-center">
 

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
      <form class="d-flex">
        <button data-trigger="#my_offcanvas2" class="btn btn-outline-success" type="button" backgroundcolor="darkred">  Menu  </button>
      </form>
    </div>
  </div>
</nav>
   
    <main class="form-signin">
      <form method="post" action=" ">
      <a href='dashboardMedewerkers.php' class='btn btn-primary'>Ga Terug</a>
      <?php

      $stmttasks = $db_conn->prepare("SELECT * FROM medewerkers WHERE id = '$klusid'");
      $stmttasks->execute();
        foreach($stmttasks as $rows){
            $uid = $rows['id'];
            $voornaam = $rows['firstname'];
            $achternaam = $rows['lastname'];
            $password = $rows['password'];
            $emailpf = $rows['email'];
            $telefoon = $rows['telefoonnummer'];
            $location = $rows['location'];
            $adres = $rows['adress'];
            $birthdate = $rows['birthdate'];
             echo '<h1 class="h3 mb-3 fw-normal">plan a task</h1>';
             echo 'voornaam';
             echo "<input type='text' class='form-control'  name='subject'  id='subject' value='$voornaam'>";
             echo 'achternaam';
             echo "<input type='text' class='form-control'  name='subject1' id='subject1' value='$achternaam'>";
             echo 'wachtwoord';
             echo "<input type='text' class='form-control'  name='subject2' id='subject2' value='$password'>";
             echo 'email';
             echo "<input type='text' class='form-control'  name='subject3' id='subject3' value='$emailpf'>";
             echo 'telefoon';
             echo "<input type='text' class='form-control'  name='subject4' id='subject4' value='$telefoon'>";
             echo 'Locatie';
             echo "<input type='text' class='form-control'  name='subject5' id='subject5' value='$location'>";
             echo 'Adres';
             echo "<input type='text' class='form-control'  name='subject6' id='subject6' value='$adres'>";
             echo 'Birthdate';             
             echo "<input type='date' class='form-control'  name='subject7' id='subject7' value='$birthdate'>";
         echo '<button class="w-100 btn btn-lg btn-primary" name="form_update" type="submit">Update</button>';
        }
      
      $voornaamv = ($_POST['subject']);
      $achternaamv = ($_POST['subject1']);
      $passwordv = ($_POST['subject2']);
      $emailpfv = ($_POST['subject3']);
      $telefoonv = ($_POST['subject4']);
      $locationv = ($_POST['subject5']);
      $adresv = ($_POST['subject6']);   
      $birthdatev = ($_POST['subject7']);
      
      
      $stmt0 = $db_conn->prepare("UPDATE medewerkers SET firstname = '$voornaamv' WHERE id = '$uid'");
      $stmt1 = $db_conn->prepare("UPDATE medewerkers SET lastname = '$achternaamv' WHERE id = '$uid'");
      $stmt2 = $db_conn->prepare("UPDATE medewerkers SET password = '$passwordv' WHERE id = '$uid'");
      $stmt3 = $db_conn->prepare("UPDATE medewerkers SET email = '$emailpfv' WHERE id = '$uid'");
      $stmt4 = $db_conn->prepare("UPDATE medewerkers SET telefoonnummer = '$telefoonv' WHERE id = '$uid'");
      $stmt5 = $db_conn->prepare("UPDATE medewerkers SET location = '$locationv' WHERE id = '$uid'");
      $stmt6 = $db_conn->prepare("UPDATE medewerkers SET adres = '$adresv' WHERE id = '$uid'");
      $stmt7 = $db_conn->prepare("UPDATE medewerkers SET birthdate = '$birthdatev' WHERE id = '$uid'");
      $stmt0->execute();
      $stmt1->execute();
      $stmt2->execute();
      $stmt3->execute();
      $stmt4->execute();
      $stmt5->execute();
      $stmt6->execute();
      $stmt7->execute();      
       ?>
        
   
        
      </form>
    </main>
 
  </body>
</html>
      



