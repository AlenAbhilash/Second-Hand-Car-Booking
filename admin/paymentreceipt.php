<?php 
session_start();
include("header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>
        .container {
            margin-top: 20px;
            border: 1px solid #ddd;
            padding: 20px;
        }
        .invoice-ribbon {
            text-align: center;
        }
        .ribbon-inner {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .car-image {
            max-width: 100%;
            height: auto;
        }
        .car-details {
            margin-top: 20px;
        } 
        .car-details h4 {
            margin: 5px 0;
        }
        .text-underline {
            text-decoration: underline;
        }
        .payment-details {
            margin-top: 20px;
        }
        .payment-details h4 {
            margin: 5px 0;
        }
        .lead {
            font-size: 24px;
        }
        .print-button {
            margin-top: 20px;
        }
        .ribbon-inner {
        background-color: #FFA500; /* Orange color */
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
    }
    </style>
</head>
<body>
<div class="container">
    <div class="invoice-ribbon">
        <div class="ribbon-inner">PAID</div>
    </div>
    <div class="row">
        <div class="col-sm-6 top-left">
            <i class="fa fa-rocket"></i>
        </div>
    </div>
    <?php
    // Get the vehicle ID from the URL parameter
    $vehicle_id = $_GET['vehicle_id'];
    $request_id = $_GET['requestid'];
    // Fetch the vehicle details from the database using the provided vehicle_id
    require_once("../dboperation.php");
    $obj = new dboperation();
    $sql = "SELECT * FROM tbl_vehicle v
            INNER JOIN tbl_model m ON m.model_id=v.model_id
            INNER JOIN tbl_companyreg c ON c.comp_id=v.comp_id 
            INNER JOIN tbl_fuel f ON f.fuel_id=v.fuel_id
            INNER JOIN tbl_dis d ON d.dis_id=v.dis_id
            INNER JOIN tbl_loc l ON l.loc_id=v.loc_id 
            WHERE v.vehicle_id = $vehicle_id";
    $res = $obj->query($sql);
    $display = mysqli_fetch_assoc($res);
    
    // Fetch payment details from tbl_payment using the request_id
    $paymentSql = "SELECT * FROM tbl_payment WHERE req_id = $request_id";
    $paymentRes = $obj->query($paymentSql);
    $paymentDetails = mysqli_fetch_assoc($paymentRes); 
    ?>
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="text-center text-underline">Payment Receipt</h1>
        </div>
    </div>
    <div class="row car-details">
        <div class="col-md-6">
            <img class="car-image" src="../upload/<?php echo $display['img1']; ?>" alt="Car Image">
        </div>
        <div class="col-md-6">
            <h3>Car Name: <?php echo $display['ve_name'] ?></h3>
            <h4>Company: <?php echo $display['comp_name'] ?></h4>
            <h4>Model: <?php echo $display['model_name'] ?></h4>
            <h4>Location: <?php echo $display['dis_name'] ?>, <?php echo $display['loc_name'] ?></h4>
            <i class="fa fa-cogs text-primary"></i>
            <span>Fuel Type: <?php echo $display['fuel_name']; ?></span>
            <br>
            <i class="fa fa-road text-primary"></i>
            <span><?php echo $display['cur_km']; ?> km</span>
        </div>
    </div>
    <div class="row payment-details">
        <div class="col-md-12">
            <h1 class="text-center text-underline">Payment Details</h1>
            <h4>Payment Amount: ₹<?php echo $paymentDetails['pay_amount']; ?></h4>
            <h4>Status: <?php echo $paymentDetails['pay_status']; ?></h4>
            <h4>From Account: Ac<?php echo $paymentDetails['fromaccount']; ?></h4>
            <h4>TO Account: Ac<?php echo $paymentDetails['toaccount']; ?></h4>
            <h4>Payment Date: <?php echo $paymentDetails['pay_date']; ?></h4>
        </div>
    </div>
    <div class="row print-button">
        <div class="col-md-6">
        
</div>
</div>
</div>
</div>
</div>

    <?php
include("footer.php");
?>



