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
	print $number."�� factorial�� ".$result. "�Դϴ�.";
}
else{
	$result = factorial($number);
	print $result. "�Դϴ�.";
}
?>