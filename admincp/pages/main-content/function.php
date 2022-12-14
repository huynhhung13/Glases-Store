<?php
    include("../../../config/connectdb.php");
    session_start();
    if(isset($_POST['admin-login']))
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql_admin = "SELECT * FROM tbl_administrator WHERE username = '$username' AND password = '$password' LIMIT 1";
        echo $sql_admin;
        $admin_query = mysqli_query($con,$sql_admin);
        $row_admin = mysqli_fetch_array($admin_query);
        if($row_admin){
            $_SESSION['admin_id'] = $row_admin['administrator_id'];
            $_SESSION['admin_name'] = $row_admin['administrator_name'];

            header('Location:../../index.php');            
        }
        else{
            header('Location:../../index.php?sidebar=login');
        }
        }     
    else if($_GET['action']=='log-out')
    {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_name']);
        header('Location:../../index.php?sidebar=login');
    }
?>