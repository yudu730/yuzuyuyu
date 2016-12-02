<html>
<head>
<title>グラフ</title>
<script src="./canvasjs.min.js"></script>
<script>
bloodTbl=new Array();
bloodTbl[0]="男";
bloodTbl[1]="女";
bloodTbl[2]="男";
bloodTbl[3]="女";
bloodTbl[4]="男";
bloodTbl[5]="女";
bloodTbl[6]="男";
bloodTbl[7]="女";
bloodTbl[8]="男";
bloodTbl[9]="女";
bloodTbl[10]="男";
bloodTbl[11]="女";

</script>

</head>
<body>

<?php
if($_POST["frmAxis"] != $_POST["frmGrp"]){
	//受け取り
	$charAxis=$_POST["frmAxis"];
	$charGrp=$_POST["frmGrp"];
	
	//データベース接続
	$conn = pg_connect("dbname=db_3828 user=d33828 host=192.168.109.210");
	$result = pg_query($conn,"select ".$charAxis.",".$charGrp.",count(*) from tbl_data group by ".$charAxis.",".$charGrp." order by ".$charGrp.",".$charAxis."");
	
	$rowQue = pg_query($conn,"select count(distinct ".$charAxis.") from tbl_data");
	$rowQue2 = pg_query($conn,"select count(distinct ".$charGrp.") from tbl_data");
	
	//横軸の行数
	$rowCnt = pg_result($rowQue,0,0);
	//グループの行数
	$rowCnt2 = pg_result($rowQue2,0,0);

	$allRow = $rowCnt * $rowCnt2;


	$labTbl=array();
	$labTbl[0][0]="sex";
	$labTbl[1][0]="blood";
	$labTbl[2][0]="q1";
	$labTbl[3][0]="q2";
	
	$labTbl[0][1]="女";
	$labTbl[0][2]="男";
	
	$labTbl[1][1]="A";
	$labTbl[1][2]="B";
	$labTbl[1][3]="AB";
	$labTbl[1][4]="O";
	
	$labTbl[2][1]="q1Sel1";
	$labTbl[2][2]="q1Sel2";
	$labTbl[2][3]="q1Sel3";
	
	$labTbl[3][1]="q2Sel1";
	$labTbl[3][2]="q2Sel2";
	$labTbl[3][3]="q2Sel3";


	for($i=0;$i<4;$i++){
		if($labTbl[$i][0] == $charGrp){
			$lab = $i;
			break;
		}
	}


}else{
	print("横軸とグループは別のものを選択してください");
}
?>


<script type="text/javascript">
window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer",
	{
		theme: "theme3",
			animationEnabled: true,
		title:{
			text: "アンケート結果",
			fontSize: 30
		},
		toolTip: {
			shared: true
		},			
		axisY: {
			title: "人数"
		},
	
		data: [
			<?php
				for($row=0;$row < $allRow;$row=$row + $rowCnt){
					$labNum = 1;
					print("{type:'column',name: '");
					print(pg_result($result,$row,1));
					print("',showInLegend: true,  dataPoints:[");
					for($i = $row; $i < $row + $rowCnt; $i++){
						print("{label:bloodTbl[".$i."],y:".pg_result($result,$i,2)."},");
						$labNum++;
					}
					print("]  },");
				}

			?>

		],
		legend:{
		cursor:"pointer",
		itemclick: function(e){
			if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
				e.dataSeries.visible = false;
			}
			else {
				e.dataSeries.visible = true;
			}
			chart.render();
		}
	},
	});
chart.render();
}
</script>

<div id="chartContainer" style="height:400px;width:900px;margin-right:auto;margin-left:auto;"></div>
</body>
</html>