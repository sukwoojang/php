<?php
if ($flag != 'D') {
$connect=mysql_connect("localhost","root",""); #�������� ���, ���ڴ� ����ip, �����id, password
mysql_select_db("php",$connect); #db�� php DB�� ����
$id = $id . "%"; #�������� �� ������� like������ ����Ҷ��� ���ϵ�Ű���� %�� �ʿ�
$name = $name . "%";
if ($id != "") {
	$search = "stud_id like '" . $id . "%'"; #���迡 ���� ū����ǥ ��������ǥ����
	if ($name != "") {
		$search = $search . " and stud_name like '" . $name . "%'";
	}
}	else {
		$search = "stud_name like '" . $name . "%'";
}

$sql="select count(*) from stud_mst where $search"; #sql����,����where�ڿ� like Ȥ�� = �� ���,count()�� ���ǿ��´� ���� ����
$result=mysql_query($sql,$connect); #sql������ connect ������ db�� �о result�� ����
#mysql_data_seek($result, 0); #���ǿ� ���� ����� �������� ��찡 �ִµ� �׷���� �ι�° ���ڴ� �ε������� �־��ش�
$row=mysql_fetch_array($result); #���࿡�� �����͸� �д´�
$cnt = $row[0]; #���������� �������� �Ʒ� �ݺ��� ������ $row�� ��� �ٲ�Եȴ�
#print $row[0]; #������ ���� ���

if ($cnt != 0) {
	$sql="select * from stud_mst where $search";
	$result=mysql_query($sql,$connect);
	print "<table border = 1><tr><td><b><center>�й�</center></b></td><td><b><center>�̸�</center></b></td><td><b><center>����</center></b></td><td><b>����</b></td></tr>";
	for ($i = 0; $i < $cnt ;$i++){#for�� ��� �˾Ƶ���
		mysql_data_seek($result, $i);
		$row=mysql_fetch_array($result);
		print "<form name = delete method = post action = '$PHP_SELF?flag=D'><tr><td><center>$row[stud_id]</center></td><td><center>$row[stud_name]</center></td>"; #mysql_fetch_array�� ����Ͽ��⶧���� $row[]���ο� �ε������̳� ���̸��� �ĵ� �Ѵ� �ȴ�.
		print "<td><input type = submit value = '����'></td><td><a href='update.php?u_stud_id=$row[stud_id]&u_stud_name=$row[stud_name]&u_pass=$row[pass]' target='home'>����</a></td></tr><input type = hidden name = 'id' value = $row[stud_id]><input type = hidden name = 'pass' value = $row[pass]></form>";
	}
	print "</table>";
	print "<script>window.alert('��ȸ�Ϸ�')</script>";
}
else {
	print "<script>window.alert('�ڷ����')</script>";
}
}
if($flag=='D'){

	$connect=mysql_connect("localhost","root","");
	mysql_select_db("php",$connect);

	$sql="delete from stud_mst where stud_id = '$id'";
	$result=mysql_query($sql,$connect);
	if($result == 1){
		print "<script>window.alert('�����Ǿ����ϴ�.')</script>";
	}
	else{
 		$error=mysql_error();		
		print "$sql ($error)";
	}  
}
?>