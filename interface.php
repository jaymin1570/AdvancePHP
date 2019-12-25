<?php
 
 interface Father{
     const a = 101;
     public function disp();
 }

 interface Mother{
     const m = 102;
     function showvalue();
 }

 interface Son extends Father,Mother{
     const b = 103;
     function getvalue();
 }





?>