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
                <h2 class="text-center mb-4">Registered Car request</h2>
                
                <div class="table-wrap">
                <?php 
                 
                    require_once("../dboperation.php");
                    $obj = new dboperation();
                    $vehicleid=$_GET['vehicle_id']; 

                    $sql = "SELECT *
                            FROM tbl_req R
                            INNER JOIN tbl_cust C ON R.cust_id = C.log_id
                            INNER JOIN tbl_vehicle T ON R.vehicle_id = T.vehicle_id
                            WHERE R.vehicle_id = $vehicleid AND R.status = 'requested'"; // Added the condition here
                    $res = $obj->query($sql);

                    if(mysqli_num_rows($res) > 0) {
                        ?>
                        
                        <table class="table">
                            <thead class="thead-primary">
                            <tr>
                                <th>Customer Name</th>
                                <th>Vehicle Name</th>
                                <th>Request Date</th>
                                <th>Status</th>
                                <th>Description</th>
                                <th>Accept or Reject</th>
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
                                    <td><?php echo $display["req_date"]; ?></td>
                                    <td><?php echo $display["status"]; ?></td>
                                    <td><?php echo $display["des"]; ?></td>
                                    <td> <a href="testdate.php?req_id=<?php echo $display["req_id"]; ?>"><button type="button" class="btn btn-primary px-3" >Accept</button></a>
                                    <a href="reject.php?req_id=<?php echo $display["req_id"]; ?>"><button type="button" class="btn btn-primary px-3 " >Reject</button></a></td>
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
