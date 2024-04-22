<?php 
session_start();
include("headervview.php");
?>

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
?> 

<!-- Page Header Start -->
<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3">Car Booking & Payment</h1> 
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
                <div class="d-flex mb-3">
                    <h4 class="mr-2">Company : <?php echo $display['comp_name'] ?></h4>
                </div>
                <div class="d-flex mb-3">
                    <h4 class="mr-2">Model : <?php echo $display['model_name'] ?></h4>
                </div>
                <div class "d-flex mb-3">
                    <h4 class="mr-2">Location: <?php echo $display['dis_name'] ?>,<?php echo $display['loc_name'] ?></h4>
                </div>
                <div class="d-flex mb-3">
                    <h4 class="mr-2">Manufacturing Date : <?php echo $display['man_date'] ?></h4>
                </div>
                <div class="d-flex mb-3">
                    <h4 class="mr-2">Description : <?php echo $display['desp'] ?></h4>
                </div>
                <i class="fa fa-cogs text-primary mr-2"></i>
                <span>Fuel Type:<?php echo $display['fuel_name']; ?></span>
                <br>
                <i class="fa fa-road text-primary mr-2"></i>
                <span><?php echo $display['cur_km']; ?> km</span>
            </div>
        </div>
    </div>
</div>
 
<center>
  <style>
    /* Your CSS styles here */
  </style>
</center>

<main class="page payment-page">
    <section class="payment-form dark">
        <div class="container">
            <div class="block-heading">
                <h2>Make Payment</h2> 
            </div>
            <form>
                <div class="products">
                    <h3 class="title">Checkout</h3>
                    <div class="item">
                        <span class="price"></span>
                        <p class="item-name">Total Rate: ₹ <?php echo $display['rate'] ?></p>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>

<!-- Payment Button -->
<center>
    <button type="button" class="btn btn-primary launch" data-toggle="modal" data-target="#staticBackdrop">
        <i class="fa fa-rocket"></i> Pay Now
    </button>

    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-right">
                        <i class="fa fa-close close" data-dismiss="modal"></i>
                    </div>
                    <div class="tabs mt-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
    <a class="nav-link active" id="bank-transfer-tab" data-toggle="tab" href="#bank-transfer" role="tab" aria-controls="bank-transfer" aria-selected="true">
        <div class="bank-transfer-icon">
            <img src="bank.jpg" alt="Bank Transfer Icon"> <!-- Replace "your_image_url_here.jpg" with the URL of your image -->
        </div>
      <br>
      <br>
      <span>Bank Transfer</span>
    </a>
</li>

<style>
    .bank-transfer-icon {
        display: inline-flex;
        align: center;
        border-radius: 5px; /* Rounded corners */
        padding: 5px; /* Adjust padding as needed */
    }
    
    .bank-transfer-icon img {
        width: 150px; /* Adjust the image width as needed */
        height: 150pxpx; /* Adjust the image height as needed */
        align:center; /* Add some spacing between the image and text */
    }
</style>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="visa" role="tabpanel" aria-labelledby="visa-tab">
                           
                                    <div class="mt-4 mx-4">
                                    <form action="bookingvehicleaction.php?requestid=<?php echo $request_id ?>&vehicle_id=<?php echo $vehicle_id ?>" method="post">

                                   
                                        <div class="text-center">

                                            <h5></h5>
                                        </div>
                                        <div class="form mt-3">
                                            <div class="inputbox">
                                                <input type="text" name="name" id="cname" class="form-control" required="required">
                                                <span>Your Bank Account Holder name</span>
                                            </div>
                                            <div class="inputbox">
                                            <input type="number" name="fnum" id="fnum"   max="999999999999" class="form-control" required="required">
                                                <span>Your Account Number</span>
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <div class="inputbox">
                                                    <input type="text" name="name" id="cnum" max="9999999999" class="form-control" required="required">
                                                    <span>Bank Name,Branch</span>
                                                </div>
                                            <div class="inputbox">
                                            <input type="number" name="tnum" id="tnum"   max="999999999999" class="form-control" required="required">
                                                <span>To Account Number </span>
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <div class="inputbox">
                                            <input type="text" name="tttnum" id="tttnum" max="9999999" class="form-control" required="required">
                                                <span>IFSC CODE</span> 
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            
                                            </div>
                                            <input type="hidden" name="request_id" value="<?php echo $request_id ?>">
<input type="hidden" name="vehicle_id" value="<?php echo $vehicle_id ?>">
<input type="hidden" name="rate" value="<?php echo $display['rate'] ?>">
<input type="hidden" name="fieldname" value="<?php echo $display['rate'] ?>">


                                            <br>
                                            <div class="px-5 pay">
                                                Pay Amount: ₹ <?php echo $display['rate'] ?>
                                                
                        </div>
                    </div><button type="submit" class="btn btn-success btn-block">Make Payment</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
</center>

<?php
include("footercust.php");
?>
