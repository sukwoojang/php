<?php
session_start();

print "<form name = menu method = post action = './form.php' target='home'>";
if($user_id != ''){
print "�޴� ����<br>";
print "<hr>";
print "<select name = 'm' size = 4>";
print "<option value = '1'>Ȧ¦";
print "<option value = '2'>����";
print "<option value = '3'>factorial";
print "<option value = '4' selected>�л���ȸ";
print "</select>";
print "<input type=submit value='����'></form>";
print "<a href='bbs.php' target = 'home'>BBS</a>";
}
else{
print "�α����Ͻʽÿ�<br><hr>";
}

?>