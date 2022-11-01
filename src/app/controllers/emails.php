<?php 
require_once __DIR__ . '/../database/db.php';
require_once __DIR__ . '/../database/boot.php';

$allEmails = selectAll('emails');

//Добавление почты
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-add'])) {
    
    $email = trim($_POST['email']);

    if ($email === '') {
        flash('Заполните все поля!');
    } else {
        $existence = selectOne('emails', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email) {
            flash('Пользователь с такой почтой уже зарегистрирован');
        } else {

            $newEmail = [
                'email' => $email
            ];
        
            $id = insert('emails', $newEmail);
            $emails = selectOne('emails', ['id' => $id]);
            header('Location: ' . BASE_URL . 'admin/admin.php');
        }
    }
} else {
    $name = '';
    $email = '';
}

//Редактирование почты
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $emails = selectOne('emails', ['id' => $id]);
    $id = $emails['id'];
    $email = $emails['email'];
}

//Добавление почты
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-change'])) {
        
    $email = trim($_POST['email']);

    if ($email === '') {
        flash('Заполните все поля!');
    } else {
        $existence = selectOne('emails', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email) {
            flash('Пользователь с такой почтой уже зарегистрирован');
        } else {

            $newEmail = [
                'email' => $email
            ];
        
            $id = $_POST['id'];
            $emails_id = update('emails', $id, $newEmail);
            header('Location: ' . BASE_URL . 'admin/admin.php');
        }
    }
} 


//Удаление почты
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    delete('emails',$id);
    header('Location: ' . BASE_URL . 'admin/admin.php');

}
