<?php

require_once __DIR__ . '/../database/boot.php';
require_once __DIR__ . '/../database/db.php';

unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['role']);

header('Location: ' . BASE_URL);