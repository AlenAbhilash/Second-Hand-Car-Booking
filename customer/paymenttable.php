<?php 
session_start();
include("headervview.php"); ?>

<!doctype html>
<html lang="en">
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        } 

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
            margin-top: 20px;
        } 

        th, td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            border-right: 1px solid #ccc;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        /* Responsive Table */
        @media screen and (max-width: 600px) {
            table {
                border: none;
            }

            thead {
                display: none;
            }

            tr {
                margin-bottom: 15px;
                display: block;
                border: 1px solid #ccc;
            }

            td {
                border: none;
                position: relative;
                padding-left: 50%;
            }

            td:before {
                position: absolute;
                top: 6px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                content: attr(data-column);
                font-weight: bold;
            }
        }

        /* Style for table heading */
        thead th {
            background-color: #FFA500; /* Light orange background color */
            color: #fff;
            border-right: 1px solid #ccc;
        }
    </style>
</head>
<body>
  
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5"> 
                <!-- Your content here -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-4">Payment Table</h2>
                
                <div class="table-wrap">
                <?php
                    require_once("../dboperation.php");
                    $obj = new dboperation();
                    $customerid=$_SESSION['customerid'];  

                    $sql = "SELECT *
        FROM tbl_payment R
        INNER JOIN tbl_cust C ON R.cust_id = C.log_id 
        INNER JOIN tbl_vehicle T ON R.vehicle_id = T.vehicle_id
        INNER JOIN tbl_req x ON R.req_id = x.req_id
        INNER JOIN tbl_cust V ON T.cust_id = V.log_id
        WHERE R.cust_id = $customerid";

            
                            $res = $obj->query($sql);
                    if(mysqli_num_rows($res) > 0) {
                        ?>
                        
                        <table class="table">
                            <thead class="thead-primary">
                            <tr>
                                <th>Customer Name</th>
                                <th>Vehicle Name</th>
                                <th>Request Status</th>
                                <th>Status</th> 
                                <th>Payment Date</th>
                                <th>Payment Amount</th>
                                <th>Payment Recepit</th>
                            </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $s = 1;
                            while($display = mysqli_fetch_assoc($res)) {
                                ?>
                                <tr>
                                    <td><?php echo $display["cust_name"]; ?></td>
                                    <td><?php echo $display["ve_name"]; ?></td>
                                    <td><?php echo $display["status"]; ?></td>
                                    <td><?php echo $display["pay_status"]; ?></td>
                                    <td><?php echo $display["pay_date"]; ?></td>
                                    <td>₹<?php echo $display["pay_amount"]; ?></td>
                                    <td><a href="paymentrecepit.php">
                                    <a href="paymentreceipt.php?vehicle_id=<?php echo $display["vehicle_id"]; ?>&requestid=<?php echo $display["req_id"]; ?>">
    <i class="fas fa-eye" style="color: darkblue;"></i>
</a>

                            </td> 
                                </tr>
                                <?php
                                $s++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php
                    } else {
                        echo "No records found.";
                    }
                
                ?>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
<?php
include("footercust.php");
?>
