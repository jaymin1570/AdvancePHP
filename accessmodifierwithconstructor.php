<?php

class Father
{
    protected function __construct()
    {
        echo "<br> Parent Constructor called 2 <br>";
    }
}
class Son extends Father{

     function __construct(){
    //    parent ::__construct();
       echo "Child class";
    }
}
// $obj = new Son;

?>