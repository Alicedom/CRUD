<?php

//including the database connection file
require_once("connect.php");
$id = $_GET["id"];
//$id = addslashes($id);
$query = mysqli_query($conn, "DELETE FROM tb_employees WHERE id= $id");
header("Location: ..\view\view.php");
