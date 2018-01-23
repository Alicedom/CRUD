<?php

require '../model/database.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = test_input($_POST["id"]);
    $name = test_input($_POST["name"]);
    $des = test_input($_POST["des"]);
    $phone = test_input($_POST["phone"]);
    $email = test_input($_POST["email"]);
    $addr = test_input($_POST["addr"]);
    $image = test_input($_POST["image"]);
    $birth = test_input($_POST["birth"]);
    echo $_POST["id"];
    echo $id;
    update_employee($id,$name, $des, $phone, $email, $addr, $image, $birth);
    return header("Location: view.php");
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}