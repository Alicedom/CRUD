<?php
include_once("connect.php");
if (isset($_POST['edit']))
    
    ?>

<html>
    <head>
        <title>Add form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            body {background-color: lightgray;}
            tr {margin: 5px;}
            td {margin: 5px;}
        </style>
        <script src="add.js"></script>
    </head>
    <body>
        <?php
        $id = $_GET["id"];
        require 'database.php';
        $row = get_employee($id);
        var_dump($row);
        ?>
        <form  action="../view/update.php" method="post">
            <input type="hidden" name="id" value=<?php echo $row["id"]; ?> >
            <table style="width:100%">
                <tr>
                    <td>Tên</td>
                    <td><input type="text" name="name" class="form-control" value= "<?php echo $row['name']; ?>" ></td> 
                </tr>
                <tr>
                    <td>Mô tả ngắn</td>
                    <td><textarea name="des" > <?php echo $row["des"]; ?></textarea></td> 
                </tr>
                <tr>
                    <td>Điện thoại</td>
                    <td><input type="tel" name="phone" value= <?php echo $row["phone"]; ?>></td> 
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value= <?php echo $row["email"]; ?>></td> 
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><input type="text" name="addr" value= <?php echo $row["addr"]; ?>></td> 
                </tr>
                <tr>
                    <td>Avatar</td>
                    <td><input type="text" name="image"  <?php echo $row["image"]; ?>></td> 
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td><input type="date" name="birth" value= <?php echo $row["birth"]; ?>></td> 
                </tr>
                <tr>
                    <td><input type="submit"></td>
                    <td><a href="../view/view.php"><button type="button">Cancel</button></a></td>
                </tr>
            </table>
        </form>
    </body>
</html>
