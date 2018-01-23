
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>View list</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="view.js"></script>
    </head>
    <body>
        <a href="add.html">Add new employee</a>
        <table id="list">

            <tr>
                <th>id</th>
                <th>Tên</th>
                <th>Mô tả ngắn</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Avatar</th>
                <th>Ngày sinh</th>
                <th>Edit</th>
                <th>Delele</th>
            </tr>

            <?php
            require '../model/database.php';
            $result = get_all_employee();
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr> \n"
                . "<td> $row[id]</td>\n"
                . "<td> $row[name]</td?\n"
                . "<td> $row[des]</td>\n"
                . "<td> $row[phone] </td>\n"
                . "<td> $row[email] </td>\n"
                . "<td> $row[addr] </td>\n"
                . "<td> $row[image] </td>\n"
                . "<td> $row[birth] </td>\n"
                . "<td> <a href=\"../model/delete.php?id=$row[id]\">Delete</td>\n"
                . "<td> <a href=\"../model/edit.php?id=$row[id]\">Update </td>\n"
                . "</tr>";
            }
            ?>                    
        </table>
    </body>
</html>
