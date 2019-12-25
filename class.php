<?php
class Mobile{
    var $model;
    function showModel(){
        // global $model;
        // $model = $number;
        echo "Model Number : $this->model <br>";
    }
}

$samsung = new Mobile;
// $samsung -> showModel('A8');

// $lg = new Mobile;
// $lg -> showModel('G5');

$samsung ->model="A8";
$samsung->showModel();


?>