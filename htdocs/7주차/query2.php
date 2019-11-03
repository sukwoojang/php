<?php

$connect=mysql_connect("localhost","root",""); #고정으로 사용, 인자는 로컬ip, 사용자id, password
mysql_select_db("php",$connect); #db내 php DB에 연결
//$id = $id . "%"; #이형식을 잘 기억하자 like조건을 사용할때는 와일드키같은 %가 필요

if ($id != "" && $name == "") {
	$id = $id . "%";
	$search = "stud_id like '$id'";
}
elseif ($id == "" && $name != "") {
	$name = $name . "%";
	$search = "stud_name like '$name'";
}
elseif ($id != "" && name != "") {
	$id = $id . "%";
	$name = $name . "%";
	$search = "stud_id like '$id' and stud_name like '$name'"; #복합조건 사용법 숙지
}

$sql="select count(*) from stud_mst where $search"; #sql구문,조건where뒤에 like 혹은 = 를 사용,count()는 조건에맞는 행의 개수
$result=mysql_query($sql,$connect); #sql구문과 connect 변수로 db를 읽어서 result에 저장
#mysql_data_seek($result, 0); #조건에 따라 결과가 여러개일 경우가 있는데 그럴경우 두번째 인자는 인덱스값을 넣어준다
$row=mysql_fetch_array($result); #한행에서 데이터를 읽는다
$cnt = $row[0]; #변수설정에 주의하자 아래 반복문 들어갔을시 $row가 계속 바뀌게된다
#print $row[0]; #읽혀진 개수 출력

if ($cnt != 0) {
	$sql="select stud_id, stud_name from stud_mst where $search";
	print $sql . "<br>"; //*********
	$result=mysql_query($sql,$connect);
	for ($i = 0; $i < $cnt ;$i++){#for문 용법 알아두자
		mysql_data_seek($result, $i);
		$row=mysql_fetch_array($result);
		print $row[stud_id] . " , " . $row[stud_name] . "<br>"; #mysql_fetch_array를 사용하였기때문에 $row[]내부에 인덱스값이나 열이름을 쳐도 둘다 된다.
	}
	print "<script>window.alert('조회완료')</script>";
}
else {
	print "<script>window.alert('자료없음')</script>";
}

?>