<?php
include("headercust.php");
?>
<div class="container-fluid py-5"> 
    <div class="container py-5">
        <div class="text-center mb-3 pb-3">
            <h1 class="text-primary text-uppercase" style="letter-spacing: 5px;">Customer</h1>
            <h1>Customer Registration</h1> 
        </div> 
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form action="customerregaction.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="cust_name">Customer Name</label>
                        <input type="text" class="form-control" id="cust_name" name="cust_name" placeholder="Enter the Name" required="required">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required="required">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="telephone" class="form-control" id="contact" name="contact" min="1111111111"  max="9999999999"placeholder="Enter the Number" required="required">
                    </div>
                    <div class="form-group">
                        <label for="housename">House Name</label>
                        <input type="text" class="form-control" id="housename" name="housename" placeholder="Enter the Name" required="required">
                    </div>
                    <div class="card-title">Choose District</div>
                    <div class="form-group">
                        <?php
                        include_once("../dboperation.php");
                        $obj = new dboperation();
                        $sql = "SELECT * FROM tbl_dis";
                        $res = $obj->query($sql);
                        ?>
                        <select class="form-control" name="seldistrictid" id="seldistrictid" required="required">
                            <option>---Select District---</option>
                            <?php
                            while ($display = mysqli_fetch_array($res)) {
                            ?>
                                <option value="<?php echo $display["dis_id"] ?>">
                                    <?php echo $display["dis_name"] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="card-title">Choose Location</div>
                    <div class="form-group">
                        <?php
                        $sql = "SELECT * FROM tbl_loc";
                        $res = $obj->query($sql);
                        ?>
                        <select class="form-control" name="selectloc" id="selectloc" required="required">
                            <option>---Select Location---</option>
                            <?php
                            while ($display = mysqli_fetch_array($res)) {
                            ?>
                                <option value="<?php echo $display["loc_id"] ?>">
                                    <?php echo $display["loc_name"] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pincode">Pin code</label>
                        <input type="number" class="form-control" id="pincode" name="pincode"  max="99999" placeholder="Enter the Number" required="required">
                        
                    </div>
                    <div class="form-group">
                        <label for="img1">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="img1" name="img1" required="required">
                            <label class="custom-file-label" for="img1">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_proof">Id Proof</label>
                        <input type="number" class="form-control" id="id_proof" name="id_proof" max="99999" placeholder="Enter the Number" required="required">
                        <small id="emailHelp" class="form-text text-muted">Enter your least 5 digits of aadhar card number </small>
                    </div>
                    <div class="form-group">
                        <label for="log_name">User Name</label>
                        <input type="text" class="form-control" id="log_name" name="log_name" placeholder="Enter the Name">
                    </div>
                    <div class="form-group">
                        <label for="log_password">Password</label>
                        <input type="password" class="form-control" id="log_password" name="log_password" placeholder="Enter the password" required="required">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm the password" required="required">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                            <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Ajax code -->
<script src="jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#seldistrictid").change(function() {
            var dis_id = $(this).val();
            $.ajax({
                url: "getLocation.php",
                method: "POST",
                data: {
                    dis_id: dis_id
                },
                success: function(response) {
                    $("#selectloc").html(response);
                },
                error: function() {
                    $("#selectloc").html("Error occurred while getting location!");
                }
            });
        });
    });
</script>

<?php
include("footercust.php");
?>
