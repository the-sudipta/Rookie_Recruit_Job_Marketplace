<?php

$HR_Login_Page = "/Rookie_Recruit_Job_Marketplace/view/login_signup/Login_Signup_HR.php";
$Admin_Login_Page = "/Rookie_Recruit_Job_Marketplace/view/login_signup/Login_Signup_Admin.php";
$Applicant_Login_Page = "/Rookie_Recruit_Job_Marketplace/view/login_signup/Login_Signup_Applicant.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rookie Recruit Job Marketplace</title>
    <link rel="stylesheet" href="./css/holy_first_page.css">


</head>
<body>


<!------ Include the above in your HEAD tag ---------->

<section>
    <div class="container mt-xl-5">
        <div class="row">
            <!--Profile Card 1-->
            <div class="col-md-4 mt-4" style="cursor: pointer;" onclick="document.getElementById('hr_card').click()">
                <div class="card profile-card-5">
                    <a id="hr_card" href="<?php echo $HR_Login_Page; ?>" hidden="hidden"></a>
                    <div class="card-img-block">
                        <img class="card-img-top" src="https://raw.githubusercontent.com/yaarian-om/SERVER/main/1010110010/Rookie_Recruit_Job_MarketPlace/_Human_Resource_Wallpaper.jpg" alt="HUMAN RESOURCE">
                    </div>
                    <div class="card-body pt-0">
                        <h5 class="card-title">Human Resource</h5>
                        <p class="card-text">Human Resource Officers manage employee relations, recruitment, and organizational development, ensuring a healthy work environment and employee satisfaction.</p>

                    </div>
                </div>
            </div>


            <!--Profile Card 2-->
            <div class="col-md-4 mt-4">
                <div class="card profile-card-5" style="cursor: pointer;" onclick="document.getElementById('admin_card').click()">
                    <a id="admin_card" href="<?php echo $Admin_Login_Page; ?>" hidden="hidden"></a>
                    <div class="card-img-block">
                        <img class="card-img-top" src="https://raw.githubusercontent.com/yaarian-om/SERVER/main/1010110010/Rookie_Recruit_Job_MarketPlace/_The_Admin_Wallpaper.jpg" alt="ADMIN">
                    </div>
                    <div class="card-body pt-0">
                        <h5 class="card-title">Admin</h5>
                        <p class="card-text">Admin Officers oversee administrative tasks, ensuring smooth operations by managing resources, coordinating schedules, and implementing efficient office procedures.</p>

                    </div>
                </div>
            </div>


            <!--Profile Card 3-->
            <div class="col-md-4 mt-4" >
                <div class="card profile-card-5" style="cursor: pointer;" onclick="document.getElementById('applicant_card').click()">
                    <a id="applicant_card" href="<?php echo $Applicant_Login_Page; ?>" hidden="hidden"></a>
                    <div class="card-img-block">
                        <img class="card-img-top" src="https://raw.githubusercontent.com/yaarian-om/SERVER/main/1010110010/Rookie_Recruit_Job_MarketPlace/_User_Wallpaper.jpg" alt="APPLICANT">
                    </div>
                    <div class="card-body pt-0">
                        <h5 class="card-title">Applicant</h5>
                        <p class="card-text">Applicants for a job post apply for employment, presenting qualifications and experiences to secure opportunities aligned with career goals and skills.</p>

                    </div>
                </div>
            </div>


        </div>
    </div>
</section>

</body>
</html>


