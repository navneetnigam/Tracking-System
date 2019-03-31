<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "combine_tracking";
$conn = mysqli_connect($servername, $username, $password, $dbname);
session_start();
$username=$_SESSION["username"]; 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
     $sql = "select transportation_expense,food_expense,clothing_expense,electronic_expense,grossery_expense,others from expense where username='$username'";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_array($result);
	 $data_points = array(
	   array( "Transport",$row["transportation_expense"]),
	   array( "Food",$row["food_expense"]),
	   array("Clothing",$row["clothing_expense"]),
	   array( "Electronic",$row["electronic_expense"]),
	   array( "Grossery",$row["grossery_expense"]),
	   array( "others",$row["others"]),
    );
	$style = array("color: gray","color: #76A7FA","opacity: 0.2","stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF","stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2","color: green");
        }
    mysqli_close($conn);
?>  
 <html>  
      <head>  
           <title>combine tracking report</title>  
		    <link href="https://fonts.googleapis.com/css?family=Anton|Bree+Serif|Chicle|Roboto|FontAwesome" rel="stylesheet">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Expense','Values'],  
                          <?php  
                          for($i=0;$i<6;$i++){						  
                               echo "['".$data_points[$i][0]."', ".$data_points[$i][1]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Pie chart representing Percentage of different expenses', 
                      is3D:true,					  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
		   <script type="text/javascript">
		   google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Expense', 'values', { role: 'style' } ],
        <?php  
          for($i=0;$i<6;$i++){						  
              echo "['".$data_points[$i][0]."',".$data_points[$i][1].",'".$style[$i]."'],";  
           }  
         ?>
      ]); 
	  var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Column chart representing different expenses",
        width: 900,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
      </script>
      </head>  
      <body>  
           <br /><br />  
		   
           <div style="width:auto;">  
                <h2 align="center"> chart representing differet expenses.</h2>  
                <br />
                <div style="width:auto">				
                <div id="piechart" style="width: 900px;float:left; height: 500px;">
				</div>  
				<div id="suggestion" style="width:400px;float:left;heigh:500px;margin-top:50px;">
				 <button class="btn btn-success" onclick="suggest()">Suggest</button>
				 <p id="sbox"></p>
				 </div>
				</div>
				
				<div id="columnchart_values" style="width: 900px; float:left;height: 300px;"></div>
           </div>  
      </body>  
 </html> 