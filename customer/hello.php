<?php 
session_start();
include("headervview.php");
?>
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
                                    <form >

                                   
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
                                            <br>
                                            <div class="px-5 pay">
                                                Pay Amount: >
                                                
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
