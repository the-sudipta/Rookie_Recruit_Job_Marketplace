<?php include '../../view/Renderer.php'; ?>

<?php

$navbar_admin = '../../view/Navbar_Admin.php';


// Your specific content goes here
Renderer::start();

?>


<?php

require_once '../../model/PaymentRepo.php';
$login_email_error = '';
$login_password_error = '';
$Payment_service_file = '/Rookie_Recruit_Job_Marketplace/?';
$Update_PaymentService_File = '/Rookie_Recruit_Job_Marketplace/controller/payment/Update_PaymentService.php';

if(isset($_POST["selected_id"])){

    $payment_id = $_POST["selected_id"];
    $stored_payment = findPaymentByPaymentID($payment_id);
}else{
    $payment_id = -1;
}

//echo $payment_id;

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rookie Recruit Job Marketplace</title>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="../../view/css/style.css">
    <link rel="stylesheet" href="../../view/css/payment.css">
    <link rel="stylesheet" href="../../view/css/Show_Single_Payment.css">



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
        // Function to validate amount format
        function isNumber(value) {
            return !isNaN(parseFloat(value)) && isFinite(value);
        }

        function isAmountValid(amount) {
            // Add your validation logic here if needed
            if(amount<0){
                showModal("Amount Must be Greater than 0");
                return false;
            } else if(!isNumber(amount)){
                showModal("Amount Must be a Number");
                return false;
            }else{
                return true;
            }
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

        // Function to handle the Ajax request
        function updatePayment() {
            // Collect form data
            let formData = {
                amount: $("input[name='amount']").val(),
                selected_id: $("input[name='selected_id']").val(),
            };

            // Perform client-side validation


            if(isAmountValid(formData.amount)){
                // Send Ajax request
                $.ajax({
                    type: "POST",
                    url: "<?php echo $Update_PaymentService_File; ?>",
                    data: formData,
                    success: function (response) {
                        // Handle success response, if needed
                        console.log(response);
                        console.warn("Send Successfully");
                    },
                    error: function (error) {
                        // Handle error, if needed
                        console.log(error);
                        console.warn("Failed to Sent the Data");
                    }
                });
            }


        }


        // Attach an event listener to the form submit event
        $(document).ready(function () {
            $("form").on("submit", function (event) {
                event.preventDefault(); // Prevent the default form submission
                updatePayment();
            });

            // Optional: You can also attach an event listener to input fields to trigger the Ajax request on input change
            $("input[name='amount']").on("input", function () {
                console.warn('Amount Changed');
                updatePayment();
            });
        });

    </script>


</head>
<body>


<form action="<?php echo $Update_PaymentService_File; ?>" method="post" class='signup'>
    <input class='number' name="amount" value="<?php if(isset($_POST["selected_id"])){ echo $stored_payment["amount"]; }else{echo '';}?>" placeholder='amount' type='number' maxlength="20">
    <input hidden="hidden" type="number" name="selected_id" value="<?php if(isset($_POST["selected_id"])){echo $_POST["selected_id"];}else{echo -1;} ?>">
    <input type='submit' value='Update Price'>
</form>


<!-- Validation Modal -->
<div id="validationModal" style="display: none" class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Holy guacamole!</strong>
    <p id="validationMessage"></p>
    <p type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="close_modal();">
        <span aria-hidden="true">&times;</span>
    </p>
</div>




</body>
</html>
<?php Renderer::end(); ?>


<?php include $navbar_admin;?>
