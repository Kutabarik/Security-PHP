<?php
require_once __DIR__ . '/../app/database/boot.php';
require_once __DIR__ . '/../app/controllers/users.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Register</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="col-md-3 col-sm-3 col-xs-3">&nbsp;</div>
    <?php flash() ?>
    <?php flash_success() ?>

    <div class="form mb-5">
        <form class="form-horizontal" role="form" method="post" action="register.php">
            <h1 class="text-center h3 mt-5 mb-3 font-weight-normal">Please sign in</h1>

            <div class="mb-4">
                <input type="text" class="input-form input-name-form form-control" id="name" name="name" value="<?= $name ?>" placeholder="Name">
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    The name must contain from 3 to 20 characters
                </div>
            </div>
            <div class="mb-4">
                <input type="text" class="input-form input-email-form form-control" id="email" name="email" value="<?= $email ?>" placeholder="Email">
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    Please, enter email.
                </div>
            </div>
            <div class="mb-4">
                <input type="password" class="input-form input-pass-form form-control" id="password" name="password" placeholder="Password">
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    The password must be at least 4 characters and may contain %$_; characters.
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="button-reg btn btn-success" name="button-reg">Register</button>
                <a class="btn btn-outline-success" href="login.php">Login</a>
            </div>
        </form>
    </div>

    <script src="../assets/js/validation.js"></script>

</body>

</html>