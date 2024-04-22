<?php
include("header.php");
?> 

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
            padding: 12px; /* Increased padding for better spacing */
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
                include("../dboperation.php");
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
