<html>
<form action = 'Q2_stringfunc.php' method = 'POST'>
<p> Enter a random string: </p>
<input type = 'text' name = 'string'><br/>
<p> Enter a random substring: </p>
<input type = 'text' name = 'substring'><br/>
<input type='submit' value='Done'>
</form>
</html>
<?php

//count strings
$string = $_POST['string'];
$substring = $_POST['substring'];
$length = strlen($string);
echo $length. "<br/>";
//break strings
$break = explode(" ",$string);
echo $break[" "]."<br/>";
//reverse string
$reverse = strrev($string);
echo $reverse. "<br/>";
//conv lower case
$lower = strtolower ($string);
echo $lower."<br/>";
//conv upper case
$upper = strtoupper ($string);
echo $upper."<br/>" ;
//substring->string
$replace = substr_replace($string ,$substring ,0);
echo $replace."<br/>";

?>