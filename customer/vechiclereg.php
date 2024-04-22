
<?php
    include("headervview.php");
    ?> 

  <!-- Contact Start -->   
  <div class="container-fluid py-5">  
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h1 class="text-primary text-uppercase" style="letter-spacing: 5px;">Vechicle</h1>
                <h1>Vechicle Registration</h1>
            </div>
            <div class="row justify-content-center"> 
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
                        <form action="vechicleregaction.php" method="post" enctype="multipart/form-data">
                        </div> 
                        <div class="form-group">
              <label for="exampleInputEmail1"> Vechicle Name</label>
              <input type="text" class="form-control" id="ve" name="ve" required="required">
            </div>
          <div class="card-body"> 
            <div class="form-group">
            <div class="card-title">Company Name</div>  
            <div class="form-group">
              <?php
              include_once("../dboperation.php");
              $obj = new dboperation();
              $sql = "SELECT * FROM tbl_companyreg";
              $res = $obj->query($sql);
              ?>
              <select class="form-control" name="selectcomp" id="selectcomp" required="required">
                <option>---Select Company---</option>
                <?php
                while ($display = mysqli_fetch_array($res)) {
                  ?>
                  <option value="<?php echo $display["comp_id"] ?>">
                    <?php echo $display["comp_name"] ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="card-title">Choose model</div>
            <div class="form-group">
              <?php
              $sql = "SELECT * FROM tbl_model"; 
              $res = $obj->query($sql);
              ?>
              <select class="form-control" name="selectmodel" id="selectmodel" required="required">
                <option>---Select model---</option>
                <?php
                while ($display = mysqli_fetch_array($res)) {
                  ?>
                  <option value="<?php echo $display["model_id"] ?>">
                    <?php echo $display["model_name"] ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="card-title">Body Type</div> 
            <div class="form-group">
              <?php
              include_once("../dboperation.php");
              $obj = new dboperation();
              $sql = "SELECT * FROM tbl_body";
              $res = $obj->query($sql);
              ?>
              <select class="form-control" name="selectbody" id="selectbody" required="required">
                <option>---Select Body---</option>
                <?php
                while ($display = mysqli_fetch_array($res)) {
                  ?>
                  <option value="<?php echo $display["bod_id"] ?>">
                    <?php echo $display["bod_name"] ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="card-title">Fuel Type</div> 
            <div class="form-group">
              <?php
              include_once("../dboperation.php");
              $obj = new dboperation();
              $sql = "SELECT * FROM tbl_fuel";
              $res = $obj->query($sql);
              ?>
              <select class="form-control" name="selectfuel" id="selectfuel" required="required">
                <option>---Select Fuel---</option>
                <?php
                while ($display = mysqli_fetch_array($res)) {
                  ?>
                  <option value="<?php echo $display["fuel_id"] ?>">
                    <?php echo $display["fuel_name"] ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Price of your Vechicle</label>
              <input type="text" class="form-control" id="vech" name="vech" required="required">
              <small id="emailHelp" class="form-text text-muted">% 5 of the amount is Taken as Tax</small>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Manufacturing Date</label>
              <input type="date" class="form-control" id="mdate" name="mdate" required="required">
            </div>
            <div class="form-group">
    <label for="ownerDetails">Owner Detail</label>
    <textarea class="form-control" id="ownerD" name="ownerD" rows="4" cols="50" required="required"></textarea>
</div>
<div class="form-group">
              <label for="exampleInputEmail1"> Current kilometer</label>
              <input type="text" class="form-control" id="kilo" name="kilo" required="required">
            </div>

           
            <div class="card-title">Choose District</div> 
            <div class="form-group">
              <?php
              include_once("../dboperation.php");
              $obj = new dboperation();
              $sql = "SELECT * FROM tbl_dis";
              $res = $obj->query($sql);
              ?>
              <select class="form-control" name="seldistrictid" id="seldistrictid"required="required">
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
                                <label for="img1">Image 1</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img1" name="img1" required="required">
                                    <label class="custom-file-label" for="img1">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="img2">Image 2</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img2" name="img2" required="required"> 
                                    <label class="custom-file-label" for="img2">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="img3">Image 3</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img3" name="img3" required="required">
                                    <label class="custom-file-label" for="img3">Choose file</label>
                                </div> 
                            </div>
            <div class="form-group">
    <label for="ownerDetails">Vechicle Detail</label>
    <textarea class="form-control" id="vd" name="vd" rows="4" cols="50"required="required"></textarea >
</div>
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div> 
<!-- Ajax code -->
<script src="jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $("#selectcomp").change(function() {
      var comp_id = $(this).val();
      $.ajax({
        url: "getmodel.php",
        method: "POST",
        data: {
          comp_id: comp_id
        },
        success: function(response) {
          $("#selectmodel").html(response);
        },
        error: function() {
          $("#selectmodel").html("Error occurred while getting model!");
        }
      });
    });
  });
</script>


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



