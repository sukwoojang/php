<script language = "javascript">

function f_check_evenOdd(){

	if (document.evenOdd.number.value.length==0) {
		alert ("���ڸ� �Է��Ͻÿ�");
		document.evenOdd.number.focus();
		return;
	}

	document.evenOdd.submit();
}
function f_check_sum(){

	if (document.sum.start.value.length==0) {
		alert ("���ۼ��ڸ� �Է��Ͻÿ�");
		document.sum.start.focus();
		return;
	}
	if (document.sum.end.value.length==0) {
		alert ("�����ڸ� �Է��Ͻÿ�");
		document.sum.end.focus();
		return;
	}
	if (document.sum.start.value > document.sum.end.value) {
		alert ("���۰��� �������� �۰ų� ���ƾ� �մϴ�");
		document.sum.start.focus();
		return;
	}

	document.sum.submit();
}

function f_check_factorial(){

	if (document.factorial.fac_num.value.length==0) {
		alert ("���ڸ� �Է��Ͻÿ�");
		document.factorial.fac_num.focus();
		return;
	}
	
	if (document.factorial.fac_num.value % 1 != 0) {
		alert("������ �Է��Ͻÿ�");
		document.factorial.fac_num.focus();
		return;
	}
	document.factorial.submit();
}

function f_check_query(){

	if (document.query.id.value.length==0 && document.query.name.value.length==0) {
		alert ("�й� �Ǵ� ������ �Է��Ͻÿ�");
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
 print "������ �Է��Ͻÿ� <input type=text name=number> <a href='javaScript:f_check_evenOdd()'>�Է�</a>";
 print "<br><input type = 'checkbox' name = 'disp' value = '1' checked>�Է°� ǥ��";
 print "</form>";
 }

 if ($m == 2){
 print "<b>*** sum from to ***</b>";
 print "<form name = sum method=post action = './sum.php' target='result'>";
 print "����<input type=text name=start> <a href='javaScript:f_check_sum()'></a><br>";
 print "��<input type=text name=end> <a href='javaScript:f_check_sum()'>���</a>";
 print "<br><input type = 'checkbox' name = 'disp' value = '1' checked>�Է°� ǥ��";
 print "</form>";
 }

 if ($m == 3){
 print "<b>*** factorial ***</b>";
 print "<form name=factorial method = post action='./factorial.php' target='result'>";
 print "������ �Է��Ͻÿ�.<input type=text name=fac_num> <a href='javaScript:f_check_factorial()'>�Է�</a>";
 print "<br><input type = 'checkbox' name = 'disp' value = '1' checked>�Է°� ǥ��";
 print "</form>";
 }

 if ($m == 4){
 print "<b>*** �л���ȸ ***</b>";
 print "<form name=query method = post action='./query.php' target='result'>";
 print "�й��� �Է��Ͻÿ�<input type=text name=id> <br> ������ �Է��Ͻÿ�<input type=text name=name>";
print "<select name = 'sort' size = 1>";
print "<option value = 'A'>��������";
print "<option value = 'D'>��������";
print "</select><br>";
print "<a href='javaScript:f_check_query()'>��ȸ</a>";
 print "<p><a href ='./insert.php'>�űԵ��</a>";
 print "</form>";

 }
?>