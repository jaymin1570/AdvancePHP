<?php
// public property or method can be accessd from anywhere
class Father{
    // private $a;
    protected $a = 10;
    // public function displayparent(){
    //     $this->a =30;
    //     echo "parent function $this->a";
    // }
}

class Son extends Father{
    // public function displaychild($x){
    //     // echo $this->a;
    //     $this->a =$x;
    //     // echo "<br>second".$this->displayparent()."<br>";

    //     echo "child function $this->a<br>";
    // }

    protected $b = 20;
}

class GrandSon extends Son{
    public function displayGrandChild(){
        echo $this->a."<br>".$this->b;
    }
}

// $obj = new GrandSon();
// $obj->a =40;
// $obj->displayparent();
$obj->displayGrandChild();
?>