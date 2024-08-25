<?php
include_once './helpers/db_connection.php';
function get_products()
{
    $con=connectToDB();
    $data=$con->query('SELECT * FROM product');
    return $data->fetchAll();
}