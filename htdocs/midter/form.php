<script language = 'javaScript'>
	function f_check_evenOdd() {
		if (document.evenOdd.num.value.length == 0) {
			alert("���ڸ� �Է��Ͻÿ�");
			document.evenOdd.num.focus();
			return;
		}
		document.evenOdd.submit();
	}
	function f_check_sum() {
		if (document.sum.low.value.length == 0) {
			alert("���ۼ��ڸ� �Է��Ͻÿ�");
			document.sum.low.focus();
			return;
		}
		if (document.sum.high.value.length == 0) {
			alert("�����ڸ� �Է��Ͻÿ�");
			document.sum.high.focus();
			return;
		}
		if (document.sum.high.value < document.sum.low.value) {
			alert("���۰��� �������� �۰ų� ���ƾ� �մϴ�");
			document.sum.low.focus();
			return;
		}
		document.sum.submit();
	}
	function f_check_query() {
		if (document.query.id.value.length == 0 && document.query.nm.value.length == 0) {
			alert ("�й��̳� �̸��� �Է��Ͻÿ�");
			document.query.id.focus();
			return; 
		}
		document.query.submit();
	}

</script>


<?php
	if ($m == 1) {
		print "<b> *** even odd *** </b><br><form name = evenOdd method = post action ='./evenOdd.php' target = 'home'>������ �Է��Ͻÿ�<input type = text name = num><a href = 'javascript:f_check_evenOdd()'>�Է�</a><br><input type = radio name = even value = 1 checked>�Է°� ǥ��</form>";
	}
	if ($m == 2) {
		print "<b> *** sum from to *** </b><br><form name = sum method = post action = './sum.php' target = home>����<input type = text name = low>��<input type = text name = high><a href = 'javascript:f_check_sum()'>���</a><br><input type = radio name = sum value = 1 checked>�Է°� ǥ��</form>";
	}
	print "<form name = table action = './table.html'>���̺�<input type = submit value = '����'></form>";
	if($m == 3) {
		print "<b> *** �л���ȸ *** </b><br><form name = query method = post action = './query.php' target = home>�й�<input type = text name = id>�̸�<input type = text name = nm><a href = 'javascript:f_check_query()'>��ȸ</a></form>";
	}
?>