<script language = "javascript">

function f_check_evenOdd(){

	if (document.evenOdd.number.value.length==0) {
		alert ("숫자를 입력하시오");
		document.evenOdd.number.focus();
		return;
	}

	document.evenOdd.submit();
}
function f_check_sum(){

	if (document.sum.start.value.length==0) {
		alert ("시작숫자를 입력하시오");
		document.sum.start.focus();
		return;
	}
	if (document.sum.end.value.length==0) {
		alert ("끝숫자를 입력하시오");
		document.sum.end.focus();
		return;
	}
	if (document.sum.start.value > document.sum.end.value) {
		alert ("시작값은 끝값보다 작거나 같아야 합니다");
		document.sum.start.focus();
		return;
	}

	document.sum.submit();
}

function f_check_factorial(){

	if (document.factorial.fac_num.value.length==0) {
		alert ("숫자를 입력하시오");
		document.factorial.fac_num.focus();
		return;
	}
	
	if (document.factorial.fac_num.value % 1 != 0) {
		alert("정수를 입력하시오");
		document.factorial.fac_num.focus();
		return;
	}
	document.factorial.submit();
}

function f_check_query(){

	if (document.query.id.value.length==0 && document.query.name.value.length==0) {
		alert ("학번 또는 성명을 입력하시오");
		document.query.id.focus();
		return;
	}
	document.query.submit();
}

</script>

<?php
 if ($m == 1){
 print "<b>*** even odd ***</b>";
 print "<form name=evenOdd method=post action='./evenOdd.php' target='result'>";
 print "정수를 입력하시오 <input type=text name=number> <a href='javaScript:f_check_evenOdd()'>입력</a>";
 print "<br><input type = 'checkbox' name = 'disp' value = '1' checked>입력값 표시";
 print "</form>";
 }

 if ($m == 2){
 print "<b>*** sum from to ***</b>";
 print "<form name = sum method=post action = './sum.php' target='result'>";
 print "시작<input type=text name=start> <a href='javaScript:f_check_sum()'></a><br>";
 print "끝<input type=text name=end> <a href='javaScript:f_check_sum()'>계산</a>";
 print "<br><input type = 'checkbox' name = 'disp' value = '1' checked>입력값 표시";
 print "</form>";
 }

 if ($m == 3){
 print "<b>*** factorial ***</b>";
 print "<form name=factorial method = post action='./factorial.php' target='result'>";
 print "정수를 입력하시오.<input type=text name=fac_num> <a href='javaScript:f_check_factorial()'>입력</a>";
 print "<br><input type = 'checkbox' name = 'disp' value = '1' checked>입력값 표시";
 print "</form>";
 }

 if ($m == 4){
 print "<b>*** 학생조회 ***</b>";
 print "<form name=query method = post action='./query.php' target='result'>";
 print "학번을 입력하시오<input type=text name=id> <br> 성명을 입력하시오<input type=text name=name>";
print "<select name = 'sort' size = 1>";
print "<option value = 'A'>오름차순";
print "<option value = 'D'>내림차순";
print "</select><br>";
print "<a href='javaScript:f_check_query()'>조회</a>";
 print "<p><a href ='./insert.php'>신규등록</a>";
 print "</form>";

 }
?>