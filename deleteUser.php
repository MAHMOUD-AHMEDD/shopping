<?php
include_once 'helpers/db_connection.php';
include_once 'guard/check_user_login.php';
include_once 'models/usersModel.php';
//check_login();
$obj=new usersModel('users');
$obj->delete_user($_GET['id']);
header('location: index.php');
