<?php

// interface Father{
//     const mark = 101;
//     public function disp();
// }

// class Son implements Father{
//     public function disp(){
//         echo Father::mark;
//     }
// }

// interface Father{
//     const sci = 101;
//     public function disp();
//     public function getvalue();
// }

// interface Mother{
//     const math=102;

// }

// class Son implements Father,Mother{
//     public function disp(){
//         echo Father::sci."<br>";
//         echo Mother::math;
//     }
//     public function getvalue()
//     {
        
//     }
// }

class Father{
    public $sci=104;
}
interface Mother{
    const math=105;
    public function disp();
} 
interface Uncle{
    const b=500;

}
// class Aunty{

// }
class Son extends Father implements Mother,Uncle{
    public function disp(){
        echo $this->sci."<br>";
        echo Mother::math;
        echo Uncle::b;

    }
} 

$obj = new Son;
$obj -> disp();



?>