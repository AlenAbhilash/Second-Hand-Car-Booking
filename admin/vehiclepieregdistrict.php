<?php
include("header.php");
include("../dboperation.php");
$obj = new dboperation();

$sql = "SELECT C.dis_name, COUNT(R.vehicle_id) AS vehicle_count
        FROM tbl_vehicle R
        INNER JOIN tbl_dis C ON R.dis_id = C.dis_id 
        GROUP BY C.dis_name
        ORDER BY vehicle_count ";
        
$result = $obj->query($sql);
// Check if the query executed successfully before proceeding
if ($result) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart()
            {
                var data = google.visualization.arrayToDataTable([
                    ['Distribution', 'Number'],
                    <?php
                    while ($display = mysqli_fetch_array($result))
                    {
                        echo "['" . $display["dis_name"] . "', " . $display["vehicle_count"] . "],";
                    }
                    ?>
                ]);
                var options = {
                    title: 'Most Registered Vehicles by District',
                    pieHole: 0.4,
                    slices: {
                        0: { color: 'blue' },
                        1: { color: 'green' },
                        2: { color: 'red' },
                        3: { color: 'orange' },
                        4: { color: 'purple' },
                        5: { color: 'pink' },
                        6: { color: 'yellow' },
                        7: { color: 'brown' },
                        8: { color: 'cyan' },
                        9: { color: 'magenta' },
                    },
                };
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body style="background-color: #f0f0f0;">
    <div class="logo">
        <a href="./index.php">
            
        </a>
    </div>
    <div style="width: 900px; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 10px;">
        <h3 align="center">Pie Chart showing the Most Registered Vehicles by  District</h3>
        <br />
        <div id="piechart" style="width: 100%; height: 400px;"></div>
    </div>
    </body>
    </html>
    <?php
} else {
    echo "Error in executing the SQL query.";
}

include("footer.php");
?>
