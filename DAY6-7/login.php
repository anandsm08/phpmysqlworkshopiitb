<html>
 <head>
	<title>LOGIN</title>
 </head>
 <body>
 	<div id='div'>
 		<form action = 'login.php' method='POST'>
 			<table>
 				<tr>
 					<th>LOG-IN</th>
 				</tr>
 				<tr>
 					<td>Roll :- </td>
 					<td><input type='text' name='roll' ></td>
 				</tr>
 				<tr>
 					<td>Password:</td>
 					<td><input type='password' name='password'></td>
 				</tr>
 				<tr>
 					<td><input type='submit' name='login' value='login'></td>
 				</tr>
 			</table>
 		</form>
 	</div>
 </body>
</html>



<?php
session_start();

$roll = trim($_POST['roll']);
$pass = md5($_POST['password']);

$conn = mysqli_connect("localhost","root","","result") or die("Couldn't connect");
if($roll =="admin" && $pass =="200ceb26807d6bf99fd6f4f0d1ca54d4")
{
	$_SESSION['roll'] = $roll;
	header('Location: ad.php');
}
else
{
	$sql = "SELECT roll, password FROM students_list WHERE roll='$roll'";
	$query = mysqli_query($conn,$sql);
	$numrows = mysqli_num_rows($query);

	if($numrows!=0)
	{
		$row=mysqli_fetch_assoc($query);
		$dbroll=$row['roll'];
		$dbpass=$row['password'];
		if($roll == $dbroll && $pass == $dbpass)
		{
			$_SESSION['roll']= $roll;
			header('Location: result.php');
		}
		else
		{
			die("User doesn't exist");
		}
	}
}
mysqli_close($conn);
?>