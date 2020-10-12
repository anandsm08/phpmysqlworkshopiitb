<html>
<head>
	<title>Change Password</title>
</head>
<body>
	<div>
		<h3>Change Password</h3>
		<form action='pass.php' method='POST'>
			<table>
				<tr>
					<td>Old Password:</td>
					<td><input type='password' name='oldpass'></td>
				</tr>
				<tr>
					<td>New Password:</td>
					<td><input type='password' name='newpass'></td>
				</tr>
				<tr>
					<td>Confirm New Password:</td>
					<td><input type='password' name='conpass'></td>
				</tr>
				<tr>
					<td><input type='submit' name='submit' value='Change Password'></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>



<?php
session_start();
$roll=$_SESSION['roll'];

if($roll)
{
	if ($_POST['submit']) 
	{
		$old = md5($_POST['oldpass']);
		$newpass = md5($_POST['newpass']);
		$conpass = md5($_POST['conpass']);

		$conn = mysqli_connect("localhost","root","","result");
		$queryget = mysqli_query($conn,"SELECT password FROM students_list WHERE roll ='$roll'");
		$row = mysqli_fetch_assoc($queryget);

		$oldpassdb = $row['password'];
		if($oldpass == $oldpassdb)
		{
			if($newpass == $conpass)
			{
				$newpass= md5($newpass);
				$querychange=mysqli_query($conn,"UPDATE students_list SET password='$newpass' WHERE roll='$roll'");
				session_destroy();
				die("Password changed sucessfully.");
			}
			else
			{
				echo "New and Rentered New Passwords do not match.";
			}

		}
		else
		{
			echo "The old password is incorrect.";
		}
	}
	else
	{
		echo "You must login to change your password.";
	}
}
?>