<?php include("headervview.php"); ?>

<div class="text-center mb-5 pb-5 animate__animated animate__fadeIn">
    <h1 class="text-primary text-uppercase" style="letter-spacing: 5px;">Dream</h1>
    <h1 class="mt-3">Car</h1> 
</div>

<div class="container-fluid py-5">
    <div class="container pt-5 pb-3"> 
        <h1 class="display-1 text-primary text-center"></h1>
        <h1 class="display-4 text-uppercase text-center mb-5 animate__animated animate__fadeInUp">Find Your Car</h1>
         
        <div class="row"> 
            <?php
            include_once("../dboperation.php");
            $obj = new dboperation();
            $sql = "SELECT * FROM tbl_vehicle"; 
            $res = $obj->query($sql);
            
            while ($row = mysqli_fetch_array($res)) {
            ?> 
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="rent-item mb-4"> 
                        <a href="#" class="image-container">
                            <img src="../upload/<?php echo $row['img1']; ?>" alt="" class="img-fluid">
                        </a>

                        <h4 class="text-uppercase mb-4"><?php echo $row['ve_name']; ?></h4>
                        <div class="d-flex justify-content-center mb-4">
                            <div class="px-2">
                                <i class="fa fa-car text-primary mr-1"></i>
                                <span><?php echo $row['man_date']; ?></span>
                            </div>
                            <div class="px-2 border-left border-right">
                                <i class="fa fa-cogs text-primary mr-1"></i>
                                <span></span>
                            </div>
                            <div class="px-2">
                                <i class="fa fa-road text-primary mr-1"></i>
                                <span><?php echo $row['cur_km']; ?></span>
                            </div>
                        </div>                          

                        <a href="vechicleviewmore.php?vehicle_id=<?php echo $row["vehicle_id"]; ?>">
                            <button type="button" class="btn btn-primary px-3" >More Details</button>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- Rent A Car End -->
<?php include("footercust.php"); ?>
