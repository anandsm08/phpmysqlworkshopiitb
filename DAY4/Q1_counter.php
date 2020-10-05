<?php

$file = file_get_contents("count.txt");
$visitors =$file;
echo $visitors."new visitors are here";
$visitorsnew = $visitors + 1;

$filenew = fopen ("count.txt","w");
fwrite($filenew,$visitorsnew);



?>