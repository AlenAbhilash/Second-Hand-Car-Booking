<?php
include("header.php");
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h1 mb-0 text-gray-800">Moto Exchange</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Moto Exachange</li>
            </ol> 
          </div>
          <div class="row mb-3">
            <!-- New User Card Example -->

            <!-- Area Chart -->
            <div class="container mt-5">
    <h2 class="text-center mb-4">Customers</h2>
    <div class="row">
        <?php
        include_once("../dboperation.php");
        $obj = new dboperation();
        $sql = "SELECT * FROM tbl_cust";
        $res = $obj->query($sql);
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Contact</th>
                    <th>House Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($res)) {
                ?>
                <tr>
                    <td>
                        <a href="#" class="image-container">
                            <img src="../upload/<?php echo $row['imgc']; ?>" alt="<?php echo $row['cust_name']; ?>" class="img-fluid" style="max-width: 80px;">
                            <h4 class="text-uppercase mt-3" style="font-size: 1rem;"><?php echo $row['cust_name']; ?></h4>
                        </a>
                    </td>
                    <td style="font-size: 1rem;">
                        <i class="fas fa-phone"></i>
                        <span><strong>Contact:</strong> <?php echo $row['contact']; ?></span>
                    </td>
                    <td style="font-size: 1rem;">
                        <i class="fas fa-home"></i>
                        <span><strong>House Name:</strong> <?php echo $row['housename']; ?></span>
                    </td>
                    <td>
                        <a href="custrev.php?cust_id=<?php echo $row["log_id"]; ?>">
                            <button type="button" class="btn btn-primary" style="font-size: 1rem;">More Details</button>
                        </a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

            <!-- Pie Chart -->
            <?php
$obj = new dboperation();

$sql = "SELECT C.dis_name, COUNT(R.vehicle_id) AS vehicle_count
        FROM tbl_vehicle R
        INNER JOIN tbl_dis C ON R.dis_id = C.dis_id 
        GROUP BY C.dis_name
        ORDER BY vehicle_count ";
        
$result = $obj->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        /* Add CSS to center the pie chart */
        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body style="background-color: #f0f0f0;">
<div class="container mt-5">
    
    <div class="centered"> <!-- Use the "centered" class to center the chart -->
        

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
<div class="container mt-5">
    <h2 class="text-center mb-4">Pie Chart</h2>
    <table class="table table-bordered">
        <tr>
            <td>
                <div id="piechart" style="width: 500px; height: 500px;"></div>
            </td>
        </tr>
        
    </table>
</div>
</body>
</html>



            <!-- Invoice Example -->
          

            <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payment Report List</title>
    <style>
        .container {
            width: 90%; /* Increased width for better readability */
            margin: 0 auto;
            margin-top: 50px;
        }

        .box {
            text-align: center;
            margin-top: 20px;
        }

        .export-button {
            margin-top: 10px;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            font-family: fantasy;
        }

        .table-container {
            margin: 0 auto;
            border: 2px solid #adaaaa;
            box-shadow: 3px 4px 11px #777777;
            padding: 10px;
            overflow-x: auto; /* Enable horizontal scrolling if needed */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px; /* Decreased padding for a smaller size */
            text-align: center; /* Center-align the table data */
        }

        th {
            background-color: #87CEEB;
            color: #fff;
        }
    </style>
</head>

<body>

<form action="Excel/excelpayment.php" method="post">
    <div class="container">
        <h2>Payment Report List</h2>
        <div class="table-container">
            <table>
                <tr>
                    <th>SI.NO</th>
                    <th>Customer Name</th>
                    <th>Vehicle Name</th>
                    <th>Request Status</th>
                    <th>Status</th> 
                    <th>Payment Date</th>
                    <th>Payment Amount</th>
                    <th>Admin Amount Received %5</th>
                </tr>
                <?php
               
                $obj = new dboperation();
                $s = 1;
                $sql = "SELECT *
                FROM tbl_payment R
                INNER JOIN tbl_cust C ON R.cust_id = C.log_id 
                INNER JOIN tbl_vehicle T ON R.vehicle_id = T.vehicle_id
                INNER JOIN tbl_req x ON R.req_id = x.req_id
                WHERE R.pay_id = pay_id";
                $result = $obj->query($sql);
                $sc = 1;
                while ($display = mysqli_fetch_array($result)) {
                    // Calculate 5% of the pay_amount
                    $adminAmount = ($display["pay_amount"] * 5) / 100;
                    ?>
                    <tr>
                        <td><?php echo $s++; ?></td>
                        <td><?php echo $display["cust_name"]; ?></td>
                        <td><?php echo $display["ve_name"]; ?></td>
                        <td><?php echo $display["status"]; ?></td>
                        <td><?php echo $display["pay_status"]; ?></td>
                        <td><?php echo $display["pay_date"]; ?></td>
                        <td>₹<?php echo $display["pay_amount"]; ?></td>
                        <td>₹<?php echo $adminAmount; ?></td>
                    </tr>
                    <?php
                      $sc++;
                }
                ?>
            </table>
        </div>
        <div class="box">
            <input type="submit" name="addnew" value="Export" class="btn btn-primary export-button">
        </div>
    </div>
</form>
</body>
</html>


            
      <?php
include("footer.php");
?>
