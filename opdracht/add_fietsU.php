<?php
require "db.conn.php";
session_start();
error_reporting(0);

if (isset($_POST['form_fiets'])) {
    $merkv = $_POST['form_merk'];
    $modelv = $_POST['form_model'];
    $typev = $_POST['form_type'];
    $kleurv = $_POST['form_kleur'];
    $remsoortv = $_POST['form_rem'];

    $sql = "INSERT INTO fiets (merk, model, type, kleur, rem) VALUES (:ph_merk,:ph_model,:ph_type,:ph_kleur,:ph_remsoort)";
    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(":ph_merk", $merkv);
    $stmt->bindParam(":ph_model", $modelv);
    $stmt->bindParam(":ph_type", $typev);
    $stmt->bindParam(":ph_kleur", $kleurv);
    $stmt->bindParam(":ph_remsoort", $remsoortv);
    header("location: dashboard.php");

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

            <label for="form_merk" class="visually-hidden">Merk</label>
            <input type="merk" id="form_merk" class="form-control" name="form_merk" placeholder="merk" required autofocus>

            <label for="form_model" class="visually-hidden">Model</label>
            <input type="model" id="form_model" class="form-control" name="form_model" placeholder="model" required autofocus>

            <label for="form_type" class="visually-hidden">Type</label>
            <input type="type" id="form_type" class="form-control" name="form_type" placeholder="type" required autofocus>

            <label for="form_kleur" class="visually-hidden">Kleur</label>
            <input type="kleur" id="form_kleur" class="form-control" name="form_kleur" placeholder="kleur" required>

            <label for="form_rem" class="visually-hidden">Rem soort</label>
            <input type="rem" id="form_rem" class="form-control" name="form_rem" placeholder="rem" required>


            <button class="w-100 btn btn-lg btn-primary" name="form_fiets" type="submit">add</button>

        </form>
    </main>



</body>

</html>