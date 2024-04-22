<?php 
session_start();
include("headervview.php"); 
$requestid=$_GET['req_id'];
?>

  <!-- Contact Start --> 
  <div class="container-fluid py-5">  
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h1 class="text-primary text-uppercase" style="letter-spacing: 5px;"></h1>
                <h1>Pick up Test Date</h1>
            </div>
            <div class="row justify-content-center"> 
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
                        <form method="POST" action="testdateaction.php">   
                    
            <div class="form-group"> 
              <label for="exampleInputEmail1">Pick up Test Date</label>
              <input type="date" class="form-control" id="tdate" name="tdate" required="required">
            </div>
            <div class="form-group">
    <label for="ownerDetails">Remark</label>
    <textarea class="form-control" id="dep" name="dep" rows="4" cols="50" required="required"></textarea>
    <input type="hidden" name="requestid" value="<?php echo $requestid ?>">
</div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<?php
include("footercust.php");
?>





