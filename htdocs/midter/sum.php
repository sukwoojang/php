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
print $low ."부터 " . $high . "까지의 합은 " . $sum . "입니다";
?>	