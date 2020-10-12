<html>
<head>
	<title>Adminstrator</title>
</head>
<body>
	<div class="table">
		<form action=ad.php method='POST'>
		<table>
			<tr>
				<td> Roll :- </td>
				<td><input type = 'text' name='roll'></td>
			</tr>
			<tr>
				<td>HTML :- </td>
				<td><input type= 'text' name='html'></td>
			</tr>
			<tr>
				<td>PHP :- </td>
				<td><input type='text' name= 'php'></td>
			</tr>
			<tr>
				<td>MySQL :-</td>
				<td><input type='text' name='mysql'></td>
			</tr>
			<tr>
			 <td><input type='submit' name='add' value='ADD'></td>
			 <td><input type='submit' name='update' value='UPDATE'></td>
			 <td><input type='submit' name='delete' value='DELETE'></td>
			</tr>
        </table>
		</form>
	</div>
	<form action='logout.php' method='POST'>
		<input type='submit' name="logout" value='Log-Out'>
	</form>
</body>
</html>
<?php

session_start();
 $roll   = $_POST['roll'];
 $html   = $_POST['html'];
 $php    = $_POST['php'];
 $mysql  = $_POST['mysql'];
 $add    = $_POST['add'];
 $update = $_POST['update'];
 $delete = $_POST['delete'];

 $conn = mysqli_connect("localhost", "root","", "result") or die("Error! Try again later.");
 $sql  = 0;

 if(isset($_POST['add']))
 {
 	$sql = "SELECT roll FROM students_list WHERE roll='$roll'";
 	$result = mysqli_query($conn, $sql);
 	if (mysqli_num_rows($result)>0)
 	{
 		echo " Roll - ".$roll."already exists";
 	}
 	else
 	{
 		$sql = "INSERT INTO student_list (roll, html, php, mysql) VALUES ('$roll','$html','$php' ,'$mysql')";
 		if (mysqli_query($conn, $sql))
 		{
 			echo "New Data recorded.";
 		}
 		else
 		{
 			echo "Oops! The record can't be added ".mysqli_error($conn);
 		}
 	}
 }

if(isset($_POST['update']))
{
	$sql = "UPDATE roll SET html='$html',php='$php',mysql='$mysql' WHERE roll='$roll' ";
	if(mysqli_query($conn.$sql))
	{
		echo "Data successfully updated.";
	}
	else
	{
		echo "Data couldn't be updated.".mysqli_error($conn);
	}
}
if(isset($_POST['delete']))
{
	if($roll="admin")
	{
		$sql="SELECT  roll FROM students_list WHERE roll='$roll'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) == 0)
		{
			echo "Roll:".$roll." doesn't exists. ";
		}
		else
		{
			$sql = "DELETE FROM students_list Where roll='$roll'";
			if (mysqli_query($conn,$sql))
			{
				echo "Selected Data has been successfully deleted.";
			}
			else
			{
				echo "The record couldn't be deleted.Try again later";
			}
		}
		

		
	}
	else
	{
		echo "LOGGED Admin can't be deleted.";
	}
}
if (isset($_POST['logout']))
 {
	header('Location: logout.php');
}
mysqli_close($conn);
?> 	


