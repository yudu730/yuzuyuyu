<html>
<head>
<title>conSrc.php</title>
<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
<?php
$conn = pg_connect("dbname=yuzuyu user=yuzuyu password=pokemon730 host=localhost");
$result = pg_query($conn,"select count(*) from tbl_data where id='". $_POST["frmId"] ."'");
if(1 == pg_result($result,0,0)){
	require "frmRec.php";
}else{
	print("出席番号が存在しません");
}


?>

<form name="frmData" method="post" action="test201.php">
	<!-- 登録データ -->
	<input type="hidden" name="frmId" value=<?php print($intId); ?>>
	<input type="hidden" name="sex" value=<?php print($selSex); ?>>
	<input type="hidden" name="blood" value=<?php print($selBlood); ?>>
	<input type="hidden" name="q1" value=<?php print($radQ1); ?>>
	<input type="hidden" name="q2" value=<?php print($radQ2); ?>>
	<input type="hidden" name="q3" value=<?php print($chkQ3_A); ?>>
	<input type="submit" class="classname" value="登録">
</form>
<input type="button" class="classname" onclick="location.href='./test200.html'" value="内容変更">
</body>
</html>