<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

// Get DB instance
$db = getDbInstance();

// Get Dashboard information
$numCustomers = $db->getValue("patients", "count(*)");
$numDoctors = $db->getValue("doctors", "count(*)");

include_once('includes/header.php');
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div>


    <div class="row">
        <!-- Patients -->
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numCustomers; ?></div>
                            <div>
                                <h3>Patients</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="customers.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Doctors -->
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user-md fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numDoctors; ?></div>
                            <div>
                                <h3>Doctors</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="doctors.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
<<<<<<< HEAD
=======

        <!-- Medicines -->
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <!-- logo of Medicines start-->
                            <svg xmlns="http://www.w3.org/2000/svg" width="55" height="70" fill="currentColor"
                                class="bi bi-capsule" viewBox="0 0 16 16">
                                <path
                                    d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429z" />
                            </svg>
                            <!-- logo of Medicines end-->
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numDoctors; ?></div>
                            <div>
                                <h3>Medicines</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="doctors.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Appointments -->
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <!-- logo of Appointment start-->
                            <svg xmlns="http://www.w3.org/2000/svg" width="55" height="70" fill="currentColor"
                                class="bi bi-calendar-event" viewBox="0 0 16 16">
                                <path
                                    d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                            </svg>
                            <!-- logo of Appointment end-->
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numDoctors; ?></div>
                            <div>
                                <h3>Appointments</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="doctors.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

>>>>>>> 08ef31f (list appointments added)
    </div>

    <div class="row">
        <div class="col-lg-8">
            <canvas id="doctorsChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>

<!-- Include Chart.js -->
<script>
    var ctx = document.getElementById('doctorsChart').getContext('2d');
    var doctorsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Doctors'],
            datasets: [{
                label: '# of Doctors',
                data: [<?php echo $numDoctors; ?>],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?php include_once('includes/footer.php'); ?>