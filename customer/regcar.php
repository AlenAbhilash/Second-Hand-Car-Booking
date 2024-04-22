<?php
session_start();
include("headervview.php");
require_once("../dboperation.php"); 

$obj = new dboperation();
$customerid = $_SESSION['customerid']; 
$sql = "SELECT * FROM tbl_vehicle WHERE cust_id = $customerid";
$res = $obj->query($sql);
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Car Page</title>
    <!-- Add your CSS styles here -->
    <link rel="stylesheet" href="your-styles.css">
</head> 
<body>

<div class="container">
    <h1 class="text-center text-primary text-uppercase mt-5" style="letter-spacing: 5px;">Registered Car</h1>
</div>

<div class="container-fluid py-5">
    <div class="container pt-5 pb-3"> 
        <h1 class="display-4 text-primary text-center"></h1>
        
        <div class="row">
            <?php if (mysqli_num_rows($res) > 0) { ?>
                <?php while ($display = mysqli_fetch_assoc($res)) {
                    $vehicleId = $display['vehicle_id'];
                    $reqId = getReqIdForVehicle($obj, $vehicleId);
                ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="rent-item">
                            <a href="#" class="image-container">
                                <img src="../upload/<?php echo $display['img1']; ?>" alt="Car Image" class="img-fluid">
                            </a>
                            <h4 class="text-uppercase mb-4"><?php echo $display['ve_name']; ?></h4>
                            <div class="d-flex justify-content-center mb-4">
                                <div class="px-2">
                                    <i class="fa fa-car text-primary mr-1"></i>
                                    <span><?php echo $display['man_date']; ?></span>
                                </div>
                                <div class="px-2 border-left border-right">
                                    <i class="fa fa-cogs text-primary mr-1"></i>
                                    <span>Auto</span>
                                </div>
                                <div class="px-2">
                                    <i class="fa fa-road text-primary mr-1"></i>
                                    <span><?php echo $display['cur_km']; ?></span>
                                </div>
                            </div>
                            <a href="regcart.php?vehicle_id=<?php echo $display["vehicle_id"]; ?>&req_id=<?php echo $reqId; ?>">
                                <button type="button" class="btn btn-primary px-3">Requested</button>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="col-12">
                    <p class="text-center">No records found.</p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include("footercust.php"); ?>

</body>
</html>

<?php
function getReqIdForVehicle($obj, $vehicleId) {
    $sql = "SELECT req_id FROM tbl_req WHERE vehicle_id = $vehicleId";
    $res = $obj->query($sql);
    if ($row = mysqli_fetch_assoc($res)) {
        return $row['req_id'];
    }
    return 0; // Return 0 if no matching req_id is found
}
?>
