<?PHP
if ($disp==1){
	$i = $from;
	$sum = 0;
	while ($i <= $end) {
		$sum = $sum + $i;
		$i = $i + 1;
	}

	print $from . "부터 " . $end ."까지의 합은 " . $sum . "입니다";
}
else{
	$i = $from;
	$sum = 0;
	while ($i <= $end) {
		$sum = $sum + $i;
		$i = $i + 1;
	}

	print $sum . "입니다";
}
?>