<?php
session_start();
    include("headercust.php");
?>

<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3">change password</h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a class="text-white" href="index.php">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">change password</h6>
    </div> 
</div>
<form action="changepasswordaction.php" method="post">
<div class="container-fluid py-9">
    <div class="container pt-5 pb-9">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-5">
                <div class="card p-5">
                    <h2 class="card-title text-center mb-4">change password</h2>
                    <form name="f1">
                        <div class="mb-4">
                            <input type="text" class="form-control" name="txtusername" placeholder=" Old Your Name" required="required">
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control" name="txtpassword" placeholder=" Old Password" required="required">
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control" name="txtnewpassword" placeholder=" new Password" required="required">
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control" name="txtconfirmpwd" placeholder="Confirm Password" required="required">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary btn-block" type="submit">change password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    include("footercust.php");
?>
