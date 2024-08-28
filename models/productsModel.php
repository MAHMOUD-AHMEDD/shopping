<?php
include_once './helpers/db_connection.php';
include_once 'base.php';
class productsModel extends base
{
    public function get_products()
    {
        $this->obj=new base('product');
        return $this->obj->get_obj();
    }
}
