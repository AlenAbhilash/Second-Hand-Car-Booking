*<?php
include("header.php") 
?>
<!-- <div class="container-xxl position-relative bg-white d-flex p-0"> -->
<div class="content">
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                       <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Fuel Registration</h6>
                            <form action="fuelaction.php" method="post">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Fuel Type</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fuel_name" placeholder="fuel name" required="required">
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary"> Add fuel type</button>
                            </form>
                        </div>
                    </div>
</div>
</div>
</div>
<!-- </div> -->
<?php
include("footer.php")
?>*