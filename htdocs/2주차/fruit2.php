<?PHP
   $fruit = array ("���" => 10, "��" => 20, "������" => 30,
  	          "����" => 40, "��" => 50, "�丶��" => 60,
 	          "�ٳ���" => 70, "Ű��" => 80, "���ξ���" => 90,
	          "����" => 100);

   print "������" . $low . "�� ������ ������ ����Դϴ�.";
   print "<table border=1>
	<tr><th>�̸�</th><th>����</th></tr>";

   foreach ($fruit as $name => $price)
   	{
   	if ($price <= $low)
   		print "<tr><td>" . $name . "</td><td>" . $price . "</td></tr>";
   	}
   print "</table>";
?>