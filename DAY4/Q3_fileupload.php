<?php

$name = $_FILES["upfile"]["name"]; 
$size = $_FILES["upfile"]["size"];
$type = $_FILES["upfile"]["type"];
echo "File name: ".$name."<br/>";
echo "File size: ".$size."<br/>";
echo "File type: ".$type."<br/>";
?>