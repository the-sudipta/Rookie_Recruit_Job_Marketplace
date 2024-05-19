<?php
$login_email_error = '';
$login_password_error = '';

$login_service_file = "/Rookie_Recruit_Job_Marketplace/controller/LoginService.php";
$Applicant_Signup_service_file = "/Rookie_Recruit_Job_Marketplace/controller/applicant/ApplicantSignupService.php";




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rookie Recruit Job Marketplace</title>

    <link rel="stylesheet" href="../../view/css/style.css">
    <link rel="stylesheet" href="../../view/css/login.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>




</head>

<body style="overflow-y: hidden" onload="show_login();">

<!-- Login Page Start -->


<div class="login_signup_container">
    <div class="login_signup_a">


        <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation" style="cursor: pointer" onclick="show_login()">
                <a class="nav-link" id="tab-login" data-mdb-toggle="pill" role="tab"
                   aria-controls="login" >Login</a>
            </li>
            <li class="nav-item" role="presentation" style="cursor: pointer" onclick="show_signup()">
                <a class="nav-link" id="tab-register" data-mdb-toggle="pill" role="tab"
                   aria-controls="pills-register" >Register</a>
            </li>
        </ul>
        <!-- Pills navs -->

        <!-- Pills content -->

        <div class="tab-content">
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="tab-login">
                <!-- Login Form -->
                <form action="<?php echo $login_service_file;?>" method="post">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="loginName" name="loginEmail" class="form-control" />
                        <label class="form-label" for="loginName">Email</label>
                        <label class="error-label" id="loginEmailError" style="display: none"><?php echo ($login_email_error != "") ? $login_email_error : ""; ?>
                        </label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="loginPassword" name="loginPassword" class="form-control" />
                        <label class="form-label" for="loginPassword">Password</label>
                    </div>

                    <!-- 2 column grid layout -->
                    <div class="row mb-4">
                        <div class="col-md-6 d-flex justify-content-center">
                            <!-- Checkbox -->
                        </div>

                        <div class="col-md-6 d-flex justify-content-center">
                            <!-- Simple link -->
                            <a href="#!">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>



                    <!-- Register buttons -->
                    <div class="text-center" id="signup">
                        <p>Not a member? <a style="cursor: pointer" onclick="show_signup();">Register</a></p>
                    </div>
                </form>
            </div>
            <div class="" id="pills-register" role="tabpanel" aria-labelledby="tab-register">

                <!-- Signup Form -->
                <form action="<?php echo $Applicant_Signup_service_file;?>" method="post">

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="registerEmail" name="registerEmail" class="form-control" />
                        <label class="form-label" for="registerEmail">Email</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="registerPassword" name="registerPassword" class="form-control" />
                        <label class="form-label" for="registerPassword">Password</label>
                    </div>

                    <!-- Full Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="full_name" name="registerFull_name" class="form-control" />
                        <label class="form-label" for="full_name">Full Name</label>
                    </div>

                    <!-- Gender input -->
                    <label style="display: none" class="form-label" for="gender">Gender</label>
                    <select style="display: none" class="form-select mb-4 dropup" id="gender">
                        <option value="" disabled selected>-- Select --</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <!-- Add more options as needed -->
                    </select>

                    <!-- Date of Birth-->
                    <div style="display: none"  class="form-outline mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label" for="dob">Date of Birth</label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" id="dob" class="form-control" />
                            </div>
                        </div>
                    </div>


                    <!-- Checkbox -->
                    <div class="form-check d-flex justify-content-center mb-4">
                        <input class="form-check-input me-2" type="checkbox" value="" name="registerCheck" id="registerCheck" checked
                               aria-describedby="registerCheckHelpText" required />
                        <label class="form-check-label" for="registerCheck">
                            I have read and agree to the&nbsp;
                        </label> <span><a style="cursor: pointer" onclick="show_terms();" ><u>terms</u></a></span>
                    </div>

                    <!-- Submit button -->
                    <input type="submit" style="cursor: pointer" class="btn btn-primary btn-block mb-3" value="Sign Up"/>
                </form>
            </div>
        </div>
        <!-- Pills content -->


    </div>
