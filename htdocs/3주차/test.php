<?PHP
$i = 3;

print ++$i;

print $i++;

print "<p>";

print $i += $i;

print "<p>";

 $result = sin (M_PI / 6); #M_PI�� ����
 print "sin(30) = $result<br>";
 $result = cos (M_PI / 6);
 print "cos(30) = $result<br>";

print "<p>";

 $result = 1;
 if ($result > 0){
 $result = $result / 2;
 $result = $result * 5;
}#���ȣ�� �� �ᵵ ����
 print "$result<br>";

print "<p>";

 $a = 123;
 $b = 456;
 if ($a == $b)
 print "�� ���� �����ϴ�.<br>";
 if ($a != $b)
 print "�� ���� ���� �ʽ��ϴ�.<br>";
 if ($a < $b)
 print "$a ���� $b ������ �۽��ϴ�.<br>";
 if ($a > $b)
 print "$a ���� $b ������ Ů�ϴ�.<br>";
 if ($a <= $b)
 print "$a ���� $b ������ �۰ų� �����ϴ�.<br>";
 if ($a >= $b)
 print "$a ���� $b ������ ũ�ų� �����ϴ�.<br>";

print "<p>";

 $num = 5;
 (($num % 2) == 1) ? print "Ȧ��" : print "¦��";#if���� �� ��,?�ڿ� ���ڴ� True,���ڴ� False

print "<p>";

 if($a == 123 xor $b !=456)
 print "a�� 1, b�� 0";
?>