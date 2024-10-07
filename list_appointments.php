<?php
session_start();
require_once 'config/config.php';
require_once BASE_PATH . '/includes/auth_validate.php';

// Get Input data from query string
$search_string = filter_input(INPUT_GET, 'search_string');
$filter_col = filter_input(INPUT_GET, 'filter_col');
$order_by = filter_input(INPUT_GET, 'order_by');

// Per page limit for pagination
$pagelimit = 15;

// Get current page
$page = filter_input(INPUT_GET, 'page');
if (!$page) {
    $page = 1;
}

// If filter types are not selected we show latest added data first
if (!$filter_col) {
    $filter_col = 'appointment_date';
}
if (!$order_by) {
    $order_by = 'Desc';
}

// Get DB instance
$db = getDbInstance();
$select = array('id', 'patient_id', 'doctor_id', 'appointment_status', 'appointment_date', 'appointment_time', 'created_at', 'updated_at');

// Start building query
if ($search_string) {
    $db->where('patient_id', '%' . $search_string . '%', 'like');
    $db->orwhere('doctor_id', '%' . $search_string . '%', 'like');
}

// If order by option selected
if ($order_by) {
    $db->orderBy($filter_col, $order_by);
}

// Set pagination limit
$db->pageLimit = $pagelimit;

// Get result of the query
$appointments = $db->arraybuilder()->paginate('appointments', $page, $select);
$total_pages = $db->totalPages;

include BASE_PATH . '/includes/header.php';
?>

<!-- Main container -->
<div id="page-wrapper">
    <div class="row">
        <div class="bg-warning">
            <h1 class="page-header text-center">Appointments</h1>
        </div>
    </div>
    <?php include BASE_PATH . '/includes/flash_messages.php'; ?>

    <!-- Filters -->
    <div class="well text-center filter-form">
        <form class="form form-inline" action="">
            <label for="input_search">Search</label>
            <input type="text" class="form-control" id="input_search" name="search_string"
                value="<?php echo xss_clean($search_string); ?>">
            <label for="input_order">Order By</label>
            <select name="filter_col" class="form-control">
                <option value="appointment_date">Appointment Date</option>
                <option value="appointment_status">Status</option>
            </select>
            <select name="order_by" class="form-control" id="input_order">
                <option value="Asc" <?php echo ($order_by == 'Asc') ? 'selected' : ''; ?>>Asc</option>
                <option value="Desc" <?php echo ($order_by == 'Desc') ? 'selected' : ''; ?>>Desc</option>
            </select>
            <input type="submit" value="Go" class="btn btn-primary">
        </form>
    </div>
    <hr>
    <!-- //Filters -->

    <!-- Table -->
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th width="10%">Appointment ID</th>
                <th width="10%">Patient ID</th>
                <th width="10%">Doctor ID</th>
                <th width="15%">Status</th>
                <th width="20%">Date</th>
                <th width="15%">Time</th>
                <th width="10%">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointments as $row): ?>
                <tr>
                    <td><?php echo xss_clean($row['id']); ?></td>
                    <td><?php echo xss_clean($row['patient_id']); ?></td>
                    <td><?php echo xss_clean($row['doctor_id']); ?></td>
                    <td><?php echo xss_clean($row['appointment_status']); ?></td>
                    <td><?php echo xss_clean($row['appointment_date']); ?></td>
                    <td><?php echo xss_clean($row['appointment_time']); ?></td>
                    <td>
                        <a href="edit_appointment.php?id=<?php echo $row['id']; ?>&operation=edit"
                            class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="#" class="btn btn-danger delete_btn" data-toggle="modal"
                            data-target="#confirm-delete-<?php echo $row['id']; ?>"><i
                                class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="confirm-delete-<?php echo $row['id']; ?>" role="dialog">
                    <div class="modal-dialog">
                        <form action="delete_appointment.php" method="POST">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Confirm</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="del_id" id="del_id" value="<?php echo $row['id']; ?>">
                                    <p>Are you sure you want to delete this appointment?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default pull-left">Yes</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- //Delete Confirmation Modal -->
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- //Table -->

    <!-- Pagination -->
    <div class="text-center">
        <?php echo paginationLinks($page, $total_pages, 'list_appointments.php'); ?>
    </div>
    <!-- //Pagination -->
</div>
<!-- //Main container -->

<?php include BASE_PATH . '/includes/footer.php'; ?>