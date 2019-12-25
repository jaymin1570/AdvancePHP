<?php
// single Inheritance
class Father{               //parent class
    public $a;
    public $b;
    function getValue($x,$y){
    $this->a = $x;
    $this->b = $y;
    }
}

class Son extends Father{
    function add(){
        return $this->a + $this->b;
    }
    function display(){
        echo "Value of A : $this->a<br>";
        echo "Value of B : $this->b<br>";
        echo "Addition :".$this->add()."<br>";
    }
}

class Daughter extends Father{
    function multi(){
        return $this->a * $this->b;
    }
    function display(){
        echo "Value of A : $this->a<br>";
        echo "Value of B : $this->b<br>";
        echo "Multiplication : ".$this->multi()."<br>";
    }
}


$objs = new Son;
$objd = new Daughter;
$objs->getValue(10,20);
$objd->getValue(30,40);
$objs->display();
$objd->display();

/*class Son extends Father{   // Multi-level inheritance
    public $c=30;
    public $sum;
    function add(){
        $this->sum = $this->a +$this->b + $this->c;
        return $this->sum;
    }
}

class GrandSon extends Son{
    function display(){
        echo "Value of A: $this->a <br>";
        echo "Value of B: $this->b <br>";
        echo "Value of C: $this->c <br>";
        echo "Value of Sum: ".$this->add()." <br>";
    }
}*/

// $obj = new GrandSon;
// $obj->getValue(20,10);
// $obj->add();
// $obj->display();
 
?>