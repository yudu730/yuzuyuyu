<html>
<head>
<title>グラフ</title>
<script src="./canvasjs.min.js"></script>
<script>
bloodTbl=new Array();
bloodTbl[0]="A";
bloodTbl[1]="AB";
bloodTbl[2]="B";
bloodTbl[3]="O";
bloodTbl[4]="A";
bloodTbl[5]="AB";
bloodTbl[6]="B";
bloodTbl[7]="O";
</script>

</head>
<body>

<?php

//受け取り
$charAxis=$_POST["frmAxis"];
$charGrp=$_POST["frmGrp"];

//データベース接続
$conn = pg_connect("dbname=yuzuyu user=yuzuyu password=pokemon730 host=localhost");
$result = pg_query($conn,"select ".$charAxis.",".$charGrp.",count(*) from tbl_data group by ".$charAxis.",".$charGrp." order by ".$charGrp.",".$charAxis."");

$row=0;
?>


<script type="text/javascript">
window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer",
	{
		theme: "theme3",
			animationEnabled: true,
		title:{
			text: "アンケート",
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
for($row=0;$row<8;$row=$row+4){
				print("{type:'column',name: '");
				print(pg_result($result,$row,1));
				print("',showInLegend: true,  dataPoints:[");

				for($i = $row; $i < $row+4; $i++){
					print("{label:bloodTbl[".$i."],y: ".pg_result($result,$i,2)."},");
				}

				print("]  },");
			

}

			?>
/*
		{
			type: "column",	
			name: "男",
			showInLegend: true,
			dataPoints:[
			<?php
				for($i=4;$i<8;$i++){
					print("{label:bloodTbl[".$i."],y: ".pg_result($result,$i,2)."},");
				}
			?>

			]
		}
*/	
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

<div id="chartContainer" style="height: 300px; width: 100%;">
</body>
</html>