<?php
	session_register('user_id');
	session_register('user_name');

	session_start();
?>


<script language = "javascript">
function f_login(){
  if (document.login.id.value.length==0) {
     alert("ID�� �Է��Ͻÿ�.");
     document.login.id.focus(); 
     return; 
  }

  if (document.login.pw.value.length==0) {
    alert("��й�ȣ�� �Է��Ͻÿ�.");
    document.login.pw.focus();
    return;
  }
  document.login.submit();
}

</script>

<?php
print "<table border = 0><tr><td>";
print "<img src='./images/logo.png' width=80 height=20></td>";
if($user_id == ''){
	print "<td><form name=login method=post action='$PHP_SELF?flag=R'>";
	print "ID : <input type=text name='id' size='8' maxlength='8'>";
	print "��й�ȣ : <input type = password name = 'pw' size = '10' maxlength = '10'>";
	print "&nbsp;<a href='JavaScript:f_login()'>�α���</a>";
	print "</form></td>";
	print "<td><a href = './insert.php' target = 'home'>ȸ������</a></td>";
}
else{
	print "<td>$user_name$nbsp$nbsp$nbsp</td>";
	print "<td><a href='./top.php?flag=logout' target = 'top'>Logout</a></td>";
}
print "</tr></table>";

if($flag=='R'){

	$connect=mysql_connect("localhost","root","");
	mysql_select_db("php",$connect);

	$sql="select * from stud_mst where stud_id = '$id' and pass = '$pw'";
	$result=mysql_query($sql,$connect);
	if(mysql_num_rows($result) != 0){
		mysql_data_seek($result, 0);
		$row = mysql_fetch_array($result);
		print "<script>window.alert('$row[stud_name]�� �ݰ����ϴ�.')</script>";
		$user_id = $id;
		$user_name = $row[stud_name];
		print "<script>parent.location.reload(true)</script>";
	}
	else{
 		print "<script>window.alert('�������� �ʴ� ID�̰ų� ��й�ȣ�� Ʋ�Ƚ��ϴ�.')</script>";
	}  
}
if($flag == logout){
	session_destroy();
	print "<script>window.alert('�α׾ƿ� �Ǿ����ϴ�.')</script>";
	print "<script>parent.location.reload(true)</script>";
}

?>