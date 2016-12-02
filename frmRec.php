<?php
if(isset($_POST["frmId"]) && $_POST["sex"]!="" && $_POST["blood"]!="" && isset($_POST["q1"]) && isset($_POST["q2"]) && isset($_POST["q3"])){
	//フォーム受け取り
	$intId = $_POST["frmId"];
	$selSex = $_POST["sex"];
	$selBlood = $_POST["blood"];
	$radQ1 = $_POST["q1"];
	$radQ2 = $_POST["q2"];
	$chkQ3 = $_POST["q3"];


	//出力
	print("<table class='tbl_01'>");
	print("<tr><td>出席番号</td><td>".$intId."</td></tr>");
	print("<tr><td>性別</td><td>".$selSex."</td></tr>");
	print("<tr><td>血液型</td><td>".$selBlood."</td></tr>");
	print("<tr><td>質問１</td><td>".$radQ1."</td></tr>");
	print("<tr><td>質問２</td><td>".$radQ2."</td></tr>");
	$chkQ3_A="";
	print("<tr><td>質問３</td><td>");
	foreach($chkQ3 as $foreQ3){
		$chkQ3_A = $chkQ3_A.":".$foreQ3;
	}
	print($chkQ3_A);
	print("</td></tr>");
	print("</table>");
}else{
	print("入力されていない項目があります");
}

?>