<?PHP
$result = $number % 2;
if ($disp==1){
	if ($result == 0)
   		print $number . " Àº(´Â) Â¦¼ö";
	else
   		print $number . " Àº(´Â) È¦¼ö";
	}
else{
	if ($result == 0)
   		print "Â¦¼ö";
	else
   		print "È¦¼ö";
}

?>