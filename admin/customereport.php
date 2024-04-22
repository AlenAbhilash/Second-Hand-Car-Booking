<?php
include("header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Customer List</title>
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
            margin-top: 50px;
        }

        .box {
            text-align: center;
            margin-top: 20px;
        }

        .export-button {
            margin-top: 10px;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            font-family: fantasy;
        }

        .table-container {
            margin: 0 auto;
            border: 2px solid #adaaaa;
            box-shadow: 3px 4px 11px #777777;
            padding: 10px;
        }

        th {
            background-color: #87CEEB; /* Light blue background color */
            color: #fff;
            border-right: 3px solid #ccc;
        }
    </style> 
</head>

<body>
<form action="Excel/excelcustomer.php" method="post">
    <div class="logo">
        <a href="./index.php">
        </a>
    </div>
    <div class="container">
        <h2>CUSTOMER LIST</h2>
        <div class="table-container">
            <table class="table table-hover"> 
                <tr>
                    <th>SI.NO</th>
                    <th>NAME</th>
                    <th>E-MAIL</th>
                    <th>CONTACT NO</th>
                    <th>ADDRESS</th> 
                    <th>DISTRICT</th>
                    <th>LOCATION</th>
                   
                   
                </tr>
                <?php
                include("../dboperation.php");
                $obj = new dboperation();
                $s = 1;
                $sql = "select * from tbl_cust f inner join tbl_dis d on f.dis_id=d.dis_id inner join tbl_loc l on f.loc_id=l.loc_id";
                $result = $obj->query($sql);
                while ($display = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td class="py-1"><?php echo $s++; ?></td>
                        <td><?php echo $display["cust_name"]; ?></td>
                        <td><?php echo $display["email"]; ?></td>
                        <td><?php echo $display["contact"]; ?></td>
                        <td><?php echo $display["housename"]; ?></td>
                        <td><?php echo $display["dis_name"]; ?></td>
                        <td><?php echo $display["loc_name"]; ?></td>
                       
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <div class="box">
            <input type="submit" name="addnew" value="Export" class="btn btn-primary export-button">
        </div>
    </div>
</form>
</body>
</html>
<?php
include("footer.php");
?>
