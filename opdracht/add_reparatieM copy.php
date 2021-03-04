<?php
require "db.conn.php";
session_start();
error_reporting(0);

if (isset($_POST['form_reparatie'])) {
    $titelv = $_POST['form_titel'];
    $datumv = $_POST['form_datum'];
    $tijdv = $_POST['form_tijd'];
    $opmerkingenv = $_POST['form_opmerkingen'];
    $kostenv = $_POST['form_kosten'];

    $sql = "INSERT INTO reparatie (titel, datum, tijd, opmerkingen, kosten) VALUES (:ph_titel,:ph_datum ,:ph_tijd,:ph_opmerkingen,:ph_kosten)";
    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(":ph_titel", $titelv);
    $stmt->bindParam(":ph_datum", $datumv);
    $stmt->bindParam(":ph_tijd", $tijdv);
    $stmt->bindParam(":ph_opmerkingen", $opmerkingenv);
    $stmt->bindParam(":ph_kosten", $kostenv);
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
    <title>fiets toevoegen</title>
    <link href="CSS/nav.css">
</head>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Dashboard</a>
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

            <input type="hidden" name="form_fiets" value="<?php echo
                                                            $_SESSION['id'] ?>">

            <label for="form_titel" class="visually-hidden">titel</label>
            <input type="titel" id="form_titel" class="form-control" name="form_titel" placeholder="titel" required autofocus>

            <label for="form_tijd" class="visually-hidden">tijd</label>
            <input type="time" id="form_tijd" class="form-control" name="form_tijd" placeholder="tijd" required autofocus>

            <label for="form_datum" class="visually-hidden">datum</label>
            <input type="date" id="form_datum" class="form-control" name="form_datum" placeholder="datum" required autofocus>

            <label for="form_opmerkingen" class="visually-hidden">Opmerkingen</label>
            <input type="opmerkingen" id="form_opmerkingen" class="form-control" name="form_opmerkingen" placeholder="opmerkingen" required autofocus>

            <label for="form_kosten" class="visually-hidden">Kosten</label>
            <input type="kosten" id="form_kosten" class="form-control" name="form_kosten" placeholder="kosten" required>




            <button class="w-100 btn btn-lg btn-primary" name="form_reparatie" type="submit">add</button>

        </form>
    </main>



</body>

</html>