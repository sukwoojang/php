<?PHP
 $sum = 0;
 $i = $start;
 while ($start < $end + 1)
 {
	$sum = $sum + $start;
	$start = $start + 1;
 }

if ($disp == 1)
	print $i . "����" . $end . "������ �� = " . $sum;
else
	print $sum
?>