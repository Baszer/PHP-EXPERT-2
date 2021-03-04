<?php
require "db.conn.php";
session_start();
error_reporting(0);
require "menu.php";

if (isset($_POST['form_add'])){

  $email = $_POST['form_email'];
  $FName = $_POST['form_FName'];
  $LName = $_POST['form_LName'];
  $password = $_POST['form_password'];
  $email = $_POST['form_email'];
  $telefoon = $_POST['form_telefoon'];
  $adres = $_POST['form_adres'];
  $location = $_POST['form_locatie'];
  $tijd = $_POST['form_time'];
  


  $sql = "INSERT INTO medewerkers (firstname, lastname, password, email, telefoonnummer, location, adress, birthdate) VALUES (:ph_FName,:ph_LName,:ph_password,:ph_email, :ph_telefoon,:ph_adres,  :ph_location ,:ph_birthdate)";
  $stmt = $db_conn->prepare($sql);
  $stmt->bindParam(":ph_FName", $FName);
  $stmt->bindParam(":ph_LName", $LName);
  $stmt->bindParam(":ph_email", $email);
  $stmt->bindParam(":ph_telefoon", $telefoon);
  $stmt->bindParam(":ph_password", $password);
  $stmt->bindParam(":ph_adres", $adres);
  $stmt->bindParam(":ph_location", $location);
  $stmt->bindParam(":ph_birthdate", $tijd);
  header("location: dashboardMedewerkers.php");
  $stmt->execute();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link href="CSS/login.css" rel="stylesheet">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>handige Mannen</title>
    <link href="CSS/nav.css">
</head>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
      <form class="d-flex">
        <button data-trigger="#my_offcanvas2" class="btn btn-warning" type="button" backgroundcolor="darkred">  Menu  </button>
      </form>%
    </div>
  </div>
</nav>
<body class="text-center">
    
    <main class="form-signin">
      <form method="post" action=" ">
        <h1 class="h3 mb-3 fw-normal">Medewerker toevoegen</h1>

        <input type="hidden" name="form_user" value="<?php echo  
         $_SESSION['id'] ?>">

        <label for="form_FName" class="visually-hidden">First name</label>
        <input type="FName" id="form_FName" class="form-control" name="form_FName" placeholder="Voornaam" required autofocus>

        <label for="form_LName" class="visually-hidden">Last name</label>
        <input type="LName" id="form_LName" class="form-control" name="form_LName" placeholder="Achternaam" required autofocus>

        <label for="form_email" class="visually-hidden">email</label>
        <input type="email" id="form_email" class="form-control" name="form_email" placeholder="Email address" required autofocus>

        <label for="form_password" class="visually-hidden">password</label>
        <input type="task" id="form_password" class="form-control" name="form_password" placeholder="Wachtwoord" required>

        <label for="form_telefoon" class="visually-hidden">phone number</label>
        <input type="task" id="form_telefoon" class="form-control" name="form_telefoon" placeholder="Telefoonnummer" required>
        
        <label for="form_adres" class="visually-hidden">Adress</label>
        <input type="adres" id="form_adres" class="form-control" name="form_adres" placeholder="Adres" required>

        <label for="form_locatie" class="visually-hidden">Location</label>
        <input type="location" id="form_locatie" class="form-control" name="form_locatie" placeholder="Locatie" required>

        <label for="form_time" class="visually-hidden">geboorte datum</label>
        <input type="date" id="form_time" class="form-control" name="form_time" placeholder="time" required>


        <button class="w-100 btn btn-lg btn-primary" name="form_add" type="submit">add</button>
        
      </form>
    </main>
    
    
        
    </body>

</html>