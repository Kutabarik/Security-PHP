<?php 
session_start();
require_once 'boot.php';

//Проверка выполнения запроса к БД
function dbErrorCheck($query){
    $errInfo = $query->errorInfo();

    if ($errInfo[0] != PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
}

//Запрос SELECT ко всем данным таблицы
function selectAll($table, $params = []) {

    $sql = "SELECT * FROM $table";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key = $value";
            } else {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }

    $query = pdo()->prepare($sql);
    $query->execute();
    dbErrorCheck($query);

    return $query->fetchAll();
}

//Запрос SELECT на получение одной записи
function selectOne($table, $params = []) {

    $sql = "SELECT * FROM $table";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key = $value";
            } else {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }

    $sql = $sql . " LIMIT 1";

    $query = pdo()->prepare($sql);
    $query->execute();
    dbErrorCheck($query);

    return $query->fetch();
}

//Запись в БД
function insert($table, $params){
    $i = 0;
    $coll = '';
    $mask = '';
 
    foreach ($params as $key => $value) {
        if ($i === 0 ) {
            $coll = $coll . "$key";
            $mask = $mask . "'" . "$value" . "'";
        } else {
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value" . "'";
        }
        $i++;
    }

    $sql = "INSERT INTO `$table` ($coll) VALUES ($mask);";

    $query = pdo()->prepare($sql);
    $query->execute();
    dbErrorCheck($query);

    return pdo()->lastInsertId();
}

//обновление данных в таблице
function update($table, $id, $params){
    $i = 0;
    $str = '';
 
    foreach ($params as $key => $value) {
        if ($i === 0 ) {
            $str = $str . "`" . $key . "`" . " = '" . $value . "'" ;
        } else {
            $str = $str . ", `" . $key . "`" . " = '" . $value . "'" ;
        }
        $i++;
    }

    $sql = "UPDATE `$table` SET $str WHERE `id` = $id";
    
    $query = pdo()->prepare($sql);
    $query->execute();
    dbErrorCheck($query);
}

//Удаление строки из таблицы
function delete($table, $id){
    $sql = "DELETE FROM `$table` WHERE `id` = $id";
    
    $query = pdo()->prepare($sql);
    $query->execute();
    dbErrorCheck($query);
}
