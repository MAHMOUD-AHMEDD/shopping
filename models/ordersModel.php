<?php
include_once './helpers/db_connection.php';
function get_orders(){
    $conn = connectToDB();
    $data = $conn -> query("SELECT * FROM orders ");
    return $data -> fetchAll();
}
function add_order($user_id,$product_id)
{
    $conn=connectToDB();
    $sql = "INSERT INTO orders (user_id, product_id) VALUES (:user_id, :product_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->execute();
}
function displaySpecificUserOrder($id)
{
    $conn=connectToDB();
    $data=$conn->query("SELECT * FROM users
  INNER JOIN orders
  ON users.id = orders.user_id AND users.id='".$id."'
  INNER JOIN product
  ON product.id = orders.product_id;");

    return $data -> fetchAll();
}
function delete_order($id){
    $conn = connectToDB();
    $data = $conn ->query("DELETE FROM orders WHERE product_id =".$id."");
    return $data -> fetch();
}
