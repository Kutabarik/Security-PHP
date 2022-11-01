<?php
require_once 'db.php';

define('BASE_URL', 'http://localhost/green/');

function pdo(): PDO
{
    static $pdo;

    if (!$pdo) {
        $config = include __DIR__ . '/config.php';

        $dsn = 'mysql:dbname=' . $config['db_name'] . ';host=' . $config['db_host'];
        $pdo = new PDO($dsn, $config['db_user'], $config['db_pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    return $pdo;
}

function flash(?string $message = null)
{
    if ($message) {
        $_SESSION['flash'] = $message;
    } else {
        if (!empty($_SESSION['flash'])) { ?>
            <div class="alert alert-danger mb-5">
                <?= $_SESSION['flash'] ?>
            </div>
<?php }
        unset($_SESSION['flash']);
    }
}

function flash_success(?string $message = null)
{
    if ($message) {
        $_SESSION['flash_success'] = $message;
    } else {
        if (!empty($_SESSION['flash_success'])) { ?>
            <div class="alert alert-success mb-5">
                <?= $_SESSION['flash_success'] ?>
            </div>
<?php }
        unset($_SESSION['flash_success']);
    }
}

function check_auth(): bool
{
    return !!($_SESSION['user_id'] ?? false);
}

function print_arr($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}
