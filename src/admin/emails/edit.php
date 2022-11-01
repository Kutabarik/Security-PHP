<?php
require_once __DIR__ . '/../../app/database/boot.php';
require_once __DIR__ . '/../../app/database/db.php'; 
require_once __DIR__ . '/../../app/controllers/emails.php'; ?>


<?php if ($_SESSION['role'] != 1) {
    header('Location: ' . BASE_URL);
} else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Green Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../../assets/img/favicon.png" rel="icon">
    <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../../assets/css/style.css" rel="stylesheet">
</head>

<body>

    <div class="border border-success">
        <?php require_once __DIR__ . '/../../views/header.php' ?>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-3">&nbsp;</div>
            <?php flash() ?>

    <div class="emails container mt-3 col-9">
        <div class="row title-table ">
            <h2>Edit email</h2>
        </div>
        <div class="row add-email">
            <form action="edit.php" method="post">
                <input type="hidden" name="id" value="<?=$id;?>">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <input type="email" name="email" class="form-control" value="<?=$email?>" >
                    </div>
                    <div class="col-auto">
                        <button type="submit" name="button-change" class="btn btn-success">Change mail</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php  } ?>