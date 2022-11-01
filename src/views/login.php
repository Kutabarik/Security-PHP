<?php 
require_once __DIR__ . '/../app/database/boot.php';
require_once __DIR__ . '/../app/controllers/users.php';


if (check_auth()) {
    header('Location: user.php');
    die;
}
?>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<link href="../assets/css/style.css" rel="stylesheet">

<h1 class="text-center h3 mt-5 mb-3 font-weight-normal">Login</h1>

<?php flash() ?>
<div class="form">

    <form method="post" action="login.php">
        
        <div class="mb-4">
            <input type="email" class="form-control" id="email" name="email" value="<?=$email?>" placeholder="Email">
        </div>
        <div class="mb-4">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success" name="button-log">Login</button>
            <a class="btn btn-outline-success" href="register.php">Register</a>
        </div>
    </form>
</div>
