<?php
require_once __DIR__ . '/../database/db.php';
require_once __DIR__ . '/../database/boot.php';

$message = '';

function userAuth($arr){
    $_SESSION['id'] = $arr['id'];
    $_SESSION['name'] = $arr['name'];
    $_SESSION['role'] = $arr['role'];

    if ($_SESSION['role']) {
        header('Location: ' . BASE_URL . 'admin/admin.php');
    } else {
        header('Location: ' . BASE_URL);
    }
}

//Регистрация пользователя
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);
    $role = 0;

    $emailPattern = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i';
    $namePattern = '/^[A-Za-z]{3,20}$/i';
    $passPattern = '/^[A-Za-z0-9%$;_]{4,30}$/i';

    if ($name === '' || $email === '' ||$pass === '') {
        flash('Заполните все поля!');
    } elseif (!preg_match($namePattern, $name)) {
        flash('The name must contain from 3 to 20 characters');
    } elseif (!preg_match($emailPattern, $email)) {
        flash('Email is incorrect');
    } elseif (!preg_match($passPattern, $pass)) {
        flash('The password must be at least 4 characters and may contain %$_; characters.');
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email) {
            flash('Пользователь с такой почтой уже зарегистрирован');
        } else {
            $pass = password_hash($pass, PASSWORD_DEFAULT);

            $post = [
                'role' => $role,
                'name' => $name,
                'email' => $email,
                'password' => $pass,
            ];

            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);
            userAuth($user);
        }
    }
} else {
    $name = '';
    $email = '';
}

//Авторизация пользователя
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {

    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    if ( $email === '' ||$pass === '') {
        flash('Заполните все поля!');
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if ($existence && password_verify($pass, $existence['password'])) {
            userAuth($existence);
        } else {
            flash('Данные введены неверно');
        }
    }
}else {
    $email = '';
}







