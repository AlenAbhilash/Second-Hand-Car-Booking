<?php
include("header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Vehicle List</title>
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
<form action="Excel/excelvehicle.php" method="post">
    <div class="container">
        <h2>Vehicle List</h2>
        <div class="table-container">
            <table>
                <tr>
                    <th>SI.NO</th>
                    <th>Vehicle Name</th>
                    <th>Company Name</th>
                    <th>Model Name</th>
                    <th>Fuel Type</th>
                    <th>Body Type</th>
                    <th>Vehicle Registered District</th>
                    <th>Current KM</th>
                    <th>Owner Status</th>
                    <th>Manufactured Date</th>
                    <th>Posted Date</th>
                </tr>
                <?php
                include("../dboperation.php");
                $obj = new dboperation();
                $s = 1;
                $sql = "SELECT *
                        FROM tbl_vehicle v
                        INNER JOIN tbl_companyreg c ON v.comp_id = c.comp_id
                        INNER JOIN tbl_model m ON v.model_id = m.model_id
                        INNER JOIN tbl_fuel f ON v.fuel_id = f.fuel_id 
                        INNER JOIN tbl_body b ON v.bod_id = b.bod_id
                        INNER JOIN tbl_dis d ON v.dis_id = d.dis_id";
                $result = $obj->query($sql);
                while ($display = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $s++; ?></td>
                        <td><?php echo $display["ve_name"]; ?></td>
                        <td><?php echo $display["comp_name"]; ?></td>
                        <td><?php echo $display["model_name"]; ?></td>
                        <td><?php echo $display["fuel_name"]; ?></td>
                        <td><?php echo $display["bod_name"]; ?></td>
                        <td><?php echo $display["dis_name"]; ?></td>
                        <td><?php echo $display["cur_km"]; ?></td>
                        <td><?php echo $display["owner_status"]; ?></td>
                        <td><?php echo $display["man_date"]; ?></td>
                        <td><?php echo $display["post_date"]; ?></td>
                    </tr>
                    <?php
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
