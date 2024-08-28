<?php
include_once './helpers/db_connection.php';

class base
{
    protected $table_name;
    public function __construct($table_name)
    {
        $this->table_name=$table_name;
    }
    public function get_obj()
    {
        $conn = connectToDB();
        $data = $conn -> query("SELECT * FROM ".$this->table_name);
        return $data -> fetchAll();
    }

//protected $deleted;
    public function delete($id,$comp)
    {
        $conn = connectToDB();
//        echo $this->table_name;
//        echo '<hr>';
//        echo $id;
        $data = $conn ->query("DELETE FROM `".$this->table_name."` WHERE `".$comp."`=".$id);
        return $data -> fetch();
    }
}