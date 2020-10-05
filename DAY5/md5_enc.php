<?php
require 'conn.php';
if(isset($_POST['log'])){
	$user=$_POST['username'];
	$password=$_POST['password'];
	$login = mysqli_query($conn,"INSERT INTO userdata(user,pass) VALUES('$user','$password')");

if($login)
{
	echo("Successful Login");
}else{
	echo ('No login Details found');
	echo (mysqli_error($conn));
	}

}


?>
<html>
<form action = 'md5_enc.php' method = 'POST'>
<p> Enter your username<p/>
<input type = 'text' name ='username'><br/>
<p>Enter your password<p/>
<input type ='password' id = 'password' name ='password'><br/>
<input type ='submit' value ='click here.' name='log'>
</form>
</html>