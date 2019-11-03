<?PHP
 $sum = 0;
 $i = $start;
 while ($start < $end + 1)
 {
	$sum = $sum + $start;
	$start = $start + 1;
 }

if ($disp == 1)
	print $i . "부터" . $end . "까지의 합 = " . $sum;
else
	print $sum
?>