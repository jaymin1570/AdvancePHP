<?php

class Father{
    public $a;
    function __construct($x)
    {
        echo "<br>Parent constructor called:";
        $this->a=$x;
        echo $this->a;
    }
}
class Son extends Father{
    public $b;
    function __construct($p,$q)
    {
        parent ::__construct($p);
        echo "<br>Child constructor called:";
        $this->b=$q;
        echo $this->b;


    }
}
$obj = new Son(10,20);
// $obj2=new Father;
?>

