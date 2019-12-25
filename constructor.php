<?php

class Student
{
    var $roll;
    function __construct($enroll)
    {
        // echo "Constructor called";
        $this->roll = $enroll;
        echo "parameterised constructor <br>";
        echo $this->roll;
    }
    function __destruct()
    {
        echo "<br>object Trashed ";
    }
}
$stu = new Student("jaymin");

?>