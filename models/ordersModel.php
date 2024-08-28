<?php
include_once './helpers/db_connection.php';
include_once 'base.php';
class ordersModel extends base
{
    private $obj;
    public function get_orders()
    {
//        $conn = connectToDB();
//        $data = $conn->query("SELECT * FROM orders ");
        $this->obj=new base('orders');
        return $this->obj->get_obj();
    }

    public function add_order($user_id, $product_id)
    {
        $conn = connectToDB();
        $sql = "INSERT INTO orders (user_id, product_id) VALUES (:user_id, :product_id)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
    }

    public function displaySpecificUserOrder($id)
    {
        $conn = connectToDB();
        $data = $conn->query("SELECT * FROM users
  INNER JOIN orders
  ON users.id = orders.user_id AND users.id='" . $id . "'
  INNER JOIN product
  ON product.id = orders.product_id;");

        return $data->fetchAll();
    }

    public function delete_order($id)
    {
        $this->obj=new base($this->table_name);
        return $this->obj->delete($id,'product_id');
    }
}