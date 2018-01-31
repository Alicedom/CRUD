<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
global $conn;
    
function connect() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myDB";
    global $conn;
// Create connection
    if (!$conn) {
        $conn = new mysqli($servername, $username, $password, $dbname);
    }
// Check connection
    if ($conn->connect_error) {

        $conn = new mysqli($servername, $username, $password);
        mysqli_query($conn, "create database IF NOT EXISTS mydb;");
        $conn = mysqli_select_db($conn, "mydb");
        mysqli_query($conn, "CREATE TABLE if not exist`employees2` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `name` text COLLATE utf8_unicode_ci,
              `des` text COLLATE utf8_unicode_ci,
              `phone` text COLLATE utf8_unicode_ci,
              `email` text COLLATE utf8_unicode_ci,
              `addr` text COLLATE utf8_unicode_ci,
              `image` text COLLATE utf8_unicode_ci,
              `birth` date DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
        die("Connection failed: " . $conn->connect_error);
    }
    mysqli_set_charset($conn, 'utf8');
}

function disconnect() {

    $conn;
// Nếu đã kêt nối thì thực hiện ngắt kết nối
    if ($conn) {
        mysqli_close($conn);
    }
}

function insert_employee($name, $des, $phone, $email, $addr, $image, $birth) {

    global $conn;
    connect();
    $stmt = mysqli_prepare($conn, "INSERT INTO employees2(name, des, phone, email, addr, image, birth) VALUES (?,?,?,?,?,?,?)");
    mysqli_stmt_bind_param($stmt, "sssssss", $name, $des, $phone, $email, $addr, $image, $birth);
    $result = mysqli_stmt_execute($stmt);

    return $result;
}

function get_all_employee() {
    global $conn;    
    
    connect();

    $result = mysqli_query($conn, "SELECT * FROM employees2");

    return mysqli_fetch_all($result);
}

function get_employee($id) {
    $conn;
    connect();

    //SQL injection
    $id = addslashes($id);

    $sql = "SELECT * "
            . "FROM employees2 "
            . "WHERE id= '$id'";

    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_array($result);
}

function update_employee($id, $name, $des, $phone, $email, $addr, $image, $birth) {
    $conn;
    connect();

// Chống SQL Injection    
    $id = addslashes($id);
    $name = addslashes($name);
    $des = addslashes($des);
    $phone = addslashes($phone);
    $email = addslashes($email);
    $addr = addslashes($addr);
    $image = addslashes($image);
    $birth = addslashes($birth);

    $sql = "UPDATE employees2 "
            . "SET name='$name', des='$des', phone='$phone', email='$email',addr='$addr',image='$image',birth='$birth'"
            . "WHERE id= '$id'";

    $result = mysqli_query($conn, $sql);

    return $result;
}

function delete_employee_by_id($id) {
    $conn;
    connect();

    $id = addslashes($id);

    $sql = "DELETE FROM employees2 WHERE id= '$id'";

    echo $sql;
    $result = mysqli_query($conn, $sql);

    return $result;
}
