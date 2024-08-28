<?php
session_start();
include_once 'guard/check_user_login.php';
check_login();
$title='addToCart';
var_dump($_GET);
echo '---------------------------------';
var_dump($_SESSION);

//include_once 'models/usersModel.php';
include_once 'models/ordersModel.php';
$obj=new ordersModel('product');
$obj->add_order($_SESSION['id'],$_GET['product_id']);
$orders=$obj->get_orders();
//var_dump($orders);
header('location: products.php');