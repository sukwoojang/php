<script language = "javascript">
function f_delete(){

  document.delete.submit();
}

</script>

<?php

print "<form name=delete method=post action='$PHP_SELF?flag=D'>";
print "<input type = submit value = '����'>";
print "</form>";

if($flag=='D'){

	$connect=mysql_connect("localhost","root","");
	mysql_select_db("php",$connect);

	$sql="delete from stud_mst";
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