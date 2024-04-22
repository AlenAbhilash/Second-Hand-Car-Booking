<?php
include("header.php");
include("../dboperation.php");
$obj = new dboperation();

$sql = "SELECT T.ve_name, C.comp_name
FROM tbl_req R
INNER JOIN tbl_vehicle T ON R.vehicle_id = T.vehicle_id
INNER JOIN tbl_companyreg C ON T.comp_id = C.comp_id
WHERE R.status = 'requested'";
 // Assuming you want to use a specific pay_id
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
                    ['Company', 'Number'],
                    <?php
                    while ($display = mysqli_fetch_array($result))
                    {
                        echo "['" . $display["comp_name"] . "', 1],"; // Assuming you want to count each company once
                    }
                    ?>
                ]);
                var options = {
                    title: 'Percentage',
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

    </div>
    <div style="width: 900px; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 10px;">
        <h3 align="center">Pie Chart showing the Count of Requested Vehicles by Company</h3>
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
