//Vowel or consonants
<?php
$char = readline('Enter a string:');
switch($char){
case 'a':
case 'e':
case 'i':
case 'o':
case 'u':
echo $char." is a vowel.";
break;
default:
echo $char." is a consonant.";
}
?>