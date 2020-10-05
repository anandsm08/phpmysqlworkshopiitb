<?php


$connect = require ('connect.php');
//mysqli_select_db($connect,'form') or die("ERROR");


if ($connect) {

$data = mysqli_query($connect,"SELECT * FROM `form` WHERE name='Rohan'");

while ($row = mysqli_fetch_assoc($data)) {

$s1 = $row["sub1"];
$s2 = $row["sub2"];
$s3 = $row["sub3"];
$s4 = $row["sub4"];
$s5 = 99;
$user = $row["name"];
$newtotal = $s1+$s2+$s3+$s4+$s5;
$newpercent = ($newtotal / 500 )*100 ;

mysqli_query($connect,"UPDATE form  SET sub5='$s5' , obtained marks = '$newtotal' , percentage = '$newpercent' WHERE name='$user'");

}

echo "<h2>Marks updated succesfully</h2>";
}else 
{
	mysqli_query($conn);
}

 ?>
 
