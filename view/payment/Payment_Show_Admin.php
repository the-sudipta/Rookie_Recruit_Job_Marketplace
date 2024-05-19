<?php include '../../view/Renderer.php'; ?>

<?php

$navbar_admin = '../../view/Navbar_Admin.php';
// Your specific content goes here
Renderer::start();
?>


<?php

$Payment_service_file = "";


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rookie Recruit Job Marketplace</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/payment.css">

</head>
<body>


<div class="review_card_container">
    <div class="review_card_a" style="background-color: transparent">

        <section class="gradient-custom">
            <div class="container my-5 py-5">
                <div class="row d-flex justify-content-center py-5">
                    <div style="width: 100%" class="col-md-7 col-lg-5 col-xl-4">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-4">
                                <form>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="form-outline">
                                            <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                                                   placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                                            <label class="form-label" for="typeText">Card Number</label>
                                        </div>
                                        <img src="https://img.icons8.com/color/48/000000/visa.png" alt="visa" width="64px" />
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                                                   placeholder="Cardholder's Name" />
                                            <label class="form-label" for="typeName">Cardholder's Name</label>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center pb-2">
                                        <div class="form-outline">
                                            <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/YYYY"
                                                   size="7" id="exp" minlength="7" maxlength="7" />
                                            <label class="form-label" for="typeExp">Expiration</label>
                                        </div>
                                        <div class="form-outline">
                                            <input type="password" id="typeText2" class="form-control form-control-lg"
                                                   placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                                            <label class="form-label" for="typeText2">Cvv</label>
                                        </div>
                                        <button type="button" class="btn btn-info btn-lg btn-rounded">
                                            <i class="fas fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>


</body>
</html>
<?php Renderer::end(); ?>


<?php include $navbar_admin;?>
