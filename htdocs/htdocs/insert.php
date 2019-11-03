<script language = "javascript">
function f_insert(){
  if (document.insert.id.value.length==0) {
     alert("학번을 입력하시요.");
     document.insert.id.focus(); 
     return; 
  }
  if (document.insert.id.value.length!=8) {
     alert("학번은 8자리로 입력하시오.");
     document.insert.id.focus(); 
     return; 
  }
  if (document.insert.name.value.length=0) {
     alert("성명을 입력하시오.");
     document.insert.name.focus(); 
     return; 
  }
  if ((document.insert.gen[0].checked==0)&&(document.insert.gen[1].checked==0)) {
    alert("성별을 선택하시오");
    document.insert.gen.focus();
    return;
  }
  if (document.insert.pass.value.length==0) {
     alert("비밀번호를 입력하시오.");
     document.insert.pass.focus(); 
     return; 
  }

  document.insert.submit();
}

</script>

<?php

print "<form name=insert method=post action='$PHP_SELF?flag=I'>";
print "학번 : <input type=text name='id' size='8' maxlength='8'><br>";
print "성명 : <input type=text name='name' size='20' maxlength='20'><br>";
print "성별 : <input type=radio name='gen' value='M'>남&nbsp;&nbsp;<input type=radio name='gen' value='F'>여<br>";
print "비밀번호 : <input type=password name='pass' size='10' maxlength='10'><br>";
print "자기소개 : <br><textarea name = 'intro' rows = '10', cols = '70'></textarea><br>";
print "<a href='JavaScript:f_insert()'>등록</a>";
print "</form>";

if($flag=='I'){

	$connect=mysql_connect("localhost","root","");
	mysql_select_db("php",$connect);

	$sql="insert into stud_mst(stud_id, stud_name, pass, reg_date, gender, intro) values('$id','$name', '$pw', sysdate(), '$gen', '$intro')";
	$result=mysql_query($sql,$connect);
	if($result == 1){
      print "<script>window.alert('등록되었습니다.')</script>";
      print "<script>parent.location.reload(true)</script>";

	}
	else{
 		$error=mysql_error();		
		print "$sql ($error)";
	}  
}

?>