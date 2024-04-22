<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="your-styles.css"> <!-- Include your custom CSS for styling -->
    <style>
        .container {
            max-width: 900px;
            margin: 0 auto; 
        }
        .edit-profile-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
        }
        input[type="file"] {
            display: block;
        }
        img {
            max-width: 100px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <?php 
    session_start();
    include("headervview.php"); 
    ?>

    <div class="container">
        <div class="edit-profile-form">
            <h2>Edit Profile</h2>
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
            <form action="update_profile.php" method="post" enctype="multipart/form-data">
                <!-- Display the current image if it exists -->
                <?php if (!empty($row['imgc'])) { ?>
                <img src="../upload/<?php echo $row['imgc']; ?>" alt="Current Image">
                <?php } ?>

                <!-- Create form fields to edit user details -->
                <div class="form-group">
                    <label for="img">Change Customer image:</label>
                    <input type="file" id="img" name="img" accept="image/*">
                </div>

                <div class="form-group">
                    <label for="cust_name">Customer name:</label>
                    <input type="text" id="cust_name" name="cust_name" value="<?php echo $row['cust_name']; ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>">
                </div>

                <div class="form-group">
                    <label for="house">House Name:</label>
                    <input type="text" id="house" name="house" value="<?php echo $row['housename']; ?>">
                </div>

                <div class="form-group">
                    <label for="pincode">Pin Code:</label>
                    <input type="text" id="pincode" name="pincode" value="<?php echo $row['pincode']; ?>">
                </div>

                <div class="form-group">
                    <label for="id">ID Proof:</label>
                    <input type="text" id="id" name="id" value="<?php echo $row['id_proof']; ?>">
                </div>
            

                <!-- Add more fields for other details here -->

                <div class="form-group">
                    <input type="submit" value="Save"> 
                </div>
            </form>
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
