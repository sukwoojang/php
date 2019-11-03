<?php
$connect = mysql_connect("localhost","root","");
mysql_select_db("php",$connect);
if ($id != "") {
	$search = "stud_id like '" . $id . "%'";
	if ($nm != "") {
		$search = $search . " and stud_name like '" . $nm . "%'";
	}
}
if ($nm != "") {
	$search = "stud_name like '" . $nm . "%'";
}
$sql = "select count(*) from stud_mst where $search";
$result = mysql_query($sql, $connect);
$row = mysql_fetch_array($result);
$cnt = $row[0];

if ($cnt != 0) {
	for ($i = 0 ; $i < $cnt ; $i++) {
		$sql = "select stud_id, stud_name from stud_mst where $search";
		$result = mysql_query($sql, $connect);
		mysql_data_seek($result, $i);
		$row = mysql_fetch_array($result);
		print $row[stud_id] . " , " . $row[stud_name] . "<br>";
	}
	print "<script>window.alert('조회 끝~~!!')</script>";
}
else {
	print "<script>window.alert('자료가 없단다')</script>";
}
?>