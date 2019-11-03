<?php
session_start();

print "<form name = menu method = post action = './form.php' target='home'>";
if($user_id != ''){
print "메뉴 선택<br>";
print "<hr>";
print "<select name = 'm' size = 4>";
print "<option value = '1'>홀짝";
print "<option value = '2'>덧셈";
print "<option value = '3'>factorial";
print "<option value = '4' selected>학생조회";
print "</select>";
print "<input type=submit value='선택'></form>";
print "<a href='bbs.php' target = 'home'>BBS</a>";
}
else{
print "로그인하십시오<br><hr>";
}

?>