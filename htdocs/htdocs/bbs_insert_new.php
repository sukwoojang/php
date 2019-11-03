<?php
session_start();
?>

<script language = "javascript">

function f_insert(){
  if (document.insert.title.value.length==0) {
     alert("제목을 입력하세요.");
     document.insert.title.focus(); 
     return; 
  }

  if (document.insert.subject.value.length==0) {
     alert("내용을 입력하세요.");
     document.insert.subject.focus(); 
     return; 
  }

  document.insert.flag.value = 'I';
  document.insert.submit();
}

function f_update(){
  document.insert.flag.value = 'U';
  document.insert.submit();
}

function f_reply_set(){
	  document.insert.flag.value = 'RS'; //답변을 위한 준비; Re: 삽입
	  document.insert.submit();
}

function f_reply(){
	  document.insert.flag.value = 'RP'; //답변등록
	  document.insert.submit();
}

function f_delete(){
	  document.insert.flag.value = 'D';
	  document.insert.submit();
}

</script>

<?php

$connect=mysql_connect("localhost","root","");
mysql_select_db("php",$connect);

$sql="select * from bbs where reg_date='$reg_date'";
$result=mysql_query($sql,$connect);

print "<form name=insert method=post action='$PHP_SELF'>";
print "<input type=hidden name='flag'>"; //등록, 수정, 답변, 답변등록 중에서 선택한 기능의 상태를 setting

if(mysql_num_rows($result)!=0){
   mysql_data_seek($result,0);
   $row=mysql_fetch_array($result);
   print "작성일 : $reg_date<br>";
   print "<input type=hidden name='reg_date' value='$row[reg_date]'>";
   print "<input type=hidden name='seq1' value='$row[seq1]'>"; // 답변, 삭제를 위한 조건문 생성에 사용
   print "<input type=hidden name='seq2' value='$row[seq2]'>"; //                    "
   print "<input type=hidden name='seq3' value='$row[seq3]'>"; //                    "
   print "<input type=hidden name='seq4' value='$row[seq4]'>"; //                    "
   print "<input type=hidden name='seq5' value='$row[seq5]'>"; //                    "
   print "<input type=hidden name='level' value='$row[level]'>"; //                    "

   if($flag != 'RS'){
	$retitle = $row[title];
   } else {
	$retitle = 'Re:' . $row[title];
   }
}
   if($row[reg_date] != ''){
	$resubject = $row[subject];
   } else {
	$resubject = "내용은 3줄 이상\n===============";
   }

print "제목 : <input type=text name='title' size='50' maxlength='50' value=$retitle><br>";
print "내용 : <textarea name='subject' cols='80' rows='10'>$resubject</textarea><br>";
if(mysql_num_rows($result)==0) {
   print "<a href='JavaScript:f_insert()'>등록</a>&nbsp;&nbsp;&nbsp;";
}

if(($user_id == $row[stud_id])&&($flag != 'RS')){
   print "<a href='JavaScript:f_update()'>수정</a>&nbsp;&nbsp;&nbsp;<a href='JavaScript:f_delete()'>삭제</a>&nbsp;&nbsp;&nbsp;";
}

if(mysql_num_rows($result)!=0){
   if($flag != 'RS'){
      print "<a href='JavaScript:f_reply_set()'>답변</a>";
   } else {
      print "<a href='JavaScript:f_reply()'>답변등록</a><br>";
      print "<a href='JavaScript:history.go(-1)'>cancel</a>";
   }
}

print "</form>";

if($flag=='I'){

	$connect=mysql_connect("localhost","root","");
	mysql_select_db("php",$connect);

	$sql="select max(seq1) as max_seq from bbs";
	$result=mysql_query($sql,$connect);

	mysql_data_seek($result,0);
	$row=mysql_fetch_array($result);

	$sql="insert into bbs(reg_date, stud_id, title, subject, seq1, level) values(sysdate(),'$user_id','$title', '$subject', $row[max_seq]+1, 1)";
	$result=mysql_query($sql,$connect);
	if($result==1){
		print "<script>window.alert('등록되었습니다.')</script>";
		print "<meta http-equiv='refresh' content='0;URL=bbs.php'>";
	}
	else{
 		$error=mysql_error();		
		print "$sql ($error)";
	}  
}

if($flag=='U'){

	$connect=mysql_connect("localhost","root","");
	mysql_select_db("php",$connect);

	$sql="update bbs set title = '$title', subject = '$subject' where reg_date = '$reg_date'";
	$result=mysql_query($sql,$connect);
	if($result==1){
		print "<script>window.alert('수정되었습니다.')</script>";
		print "<meta http-equiv='refresh' content='0;URL=bbs.php'>";
	}
	else{
 		$error=mysql_error();		
		print "$sql ($error)";
	}  
}

if($flag=='RP'){
	$connect=mysql_connect("localhost","root","");
	mysql_select_db("php",$connect);

	$make_where = "seq1='$seq1'";
	if($level==2)
		$make_where = $make_where . " and seq2='$seq2'";
	if($level==3)
		$make_where = $make_where . " and seq3='$seq3'";
	if($level==4)
		$make_where = $make_where . " and seq4='$seq4'";
	if($level==5)
		$make_where = $make_where . " and seq5='$seq5'";

	$level++; //답변 level은 선택한 글 level에 +1 이 된다
	$sql="select max(seq" . $level . ") as max_seq from bbs where " . $make_where;

	$result=mysql_query($sql,$connect);
	mysql_data_seek($result,0);
	$row=mysql_fetch_array($result);

	if($level==2) //이미 level이라는 변수는 증가되어 있음.
		$seq2 = $row[max_seq] + 1;
	if($level==3)
		$seq3 = $row[max_seq] + 1;
	if($level==4)
		$seq4 = $row[max_seq] + 1;
	if($level==5)
		$seq5 = $row[max_seq] + 1;

	$sql="insert into bbs(reg_date, stud_id, title, subject, level, seq1, seq2, seq3, seq4, seq5)
                    values(sysdate(),'$user_id','$title', '$subject', '$level', '$seq1', '$seq2', '$seq3', '$seq4', '$seq5')";
	$result=mysql_query($sql,$connect);
	if($result==1){
		print "<script>window.alert('답변이 등록되었습니다.')</script>";
		print "<meta http-equiv='refresh' content='0;URL=bbs.php'>";
	}
	else{
 		$error=mysql_error();
		print "$sql ($error)";
	}
}

if($flag=='D'){
	$connect=mysql_connect("localhost","root","");
	mysql_select_db("php",$connect);
	
	$make_where = "seq1='$seq1'";
	for($i = 2; $i < $level + 1; $i++) {
		$make_where = $make_where . " and seq=" . $i . "='$i'";
	}
/*
	$make_where = "seq1='$seq1'";
	if($level==2)
		$make_where = $make_where . " and seq2='$seq2'";
	if($level==3)
		$make_where = $make_where . " and seq3='$seq3'";
	if($level==4)
		$make_where = $make_where . " and seq4='$seq4'";
	if($level==5)
		$make_where = $make_where . " and seq5='$seq5'";
*/
	$sql="delete from bbs where " . $make_where;
/*
	$result=mysql_query($sql,$connect);
	if($result==1){
		print "<script>window.alert('삭제되었습니다.')</script>";
		print "<meta http-equiv='refresh' content='0;URL=bbs.php'>";
	}
	else{
 		$error=mysql_error();
		print "$sql ($error)";
	}
*/
print $sql;
}

?>