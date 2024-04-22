<?php include("headervview.php"); ?>

<?php
// Get the vehicle ID from the URL parameter
if (isset($_GET['vehicle_id'])) { 
    $vehicle_id = $_GET['vehicle_id']; 
    
    // Fetch the vehicle details from the database using the provided vehicle_id
    require_once("../dboperation.php");
    $obj = new dboperation();
    $sql = "SELECT * FROM tbl_vehicle WHERE vehicle_id = $vehicle_id";
    $res = $obj->query($sql);
    $vehicle_details = mysqli_fetch_assoc($res);
}
?>  

<!-- Page Header Start -->
<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3">Edit Car Details</h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a class="text-white" href="index.php">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">Edit Car Details</h6>
    </div> 
</div>
<!-- Page Header End -->

<!-- Edit Form Start -->
<div class="container-fluid pt-5">
    <div class="container pt-5 pb-3">
            <!-- Display existing vehicle details in form fields -->
            <div class="form-group">
            <form action="update_vehicle_action.php" method="post">
            <h3 class="text-uppercase text-body m-0">Edit Car Details</h3><br><br><br>
            <form action="update_vehicle_action.php" method="post">
    <div class="form-group">
        <label for="ve_name">Vehicle Name</label>
        <input type="text" class="form-control" id="ve_name" name="ve_name" value="<?php echo $vehicle_details['ve_name']; ?>">
    </div>
    <div class="form-group">
        <label for="rate">Price</label>
        <input type="text" class="form-control" id="rate" name="rate" value="<?php echo $vehicle_details['rate']; ?>">
    </div>
    <div class="form-group">
        <label for="cur_km">Current Kilometers</label>
        <input type="text" class="form-control" id="cur_km" name="cur_km" value="<?php echo $vehicle_details['cur_km']; ?>">
    </div>
    <div class="form-group">
        <label for="owner_status">Owner Status</label>
        <input type="text" class="form-control" id="owner_status" name="owner_status" value="<?php echo $vehicle_details['owner_status']; ?>">
    </div>
    <div class="form-group">
        <label for="desp">Description</label>
        <textarea class="form-control" id="desp" name="desp"><?php echo $vehicle_details['desp']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="man_date">Manufacturing Date</label>
        <input type="date" class="form-control" id="man_date" name="man_date" value="<?php echo $vehicle_details['man_date']; ?>">
        
    </div>

    <!-- Add more form fields for other details to be updated -->

    <input type="hidden" name="vehicle_id" value="<?php echo $vehicle_id; ?>">

    <button type="submit" class="btn btn-primary">Update Details</button>
</form>

    </div>
</div>
<!-- Edit Form End -->
