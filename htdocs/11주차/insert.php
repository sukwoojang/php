<script language = "javascript">
function f_insert(){
  if (document.insert.id.value.length==0) {
     alert("�й��� �Է��Ͻÿ�.");
     document.insert.id.focus(); 
     return; 
  }
  if (document.insert.id.value.length!=8) {
    alert("�й��� 8�ڸ� �Է��Ͻÿ�.");
    document.insert.id.focus();
    return;
  }

  if (document.insert.name.value.length==0) {
     alert("������ �Է��Ͻÿ�.");
     document.insert.name.focus(); 
     return; 
  }

  if (document.insert.pw.value.length==0) {
    alert("��й�ȣ�� �Է��Ͻÿ�.");
    document.insert.pw.focus();
    return;
  }
  document.insert.submit();
}

</script>

<?php

print "<form name=insert method=post action='$PHP_SELF?flag=I'>";
print "�й� : <input type=text name='id' size='8' maxlength='8'>&nbsp;&nbsp;&nbsp;<br>";
print "���� : <input type=text name='name' size='20' maxlength='20'><br>";
print "��й�ȣ : <input type = password name = 'pw' size = '10' maxlength = '10'><br>";
print "<a href='JavaScript:f_insert()'>���</a>";
print "</form>";

if($flag=='I'){

	$connect=mysql_connect("localhost","root","");
	mysql_select_db("php",$connect);

	$sql="insert into stud_mst(stud_id, stud_name, pass) values('$id','$name','$pw')";
	$result=mysql_query($sql,$connect);
	if($result == 1){
		print "<script>window.alert('��ϵǾ����ϴ�.')</script>";
	}
	else{
 		$error=mysql_error();		
		print "$sql ($error)";
	}  
}

?>