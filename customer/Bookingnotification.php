<?php
session_start();
include("headervview.php");

?>
 
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
                <h2 class="text-center mb-4">Booking Notification</h2>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <form class="forms-sample" method="get">
                            <label for="reqstatus">List</label>
                            <select class="form-control" name="reqstatus" id="reqstatus" onchange="this.form.submit()">
                                <option value="all">All</option>
                                <option value="requested">Requested</option>
                                <option value="Accepted">Accepted</option>
                                <option value="Rejected">Rejected</option>
                                <option value="booking completed">booking completed</option>
                            </select>
                        </form>
                    </ol>
                </nav>
            </div>
            <?php
                 require_once("../dboperation.php");
                 $obj = new dboperation();
                 $customerid=$_SESSION['customerid']; 
            if (isset($_GET['reqstatus'])) {
                $status = $_GET['reqstatus'];
                if ($status == "Rejected") {
                    ?>
                    <script language="JavaScript" type="text/javascript">
                        document.getElementById("reqstatus").value = "Rejected";
                    </script>
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Rejected Request</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Vehicle Name</th>
                                            <th>Request Date</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                  $sql = "SELECT *
                                  FROM tbl_req R
                                  INNER JOIN tbl_cust C ON R.cust_id = C.log_id 
                                  INNER JOIN tbl_vehicle T ON R.vehicle_id = T.vehicle_id
                                  INNER JOIN tbl_cust V ON T.cust_id = V.log_id
                                  WHERE R.status = 'Rejected'  
                                        AND R.cust_id = $customerid";
                            
                                        $res = $obj->query($sql);
                                        $s = 1;
                                        while ($display = mysqli_fetch_array($res)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $display["cust_name"]; ?></td>
                                                <td><?php echo $display["ve_name"]; ?></td>
                                                <td><?php echo $display["req_date"]; ?></td>
                                                <td><?php echo $display["status"]; ?></td>
                                                <td><?php echo $display["des"]; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } elseif ($status == "requested") {
                    ?>
                    <script language="JavaScript" type="text/javascript">
                        document.getElementById("reqstatus").value = "requested";
                    </script>
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Requested</h4>
                                <div class "table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Vehicle Name</th>
                                            <th>Request Date</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                             $sql = "SELECT *
                                             FROM tbl_req R
                                             INNER JOIN tbl_cust C ON R.cust_id = C.log_id 
                                             INNER JOIN tbl_vehicle T ON R.vehicle_id = T.vehicle_id
                                             INNER JOIN tbl_cust V ON T.cust_id = V.log_id
                                             WHERE R.status = 'requested'  
                                                   AND R.cust_id = $customerid";
                                  
                                        $res = $obj->query($sql);
                                        $s = 1;
                                        while ($display = mysqli_fetch_array($res)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $display["cust_name"]; ?></td>
                                                <td><?php echo $display["ve_name"]; ?></td>
                                                <td><?php echo $display["req_date"]; ?></td>
                                                <td><?php echo $display["status"]; ?></td>
                                                <td><?php echo $display["des"]; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } elseif ($status == "booking completed") {
                    ?>
                    <script language="JavaScript" type="text/javascript">
                        document.getElementById("reqstatus").value = "booking completed";
                    </script>
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">booking completed Request</h4>
                                <div class "table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Vehicle Name</th>
                                            <th>Request Date</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                          
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                          $sql = "SELECT *
                                          FROM tbl_req R
                                          INNER JOIN tbl_cust C ON R.cust_id = C.log_id 
                                          INNER JOIN tbl_vehicle T ON R.vehicle_id = T.vehicle_id
                                          INNER JOIN tbl_cust V ON T.cust_id = V.log_id
                                          WHERE R.status = 'booking completed'  
                                                AND R.cust_id = $customerid";
                                        $res = $obj->query($sql);
                                        $s = 1;
                                        while ($display = mysqli_fetch_array($res)) {
                                             ?>
                                            <tr>
                                                <td><?php echo $display["cust_name"]; ?></td>
                                                <td><?php echo $display["ve_name"]; ?></td>
                                                <td><?php echo $display["req_date"]; ?></td>
                                                <td><?php echo $display["status"]; ?></td>
                                                <td><?php echo $display["des"]; ?></td>
                                                
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } elseif ($status == "Accepted") {
                    ?>
                    <script language="JavaScript" type="text/javascript">
                        document.getElementById("reqstatus").value = "Accepted";
                    </script>
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Accepted Request</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Vehicle Name</th>
                                            <th>Request Date</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                            <th>Remark</th>
                                            <th>Text Date</th>
                                            <th>Book</th>
                                            <th>Chat</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                              $sql = "SELECT *
                              FROM tbl_req R
                              INNER JOIN tbl_cust C ON R.cust_id = C.log_id 
                              INNER JOIN tbl_vehicle T ON R.vehicle_id = T.vehicle_id
                              INNER JOIN tbl_cust V ON T.cust_id = V.log_id
                              WHERE R.status = 'accepted'  
                                    AND R.cust_id = $customerid";
                                        $res = $obj->query($sql);
                                        $s = 1;
                                        while ($display = mysqli_fetch_array($res)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $display["cust_name"]; ?></td>
                                                <td><?php echo $display["ve_name"]; ?></td>
                                                <td><?php echo $display["req_date"]; ?></td>
                                                <td><?php echo $display["status"]; ?></td>
                                                <td><?php echo $display["des"]; ?></td>
                                                <td><?php echo $display["remark"]; ?></td>
                                                <td><?php echo $display["test_date"]; ?></td>
                                                <td>
                                                    <a href="bookingvehicle.php?vehicle_id=<?php echo $display["vehicle_id"]; ?>&requestid=<?php echo $display["req_id"]; ?>">
                                                        <button type="button" class="btn btn-primary px-3">Book Now</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <!-- WhatsApp Chat Button -->
                                                    <button class="whatsapp-chat-button btn btn-primary px-3"
                                                            data-phone="<?php echo $display["contact"]; ?>">
                                                        Chat on WhatsApp
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } elseif ($status == "all") {
                    ?>
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-primary">
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Vehicle Name</th>
                                            <th>Request Date</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                             
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                         $sql = "SELECT *
                                         FROM tbl_req R
                                         INNER JOIN tbl_cust C ON R.cust_id = C.log_id 
                                         INNER JOIN tbl_vehicle T ON R.vehicle_id = T.vehicle_id
                                         INNER JOIN tbl_cust V ON T.cust_id = V.log_id
                                         WHERE  R.cust_id = $customerid";
                                        $res = $obj->query($sql);

                                        if (mysqli_num_rows($res) > 0) {
                                            while ($display = mysqli_fetch_array($res)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $display["cust_name"]; ?></td>
                                                    <td><?php echo $display["ve_name"]; ?></td>
                                                    <td><?php echo $display["req_date"]; ?></td>
                                                    <td><?php echo $display["status"]; ?></td>
                                                    <td><?php echo $display["des"]; ?></td>
                                                   
                                                   
                                                </tr>
                                            <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                }
            } else {
                ?>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">All</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Vehicle Name</th>
                                        <th>Request Date</th>
                                        <th>Status</th>
                                        <th>Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     $sql = "SELECT *
                                     FROM tbl_req R
                                     INNER JOIN tbl_cust C ON R.cust_id = C.log_id 
                                     INNER JOIN tbl_vehicle T ON R.vehicle_id = T.vehicle_id
                                     INNER JOIN tbl_cust V ON T.cust_id = V.log_id
                                     WHERE  R.cust_id = $customerid";
                                    $res = $obj->query($sql);

                                    if (mysqli_num_rows($res) > 0) {
                                        while ($display = mysqli_fetch_array($res)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $display["cust_name"]; ?></td>
                                                <td><?php echo $display["ve_name"]; ?></td>
                                                <td><?php echo $display["req_date"]; ?></td>
                                                <td><?php echo $display["status"]; ?></td>
                                                <td><?php echo $display["des"]; ?></td>
                                               
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        </section>

<script src="script.js"></script>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>
