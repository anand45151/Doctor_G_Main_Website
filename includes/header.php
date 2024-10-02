<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!-- MetisMenu CSS -->
    <link href="assets/js/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
</head>

<body>
    <div id="wrapper" class="bg-image">
        <!-- Navigation -->
        <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true): ?>
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header ">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Admin Logo and Brand -->
                    <a class="navbar-brand" href="">
                        <img src="d6.jpg" alt="Admin Logo" style="display: inline-block; height: 30px; margin-right: 10px;">
                        Admin
                    </a>
                </div>

                <!-- /.navbar-header -->
                <ul class="nav navbar-top-links navbar-right">
                    <!-- /.dropdown -->
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>

                            <!-- Customers Section -->
                            <li <?php echo (CURRENT_PAGE == "customers.php" || CURRENT_PAGE == "add_customer.php") ? 'class="active"' : ''; ?>>
                                <a href="#"><i class="fa fa-user-circle fa-fw"></i> Users<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="customers.php"><i class="fa fa-list fa-fw"></i> List all</a>
                                    </li>
                                    <li>
                                        <a href="add_customer.php"><i class="fa fa-plus fa-fw"></i> Add New</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Users Section -->

                            <!-- Admin Options -->
                            <li>
                                <!-- <a href="add_doctor.php"><i class="fa fa-stethoscope fa-fw"></i> Add Doctor</a> -->
                                <a href="add_doctor.php"><i class="fa fa-stethoscope fa-fw"></i> Add Doctor</a>

                            </li>
                            <li>
                                <a href="doctors.php"><i class="fa fa-list fa-fw"></i> List Doctor </a>
                            </li>

                            <li>
                                <a href="add_medical_store.php"><i class="fa fa-building fa-fw"></i> Add Medical Store</a>
                            </li>
                            <li>
                                <a href="add_medicine.php"><i class="fa fa-pills fa-fw"></i> Add Medicine</a>
                            </li>
<<<<<<< HEAD
=======

                            <li>
                                <a href="list_appointments.php"><i class="fa fa-pills fa-fw"></i>List Appointment</a>
                            </li>


>>>>>>> 08ef31f (list appointments added)
                        </ul>
                    </div>
                </div>
                <!-- /.navbar-static-side -->
            </nav>
        <?php endif; ?>
    </div>

    <!-- The End of the Header -->
</body>