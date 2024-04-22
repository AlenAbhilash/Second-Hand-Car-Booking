<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details and Vehicle Listing</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <style>
       .page-header {
    background-color: #3498db; /* A lighter shade of blue */
    color: #fff;
    padding: 20px;
    text-align: center;
    margin: 0 auto; /* Center the header horizontally */
    width: 50%;
}



        .page-header h1 {
            font-size: 24px;
        }

        .rent-item {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
        }

        .rent-item img {
            max-width: 100%;
            height: auto;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .customer-details {
            background-color: #f8f9fa;
            padding: 20px;
            border: 1px solid #ddd;
            margin-top: 20px;
        }

        .customer-details ul {
            list-style: none;
            padding: 0;
        }

        .customer-details li {
            padding: 10px;
        }

        .customer-details li:nth-child(odd) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php include("header.php"); ?>

    <?php
    if (isset($_GET['cust_id'])) {
        $customer_id = $_GET['cust_id'];

        // Fetch the customer details including tbl_dis and tbl_loc from the database using the provided customer_id
        require_once("../dboperation.php");
        $obj = new dboperation();
        $customer_sql = "SELECT c.*, d.dis_name, l.loc_name 
        FROM tbl_cust c
        LEFT JOIN tbl_dis d ON c.dis_id = d.dis_id
        LEFT JOIN tbl_loc l ON c.loc_id = l.loc_id
        WHERE c.log_id = $customer_id";

        $customer_res = $obj->query($customer_sql);
        $customer = mysqli_fetch_assoc($customer_res);

        // Fetch all vehicles for the specific customer
        $vehicle_sql = "SELECT * FROM tbl_vehicle WHERE cust_id = $customer_id";
        $vehicle_res = $obj->query($vehicle_sql);
    }
    ?>

    <!-- Page Header -->
    <div class="page-header">
        <h1 class="display-4 text-uppercase">
            <?php echo isset($customer['cust_name']) ? $customer['cust_name'] : "Customer not registered yet"; ?>
        </h1>
    </div>

    <!-- Customer Details -->
    <div class="container pt-4 customer-details">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <img class="img-fluid rounded" src="<?php echo isset($customer['imgc']) ? "../upload/{$customer['imgc']}" : "path-to-default-image.jpg" ?>" alt="Customer">
            </div>
            <div class="col-lg-6">
                <h2 class="display-5 text-uppercase mb-4">Customer Details</h2>
                <ul>
                    <li><strong>Customer name:</strong> <?php echo $customer['cust_name']; ?></li>
                    <li><strong>Email:</strong> <?php echo $customer['email']; ?></li>
                    <li><strong>House Name:</strong> <?php echo $customer['housename']; ?></li>
                    <li><strong>District:</strong> <?php echo $customer['dis_name']; ?></li>
                    <li><strong>Location:</strong> <?php echo $customer['loc_name']; ?></li>
                    <li><strong>Pin Code:</strong> <?php echo $customer['pincode']; ?></li>
                    <li><strong>ID Proof:</strong> <?php echo $customer['id_proof']; ?></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Vehicle Listing for the Customer -->
    <div class="container pt-4">
        <h2 class="display-5 text-uppercase mb-4">Vehicle registered</h2>
        <div class="row">
            <?php
            while ($row = mysqli_fetch_array($vehicle_res)) {
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="rent-item">
                        <a href="#" class="image-container">
                            <img src="../upload/<?php echo $row['img1']; ?>" alt="<?php echo $row['ve_name']; ?>" class="img-fluid">
                        </a>
                        <h4 class="text-uppercase mt-4"><?php echo $row['ve_name']; ?></h4>
                        <div class="d-flex justify-content-center mt-4">
                            <div class="px-2">
                                <i class="fas fa-car"></i>
                                <span class="ml-2"><strong>Manufactured Date:</strong> <?php echo $row['man_date']; ?></span>
                            </div>
                            <div class="px-2 border-left border-right">
                                <i class="fas fa-cogs"></i>
                                <span class="ml-2"></span>
                            </div>
                            <div class="px-2">
                                <i class="fas fa-road"></i>
                                <span class="ml-2"><strong>Current KM:</strong> <?php echo $row['cur_km']; ?></span>
                            </div>
                        </div>
                        <a href="vehiclerev.php?vehicle_id=<?php echo $row["vehicle_id"]; ?>">
                            <button type="button" class="btn btn-primary mt-4">More Details</button>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <?php include("footer.php"); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
