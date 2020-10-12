<html>
<head>
	<title>Result</title>
</head>
<body>
	<div>
		<h3>Result:</h3>
		<p>Name: <?php echo $name?><br> Roll: <?php echo $roll?><br></p>
		<table>
			<tr>
				<th>Subject</th>
				<th>Marks Obtained</th>
				<th>Maximum Marks</th>
			</tr>
			<tr>
				<td>HTML</td>
				<td><?php echo $html."/100" ?></td>
			</tr>
			<tr>
				<td>PHP</td>
				<td><?php echo $php."/100";?></td>
			</tr>
			<tr>
				<td>MySQL</td>
				<td><?php ecjo $mysql."/100"; ?></td>
			</tr>
			<tr>
				<td>Total</td>
				<td><?php echo $total."/300"; ?></td>
			</tr>
			<tr>
				<td>Percentage</td>
				<td><?php echo $percentage."%"; ?></td>
			</tr>
			</table>
			<h4><?php
			if($percentage >= 60){echo " Congratulations".$name; }
			?></h4>
			<form action='result.php' method= 'POST'>
				E-mail:<input type='text' name='mail'>
				<input type='submit' name='submit' value='Mail your Result'>
			</form>		
			<a href='pass.php'>Change your Password</a>
			<form action='logout.php' method='POST' >
				<input type='submit' name='logout' value='Log Out'>
			</form>
	</div>
</body>
</html>

<?php
 session_start();

 $roll=$_SESSION['roll'];
 $conn =mysqli_connect("localhost","root","","result") or die("Couldn't connect");
 $sql = "SELECT name,roll,html,php,mysql FROM students_list WHERE roll=$roll";
 $result=mysqli_query($conn,$sql);
 if (mysqli_num_rows($result)>0)
 {
 	$row =mysqli_fetch_assoc($result);
 	$name= $row['name'];
 	$html= $row['html'];
 	$php=  $row['php'];
 	$mysql=$row['mysql'];
 	$total= $html+$php+$mysql;
 	$percentage = $total/300*100;
 }
 else
 {
 	echo "Result is on hold due to miscellanous errors";
 }
 mysqli_close($conn);

 if ($_POST['submit'])
 {
 	$to =$_POST['mail'];
 	$admin="@gmail.com";
 	if($to)
 	{
 		ini_set("SMTP", "smtp.gmail.com");
 		ini_set("smtp_port", "587");
 		$subject = "Result";
 		$headers = "From: ".$admin;
 		$body = "Hello ".$name."\n Here's your Result.\n\n\nName:".$name."\n\nRoll:".$roll."Marks: \nHTML: ".$html."/100\nPHP: ".$php."/100\nMySQL: ".$mysql."/100\n Total: ".$total."/300\n Percentage: ".$percentage;
 		mail($to,$subject,$body,$headers);
 		echo "Your Result has been mailed to registered mail address";
 	}
 	else
 	{
 		echo "Enter a valid mail address";
 	}
 	if ($_POST['logout']) 
 	{
 		header('Location: logout.php');
 	}
 }

?>