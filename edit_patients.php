<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

// Sanitize input
$customer_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation', FILTER_SANITIZE_SPECIAL_CHARS); // Updated here
$edit = ($operation == 'edit') ? true : false;

$db = getDbInstance();

// Handle the update request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the patient ID from the query string
    $customer_id = filter_input(INPUT_GET, 'patient_id', FILTER_SANITIZE_SPECIAL_CHARS); // Updated here

    // Get and sanitize input data
    $data_to_update = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS); // Updated here

    // Add a timestamp
    $data_to_update['updated_at'] = date('Y-m-d H:i:s');
    $db = getDbInstance();
    $db->where('id', $customer_id);
    $stat = $db->update('patients', $data_to_update);

    if ($stat) {
        $_SESSION['success'] = "Patient updated successfully!";
        // Redirect to the patients listing page
        header('location: patients.php');
        exit();
    }
}

// Prepopulate the form for editing
if ($edit) {
    $db->where('id', $customer_id);
    $customer = $db->getOne("patients");
}
?>


<?php
include_once 'includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Update Customer</h2>
    </div>
    <!-- Flash messages -->
    <?php
    include('./includes/flash_messages.php')
        ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">

        <?php
        //Include the common form for add and edit  
        require_once('./forms/patient_form.php');
        ?>
    </form>
</div>




<?php include_once 'includes/footer.php'; ?>