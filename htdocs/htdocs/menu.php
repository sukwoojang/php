<?PHP
session_start();


print "<form name=menu method=post action='./form.php' target='home'>";

if($user_id !=""){
    print "메뉴를 선택하시오.<br>";
    print "<hr>";
    print "<select name = 'm' size = 1>";
    print "<option value = '1'>홀짝";
    print "<option value = '2'>덧셈";
    print "<option value = '3'>factorial";
    print "<option value = '4' selected>학생조회";
    print "</select>";
    print "<input type=submit value='선택'>";
    

}
print "</form>";

print "<a href='bbs.php' target = 'home'>BBS</a>";

?>