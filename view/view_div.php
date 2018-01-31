<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        
        <title>View list employees</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="libs/jquery.min.js"></script>
        <script src="libs/bootstrap.min.js"></script>
        <link rel="stylesheet" href="libs/bootstrap.min.css" type="text/css"/>
        <link rel="stylesheet" href="libs/style.css" type="text/css"/>
        
        <script>
            $(document).ready(function () {
                $(".delete").click(function () {


                    if (confirm("Do you want to delete this row?"))
                    {

                        var row = $(this).parent().parent().parent();

                        var id = row.attr("id");
                        var data = 'id=' + id;


                        $.post({
                            type: "post",
                            url: "../control/view_div_control.php",
                            data: data,
                            cache: false,
                            success: function () {
                                row.slideUp('slow', function () {
                                    $(row).remove();
                                });

                            }
                        });
                    }
                    return false;
                });
            });
        </script>
    </head>
    <body>
        <h1>BẢNG DANH SÁCH NHÂN VIÊN</h1>
        
        <a href="form2_boottrap.html"><button type="button" class="btn btn-primary">Add new Employee</button></a>
        <div class="divTable blueTable">
            <div class="divTableHeading">
                <div class="divTableRow">
                    <div class="divTableHead">STT</div>
                    <div class="divTableHead">Họ và Tên</div>
                    <div class="divTableHead">Mô tả</div>

                    <div class="divTableHead">Số điện thoại</div>
                    <div class="divTableHead">Email</div>
                    <div class="divTableHead">Địa chỉ</div>

                    <div class="divTableHead">Avatar</div>
                    <div class="divTableHead">Ngày sinh</div>
                    <div class="divTableHead">Chỉnh sửa</div>
                </div>
            </div>
            <div class="divTableBody" id="divTableBody">
                <?php
                $stt = 0;
                require_once '../model/database.php';
                $employees = get_all_employee();
                foreach ($employees as $row) {
                    ?>
                    <div class="divTableRow" id='<?php echo $row[0] ?>'>
                        <div class="divTableCell"><?php echo ++$stt; ?></div>
                        <div class="divTableCell"><?php echo $row[1]; ?></div>
                        <div class="divTableCell"><?php echo $row[2] ?></div>
                        <div class="divTableCell"><?php echo $row[3] ?></div>
                        <div class="divTableCell"><?php echo $row[4] ?></div>
                        <div class="divTableCell"><?php echo $row[5] ?></div>
                        <div class="divTableCell"><?php echo $row[6] ?></div>
                        <div class="divTableCell"><?php echo $row[7] ?></div>
                        <div class="divTableCell">

                            <div class="btn-group" action="../control/view_div_control.php">
                                <button type="button" class="btn btn-primary ">Xem</button>
                                <button type="button" class="btn btn-warning" onclick='alert("hi")'>Sửa</button>
                                <button type="button" class="btn btn-info delete" >Xóa</button>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>

        </div>
        <div class="blueTable outerTableFooter">
            <div class="tableFootStyle">
                <div class="links">
                    <a href="#">&laquo;</a>
                    <a class="active" href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">&raquo;</a>
                </div>
            </div>
        </div>

    </body>
</html>
