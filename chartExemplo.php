<?php
require_once 'header.php';
?>
		<script type="text/javascript">
  
  function visitorData (data) {
   $('#chart1').highcharts({
    chart: {
        type: 'column'
    },
    title: {
        text: 'Relatório'
    },
    xAxis: {
        categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday']
    },
    yAxis: {
        title: {
            text: 'Number of visitors'
        }
    },
    series: [{
      data: [
      ['Tempo', parseInt(data)],
      ['IE',       26.8]
//      ['Safari',    8.5],
//      ['Opera',     6.2],
//      ['Others',   0.7]  
      ]     
    }]
  });
}
$(document).ready(function() {
  var jsonData;
 $.ajax({
    type: 'POST',  
    url: "http://localhost/nep-um-web/api/",
    dataType: "json",
    data: {
        object: 'Answer',
        function: 'teste'
     },
    statusCode:{
        200: function (response) {
            jsonData = response;
            var data = jsonData.resolutionTime;
//            alert(jsonData.resolutionTime);
            visitorData(data);
    }
}
  });
 });        
                    
</script>
	</head>
	<body>
 <script src="js/extra/highCharts/js/highcharts.js"></script>
<script src="js/extra/highCharts/js/modules/data.js"></script>
<script src="js/extra/highCharts/js/modules/exporting.js"></script>

<!-- Additional files for the Highslide popup effect -->
<!--<script type="text/javascript" src="http://www.highcharts.com/media/com_demo/highslide-full.min.js"></script>
<script type="text/javascript" src="http://www.highcharts.com/media/com_demo/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="http://www.highcharts.com/media/com_demo/highslide.css" />-->

<div id="chart1" style="min-width: 310px; height: 300px; margin: 0 auto"></div>

	</body>
</html>
