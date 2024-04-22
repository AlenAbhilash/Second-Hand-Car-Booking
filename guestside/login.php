<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Add custom styles for your video container */
        #video-background {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
        }

        /* Style for the content container */
        .container-fluid {
            position: relative;
            z-index: 1;
        }

        /* Adjust header margin to push content down */
        .header {
            margin-top: 100px; /* Adjust this value as needed */
        }
    </style>
</head>
<body>

    <!-- Video Background -->
    <video autoplay muted loop id="video-background">
        <source src="lv_0_20230921164300" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <?php
        include("headercust.php");
    ?>

    <form action="loginaction.php" method="post">
        <div class="container-fluid py-9">
            <div class="container pt-5 pb-9">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-5"> 
                        <div class="card p-5">
                            <h2 class="card-title text-center mb-4">Login / Register</h2>
                            <form class="contact-form">
                                <div class="mb-4">
                                    <input type="text" class="form-control" name="log_name" placeholder="Your Name" required="required">
                                </div>
                                <div class="mb-4">
                                    <input type="password" class="form-control" name="log_password" placeholder="Password" required="required">
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-5 text-center">
            <p class="mb-0">Don't have an account ? <a href="customerreg.php" class="text-primary">Register</a></p>
            <p class="mb-0">Don't know password ? <a href="forgotpassword.php" class="text-primary">Forgot password</a></p>
        </div>
    </form>

    
</body>
</html>
