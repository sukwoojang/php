﻿<script language = "javascript">
function f_update(){
  if (document.update.name.value.length=0) {
     alert("성명을 입력하시오.");
     document.update.name.focus(); 
     return; 
  }
 if (document.update.pass.value.length==0) {
     alert("비밀번호를 입력하시오.");
     document.update.pass.focus(); 
     return; 
  }
	if ((document.update.gen[0].checked==0)&&(document.update.gen[1].checked==1)){
		alert("성별을 선택하시오.");
		document.update.gen.focus();
		return;
	}
  document.update.submit();
}

</script>

<?php
if($u_stud_id != ''){ #u_stud_id에 아무값이 없으면 sql에 연결되지 않도록 하게 하는것.
	$connect=mysql_connect("localhost","root","");
	mysql_select_db("php",$connect);

	$sql="select * from stud_mst where stud_id = $u_stud_id";
	$result=mysql_query($sql,$connect);

	mysql_data_seek($result, 0);
	$row=mysql_fetch_array($result);
}
$male = '';
$female = '';
if($row[gender] =='M')
	$male ='checked';
if($row[gender]=='F')
	$female = 'checked';
	
if ($row[auth] == 'S'){
	$super_user = 'selected';
	$normal_user = '';
	$not_user = '';
} else if ($row[auth] == 'N'){
	$normal_user = 'selected';
	$super_user = '';
	$not_user = '';
} else if ($row[auth] == ''){
	$normal_user = '';
	$super_user = '';
	$not_user = 'selected';
}
print "<form name=update method=post action='$PHP_SELF?flag=U'>";
print "학번 :$u_stud_id <br>";
print "<input type=hidden name='id' size='8' maxlength='8' value = '$u_stud_id'>";
print "성명 : <input type=text name='name' size='20' maxlength='20' value = '$row[stud_name]'><br>";
print "성별 : <input type=radio name='gen' value='M' $male>남&nbsp;&nbsp;<input type=radio name='gen' value='F' $female>여<br>";
print "비밀번호 : <input type=text name='pass' size='10' maxlength='10' value = '$row[pass]'><br>";
print "권한 : <select name='auth' size=1>";
print "<option value='S' $super_user>관리자";
print "<option value='N' $normal_user>사용자";
print "<option value='' $not_user>미승인";
print "</select><br>";
print "자기소개 : <br><textarea name = 'intro' rows='10' cols='70'> $row[intro]</textarea><br>";
print "<a href='JavaScript:f_update()'>수정</a>";
print "</form>";				

if($flag=='U'){

	$connect=mysql_connect("localhost","root","");
	mysql_select_db("php",$connect);

	$sql="update stud_mst set stud_name = '$name', pass = '$pass', updatetime = sysdate(), gender = '$gen', auth = '$auth', intro='$intro' where stud_id ='$id'";
	$result=mysql_query($sql,$connect);
	if($result == 1){
		print "<script>window.alert('수정되었습니다.')</script>";
		print "<meta http-equiv='refresh' content='0;URL=form.php?m=4' target='home.php'>";
	}
	else{
 		$error=mysql_error();		
		print "$sql ($error)";
	}  
}

?>