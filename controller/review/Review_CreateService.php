<?php

//echo "Blog id as foreign key = ".$_POST["selected_blog_id"];

require_once '../../model/ReviewRepo.php';
$rating = $_POST["rating"];
$comment = $_POST["comment"];
$blog_id = $_POST["selected_blog_id"];

$All_blogs_page = '/Rookie_Recruit_Job_Marketplace/view/blog/All_Blogs.php';
$review_page = '/Rookie_Recruit_Job_Marketplace/';


$review_id = createReview($rating, $comment, $blog_id);

if($review_id > 0){
    echo "All ok";
    header("Location: {$All_blogs_page}");
}else{
    header("Location: {$review_page}");
}
