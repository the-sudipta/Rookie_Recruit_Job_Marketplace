<?php
error_reporting(0);
session_start();
include '../view/Renderer.php';

$navbar_applicant = '../view/Navbar_Applicant.php';
Renderer::start();

include_once '../model/IdentityRepo.php';

$PDF_FILE_NAME = "";
$USER_ID = $_SESSION["user_id"];
//====================================================================================================
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the file was uploaded without errors
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $targetDir = "uploads/";

        // Create the "uploads" directory if it doesn't exist
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $targetFile = $targetDir . basename($_FILES["file"]["name"]);
        $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);

        // Check if the uploaded file is a PDF
        if (strtolower($fileType) == "pdf") {
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                $PDF_FILE_NAME = basename($_FILES["file"]["name"]);
                if($PDF_FILE_NAME !== "" && $PDF_FILE_NAME !== null){
                    $identity_id = createIdentity($PDF_FILE_NAME,$USER_ID);
                }
                echo '<div class="alert alert-success" role="alert">The file ' . basename($_FILES["file"]["name"]) . ' has been uploaded.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Sorry, there was an error uploading your file.</div>';
            }
        } else {
            echo '<div class="alert alert-warning" role="alert">Sorry, only PDF files are allowed.</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Error: ' . $_FILES["file"]["error"] . '</div>';
    }
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
        /* Your provided CSS styles here */

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: #535c68;
        }

        .wrapper {
            margin: auto;
            max-width: 640px;
            padding-top: 60px;
            text-align: center;
        }

        .container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            /*border: 0.5px solid rgba(130, 130, 130, 0.25);*/
            /*box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1),
                        0 0 0 1px rgba(0, 0, 0, 0.1);*/
        }

        h1 {
            color: #130f40;
            font-family: 'Varela Round', sans-serif;
            letter-spacing: -.5px;
            font-weight: 700;
            padding-bottom: 10px;
        }

        .upload-container {
            background-color: rgb(239, 239, 239);
            border-radius: 6px;
            padding: 10px;
        }

        .border-container {
            border: 5px dashed rgba(198, 198, 198, 0.65);
            /*   border-radius: 4px; */
            padding: 20px;
        }

        .border-container p {
            color: #130f40;
            font-weight: 600;
            font-size: 1.1em;
            letter-spacing: -1px;
            margin-top: 30px;
            margin-bottom: 0;
            opacity: 0.65;
        }

        #file-browser {
            text-decoration: none;
            color: rgb(22,42,255);
            border-bottom: 3px dotted rgba(22, 22, 255, 0.85);
        }

        #file-browser:hover {
            color: rgb(0, 0, 255);
            border-bottom: 3px dotted rgba(0, 0, 255, 0.85);
        }

        .icons {
            color: #95afc0;
            opacity: 0.55;
        }

        /* Additional styles for file upload container */
        .file-upload-container {
            display: none; /* Hide the default file input */
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container">
        <h1>Upload Your NID</h1>
        <div class="upload-container">
            <div class="border-container">
                <div class="icons fa-4x">
                    <i class="fas fa-file-image" data-fa-transform="shrink-3 down-2 left-6 rotate--45"></i>
                    <i class="fas fa-file-alt" data-fa-transform="shrink-2 up-4"></i>
                    <i class="fas fa-file-pdf" data-fa-transform="shrink-3 down-2 right-6 rotate-45"></i>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="file-upload-container">
                        <input type="file" name="file" id="file-upload" accept=".pdf">
                    </div>
                    <p>Drag and drop files here, or
                        <a href="#" id="file-browser">browse</a> your computer.</p>
                    <br/>
                    <button type="submit" class="btn btn-primary" name="submit">Upload PDF</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $("#file-browser").click(function(e) {
        e.preventDefault();
        $("#file-upload").trigger("click");
    });


</script>
</body>
</html>

<?php Renderer::end(); ?>

<?php include $navbar_applicant; ?>
