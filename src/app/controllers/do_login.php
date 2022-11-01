<?php

require_once __DIR__ . '../database/boot.php';

// проверяем наличие пользователя с указанным юзернеймом
$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `name` = :name");
$stmt->execute(['name' => $_POST['name']]);
if (!$stmt->rowCount()) {
    flash('Пользователь с такими данными не зарегистрирован');
    header('Location: ../views/login.php');
    die;
}
$user = $stmt->fetch(PDO::FETCH_ASSOC);


if (password_verify($_POST['password'], $user['password'])) {
    if (password_needs_rehash($user['password'], PASSWORD_DEFAULT)) {
        $newHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = pdo()->prepare('UPDATE `users` SET `password` = :password WHERE `name` = :name');
        $stmt->execute([
            'email' => $_POST['email'],
            'password' => $newHash,
        ]);
    }
    $_SESSION['user_id'] = $user['id'];
    header('Location: ../views/user.php');
    die;
}

flash('Пароль неверен');
header('Location: ../views/login.php');
