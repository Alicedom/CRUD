<?php

require_once '../model/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $birth = test_input($_POST["birth"]);
    $phone = strval(test_input($_POST["phone"]));
    $email = test_input($_POST["email"]);
    $addr = test_input($_POST["addr"]);
    $des = test_input($_POST["des"]);
    $image = null;
    if (isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        upload($_FILES['image']);
    }
    

    insert_employee($name, $des, $phone, $email, $addr, $image, $birth);
    header("Location: ../view/view_div.php");
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function upload($file){
       
        $errors = array();
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_tmp = $file['tmp_name'];
        $file_ext = strtolower(end(explode('.', $file['name'])));

        $expensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "Không chấp nhận định dạng ảnh có đuôi này, mời bạn chọn JPEG hoặc PNG.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'Kích cỡ file nên là 2 MB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "../images/" . $file_name);
            echo "Thành công!!!";
        } else {
            print_r($errors);
        }    
}
