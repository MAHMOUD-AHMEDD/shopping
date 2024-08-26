<?php

require_once 'type.php';
class admin implements type
{
//private typ;
    public function type_logic()
    {
        header('location:./index.php');
    }

}