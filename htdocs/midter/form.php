<script language = 'javaScript'>
	function f_check_evenOdd() {
		if (document.evenOdd.num.value.length == 0) {
			alert("숫자를 입력하시오");
			document.evenOdd.num.focus();
			return;
		}
		document.evenOdd.submit();
	}
	function f_check_sum() {
		if (document.sum.low.value.length == 0) {
			alert("시작숫자를 입력하시오");
			document.sum.low.focus();
			return;
		}
		if (document.sum.high.value.length == 0) {
			alert("끝숫자를 입력하시오");
			document.sum.high.focus();
			return;
		}
		if (document.sum.high.value < document.sum.low.value) {
			alert("시작값은 끝값보다 작거나 같아야 합니다");
			document.sum.low.focus();
			return;
		}
		document.sum.submit();
	}
	function f_check_query() {
		if (document.query.id.value.length == 0 && document.query.nm.value.length == 0) {
			alert ("학번이나 이름을 입력하시오");
			document.query.id.focus();
			return; 
		}
		document.query.submit();
	}

</script>


<?php
	if ($m == 1) {
		print "<b> *** even odd *** </b><br><form name = evenOdd method = post action ='./evenOdd.php' target = 'home'>정수를 입력하시오<input type = text name = num><a href = 'javascript:f_check_evenOdd()'>입력</a><br><input type = radio name = even value = 1 checked>입력값 표시</form>";
	}
	if ($m == 2) {
		print "<b> *** sum from to *** </b><br><form name = sum method = post action = './sum.php' target = home>시작<input type = text name = low>끝<input type = text name = high><a href = 'javascript:f_check_sum()'>계산</a><br><input type = radio name = sum value = 1 checked>입력값 표시</form>";
	}
	print "<form name = table action = './table.html'>테이블<input type = submit value = '눌러'></form>";
	if($m == 3) {
		print "<b> *** 학생조회 *** </b><br><form name = query method = post action = './query.php' target = home>학번<input type = text name = id>이름<input type = text name = nm><a href = 'javascript:f_check_query()'>조회</a></form>";
	}
?>