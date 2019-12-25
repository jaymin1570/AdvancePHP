<?php
class Father{
    protected const mark=101;
    // const mark=202;
  
    
}
class Son extends Father{
    function disp(){
        // $mark=202;
        echo self::mark;
    }
}
// $mark=202;
// $obj = new Son;
$obj -> disp();
//  Father::mark=202;
//  echo Father::mark;


?>