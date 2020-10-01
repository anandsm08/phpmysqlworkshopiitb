<html>
<form action= 'Q6_form.php' method='POST'>
<p>Enter Name:</p>
 <input type= 'text' name='name'><br>
 <p>enter subject 1 marks</p>
 <input type= 'number' name='sub1'><br>
 <p>enter subject 2 marks</p>
 <input type= 'number' name='sub2'><br>
 <p>enter subject 3 marks</p>
 <input type= 'number' name='sub3'><br>
 <p>enter subject 4 marks</p>
 <input type= 'number' name='sub4'><br>
 <p>enter subject 5 marks</p>
 <input type= 'number' name='sub5'><br>
 <input type= 'submit' value='Submit to display your marksheet'>
</form>
 </html>
 <?php


$name = $_POST['name'];
$sub1 = $_POST['sub1'];
$sub2 = $_POST['sub2'];
$sub3 = $_POST['sub3'];
$sub4 = $_POST['sub4'];
$sub5 = $_POST['sub5'];
$total = $sub1 + $sub2 + $sub3 + $sub4 + $sub4;
$percentage = $total/500*100;
 echo "Name : " .$name."\n"; 
 echo "Subject 1 Marks : ".$sub1."\n";
 echo "Subject 2 Marks : ".$sub2."\n";
 echo "Subject 3 Marks : ".$sub3."\n";
 echo "Subject 4 Marks : ".$sub4."\n";
 echo "Subject 5 Marks : ".$sub5."\n";
 echo "Total Marks Obtained : ".$total."\n";
 echo "Total Marks : 500"."\n";
 echo "Percentage : ".$percentage."\n" ;
?>