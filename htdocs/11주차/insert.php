<script language = "javascript">
function f_insert(){
  if (document.insert.id.value.length==0) {
     alert("학번을 입력하시요.");
     document.insert.id.focus(); 
     return; 
  }
  if (document.insert.id.value.length!=8) {
    alert("학번을 8자리 입력하시오.");
    document.insert.id.focus();
    return;
  }

  if (document.insert.name.value.length==0) {
     alert("성명을 입력하시오.");
     document.insert.name.focus(); 
     return; 
  }

  if (document.insert.pw.value.length==0) {
    alert("비밀번호를 입력하시오.");
    document.insert.pw.focus();
    return;
  }
  document.insert.submit();
}

</script>

<?php

print "<form name=insert method=post action='$PHP_SELF?flag=I'>";
print "학번 : <input type=text name='id' size='8' maxlength='8'>&nbsp;&nbsp;&nbsp;<br>";
print "성명 : <input type=text name='name' size='20' maxlength='20'><br>";
print "비밀번호 : <input type = password name = 'pw' size = '10' maxlength = '10'><br>";
print "<a href='JavaScript:f_insert()'>등록</a>";
print "</form>";

if($flag=='I'){

	$connect=mysql_connect("localhost","root","");
	mysql_select_db("php",$connect);

	$sql="insert into stud_mst(stud_id, stud_name, pass) values('$id','$name','$pw')";
	$result=mysql_query($sql,$connect);
	if($result == 1){
		print "<script>window.alert('등록되었습니다.')</script>";
	}
	else{
 		$error=mysql_error();		
		print "$sql ($error)";
	}  
}

?>