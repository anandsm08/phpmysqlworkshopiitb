<?php

 if($_POST['submit'])
 {
 	$mail = $_POST['mail'];
 	$name    = $_POST['name'];
 	$feedback = $_POST['feedback'];
 	if ($mail  &&  $feedback)
 	{
 		ini_set("SMTP","smtp.gmail.com");
	    ini_set("smtp_port","587");
 		$from = "@gmail.com";
 		$subject = "Feedback Reference";

 		$message = "Hello". $name." ! Thanks for your feedback. Here is a reference of your feedback".$feedback ;

 		mail( $mail, $subject, $message);
        echo "Mail sent!";

        $admin ="@gmail.com";
        $subject ="Feedback from ".$name;
        $body ="Feedback: ".$feedback." Name:".$name." mail: ".$mail;

        mail($admin ,$subject , $body);

        die ("Thanks for the Feedback ");

 	}
 	else
 	{
 		die ("Enter Credentials");

 	}
 }

?>


<html>
<h2> Give your Feedback</h2>
<form action= 'sendmail.php' method = 'POST'>
    Name: <input type='text' name='name' ><br/>
	Email: <input type = 'email' name='mail'><br/>
	Feedback: <textarea name='feedback'> </textarea> <br/>
	<input type ='submit' name='submit' value='Submit your feedback'>
</form>
</html>