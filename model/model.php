<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Model {

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
            die("Connection failed: " . $conn->connect_error);
        }
        mysqli_set_charset($conn, 'utf8');
    }

    function disconnect() {

        global $conn;
// Nếu đã kêt nối thì thực hiện ngắt kết nối
        if ($conn) {
            mysqli_close($conn);
        }
    }

    function insert_employee($name, $des, $phone, $email, $addr, $image, $birth) {
        global $conn;
        connect();

        $stmt = $conn->prepare("INSERT INTO tb_employees(name, des, phone, email, addr, image, birth) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param($name, $des, $phone, $email, $addr, $image, $birth);

        $result = mysqli_query($conn, $stmt);

        return $result;
    }

    function get_all_employee() {
        global $conn;
        connect();

        $sql = "SELECT * FROM tb_employees";

        $result = mysqli_query($conn, $sql);

        return mysqli_fetch_all($result);
    }

    function get_employee($id) {
        global $conn;
        connect();

        //SQL injection
        $id = addslashes($id);

        $sql = "SELECT * "
                . "FROM tb_employees "
                . "WHERE id= '$id'";

        $result = mysqli_query($conn, $sql);

        return mysqli_fetch_array($result);
    }

    function update_employee($id, $name, $des, $phone, $email, $addr, $image, $birth) {
        global $conn;
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

        $sql = "UPDATE tb_employees "
                . "SET name='$name', des='$des', phone='$phone', email='$email',addr='$addr',image='$image',birth='$birth'"
                . "WHERE id= '$id'";

        $result = mysqli_query($conn, $sql);

        return $result;
    }

    function delete_employee($id) {
        global $conn;
        connect();
        $id = addslashes($id);

        $sql = "DELETE "
                . "FROM tb_employees "
                . "WHERE id= '$id'";

        $result = mysqli_query($conn, $sql);

        return $result;
    }

}
