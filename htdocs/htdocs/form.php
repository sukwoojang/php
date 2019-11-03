<script language = "javascript">

function f_check_evenOdd(){

	if (document.evenOdd.number.value.length==0) {
		alert ("숫자를 입력하시오.");
		document.evenOdd.number.focus();
		return;
	}

	document.evenOdd.submit();
}
function f_check_sum(){
	if (document.sum.from.value.length==0){
		alert ("시작을 입력하시오.");
		document.sum.from.focus();
		return;
	}

	if (document.sum.end.value.length==0){
		alert ("끝을 입력하시오.");
		document.sum.end.focus();
		return;
	}

	if (document.sum.from.value > document.sum.end.value) {
		alert ("시작은 끝보다 작거나 같아야 합니다.");
		document.sum.from.focus();
		return;
	}
	
	document.sum.submit();
}
function f_check_factorial(){
	if (document.factorial.number.value.length==0){
		alert ("숫자를 입력하시오.");
		document.factorial.number.focus();
		return;
	}
	if (((document.factorial.number.value%2) != 1) && ((document.factorial.number.value%2) != 0)){
		alert ("정수를 입력하시오.");
		document.factorial.number.focus();
		return;
	}
	
	document.factorial.submit();
}
function f_check_query(){
	if (document.query.id.value.length==0 && document.query.nm.value.length==0){
		alert ("학번 또는 성명을 입력하시오.");
		document.query.id.focus();
		return;
	}

	document.query.submit();
}
</script>
<?PHP

if($m==1){
print "<b>***** even odd *****</b>" ;
print "<form name=evenOdd method=post action='./evenOdd.php' target='result'>";
print "정수를 입력하시오.";
print "<input type=text name=number>";
print " <a href='javaScript:f_check_evenOdd()'>입력</a><br>";
print " <input type='checkbox' name='disp' value='1' checked>입력값 표시<br>";
print " </form>";
}
if($m==2){
print "<b>***** sum *****</b>" ;
print " <form name=sum method=post action='./sum.php' target='result'>";
print " 시작  <input type=text name=from>  끝 <input type=text name=end>";
print " <a href='javaScript:f_check_sum()'>계산</a><br>";
print " <input type='checkbox' name='disp' value='1' checked>입력값 표시<br>";
print " </form>";
}
if($m==3){
print "<b>***** factorial *****</b>" ;
print " <form name=factorial method=post action='./factorial.php' target='result'>";
print " 정수를 입력하시오.";
print "<input type=text name=number>";
print " <a href='javaScript:f_check_factorial()'>입력</a><br>";
print " <input type='checkbox' name='disp' value='1' checked>입력값 표시<br>";
print " </form>";
}
if($m==4){
print "<b>***** 학생조회 *****</b>" ;
print " <form name=query method=post action='./query.php' target='result'>";
print "학번";
print "<input type=text name=id>&nbsp;&nbsp;";
print "<select name = 'sort' size = 1>";
print "<option value = 'A'>오름차순";
print "<option value = 'D'>내림차순";
print "</select>";
print "성명";
print "<input type=text name=nm>";
print " <a href='javaScript:f_check_query()'>입력</a><br>";
print " </form>";
print " <p>";
print " <a href=./insert.php>추가</a>";
}
?>