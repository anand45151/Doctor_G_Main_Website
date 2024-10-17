<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'includes/auth_validate.php';
require_once './config/config.php';

// Get the del_id from the query string
$del_id = filter_input(INPUT_GET, 'del_id', FILTER_VALIDATE_INT);

if ($del_id && $_SERVER['REQUEST_METHOD'] == 'GET') {

    // Check if the user has the right permissions
    if ($_SESSION['admin_type'] != 'admin') {
        $_SESSION['failure'] = "You don't have permission to perform this action";
        header('location: patients.php');
        exit;
    }

    // Initialize DB instance
    $db = getDbInstance();

    // Attempt to delete the patient
    $db->where('id', $del_id);
    $status = $db->delete('patients');

    // Check if the deletion was successful
    if ($status) {
        $_SESSION['info'] = "Patient deleted successfully!";
    } else {
        $_SESSION['failure'] = "Unable to delete patient.";
    }

    // Redirect to patients page
    header('location: patients.php');
    exit;

} else {
    // If no valid ID is provided
    $_SESSION['failure'] = "Invalid ID.";
    header('location: patients.php');
    exit;
}