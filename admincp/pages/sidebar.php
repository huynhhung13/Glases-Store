<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADMIN DASHBOARD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/admin.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="../../js/main.js"></script>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h3 style="font-weight: 800; color:aliceblue">GLASSES STORE ADMINISTRATOR PAGE</h3>
      <?php
          session_start();
          if(isset($_SESSION['admin_name']))
          {
      ?>
      <h4 style="color: yellow;"><?php echo 'Xin chào, '.$_SESSION['admin_name'];?></h4>
      <h4><a href="pages/main-content/function.php?action=log-out">Đăng xuất</a></h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="index.php"><h4>TRANG CHỦ</h4></a></li>
        <li><h4 style="color: lemonchiffon;">Quản lý đơn hàng</h4></li>
        <li><a href="index.php?sidebar=order-list">Danh sách đơn hàng</a></li>
        <li><h4 style="color: lemonchiffon;">Quản lý sản phẩm</h4></li>
        <li><a href="index.php?sidebar=product-list">Danh sách sản phẩm</a></li>
        <li><a href="index.php?sidebar=product-add">Thêm sản phẩm</a></li>
        <li><h4 style="color: lemonchiffon;">Quản lý danh mục</h4></li>
        <li><a href="index.php?sidebar=category-list">Danh sách danh mục</a></li>
        <li><a href="index.php?sidebar=category-add">Thêm danh mục</a></li>
        <li><h4 style="color: lemonchiffon;">Quản lý hãng sản xuất</h4></li>
        <li><a href="index.php?sidebar=brand-list">Danh sách hãng</a></li>
        <li><a href="index.php?sidebar=brand-add">Thêm hãng</a></li>
      </ul><br>
      <?php 
      } 
      else{
      ?>
        <h4>Đây là trang quản trị, hãy <a href="index.php?sidebar=login">Đăng nhập</a> để thực hiện các chức năng </h4>
        <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="index.php"><h4>Trang chủ</h4></a></li>
        </ul><br>
      <?php } ?>
    </div>