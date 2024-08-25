<?php
session_start();
include_once 'helpers/db_connection.php';
include_once 'guard/check_user_login.php';
include_once 'models/ordersModel.php';
check_login();
delete_order($_GET['product_id']);
header('location: cart.php');

