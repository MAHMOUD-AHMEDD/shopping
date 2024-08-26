<?php

require_once 'type.php';
class client implements type
{
//private typ;
    public function type_logic()
    {
        header('location:./products.php');
    }

}