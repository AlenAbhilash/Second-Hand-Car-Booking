<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
</head>
<body>
    <?php 
    session_start();
    include("headervview.php"); 
    ?>

    <!-- Customer Details -->
    <div style="font-family: Arial, sans-serif; background-color: #f5f5f5; padding: 20px;">
        <div style="max-width: 900px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
            <div style="text-align: center;">
                <?php
                include_once("../dboperation.php");
                $obj = new dboperation();
                $customerid = $_SESSION['customerid'];
                $sql = "SELECT c.*, m.dis_name, l.loc_name 
                        FROM tbl_cust c 
                        INNER JOIN tbl_dis m ON c.dis_id = m.dis_id 
                        INNER JOIN tbl_loc l ON c.loc_id = l.loc_id 
                        WHERE c.log_id = '$customerid'";
    
                $res = $obj->query($sql);

                while ($row = mysqli_fetch_array($res)) {
                ?>
                <img src="<?php echo isset($row['imgc']) ? "../upload/{$row['imgc']}" : "path-to-default-image.jpg" ?>" alt="Customer" style="max-width: 100%; border-radius: 10px;">
            </div>
            <div>
                <br>
                <center>
                    <h2 style="font-size: 30px; text-transform: uppercase; margin-bottom: 20px;">My Profile</h2>
                    
                </center>
                <ul style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 10px;"><strong>Customer name:</strong> <?php echo $row['cust_name']; ?></li>
                    <li style="margin-bottom: 10px;"><strong>Email:</strong> <?php echo $row['email']; ?></li>
                    <li style="margin-bottom: 10px;"><strong>House Name:</strong> <?php echo $row['housename']; ?></li>
                    <li style="margin-bottom: 10px;"><strong>District:</strong> <?php echo $row['dis_name']; ?></li>
                    <li style="margin-bottom: 10px;"><strong>Location:</strong> <?php echo $row['loc_name']; ?></li>
                    <li style="margin-bottom: 10px;"><strong>Pin Code:</strong> <?php echo $row['pincode']; ?></li>
                    <li style="margin-bottom: 10px;"><strong>ID Proof:</strong> <?php echo $row['id_proof']; ?></li>
                    
                </ul>
                <center>  <a href="editprofile.php" style="text-decoration: none; background-color: #007bff; color: #fff; padding: 10px 20px; border-radius: 5px;">Edit Profile</a> </center>
            </div>
            <?php
            }
            ?>
        </div>
    </div>

    <?php
    include("footer.php");
    ?>
</body>
</html>
