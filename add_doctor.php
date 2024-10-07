<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';

// Serve POST method. After successful insert, redirect to doctors.php page.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mass Insert Data. Keep "name" attribute in HTML form the same as column name in MySQL table.
    $data_to_store = array_filter($_POST);

    // Handle file upload
    if (isset($_FILES['Doctor_Photo']) && $_FILES['Doctor_Photo']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/"; // Adjust the upload directory as needed
        $target_file = $target_dir . basename($_FILES["Doctor_Photo"]["name"]);
        if (move_uploaded_file($_FILES["Doctor_Photo"]["tmp_name"], $target_file)) {
            $data_to_store['Doctor_Photo'] = basename($_FILES["Doctor_Photo"]["name"]);
        } else {
            echo 'File upload failed!';
            exit();
        }
    } else {
        $data_to_store['Doctor_Photo'] = ''; // Set a default value if no photo is uploaded
    }

    $db = getDbInstance();

    // Insert data into the doctors table
    $last_id = $db->insert('doctors', $data_to_store);

    if ($last_id) {
        $_SESSION['success'] = "Doctor added successfully!";
        header('location: doctors.php');
        exit();
    } else {
        echo 'Insert failed: ' . $db->getLastError();
        exit();
    }
}

require_once 'includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Add Doctor</h2>
        </div>
    </div>
    <form class="form" action="" method="post" id="doctor_form" enctype="multipart/form-data">
        <?php include_once('./forms/doctor_form.php'); ?>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#doctor_form").validate({
            rules: {
                Doctor_Name: {
                    required: true,
                    minlength: 3
                },
                Doctor_Specialty: {
                    required: true,
                    minlength: 3
                },
                // Add validation for Doctor_Photo if necessary
            }
        });
    });
</script>

<?php include_once 'includes/footer.php'; ?>