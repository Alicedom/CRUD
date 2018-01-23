<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../model/database.php';

$id = $_POST["id"];

echo $id;

delete_employee_by_id($id);

header("Location: ../view/view_div.php");