</div>

<div id="termsConditions">
    <div id="overlay" class="login_signup_overlay">
        <!-- Modal -->
        <div id="modal" class="login_signup_modal">
                <div class="modal-header">
                    <h4 class="modal-title">Terms and Conditions</h4>
                </div>
                <div class="modal-body">
                    <!-- Your terms and conditions content goes here -->
                    <p>
                        <br/>
                        Welcome to Rookie-Recruit-Job-Marketplace

! By signing up and creating an account on our platform, you agree to abide by the following terms and conditions:

                        <br/>
                        <br/>
                        <b>Account Registration:</b>
                        You must provide accurate and complete information during the registration process.
                        You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.

                        <br/>
                        <br/>
                        <b>User Conduct:</b>
                        You agree to use our platform in a manner consistent with all applicable laws and regulations.
                        You will not engage in any unlawful or prohibited activities on our website.


                        <br/>
                        <br/>
                        <b>Job Applications:</b>
                        You understand that submitting job applications through Rookie-Recruit-Job-Marketplace

                        is a voluntary action, and the accuracy of the information provided in your resume and application is your responsibility.


                        <br/>
                        <br/>
                        <b>Privacy and Security:</b>
                        We take your privacy seriously. Your personal information will be handled in accordance with our Privacy Policy.
                        You are responsible for maintaining the security of your account and promptly notifying us of any unauthorized access.


                        <br/>
                        <br/>
                        <b>Communication:</b>
                        By signing up, you agree to receive communication from Rookie-Recruit-Job-Marketplace

                        , including newsletters, promotional materials, and account-related updates. You can opt-out of marketing communications at any time.


                        <br/>
                        <br/>
                        <b>Termination of Account:</b>
                        We reserve the right to suspend or terminate your account if you violate our terms and conditions or engage in any fraudulent or malicious activities.


                        <br/>
                        <br/>
                        <b>Changes to Terms:</b>
                        Rookie-Recruit-Job-Marketplace

                        reserves the right to update or modify these terms and conditions at any time. We will notify you of significant changes through email or by posting a notice on the website.


                        <br/>
                        <br/>
                        <b>Feedback and Reviews:</b>
                        Users may provide feedback and reviews on employers and job postings. You agree to provide accurate and honest feedback and reviews.

                        <br/>
                        <br/>
                        By clicking the "Sign Up" button, you acknowledge that you have read, understood, and agreed to these terms and conditions. If you do not agree with any part of these terms, please do not proceed with the registration process.

                        <br/>
                        <br/>
                        Thank you for choosing Rookie-Recruit-Job-Marketplace

 for your job search and career development needs!
                    </p>
                </div>
                <div class="modal-footer d-flex justify-content-center" >
                    <button type="button" class="btn btn-success" onclick="close_terms();">I Agree</button>
                </div>
        </div>
    </div>

</div>


<!-- Login Page End -->

<script>
    let login_tab = document.getElementById("tab-login");
    let signup_tab = document.getElementById("tab-register");
    let login_div = document.getElementById("login");
    let signup_div = document.getElementById("pills-register");
    let gender = document.getElementById("gender");
    // let termsConditionsModal = new bootstrap.Modal(document.getElementById('termsConditions'));



    gender.options[0].selected = true

    show_signup = () => {
        login_div.style.display = "none";
        signup_div.style.display = "block";
        signup_tab.classList.add("active");
        login_tab.classList.remove("active");
    }

    show_login = () => {
        login_div.style.display = "block";
        signup_div.style.display = "none";
        login_tab.classList.add("active");
        signup_tab.classList.remove("active");
    }


    show_terms = () => {
        document.getElementById('overlay').style.display = 'flex';
    }

    close_terms = () => {
        document.getElementById('overlay').style.display = 'none';
    }

    sign_in_clicked = () => {

    }





</script>




<script src="index.js"></script>
</body>
</html>