<?php
require "db.conn.php";
session_start();
error_reporting(0);



    if (isset($_POST['form_reparaties'])) {
        $titelv = $_POST['form_titel'];
        $datumv = $_POST['form_datum'];
        $tijdstipv = $_POST['form_tijdstip'];
        $opmerkingv = $_POST['form_opmerking'];
        $kostenv = $_POST['form_kosten'];
        $fietsidv = $_POST['form_fietsid'];
    

        $sql = "INSERT INTO reparatie (titel, datum, tijdstip, opmerking, kosten, fiets_id) VALUES (:ph_titel,:ph_datum,:ph_tijdstip,:ph_opmerking,:ph_kosten,:ph_fietsid)";
        $stmt = $db_conn->prepare($sql);
        $stmt->bindParam(":ph_titel", $titelv);
        $stmt->bindParam(":ph_datum", $datumv);
        $stmt->bindParam(":ph_tijdstip", $tijdstipv);
        $stmt->bindParam(":ph_opmerking", $opmerkingv);
        $stmt->bindParam(":ph_kosten", $kostenv);
        $stmt->bindParam(":ph_fietsid", $fietsidv);
        
        $stmt->execute();
    
           echo "<script>window.location.href='dashboardMedewerkers.php';</script>";
            exit;
          }
    
    ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <link href="CSS/login.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>fiets toevoegen</title>
    <link href="CSS/nav.css">
</head>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="dashboardMedewerkers.php">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form class="d-flex">
            <button data-trigger="#my_offcanvas2" class="btn btn-warning" type="button" backgroundcolor="darkred"> Menu </button>
        </form>
    </div>
    </div>
</nav>

<body class="text-center">

    <main class="form-signin">
        <form method="post" action=" ">
            <h1 class="h3 mb-3 fw-normal">reparatie toevoegen</h1>

            <input type="hidden" name="form_reparatie" value="<?php echo
                                                            $_SESSION['id'] ?>">

            <label for="form_titel" class="visually-hidden">titel</label>
            <input type="titel" id="form_titel" class="form-control" name="form_titel" placeholder="titel" required autofocus>

            <label for="form_datum" class="visually-hidden">Datum</label>
            <input type="date" id="form_datum" class="form-control" name="form_datum" placeholder="datum" required autofocus>

            <label for="form_tijdstip" class="visually-hidden">Tijdstip</label>
            <input type="time" id="form_tijdstip" class="form-control" name="form_tijdstip" placeholder="tijdstip" required autofocus>

            <label for="form_opmerking" class="visually-hidden">Opmerkingen</label>
            <input type="opmerking" id="form_opmerking" class="form-control" name="form_opmerking" placeholder="opmerking" required autofocus>

            <label for="form_kosten" class="visually-hidden">Kosten</label>
            <input type="kosten" id="form_kosten" class="form-control" name="form_kosten" placeholder="kosten" required>


            <label for="form_fietsid" class="visually-hidden">Fiets ID</label>
            <input type="fietsid" id="form_fietsid" class="form-control" name="form_fietsid" placeholder="fietsid" required>

            <button class="w-100 btn btn-lg btn-primary" name="form_reparaties" type="submit">add</button>

        </form>
    </main>



</body>

</html>