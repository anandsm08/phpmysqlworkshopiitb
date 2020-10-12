<html>
 <head>
	<title>Registration for New Users</title>
 </head>
 <body>
	<div>
		<form action='register.php' method='POST'>
			<h3>Registration Details</h3>
			<table>
				<tr>
					<td>Name :- </td>
					<td><input type='text' name='name' value='$name'></td>
				</tr>
				<tr>
					<td>Roll :-	</td>
					<td><input type='text' name='roll' value=$roll></td>
				</tr>
				<tr>
					<td>Choose a Password :- </td>
					<td><input type='password' name='password'></td>
				</tr>
				<tr>
					<td>Repeat Password :- </td>
					<td><input type='password' name='repeatpass'></td>
				</tr>
				<tr>
					<td><input type='submit' name='submit' value='Register'></td>
				</tr>
			</table>
		</form>
	</div>
 </body>
</html>


<?php  
$name=$_POST['name'];
$roll=$_POST['roll'];
$password=$_POST['password'];
$repeatpass=$_POST['repeatpass'];
$submit=$_POST['submit'];

if($submit)
{
	if($password == $repeatpass)
	{
		if(strlen($roll)>7 || strlen($name)>40 )
		{
		  echo "Please Enter a Roll No.(Max 7 characters) and Name (max 40 characters).";
		}
		else
		{
		  if(strlen($password<7) || strlen($password>20))
		  {
		  	echo "Password must be between the limit of 6 characters to 20 characters";
		  }
		  else
		   {
		  	 $password = md5($password);
		  	 $repeatpass = md5($repeatpass);
		  	 $conn =mysqli_connect("localhost","root","","result");
		  	 $sql ="SELECT roll,password FROM students_list WHERE roll=$roll";
		  	 $result =mysqli_query($conn,$sql);
		  	 if(mysqli_num_rows($result)>0)
		  	 {
		  		 if ($row=mysqli_fetch_assoc($result))
		  		 {
		  			 if($row['password'])
		  			 {
		  				die("User already has been registered");
		  			 }
		  			 else
		  			 {
		  				$sql="UPDATE students_list SET name='$name', password='$password' WHERE roll='$roll'";
		  				mysqli_query($conn,$sql);
		  				die("Thanks for Registering");
		  			 }
		  		 }
		     }
		  
		    }
		}
	}
	else
	{
		$sql= "INSERT INTO students_list (id,name,roll,password,html,php,mysql) VALUES ('','$name',$roll,'$password','','','')";
		mysqli_query($conn,$sql);
		die("You have been registered successfully!<a href ='login.php'><b>Redirect to Login page</b></a>");
	}

}
else
{
	die("Passwords so not match.");
}
?>









