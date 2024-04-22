<?php include("headervview.php"); ?>

<?php
// Get the vehicle ID from the URL parameter
if (isset($_GET['vehicle_id'])) { 
    $vehicle_id = $_GET['vehicle_id']; 
    
    // Fetch the vehicle details from the database using the provided vehicle_id
    require_once("../dboperation.php");
    $obj = new dboperation();
    $sql = "SELECT * FROM tbl_vehicle v inner join tbl_model m on m.model_id=v.model_id inner join tbl_companyreg c on c.comp_id=v.comp_id inner join tbl_fuel f on f.fuel_id=v.fuel_id inner join tbl_dis d on d.dis_id=v.dis_id WHERE v.vehicle_id = $vehicle_id";
    $res = $obj->query($sql);
    $display = mysqli_fetch_assoc($res);
}
?>  
 
<!-- Page Header Start -->
<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3">Car Details & Booking</h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a class="text-white" href="index.php">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">Car Booking</h6>
    </div> 
</div>
<!-- Page Header End -->

<!-- Detail Start -->
<div class="container-fluid pt-5">
    <div class="container pt-5 pb-3">
        <div class="row align-items-center pb-2">
            <div class="col-lg-6 mb-4">
                <h1 class="display-4 text-uppercase mb-5"><?php echo $display['ve_name'] ?></h1>
                <img class="img-fluid" src="../upload/<?php echo $display['img1']; ?>" alt="">
            </div>
            <div class="col-lg-6 mb-4">
                <h4>Price : RS ₹<?php echo $display['rate']; ?></h4>
                <div class="d-flex mb-3">
                    <h6 class="mr-2">Company : <?php echo $display['comp_name'] ?></h6>
                </div>
                <div class="d-flex mb-3">
                    <h6 class="mr-2">Model : <?php echo $display['model_name'] ?></h6>
                </div>
                <div class="d-flex mb-3">
                    <h6 class="mr-2">Posted Date : <?php echo $display['post_date'] ?></h6>
                </div>
                <div class="d-flex mb-3">
                    <h6 class="mr-2">Manufacturing Date : <?php echo $display['man_date'] ?></h6>
                </div>
                <div class="d-flex mb-3">
                    <h6 class="mr-2">Description : <?php echo $display['desp'] ?></h6>
                </div>
                <div class="d-flex pt-1">
                    <h6>Share on:</h6>
                    <div class="d-inline-flex">
                        <a class="px-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class a="px-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="px-2" href=""><i class="fab fa-linkedin-in"></i></a>
                        <a class="px-2" href=""><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-n3 mt-lg-0 pb-4">
            <div class="col-md-3 col-6 mb-2">
                <i class="fa fa-car text-primary mr-2"></i>
                <span>District: <?php echo $display['dis_name']; ?></span>
            </div>
            <div class="col-md-3 col-6 mb-2">
                <i class="fa fa-cogs text-primary mr-2"></i>
                <span>Fuel Type: <?php echo $display['fuel_name']; ?></span>
            </div>
            <div class="col-md-3 col-6 mb-2">
                <i class="fa fa-road text-primary mr-2"></i>
                <span><?php echo $display['cur_km']; ?> km</span>
            </div>
            <div class="col-md-3 col-6 mb-2">
                <i class="fa fa-eye text-primary mr-2"></i>
                <span>Status: <?php echo $display['owner_status']; ?></span>
            </div>
            <!-- Add more vehicle details here -->
        </div>
        <div class="row">
            <?php 
            // Display the three vehicle images
            for ($i = 1; $i <= 3; $i++) {
                $imageField = 'img' . $i; 
                if (!empty($display[$imageField])) {
                    echo '<div class="col-lg-4 col-md-6 mb-2">';
                    echo '<div class="rent-item mb-4">';
                    echo '<a href="#" class="image-container">';
                    echo '<img src="../upload/' . $display[$imageField] . '" alt="" class="img-fluid">';
                    echo '</a>'; 
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</div>
<!-- Detail End -->

<!-- Booking and Payment Form Start -->
<div class="container-fluid pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Booking Form -->
                <form action="vehicleviewmoreaction.php" method="post">
                    <h2 class="mb-4">Booking Detail</h2>
                    <?php
                    // Check if the vehicle is not sold out
                    if ($display['owner_status'] !== 'sold out') {
                        echo '<div class="mb-5">';
                        echo '<div class="form-group">';
                        echo '<textarea class="form-control py-3 px-4" rows="3" placeholder="Special Request" name="special_request" id="special_request"></textarea>';
                        echo '<input type="hidden" name="vehicleid" value="' . $vehicle_id . '">';
                        echo '</div>';
                        echo '</div>';
                        echo '<button class="btn btn-block btn-primary py-3 mb-3">Send Request</button>';
                    } else {
                        echo '<p>This vehicle is Sold Out and cannot be booked.</p>';
                    }
                    ?>
                </form>
            </div>
            <div class="col-lg-4">
                <!-- Payment Form -->
            </div>
        </div>
    </div>
</div>

<!-- Booking and Payment Form End -->

<!-- Car Booking End -->

<?php include("footer.php"); ?>
