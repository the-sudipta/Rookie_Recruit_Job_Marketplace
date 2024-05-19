<?php include '../../view/Renderer.php'; ?>

<?php

$navbar_applicant = '../../view/Navbar_Applicant.php';
// Your specific content goes here
Renderer::start();

require_once '../../model/BlogRepo.php'

?>


<?php



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
    <link rel="stylesheet" href="../../view/css/blog.css">

    <style>

        .blog_review{
            color: #ffab40;
            margin-right: 16px;
            transition: color 0.3s ease;
            text-transform: uppercase;
            background-color: transparent; /* Set the background color to transparent */
            border: none; /* Remove border if needed */
        }

        .blog_review:hover {
            color: #ffd8a6;
            text-decoration: none;
        }

    </style>


</head>
<body>


<div class="container">
    <div class="row">
        <!--        For each Loop Start-->


        <?php

        $data = findAllBlogs();


        foreach ($data as $row){
            $randomNumber = rand(1, 1000);

//            echo $row["id"];
            echo '
            <div class="col-sm-5 mr-5">
            <div class="card">
                <div class="card-image">
                    <img class="img-responsive" src="https://unsplash.it/400/400?random=' . $randomNumber . '">
                    <span class="card-title">'. $row["title"] .'</span>
                    <span class="">'. $row["posted_date"] .'</span>
                </div>

                <div class="card-content">
                    <p>'. $row["content"] .'</p>
                </div>

                <div class="card-action">
                <form id="reviewForm" action="./Review_Applicant.php" method="post">
                    <input type="number" id="blog_id" name="blog_id" hidden="hidden" value="' . $row['id'] . '" />
                    <input class="blog_review" type="submit" value="Give Review" />
                    
                </form>
                
                </div>
            </div>
        </div>
            ';

        }


        ?>


        <!--        New Blog-->

    </div>

</div>


</body>
</html>
<?php Renderer::end(); ?>


<?php include $navbar_applicant;?>
