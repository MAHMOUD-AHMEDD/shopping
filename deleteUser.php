<?php
include_once 'helpers/db_connection.php';
include_once 'guard/check_user_login.php';
check_login();
function delete_user($id){
    $conn = connectToDB();
    $data = $conn ->query("DELETE FROM users WHERE id =".$id."");
    return $data -> fetch();
}
delete_user($_GET['id']);
header('location: index.php');

