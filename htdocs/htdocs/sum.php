<?PHP
if ($disp==1){
	$i = $from;
	$sum = 0;
	while ($i <= $end) {
		$sum = $sum + $i;
		$i = $i + 1;
	}

	print $from . "���� " . $end ."������ ���� " . $sum . "�Դϴ�";
}
else{
	$i = $from;
	$sum = 0;
	while ($i <= $end) {
		$sum = $sum + $i;
		$i = $i + 1;
	}

	print $sum . "�Դϴ�";
}
?>