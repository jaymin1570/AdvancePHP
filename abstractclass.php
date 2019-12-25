<?php
 
    abstract class Father{
        function disp(){ 
            echo "Normal Function<br>";
        }

        abstract function absmethod();
    }

    class Son extends Father{
        public function absmethod(){
            echo "Abstract Method define <br>";
        }
    }

    $obj = new Son;
    $obj -> absmethod();

?>