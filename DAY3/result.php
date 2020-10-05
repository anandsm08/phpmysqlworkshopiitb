<?php
 require 'connect.php' ;
 if(isset($_POST['submit']))
 {
	 
	$name=$_POST['name'];
	$sub1=$_POST['sub1'];
	$sub2=$_POST['sub2'];
	$sub3=$_POST['sub3'];
	$sub4=$_POST['sub4'];
	$sub5=$_POST['sub5'];
	$total = $sub1 + $sub2 + $sub3 + $sub4 + $sub5;
$percentage = $total/500*100;
                      
	//$result= mysqli_query($conn,"INSERT INTO `form` (`id`, `name`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `obtained marks`, `total marks`, `percentage`) VALUES (1, 'a', '1', '2', '3', '50', '5', '4', '8', '9');");				  
 $result = mysqli_query($conn,"INSERT INTO form(name,sub1,sub2,sub3,sub4,sub5,`obtained marks`,`total marks`,percentage) VALUES ('$name',$sub1,$sub2,$sub3,$sub4,$sub5,$total,500,$percentage)");

 if($result)
  {
	echo ('success');
  }
 else
  {
	echo ('Not inserted');
	echo (mysqli_error($conn));
  }
 }
 echo "<br/>";
 echo "Name : " .$name."\n"; 
 echo "Subject 1 Marks : ".$sub1."<br/>";
 echo "Subject 2 Marks : ".$sub2."<br/>";
 echo "Subject 3 Marks : ".$sub3."<br/>";
 echo "Subject 4 Marks : ".$sub4."<br/>";
 echo "Subject 5 Marks : ".$sub5."<br/>";
 echo "Total Marks Obtained : ".$total."<br/>";
 echo "Total Marks : 500"."<br/>";
 echo "Percentage : ".$percentage."<br/>" ;
?>

 
<html>
 <form action= 'result.php' method='POST'>
 <p>Enter Name:</p>
 <input type= 'text' name='name'><br/>
 <p>enter subject 1 marks</p>
 <input type= 'number' name='sub1'><br/>
 <p>enter subject 2 marks</p>
 <input type= 'number' name='sub2'><br/>
 <p>enter subject 3 marks</p>
 <input type= 'number' name='sub3'><br/>
 <p>enter subject 4 marks</p>
 <input type= 'number' name='sub4'><br/>
 <p>enter subject 5 marks</p>
 <input type= 'number' name='sub5'><br/>
 <input type= 'submit' value='Submit to display your marksheet' name ='submit'>
 
 </form>
</html>