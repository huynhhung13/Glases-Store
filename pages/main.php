<div class="container">
<?php
    if(isset($_GET['header'])){
        $temp = $_GET['header'];
    }
    else{
        $temp = '';
    }

    if($temp=='product')
        include("main-content/product.php");
    else  if($temp=='category')
        include("main-content/category.php");
    else  if($temp=='brand')
        include("main-content/brand.php");
    else if($temp == 'detail')
        include('main-content/detail.php');
    else if($temp=='login')
        include("main-content/login.php");
    else if($temp=='signup')
        include("main-content/signup.php");
    else if($temp == 'cart')
        include("main-content/cart.php");
    else if($temp == 'checkout')
        include("main-content/checkout.php");
    else if($temp == 'about-us')
        include('main-content/about-us.php');
    else if($temp == 'contact-us')
        include('main-content/contact-us.php');
    else
        include("main-content/index.php");
?>
</div>