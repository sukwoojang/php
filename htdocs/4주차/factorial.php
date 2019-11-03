<?php
 function factorial ($x)
 {
 	$result = 1;
 do
 {
	$result = $result * $x;
	$x = $x - 1;
 }while ($x != 0);
 return $result;
 }
 $i = factorial ($fac_num);
 print $i;
?>