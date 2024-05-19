<?php include '../../view/Renderer.php'; ?>

<?php

$navbar_admin = '../../view/Navbar_HR.php';
// Your specific content goes here
Renderer::start();
?>


<?php
$login_email_error = '';
$login_password_error = '';

$Review_service_file = "/Rookie_Recruit_Job_Marketplace/controller/review/Review_CreateService.php";

//echo $_POST["blog_id"];
//    $blog_data = findBlogByBlogID($_POST["blog_id"]);
$blog_num = $_POST["blog_id"];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rookie Recruit Job Marketplace</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/navbar.css">

</head>
<body>


<div class="review_card_container">
    <div class="review_card_a">
        <div id="cardX" class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Blog Review</h5>
                <h6 class="card-subtitle  text-muted">Tell us your opinion about the blog-post</h6>
<!--                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
<!--                <a href="#" class="card-link">Card link</a>-->
<!--                <a href="#" class="card-link">Another link</a>-->

                <form action="<?php echo $Review_service_file;?>" method="post" class="file-upload">
                    <div class="">
                        <!-- Contact detail -->
                        <div class=" mb-5 ">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">

                                    <input hidden="hidden" type="number" id="selected_blog_id" name="selected_blog_id" value="<?php echo $blog_num;?>">
                                    <!-- Email -->
                                    <div class="">
                                        <label for="rating" class="form-label">Ratings</label>
                                        <input type="number" id="rating" name="rating"  placeholder="Ratings here" class="form-control">
                                    </div>

                                    <!-- Type -->
                                    <div class="">
                                        <label for="comment" class="form-label">Comments</label>
                                        <textarea style="max-height: 70px;" type="text" id="comment" name="comment"  class="form-control" placeholder="Comments Here"></textarea>
                                    </div>

                                    <!-- button -->
                                    <div class=" d-md-flex justify-content-center text-center">
                                        <!--                    <button type="button" class="btn btn-danger btn-lg"><a href="" style="text-decoration: none; color: inherit" >Delete profile </a></button>-->
                                        <input type="submit" value="Post Review" style="text-decoration: none; color: white" class="btn btn-primary btn-lg"/>
                                    </div>



                                </div> <!-- Row END -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



</body>
</html>
<?php Renderer::end(); ?>


<?php include $navbar_admin;?>
