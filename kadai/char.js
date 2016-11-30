<script>
function crGra(){
  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
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
        toolTipContent: "{label}<br/><span style='\"'color: {color};'\"'><strong>{name}</strong></span>: {y}mn tonnes",
        name: "男",
        showInLegend: "true",
        dataPoints: [
        {  y: <?php print(pg_result($grResult,1,0)); ?>, label: "答え1"},
        {  y: <?php print(pg_result($grResult,3,0)); ?>, label: "答え2" },
        {  y: <?php print(pg_result($grResult,5,0)); ?>, label: "答え3"}
        
        ]
      },  {        
        type: "stackedColumn",
        toolTipContent: "{label}<br/><span style='\"'color: {color};'\"'><strong>{name}</strong></span>: {y}mn tonnes",
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
</script>