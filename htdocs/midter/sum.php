<?php
function sum($x, $y) {
	$result = 0;
	do {
		$result += $x;
		$x += 1;
	} while ($x <= $y);
	return $result;
}
$sum = sum($low, $high);
print $low ."���� " . $high . "������ ���� " . $sum . "�Դϴ�";
?>	