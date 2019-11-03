<?PHP
 function factorial ($x)
 {
	$y=1;
	do
	{
		$y=$y * $x;
		$x= $x-1;
	}while($x!=0);
 	return $y;
 }
if ($disp==1){
	$result = factorial($number);
	print $number."의 factorial은 ".$result. "입니다.";
}
else{
	$result = factorial($number);
	print $result. "입니다.";
}
?>