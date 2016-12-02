<html>
<head>
<title>アンケート結果</title>
<link rel="stylesheet" type="text/css" href="./style.css">
<script src="./canvasjs.min.js"></script>
</head>
<body>
<?php
//DB接続
$conn = pg_connect("dbname=db_3828 user=d33828 host=192.168.109.210");

//データ受け取り
$intId = $_POST["frmId"];
$selSex = $_POST["sex"];
$selBlood = $_POST["blood"];
$radQ1 = $_POST["q1"];
$radQ2 = $_POST["q2"];
$chkQ3_A = $_POST["q3"];

//アップデート
$result = pg_query($conn,"update tbl_data set sex='".$selSex."' , blood='".$selBlood."' , q1='".$radQ1."' , q2='".$radQ2."' , q3='".$chkQ3_A."' where id = '".$intId."'");

//メモリ解放
pg_freeresult($result);
?>





<!------------------------------グラフ作成------------------------------------->

<script>
function crGra(){

	<?php
	$grResult=pg_query("select count(*) from tbl_data group by sex,q1 order by q1,sex");
	?>

  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer1",
    {
      title:{
      text: "アンケート結果"   
      },
      axisY:{
        title:"人数(人)"   
      },
      animationEnabled: true,
      data: [
      {        
        type: "stackedColumn",
        toolTipContent: "{label}<br/><span style='\"'color: {color};'\"'><strong>{name}</strong></span>: {y}人",
        name: "男",
        showInLegend: "true",
        dataPoints: [
        {  y: <?php print(pg_result($grResult,1,0)); ?>, label: "答え1"},
        {  y: <?php print(pg_result($grResult,3,0)); ?>, label: "答え2" },
        {  y: <?php print(pg_result($grResult,5,0)); ?>, label: "答え3"}
        
        ]
      },  {        
        type: "stackedColumn",
        toolTipContent: "{label}<br/><span style='\"'color: {color};'\"'><strong>{name}</strong></span>: {y}人",
        name: "女",
        showInLegend: "true",
        dataPoints: [
        {  y: <?php print(pg_result($grResult,0,0)); ?> , label: "答え1"},
        {  y: <?php print(pg_result($grResult,2,0)); ?>, label: "答え2" },
        {  y: <?php print(pg_result($grResult,4,0)); ?>, label: "答え3"}
        
        ]
      }
      ]
      ,
      legend:{
        cursor:"pointer",
        itemclick: function(e) {
          if (typeof (e.dataSeries.visible) ===  "undefined" || e.dataSeries.visible) {
	          e.dataSeries.visible = false;
          }
          else
          {
            e.dataSeries.visible = true;
          }
          chart.render();
        }
      }
    });
    chart.render();
  }
}
crGra();
</script>


<!------------------------------グラフ作成------------------------------------->






<div id="chartContainer1" style="height:300px;width:400px;margin-bottom:20px;"></div>
<br />
<a href="./charCre.html">他のグラフを見る</a><br />
<a href="test200.html">アンケートへ戻る</a>
</body>
</html>