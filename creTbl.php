<html>
<head>
<title>アンケートテーブル</title>
<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
<?php
// DB接続
$conn = pg_connect("dbname=db_3828 user=d33828 host=192.168.109.210");
// SQL発行
$result = pg_query("select A.id,B.namae,A.sex,A.blood,A.q1,A.q2,A.q3 from tbl_data A inner join tbl_namae B on A.id=B.bango order by A.id");
// SQLで取得した行と列
$cntRows = pg_numRows($result);
$cntFields = pg_numFields($result);
// SQLで取得したデータの表示
print("<table class='tbl_01'>");
print("<tr>");
	for($k = 0;$k < $cntFields;$k++){
		print("<th>");
		print(pg_fieldname($result,$k));
		print("</th>");
	}
print("<tr>");


for($i = 0; $i < $cntRows; $i++) {
  print("<tr>");
  for($j = 0; $j < $cntFields; $j++) {
    print("<td>");
    print(pg_result($result, $i, $j));
    print("</td>");
  }
  print("</tr>");
}
print("</table>");
// メモリの開放とデータベースの切断
pg_freeresult($result);
pg_close($conn);
?>
<a href="./test200.html"><div id="toTop">アンケートへ<br />戻る</div></a>
</body>
</html>
