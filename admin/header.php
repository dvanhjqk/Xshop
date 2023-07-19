<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../model/content/css/adminstyle.css">
    <style>
        input{
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #999;
            cursor: pointer;
        }
        table th{
            padding: 10px 20px;
            border: 1px solid #999;
            background-color: #c8e6c9;
        }

    </style>
</head>
<body>
<script src="../model/content/js/validate.js"></script>
<div class="container">
        <div class="header">
            <h1>
                QUẢN TRỊ WEBSITE
            </h1>
        </div>
        <div class="menu">
            <nav>
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="index.php?act=adddm">Loại hàng</a></li>
                    <li><a href="index.php?act=addhh">Hàng hóa</a></li>
                    <li><a href="index.php?act=dskh">Khách hàng</a></li>
                    <?php if (isset($_SESSION['user'])) {
                        extract($_SESSION['user']);
                    if ($vai_tro == 1) {?>
                        <li><a href="index.php?act=dsnv">Nhân viên</a></li>
                    <?php }
                    }
                    ?>

                    <li><a href="index.php?act=dsbl">Bình luận</a></li>
                    <li><a href="index.php?act=thongke">Thống kê</a></li>
                </ul>
            </nav>
        </div>