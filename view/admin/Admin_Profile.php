<?php include '../../view/Renderer.php'; ?>

<?php
session_start();
error_reporting(0);
$navbar_admin = '../../view/Navbar_Admin.php';
// Your specific content goes here
Renderer::start();
?>


<?php
$login_email_error = '';
$login_password_error = '';

$Admin_ProfileService_file = "/Rookie_Recruit_Job_Marketplace/controller/admin/Admin_ProfileService.php";




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

        <!-- Include jQuery library -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <style>
            #validationModal {
                display: none;
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 1050;
                width: auto; /* Set width to auto to adjust based on content */
            }

            #validationModal .alert {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            #validationModal .close {
                font-size: 2.0rem;
            }
            #validationMessage{
                font-size: 1.2rem; /* Increased text size */
            }

            .alert-danger {
                position: relative; /* Required for positioning the close button */
            }

            .close {
                position: absolute;
                top: 0;
                right: 0;
                padding: 0.75rem 1.25rem;
                color: inherit;
            }
        </style>

        <script>


            // Function to validate email format
            function validateEmail(email) {
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }

            // Function to show modal with validation message
            function showModal(message) {
                document.getElementById("validationMessage").innerHTML = message;
                document.getElementById("validationModal").style.display = "block";
            }

            close_modal = () => {
                document.getElementById("validationModal").style.display = "none";
                // location.reload(true);
            }

            function is_form_valid(formData){
                let Error_Counter = 0;

                // Perform client-side validation
                if (!validateEmail(formData.email)) {
                    Error_Counter=Error_Counter+1;
                    showModal("Invalid email format");
                    return;
                }

                if (formData.type === "" || (formData.type !== "Admin" && formData.type !== "Applicant" && formData.type !== "HR" )) {
                    Error_Counter=Error_Counter+1;
                    showModal("Position / Post is required");
                    return;
                }

                if (formData.oldPassword === "") {
                    Error_Counter=Error_Counter+1;
                    showModal("Old password, new password, and confirm password are required");
                    return;
                }

                if (formData.newPassword !== formData.confirmPassword) {
                    Error_Counter=Error_Counter+1;
                    showModal("New password and confirm password do not match");
                    return;
                }
                return Error_Counter <= 0;
            }


            // Function to handle the Ajax request
            function updateProfile() {
                // Collect form data
                var formData = {
                    email: $("#email").val(),
                    type: $("#type").val(),
                    oldPassword: $("#oldPassword").val(),
                    newPassword: $("#newPassword").val(),
                    confirmPassword: $("#confirmPassword").val(),
                };


                if(is_form_valid(formData)){
                    // Send Ajax request
                    $.ajax({
                        type: "POST",
                        url: "<?php echo $Admin_ProfileService_file; ?>",
                        data: formData,
                        success: function (response) {
                            // Handle success response, if needed
                            console.log(response);
                        },
                        error: function (error) {
                            // Handle error, if needed
                            console.log(error);
                        }
                    });
                }


            }

            // Attach an event listener to input fields to trigger the Ajax request on input change
            $(document).ready(function () {
                $("input").on("input", function () {
                    updateProfile();
                });
            });
        </script>
    </head>
    <body>

    <!-- MY PROFILE START -->


    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Page title -->
                <div class="my-5">
                    <h3>My Profile</h3>
                    <hr>
                </div>
                <!-- Form START -->
                <form action="<?php echo $Admin_ProfileService_file;?>" method="post" class="file-upload">
                    <div class="row mb-5 gx-5">
                        <!-- Contact detail -->
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">

                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" value="<?php echo $_SESSION["data"]["email"];?>" placeholder="Email Here" class="form-control">
                                    </div>

                                    <!-- Type -->
                                    <div class="col-md-6">
                                        <label for="type" class="form-label">Position / Post</label>
                                        <input type="text" id="type" name="type" value="<?php echo $_SESSION["data"]["type"];?>" class="form-control" placeholder="Position Here">
                                    </div>
                                    <!-- Status  -->
                                    <div class="col-md-6">
                                        <label for="status" class="form-label">Account Status</label>
                                        <input disabled type="text" id="status" name="status" value="<?php echo $_SESSION["data"]["status"];?>" class="form-control" placeholder="Status Here" >
                                    </div>

                                </div> <!-- Row END -->
                            </div>
                        </div>

                        <!-- Social media detail -->
                        <div class="row mb-5 gx-5">
                            <!-- change password -->
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="my-4">Change Password</h4>
                                    <!-- Old password -->
                                    <div class="col-md-6">
                                        <label for="oldPassword" class="form-label">Old password</label>
                                        <input type="password" id="oldPassword" name="oldPassword" placeholder="Old Password Here" class="form-control">
                                    </div>
                                    <!-- New password -->
                                    <div class="col-md-6">
                                        <label for="newPassword" class="form-label">New password</label>
                                        <input type="password" id="newPassword" name="newPassword" placeholder="New Password Here" class="form-control" >
                                    </div>
                                    <!-- Confirm password -->
                                    <div class="col-md-12">
                                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                                        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Same New Password Here" class="form-control" >
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Row END -->
                        <!-- button -->
                        <div class="gap-3 d-md-flex justify-content-md-end text-center" onclick="updateProfile();">
                            <input  type="submit" value="Update Profile" style="text-decoration: none; color: white" class="btn btn-primary btn-lg"/>
                        </div>
                    </div>
                </form> <!-- Form END -->
            </div>
        </div>
    </div>

    <!-- MY PROFILE END -->


    <!-- Validation Modal -->
    <div id="validationModal" class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong>
        <p id="validationMessage"></p>
        <p type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="close_modal();">
            <span aria-hidden="true">&times;</span>
        </p>
    </div>


    <!-- Bootstrap JS and Popper.js -->

    </body>
    </html>

<?php Renderer::end(); ?>

<?php include $navbar_admin; ?>