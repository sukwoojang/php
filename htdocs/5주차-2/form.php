<?php
 if ($m == 1){
 print "<b>*** even odd ***</b>";
 print "<form name=odd_value method=post action='./evenOdd.php' target='result'>";
 print "������ �Է��Ͻÿ�.<br>";
 print "<input type=text name=number>";
 print "<input type=submit value='�Է�'><br></form>";
 }

 if ($m == 2){
 print "<b>*** sum from to ***</b>";
 print "<form name = sum method=post action = './sum.php' target='result'>";
 print "����<input type=text name=start>";
 print "��<input type=text name=end>";
 print "<input type=submit value='���'></form>";
 }

 if ($m == 3){
 print "<b>*** factorial ***</b>";
 print "<form name=factorial method = post action='./factorial.php' target='result'>";
 print "������ �Է��Ͻÿ�.";
 print "<input type = text name = fac_num>";
 print "<input type = submit value = '�Է�'></form>";
 }
?>