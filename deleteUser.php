<?php
include_once 'helpers/db_connection.php';
include_once 'guard/check_user_login.php';
include_once 'models/usersModel.php';
check_login();
delete_user($_GET['id']);
header('location: index.php');