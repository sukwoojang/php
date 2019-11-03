<?php
if ($flag != 'D') {
$connect=mysql_connect("localhost","root",""); #고정으로 사용, 인자는 로컬ip, 사용자id, password
mysql_select_db("php",$connect); #db내 php DB에 연결
$id = $id . "%"; #이형식을 잘 기억하자 like조건을 사용할때는 와일드키같은 %가 필요
$name = $name . "%";
if ($id != "") {
	$search = "stud_id like '" . $id . "%'"; #시험에 나옴 큰따옴표 작은따옴표사용법
	if ($name != "") {
		$search = $search . " and stud_name like '" . $name . "%'";
	}
}	else {
		$search = "stud_name like '" . $name . "%'";
}

$sql="select count(*) from stud_mst where $search"; #sql구문,조건where뒤에 like 혹은 = 를 사용,count()는 조건에맞는 행의 개수
$result=mysql_query($sql,$connect); #sql구문과 connect 변수로 db를 읽어서 result에 저장
#mysql_data_seek($result, 0); #조건에 따라 결과가 여러개일 경우가 있는데 그럴경우 두번째 인자는 인덱스값을 넣어준다
$row=mysql_fetch_array($result); #한행에서 데이터를 읽는다
$cnt = $row[0]; #변수설정에 주의하자 아래 반복문 들어갔을시 $row가 계속 바뀌게된다
#print $row[0]; #읽혀진 개수 출력

if ($cnt != 0) {
	$sql="select * from stud_mst where $search";
	$result=mysql_query($sql,$connect);
	print "<table border = 1><tr><td><b><center>학번</center></b></td><td><b><center>이름</center></b></td><td><b><center>삭제</center></b></td><td><b>수정</b></td></tr>";
	for ($i = 0; $i < $cnt ;$i++){#for문 용법 알아두자
		mysql_data_seek($result, $i);
		$row=mysql_fetch_array($result);
		print "<form name = delete method = post action = '$PHP_SELF?flag=D'><tr><td><center>$row[stud_id]</center></td><td><center>$row[stud_name]</center></td>"; #mysql_fetch_array를 사용하였기때문에 $row[]내부에 인덱스값이나 열이름을 쳐도 둘다 된다.
		print "<td><input type = submit value = '삭제'></td><td><a href='update.php?u_stud_id=$row[stud_id]&u_stud_name=$row[stud_name]&u_pass=$row[pass]' target='home'>수정</a></td></tr><input type = hidden name = 'id' value = $row[stud_id]><input type = hidden name = 'pass' value = $row[pass]></form>";
	}
	print "</table>";
	print "<script>window.alert('조회완료')</script>";
}
else {
	print "<script>window.alert('자료없음')</script>";
}
}
if($flag=='D'){

	$connect=mysql_connect("localhost","root","");
	mysql_select_db("php",$connect);

	$sql="delete from stud_mst where stud_id = '$id'";
	$result=mysql_query($sql,$connect);
	if($result == 1){
		print "<script>window.alert('삭제되었습니다.')</script>";
	}
	else{
 		$error=mysql_error();		
		print "$sql ($error)";
	}  
}
?>