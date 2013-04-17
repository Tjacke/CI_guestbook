<?php

class Math extends CI_Model{
    
    public function add($var1, $var2){
        return $var1 + $var2;
    }
    public function sub($var1, $var2){
        return $var1 - $var2;
    }
}