<?php

// Cookie  Syntax
// setCookie(name,value,expire,path,domain,secure,httponly);
// types of cookie :--1)Session Cookie
//                 2) Persistent Cookie
    setCookie("username","jammu2",time()+60*60*24*10);
    echo $_COOKIE['username'];
?>