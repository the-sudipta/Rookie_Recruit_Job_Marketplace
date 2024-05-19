<?php include 'Renderer.php'; ?>


<?php
session_start();
//============================================= IMAGE LINKS ====================================================
$NAV_user_image = "https://raw.githubusercontent.com/yaarian-om/SERVER/main/1010110010/Rookie_Recruit_Job_MarketPlace/_User.gif";
$NAV_company_logo = "https://raw.githubusercontent.com/yaarian-om/SERVER/main/1010110010/Rookie_Recruit_Job_MarketPlace/_Logo.gif";
$NAV_dashboard_icon = "https://raw.githubusercontent.com/yaarian-om/SERVER/main/1010110010/Rookie_Recruit_Job_MarketPlace/_Home.gif";
$NAV_blog_icon = "https://raw.githubusercontent.com/yaarian-om/SERVER/main/1010110010/Rookie_Recruit_Job_MarketPlace/blog.gif";
$NAV_payment_icon = "https://raw.githubusercontent.com/yaarian-om/SERVER/main/1010110010/Rookie_Recruit_Job_MarketPlace/_Payment.gif";
$NAV_test_icon = "";
//=============================================== Page Links =======================================================
//$NAV_users_page = "/Rookie_Recruit_Job_Marketplace/view/admin/Show_All_Users.php";
$NAV_logout_page = "/Rookie_Recruit_Job_Marketplace/controller/LogoutService.php";
$NAV_Blog_page = "/Rookie_Recruit_Job_Marketplace/view/blog/All_Blogs.php";
$NAV_dashboard_page =  "/Rookie_Recruit_Job_Marketplace/view/hr/HR_Dashboard.php";
$NAV_my_profile_page = "/Rookie_Recruit_Job_Marketplace/view/hr/HR_Profile.php";
$NAV_example_page =  "/Rookie_Recruit_Job_Marketplace/view/admin/";
$NAV_create_payments_hr = "/Rookie_Recruit_Job_Marketplace/view/payment/Payment_Create_HR.php";
$HOLY_FIRST_PAGE = "/Rookie_Recruit_Job_Marketplace/view/HOLY_FIRST_PAGE.php";
//====================================================================================================================


if($_SESSION["user_id"] <= 0){
    header("Location: {$HOLY_FIRST_PAGE}");
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rookie Recruit Job Marketplace</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>



<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white" >
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img
                    src="<?php echo $NAV_company_logo; ?>"
                    height="25"
                    alt="RRJM"
                    loading="lazy"
                />
            </a>
            <b>Rookie Recruit Job Marketplace</b>
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <!-- Avatar -->
            <div class="dropdown">
                <a
                    class="dropdown-toggle d-flex align-items-center hidden-arrow"
                    href="#"
                    id="navbarDropdownMenuAvatar"
                    role="button"
                    data-mdb-toggle="dropdown"
                    aria-expanded="false"
                >
                    <img
                        src="<?php echo $NAV_user_image; ?>"
                        class="rounded-circle"
                        height="25"
                        alt="Profile_picture"
                        loading="lazy"
                    />
                    <!--                    <i class="fa-solid fa-user"></i>-->
                </a>
                <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="navbarDropdownMenuAvatar"
                >
                    <li>
                        <a class="dropdown-item" href="<?php echo $NAV_my_profile_page;?>">My profile</a>
                    </li>
                    <!--                    <li>-->
                    <!--                        <a class="dropdown-item" href="#">Settings</a>-->
                    <!--                    </li>-->
                    <li>
                        <a class="dropdown-item" href="<?php echo $NAV_logout_page; ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->

<div class="drawer_container">
    <!-- Drawer Section Start -->

    <div class="drawer_a bg-light border-right p-4" style="position: fixed;  left: 0; height: 100%; overflow-y: auto; z-index: 1000;">
        <h4 class="text-center mb-4">Navigation</h4>
        <ul class="list-group">
            <li  class="list-group-item d-flex align-items-center">
                <img style="margin-right: 5px" height="20" width="20" src="<?php echo $NAV_dashboard_icon; ?>" alt="">
                <a style="cursor: pointer" href="<?php echo $NAV_dashboard_page;?>" class="text-dark">Home</a>
            </li>
            <li  class="list-group-item d-flex align-items-center">
                <img style="margin-right: 5px" height="20" width="20" src="<?php echo $NAV_blog_icon; ?>" alt="">
                <a style="cursor: pointer" href="<?php echo $NAV_Blog_page;?>" class="text-dark">Blogs</a>
            </li>
            <li  class="list-group-item d-flex align-items-center">
                <img style="margin-right: 5px" height="20" width="20" src="<?php echo $NAV_payment_icon; ?>" alt="">
                <a style="cursor: pointer" href="<?php echo $NAV_create_payments_hr;?>" class="text-dark">Payment</a>
            </li>
<!--            <li  class="list-group-item d-flex align-items-center">-->
<!--                <img style="margin-right: 5px" height="20" width="20" src="" alt="">-->
<!--                <a style="cursor: pointer" href="#" class="text-dark">Un-Named</a>-->
<!--            </li>-->
            <!-- Add more drawer items as needed -->
        </ul>
    </div>

    <!-- Drawer Section End -->

    <div class="drawer_b">
        <main>
            <?php Renderer::render(); ?>
        </main>
    </div>
</div>




<!-- MDB -->
<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"
></script>
<script src="index.js"></script>
</body>
</html>