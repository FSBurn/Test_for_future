<?php
$servername = "Localhost";
$database = "future_db";
$username = "root";
$password = "root";

$link = mysqli_connect($servername, $username, $password,$database);
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully";

// ------Создаем базу future ---------

//$crdb = "CREATE DATABASE future_db CHARACTER SET utf8 COLLATE utf8_general_ci";
//if (mysqli_query($link, $crdb)) {
//    echo "База future_db успешно создана\n";
//} else {
//    echo 'Ошибка при создании базы данных: ' . mysqli_error($link) . "\n";
//}

//----- Создаем таблицу test --------


//$crt = "CREATE TABLE test (
//        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//        name VARCHAR(30) NOT NULL,
//        msg TEXT (255) NOT NULL,
//        time DATETIME DEFAULT CURRENT_TIMESTAMP
//        )";
//if(mysqli_query($link, $crt)){
//    echo "Таблица test успешно создана\n";
//} else {
//    echo 'Ошибка при создании таблицы: ' . mysqli_error($link) . "\n";
//}


function clearStr($data){
    global $link;
    $data = trim(strip_tags($data));
    return mysqli_real_escape_string($link,$data);
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = clearStr($_POST["name"]);
    $msg = clearStr($_POST["msg"]);
    $sql = "INSERT INTO test (name, msg) VALUES ('$name', '$msg')";
    mysqli_query($link,$sql);
    header("Location: "  . $_SERVER["REQUEST_URI"]);
    exit;
}


