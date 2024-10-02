<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
require_once './lib/MedicalStores/MedicalStores.php';

// require_once './classes/MedicalStores.php'; // Make sure the path is correct

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mass Insert Data. Keep "name" attribute in HTML form the same as column name in MySQL table.
    $data_to_store = array_filter($_POST);

    $medicalStores = new MedicalStores();
    $errors = $medicalStores->validateData($data_to_store);

    if (empty($errors)) {
        $db = getDbInstance();

        // Insert data into the medicalstores table
        $last_id = $medicalStores->insertData($data_to_store);

        if ($last_id) {
            $_SESSION['success'] = "Medical Store added successfully!";
            header('location: medicalStore.php');
            exit();
        } else {
            echo 'Insert failed: ' . $db->getLastError();
            exit();
        }
    } else {
        // Handle validation errors
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    }
}

require_once 'includes/header.php';
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Add Medical Store</h2>
        </div>
    </div>
    <form class="form" action="" method="post" id="medicalstores_form">
        <!-- Include the form fields here -->
        <?php include_once('./forms/medicalstores_form.php'); ?>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#medicalstores_form").validate({
            rules: {
                shopowername: {
                    required: true,
                    minlength: 3
                },
                address: {
                    required: true,
                    minlength: 5
                },
                contact: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                shopname: {
                    required: true,
                    minlength: 3
                },
                opentime: {
                    required: true
                },
                closetime: {
                    required: true
                }
            }
        });
    });
</script>

<?php include_once 'includes/footer.php'; ?>