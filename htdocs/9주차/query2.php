<?php

$connect=mysql_connect("localhost","root",""); #�������� ���, ���ڴ� ����ip, �����id, password
mysql_select_db("php",$connect); #db�� php DB�� ����
//$id = $id . "%"; #�������� �� ������� like������ ����Ҷ��� ���ϵ�Ű���� %�� �ʿ�

if ($id != "" && $name == "") {
	$id = $id . "%";
	$search = "stud_id like '$id'";
}
elseif ($id == "" && $name != "") {
	$name = $name . "%";
	$search = "stud_name like '$name'";
}
elseif ($id != "" && name != "") {
	$id = $id . "%";
	$name = $name . "%";
	$search = "stud_id like '$id' and stud_name like '$name'"; #�������� ���� ����
}

$sql="select count(*) from stud_mst where $search"; #sql����,����where�ڿ� like Ȥ�� = �� ���,count()�� ���ǿ��´� ���� ����
$result=mysql_query($sql,$connect); #sql������ connect ������ db�� �о result�� ����
#mysql_data_seek($result, 0); #���ǿ� ���� ����� �������� ��찡 �ִµ� �׷���� �ι�° ���ڴ� �ε������� �־��ش�
$row=mysql_fetch_array($result); #���࿡�� �����͸� �д´�
$cnt = $row[0]; #���������� �������� �Ʒ� �ݺ��� ������ $row�� ��� �ٲ�Եȴ�
#print $row[0]; #������ ���� ���

if ($cnt != 0) {
	$sql="select stud_id, stud_name from stud_mst where $search";
	print $sql . "<br>"; //*********
	$result=mysql_query($sql,$connect);
	for ($i = 0; $i < $cnt ;$i++){#for�� ��� �˾Ƶ���
		mysql_data_seek($result, $i);
		$row=mysql_fetch_array($result);
		print $row[stud_id] . " , " . $row[stud_name] . "<br>"; #mysql_fetch_array�� ����Ͽ��⶧���� $row[]���ο� �ε������̳� ���̸��� �ĵ� �Ѵ� �ȴ�.
	}
	print "<script>window.alert('��ȸ�Ϸ�')</script>";
}
else {
	print "<script>window.alert('�ڷ����')</script>";
}

?>