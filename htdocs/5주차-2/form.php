<?php
 if ($m == 1){
 print "<b>*** even odd ***</b>";
 print "<form name=odd_value method=post action='./evenOdd.php' target='result'>";
 print "정수를 입력하시오.<br>";
 print "<input type=text name=number>";
 print "<input type=submit value='입력'><br></form>";
 }

 if ($m == 2){
 print "<b>*** sum from to ***</b>";
 print "<form name = sum method=post action = './sum.php' target='result'>";
 print "시작<input type=text name=start>";
 print "끝<input type=text name=end>";
 print "<input type=submit value='계산'></form>";
 }

 if ($m == 3){
 print "<b>*** factorial ***</b>";
 print "<form name=factorial method = post action='./factorial.php' target='result'>";
 print "정수를 입력하시오.";
 print "<input type = text name = fac_num>";
 print "<input type = submit value = '입력'></form>";
 }
?>