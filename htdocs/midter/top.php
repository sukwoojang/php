<?php
	print "<form name = top method = post action = './form.php'>";
	print "메뉴를 선택하시오. <br><hr>";
	print "<input type = 'radio' name = m value = 1>홀짝";
	print "<input type = radio name = m value = 2 checked>덧셈";
	print "<input type = radio name = m value = 3>학생조회";
	print "<input type = submit value = '선택'></form>";
?>