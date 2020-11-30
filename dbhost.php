<?php
 $who = 1;
 if ($who == 0){
    $username = "cs340_rosenauk";
    $password = "8003";
    $host = "classmysql.engr.oregonstate.edu";
    $connector = mysql_connect($host, $username, $password)
        or die("Unable to connect");
    $selected = mysql_select_db("cs340_rosenauk", $connector)
        or die("Unable to connect");
    $person = 'rosenauk';
 } else {
    $username = "cs340_hernafra";
    $password = "8583";
    $host = "classmysql.engr.oregonstate.edu";
    $connector = mysql_connect($host, $username, $password)
       or die("Unable to connect");
    $selected = mysql_select_db("cs340_hernafra", $connector)
       or die("Unable to connect");    
    $person = 'hernafra';
 }
?>