<?PHP
$i = 3;

print ++$i;

print $i++;

print "<p>";

print $i += $i;

print "<p>";

 $result = sin (M_PI / 6); #M_PI는 파이
 print "sin(30) = $result<br>";
 $result = cos (M_PI / 6);
 print "cos(30) = $result<br>";

print "<p>";

 $result = 1;
 if ($result > 0){
 $result = $result / 2;
 $result = $result * 5;
}#대괄호는 안 써도 무방
 print "$result<br>";

print "<p>";

 $a = 123;
 $b = 456;
 if ($a == $b)
 print "두 값이 같습니다.<br>";
 if ($a != $b)
 print "두 값이 같지 않습니다.<br>";
 if ($a < $b)
 print "$a 값이 $b 값보다 작습니다.<br>";
 if ($a > $b)
 print "$a 값이 $b 값보다 큽니다.<br>";
 if ($a <= $b)
 print "$a 값이 $b 값보다 작거나 같습니다.<br>";
 if ($a >= $b)
 print "$a 값이 $b 값보다 크거나 같습니다.<br>";

print "<p>";

 $num = 5;
 (($num % 2) == 1) ? print "홀수" : print "짝수";#if문의 한 예,?뒤에 전자는 True,후자는 False

print "<p>";

 if($a == 123 xor $b !=456)
 print "a는 1, b는 0";
?>