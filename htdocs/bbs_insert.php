<?php
session_start();

$connect=mysql_connect("localhost","root","");
mysql_select_db("php",$connect);

$sql="select * from bbs where reg_date='$reg_date'";
$result=mysql_query($sql,$connect);

print "<form name = 'bbs_insert' method = post action = '$PHP_SELF'>";
print "<input type = hidden name = 'flag'>";
if(mysql_num_rows($result)!=0){
   	mysql_data_seek($result,0);
   	$row=mysql_fetch_array($result);
  	print "�ۼ��� : $reg_date<br>";
	print "<input type=hidden name='reg_date' value='$row[reg_date]'>";
}
print "���� : <input type = text name = 'title' size = '50' maxlength = '50' value='$row[title]'><br>";
print "���� : <textarea name = 'subject' cols = '80' rows = '10'>$row[subject]</textarea><br>";
if(mysql_num_rows($result)==0) {
	print "<a href='JavaScript:f_bbs_insert()'>���</a>";
}
else {
	print "<a href='JavaScript:f_update()'>����</a>";
}
print "</form>";

?>