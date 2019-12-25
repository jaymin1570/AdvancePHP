<?php
// class Father{
//     private static $a = 10;
//     public static function disp($nm){
//         // echo self::$a;
//         echo "Hello , $nm".self::$a;;
//     }
// }
// // Father ::$a=30;

// // $obj = new Father;
// Father ::disp("Jammu");

class Father{
    public static $a = 30;
}
class Son extends Father
{
    function disp(){
        echo Father::$a;
    }
}
// $obj = new Son;
$obj->disp();

?>