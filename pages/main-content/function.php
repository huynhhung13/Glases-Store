<?php
    include("../../config/connectdb.php");
    session_start();
    if(isset($_POST['user-login']))
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql_customer = "SELECT * FROM tbl_customers WHERE username = '$username' AND password = '$password' LIMIT 1";
        $customer_query = mysqli_query($con,$sql_customer);
        $row_customer = mysqli_fetch_array($customer_query);
        if($row_customer){
            $_SESSION['customer_id'] = $row_customer['customer_id'];
            $_SESSION['customer_name'] = $row_customer['customer_name'];

            header('Location:../../index.php');            
        }
        else{
            header('Location:../../shop.php?header=login');
        }
        }     
    else if(isset($_POST['user-sign-up']))
    {
        $customer_name = $_POST['fullname'];
        $customer_phone = $_POST['phone'];
        $customer_email = $_POST['email'];
        $customer_address = $_POST['address'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $re_enter_password = $_POST['re_enter_password'];
        
        //check user name
        $sql_customer = "SELECT * FROM tbl_customers WHERE username='$username'"; 
        $customer_query = mysqli_query($con,$sql_customer);
        if($password == $re_enter_password && mysqli_fetch_array($customer_query)==false)
        {
            $password = md5($password);
            $ins_customer= "INSERT INTO tbl_customers(username, password, customer_name, customer_phone, customer_email, customer_address)
                VALUE ('$username','$password','$customer_name','$customer_phone', '$customer_email', '$customer_address')";
            $_SESSION['customer_name'] = $customer_name;
            mysqli_query($con, $ins_customer);
            $_SESSION['message_header'] = 'Đăng ký thành công';
        }else{
            header('Location:../../shop.php?header=login');
        }
    }
    else if($_GET['action']=='log-out')
    {
        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_name']);
        unset($_SESSION['cart']);
        unset($_SESSION['shipping_id']);
        unset($_SESSION['increment']);
        header('Location:../../shop.php?header=login');
    }
?>