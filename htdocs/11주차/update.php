<script language = "javascript">
function f_update(){
  if (document.update.name.value.length==0) {
     alert("성명을 입력하시오.");
     document.update.name.focus(); 
     return; 
  }

  if (document.update.pass.value.length==0) {
    alert("비밀번호를 입력하시오.");
    document.update.pass.focus();
    return;
  }
  document.update.submit();
}

</script>

<?php

print "<form name=update method=post action='$PHP_SELF?flag=U'>";
print "학번 : $u_stud_id<input type=hidden name='id' value = '$u_stud_id'><br>";
print "성명 : <input type=text name='name' size='20' maxlength='20' value = '$u_stud_name'><br>";
print "비밀번호 : <input type = text name = 'pass' size = '10' maxlength = '10' value = '$u_pass'><br>";
print "<a href='JavaScript:f_update()'>수정</a>";
print "</form>";

if($flag=='U'){

	$connect=mysql_connect("localhost","root","");
	mysql_select_db("php",$connect);

	$sql="update stud_mst set stud_name = '$name' , pass = '$pass' where stud_id = '$id'";
	$result=mysql_query($sql,$connect);
	if($result == 1){
		print "<script>window.alert('수정되었습니다.')</script>";
		print "<meta http-equiv='refresh' content='0;URL=form.php?m=4' target='home'>";
	}
	else{
 		$error=mysql_error();		
		print "$sql ($error)";
	}  
}

?>