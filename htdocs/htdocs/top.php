<?PHP
session_register('user_id'); //재사용가능하게 만들어줌 리셋해줘도 고정됨
session_register('user_name');

session_start(); // 선언한 변수 사용
?>

<script language = "javascript">
function f_login(){
  if (document.login.id.value.length==0) {
     alert("학번을 입력하시요.");
     document.login.id.focus(); 
     return; 
  }

  if (document.login.pass.value.length==0) {
     alert("비밀번호를 입력하시오.");
     document.login.pass.focus(); 
     return; 
  }
  document.login.submit();
}

</script>

<?php

print " <table border =0>";
print "<tr><td><img src='./images/inha.png' width=80 height=25></td>";

if($user_id == ""){
	print "<form name=login method=post action='$PHP_SELF?flag=R'>";
	print "<td>ID : <input type=text name='id' size='8' maxlength='8'>&nbsp;&nbsp;</td>";
	print "<td>비밀번호 : <input type=password name='pass' size='10' maxlength='10'>&nbsp;</td>";
	print "<td><a href='JavaScript:f_login()'>로그인</a>&nbsp;</td>";
	print "<td><a href=./insert.php target = 'home'>회원등록</a></td></tr></table>";
	print "</form>";
	
	
}else{

	print "<td>$user_name 님 환영합니다.&nbsp&nbsp&nbsp</td>";
	print "<td><a href='./top.php?flag=logout' target = 'top'>Logout</a></td>";
}
print "</tr></table>";


if($flag=='R'){

	$connect=mysql_connect("localhost","root","");
	mysql_select_db("php",$connect);
	

	$sql="select * from stud_mst where stud_id ='$id' and pass='$pass' ";
	$result=mysql_query($sql,$connect);
	if(mysql_num_rows($result)!=0){
		mysql_data_seek($result, 0);
		$row=mysql_fetch_array($result);
		$user_id = $row[stud_id];
		$user_name = $row[stud_name];
		print "<script>window.alert('$user_name 님, 로그인되었습니다.')</script>";
		$user_id = $id;
		print "<script>parent.location.reload(true)</script>";
	}
	else{
		print "<script>window.alert('입력한 아이디가 없거나 비밀번호가 틀림.')</script>";
 		
	}  
}
if($flag == 'logout'){
	session_destroy();
	print "<script>window.alert('로그아웃 되었습니다.')</script>";
	print "<script>parent.location.reload(true)</script>";
}

?>