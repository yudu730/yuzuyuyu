<html>
<head>
<title>アンケートテーブル</title>
<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
<?php
// DB接続
$conn = pg_connect("dbname=yuzuyu user=yuzuyu password=pokemon730 host=localhost");
// SQL発行
$result = pg_query("select A.id,B.namae,A.sex,A.blood,A.q1,A.q2,A.q3 from tbl_data A inner join tbl_namae B on A.id=B.bango order by A.id");
// SQLで取得した行と列
$cntRows = pg_numRows($result);
$cntFields = pg_numFields($result);
// SQLで取得したデータの表示
print("<table class='tbl_01'>");
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
</body>
</html>
