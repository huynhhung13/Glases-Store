<div class="col-sm-9">
<?php
    if(isset($_GET['sidebar']))
        $temp= $_GET['sidebar'];
    else 
        $temp = '';

    if($temp=='product-add')
        include('main-content/product/product-add.php');
    else if($temp=='product-list')
        include('main-content/product/product-list.php');
    else if($temp=='product-edit')
        include('main-content/product/product-edit.php');
    else if($temp=='category-add')
        include('main-content/category/category-add.php');
    else if($temp=='category-list')
        include('main-content/category/category-list.php');
    else if($temp=='category-edit')
        include('main-content/category/category-edit.php');
    else if($temp=='brand-add')
        include('main-content/brand/brand-add.php');
    else if($temp=='brand-list')
        include('main-content/brand/brand-list.php');
    else if($temp=='brand-edit')
        include('main-content/brand/brand-edit.php');
    else if($temp=='order-list')
        include('main-content/order/order-list.php');
    else if($temp=='order-detail')
        include('main-content/order/order-detail.php');
    else if($temp=='order-edit')
        include('main-content/order/order-edit.php'); 
    else if($temp == 'login')
        include('main-content/login.php');
    else
        include('main-content/index.php');
?>
    </div>
  </div>
</div>

