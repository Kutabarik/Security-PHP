<?php require_once __DIR__.'/app/database/db.php'?>

<?php require_once __DIR__.'/app/controllers/emails.php'?>

<?php require_once __DIR__.'/views/head.php'?>

<?php require_once __DIR__.'/views/header.php'?>

<div class="mail-form container">
    <form class="email-form" action="form.php" method="POST">
        <div class="mb-3">
            <h2 class="text-center mb-5">Enter your Email address to get better news! </h2>
            <input type="email" class="form-control mx-auto mb-5" name="email">
            <div class="d-grid gap-2 col-2 mx-auto">
                <button type="submit" class="btn btn-success" name="button-add">Submit</button>
            </div>
            </div>
    </form>
</div>
<script src="/assets/js/validation.js"></script>
