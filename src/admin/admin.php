<?php 
require_once __DIR__ . '/../app/database/boot.php';
require_once __DIR__ . '/../app/database/db.php';
require_once __DIR__ . '/../app/controllers/emails.php'; ?>

<?php if ($_SESSION['role'] == 0) {
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

<div class="border border-success">
<?php require_once __DIR__.'/../views/header.php'?>

</div>

<div class="emails container mt-3 col-9">
    <?php if ($_SESSION['role'] == 1): ?>
        <div class="button mb-3 row">
            <a class="btn btn-success btn-sm col-1 me-3" href="<?php echo BASE_URL . 'admin/emails/add.php'?>">Add Email</a>
        </div>
    <?php endif; ?>
    <div class="row title-table ">
        <div class="col-1">ID</div>
        <div class="col-5">Email</div>
        <div class="col-2">Date</div>
        <?php if ($_SESSION['role'] == 1): ?>
            <div class="col-4">Control</div>         
        <?php endif; ?>
        
    </div>
    <?php foreach ($allEmails as $key => $mail):?>
    <div class="row email">
        <div class="id col-1"> <?=$key + 1;?> </div>
        <div class="email col-5"> <?=$mail['email'];?> </div>
        <div class="date col-2"> <?=$mail['date'];?> </div>
        <?php if ($_SESSION['role'] == 1): ?>
            <div class="edit col-2"><a href="../admin/emails/edit.php?id=<?=$mail['id'];?>">Edit</a></div>
            <div class="del  col-2"><a href="../admin/emails/edit.php?del_id=<?=$mail['id'];?>" class="text-danger">Delete</a></div>         
        <?php endif; ?>
        
    </div>
<?php endforeach; ?>

</div>
<?php  } ?>