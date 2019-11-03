<?php

if($flag!='D'){
$connect=mysql_connect("localhost","root","");
mysql_select_db("php",$connect);

if ($id !=''){
	$search = "stud_id like '" .$id. "%'";
	if ($nm !='') {
		$search = $search ." and stud_name like '" .$nm. "%'";
	}
}
else {
	$search = "stud_name like '" .$nm. "%'";
}

$sql="select count(*) from stud_mst where $search";
$result=mysql_query($sql,$connect);
$row=mysql_fetch_array($result);
$cnt = $row[0];    //이름 바꿔도 상관없다. 다만 [0]을 넣어줘야한다.
if ($cnt != 0) {
	  //print "<script>window.alert('Inquiring Complete')</script>";
	if ($sort == 'A') {
		$search = "$search order by stud_id asc";
	} else {
		$search = "$search order by stud_id desc";
	}
	$sql="select * from stud_mst where $search"; // *는 모든 field를 다 읽는다.
	
	$result=mysql_query($sql,$connect);

	print "<table border = 1>";
	print "<tr>";
	print "<td><center>ID</center></td><td><center>Name</center></td><td><center>권한</td><td><center>등록일</center></td><td><center>수정일</center><td><center>성별</center></td></td><td><center>삭제</center></td><td><center>수정</center></td>";
	print "</tr>";
	
	for ( $i = 0 ; $i < $cnt ; $i++ ){
		mysql_data_seek($result, $i);
		$row=mysql_fetch_array($result);
		if($row[gender]=='M')
			$gender = '남';		
		elseif($row[gender]=='F')
			$gender = '여';
		else 
			$gender ='';		
		print "<form name=delete method=post action='$PHP_SELF?flag=D'>";		
		print "<tr>";
		print "<td>".$row[stud_id]. "</td><td>" . $row[stud_name]."</td>";
		print "<td>".$row[auth]. "</td><td>".$row[reg_date]."</td><td>".$row[updatetime]."</td><td>".$gender."</td>";
		print "<td><input type = submit value = '삭제'></td>";
		print "<td><a href='update.php?u_stud_id=$row[stud_id]' target='home'>수정</a></td>";
		print "</tr>";
		print "<input type=hidden name='id' value=$row[stud_id]>"; // input type을 hidden으로 하게되면 레코드가 보이지않는다.
		print "<input type=hidden name='pass' value=$row[pass]>";
		print "</form>";
		}
	print "</table>";
	print "<script>window.alert('조회완료')</script>";
	
		
}
	
else {
   print "<script>window.alert('No Data')</script>";
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