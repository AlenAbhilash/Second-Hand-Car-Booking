<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <style>
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
    </style>
</head>
<body>

<?php include("header.php"); ?>

<div class="container mt-5">
    <h1 class="text-center mb-5">Customer Registration</h1>

    <div class="row">
        <?php
        include_once("../dboperation.php");
        $obj = new dboperation();
        $sql = "SELECT * FROM tbl_cust"; 
        $res = $obj->query($sql);

        while ($row = mysqli_fetch_array($res)) {
        ?>
            <div class="col-lg-4 col-md-6">
                <div class="rent-item">
                    <a href="#" class="image-container">
                        <img src="../upload/<?php echo $row['imgc']; ?>" alt="<?php echo $row['cust_name']; ?>" class="img-fluid">
                    </a>
                    <h4 class="text-uppercase mt-4"><?php echo $row['cust_name']; ?></h4>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="px-2">
                            <i class="fas fa-phone"></i>
                            <span class="ml-2"><strong>Contact:</strong> <?php echo $row['contact']; ?></span>
                        </div>
                        <div class="px-2 border-left border-right">
                            <i class="fas fa-cogs"></i>
                            <span class="ml-2"></span>
                        </div>
                        <div class="px-2>
                            <i class="fas fa-home"></i>
                            <span class="ml-2"><strong>House Name:</strong> <?php echo $row['housename']; ?></span>
                        </div>
                    </div>
                    <a href="custrev.php?cust_id=<?php echo $row["log_id"]; ?>">
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
