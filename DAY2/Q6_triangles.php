<html>
 <form action= 'Q6_triangles.php' method='GET'>
 	<input type='text'   name='side1'><br>
 	<input type='text'   name='side2'><br>
 	<input type='text'   name='side3'><br>
 	<input type='submit' value='Fill in'>
 </form>
 </html>
 <?php	

$a = $_GET['side1'];
$b = $_GET['side2'];
$c = $_GET['side3'];

if ($a || $b || $c) {
if ($a == $b && $b == $c)
{
	echo "The triangle is  equilateral";
}
elseif ($a == $b || $b == $c || $a == $c)
{
	echo "The triangle is isoceles";
}
elseif ($a*$a + $b*$b == $c*$c || $b*$b + $c*$c == $a*$a || $a*$a + $c*$c == $b*$b)
{
 echo "The Triangle is right angled";
}
else {
	echo "The triangle is scalene";
}
}
else {
	echo "Err, Put some values";
}


?>
