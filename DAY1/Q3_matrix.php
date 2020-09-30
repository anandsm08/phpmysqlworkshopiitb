<?php
    $a=array(array(2,3),
	array(10,7));
    $b=array(array(8,3),
	array(4,3));

    echo "Matrix Addition :","\n";

    for($i=0;$i<2;$i++)
    {
        for($j=0;$j<2;$j++)
        {
            echo $a[$i][$j]+$b[$i][$j]." ";
        }
        echo "\n";
    }
?>