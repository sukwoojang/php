<?php

session_start();

$connect=mysql_connect("localhost","root","");
mysql_select_db("php",$connect);

$sql="select bbs.reg_date, stud_mst.stud_name, bbs.title, bbs.level, bbs.seq1, length(subject) as size from bbs, stud_mst where bbs.stud_id = stud_mst.stud_id order by seq1 asc, seq2, seq3, seq4, seq5
";
$result=mysql_query($sql,$connect);
$count=mysql_num_rows($result);
print "<a href='./bbs_insert_new.php' target='home'>글쓰기</a><hr>";
if($count==0){
	print "<script>window.alert('등록된 글이 없습니다.')</script>";
} else {


	for($k=0; $k<$count; $k++) {
		mysql_data_seek($result,$k);
        $row=mysql_fetch_array($result);
        
        $i = $row[level];
		$space = '';
		while($i != 1) {
			$space = $space . "&nbsp;&nbsp;";
			$i = $i - 1;
		}
		if ($row[level]==1)
			$level = $row[seq1];
		else
			$level = "&nbsp;";

		print "$level $space $row[reg_date]&nbsp;&nbsp;&nbsp;$row[stud_name]&nbsp;&nbsp;&nbsp;<a href='./bbs_insert_new.php?reg_date=$row[reg_date]' target='home'>$row[title]</a> $row[size] byte<br>";

	}
}

?>