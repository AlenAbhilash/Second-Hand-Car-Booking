<?php
include("header.php");
include("../dboperation.php");
$obj = new dboperation();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Management</title>
</head>
<body style="background-image:url(../Guest/images/account-bg.jpg)">
    <form action="" method="POST">
        <div class="logo">
            <a href="./index.php">
                <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <img src="img/logo.png" alt="">&nbsp; &nbsp;
            </a>
        </div>
        <div class="container" style="width:100%;margin-bottom: 5%;padding-top:0%">
            <div class="col-md-12" style="box-shadow: 2px 2px 10px #1b93e1; border-radius:0px; top: 14px; margin-left:37px;background-color:white">
                <h2 style="text-align: center;margin-top: 6%;font-family: fantasy;padding-top:2%">MONTHWISE PAYMENT REPORT</h2>
                <br>
                <div class="row">
                    <div class="col-md-3" style="text-align:right">
                        <label for="start">Start month:</label>
                    </div>
                    <div class="col-md-6">
                        <input type="month" id="start" name="start" min="2018-01" value="2018-12">
                    </div>
                </div>
                <br> 
                <div class="row">
                    <div class="col-md-3" style="text-align:right">
                        <label for "end">End month:</label>
                    </div>
                    <div class="col-md-6">
                        <input type="month" id="end" name="end" min="2019-01" value="2030-12">
                    </div>
                </div>
                <br>
                <div class="row">
                    <input type="submit" name="btnsubmit" value="Submit" class="btn btn-primary" style="margin-left:63%;margin-bottom:2%">
                </div>
            </div>
        </div>
    </form>
    <form action="" method="POST">
        <?php
        if (isset($_POST["btnsubmit"])) {
            $fromdate = $_POST["start"] . '-01'; // Start of the selected month
            $todate = $_POST["end"] . '-31'; // End of the selected month

            $_SESSION['start'] = $fromdate;
            $_SESSION['end'] = $todate;

            $s = 1;
            ?>

            <div class="col-md-12" style="box-shadow: 2px 2px 10px #1b93e1; border-radius:50px;margin-top:-15px;background-color:white">
                <br>
                <h2 style="text-align: center;margin-top: 6%;font-family: fantasy;">SALES BETWEEN THESE MONTHS</h2>
                <br>
                <div class="row">
                    <div class="col-md-3" style="text-align:right">
                        <label>From date:</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="fromdate" readonly value="<?php echo $fromdate ?>"
                            style="width:500px;">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3" style="text-align:right">
                        <label>To date:</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="todate" readonly value="<?php echo $todate ?>"
                            style="width:500px;">
                    </div>
                </div>
                <br>
                <div style="padding-bottom:4%">
                    <table
                        class="table table-hover"
                        style="border: 2px solid #adaaaa;margin-left:4px; box-shadow: 3px 3px 11px #777777; padding-bottom:content;background-color:white">
                        <th>SI.NO</th>
                        <th>Vehicle Name</th>
                        <th>Customer Name</th>
                        <th>Payment Amount</th>
                        <th>Payment Date</th>
                        
                        <?php
                        $sql = "SELECT de.pay_id, de.req_id, de.pay_date, de.pay_amount, de.pay_status,
                            de.fromaccount, de.toaccount, de.role, de.cust_id, de.vehicle_id,
                            d.cust_name, b.ve_name
                            FROM tbl_payment de
                            INNER JOIN tbl_cust d ON de.cust_id = d.log_id
                            INNER JOIN tbl_vehicle b ON de.vehicle_id = b.vehicle_id
                            WHERE de.pay_status = 'payment done'
                            AND b.owner_status = 'sold out'
                            AND de.pay_date >= '$fromdate'
                            AND de.pay_date <= '$todate';";
                        $result = $obj->query($sql);
                        
                        if ($result) {
                            while ($display = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $s++ . "</td>";
                                echo "<td>" . $display["ve_name"] . "</td>";
                                echo "<td>" . $display["cust_name"] . "</td>";
                                echo "<td>" . $display["pay_amount"] . "</td>";
                                echo "<td>" . $display["pay_date"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            // Handle SQL query error
                            echo "<script>alert('No payment details found for the selected period.');</script>";
                        }
                        echo "</table>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
include("footer.php");
?>
