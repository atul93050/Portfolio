<?php
include_once "db/connection.php";
include_once "db/fetch_userdetails.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$connection = connection();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$username =  $_SESSION['user_id'];
include_once "db/upload.php";
$userdetails = fetch_userdetails($username);


// Fetch profile details
$firstname = $userdetails['FirstName'] ?? 'N/A';
$lastname = $userdetails['LastName'] ?? 'N/A';
$phone = $userdetails['Phone'] ?? 'N/A';
$email = $userdetails['Email'] ?? 'N/A';
$registered = $userdetails['RegisteredOn'] ?? 'N/A';
$profilepicture = fetch_userphoto($username) ?? 'uploads/profile_default.png';






?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/x-icon" href="icon/Khata.png">
  <title>Khata Book - Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        h5 {
            font-size: 1.25rem;
            text-transform: capitalize;
        }
    </style>

    <!-- Feather JS for Icons -->


</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
            <div class="user">
                <img class="img img-fluid rounded-circle" src="<?php echo $profilepicture ?>" width="120">
                <h5><?php echo $firstname . " " . $lastname; ?></h5>
                <p><?php echo $email ?></p>
            </div>
            <div class="sidebar-heading">Management</div>
            <div class="list-group list-group-flush">
                <a href="index.php" class="list-group-item list-group-item-action"><span data-feather="home"></span>
                    Dashboard</a>
                    <a href="add_transaction.php" class="list-group-item list-group-item-action sidebar-active"><span data-feather="plus-square"></span> Add Transaction</a>
                    <a href="manage_expense.php" class="list-group-item list-group-item-action "><span
                        data-feather="dollar-sign"></span> Manage Expenses</a>
            </div>
            <div class="sidebar-heading">Settings </div>
            <div class="list-group list-group-flush">
                <a href="profile.php" class="list-group-item list-group-item-action sidebar-active"><span
                        data-feather="user"></span> Profile</a>
                <a href="logout.php" class="list-group-item list-group-item-action "><span data-feather="power"></span>
                    Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light  border-bottom">


                <button class="toggler" type="button" id="menu-toggle" aria-expanded="false">
                    <span data-feather="menu"></span>
                </button>
                <a class="navbar-brand nav-item" href="#">
                    <img src="icon/Khata.png" height="50" alt="">
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img img-fluid rounded-circle" src="<?php echo $profilepicture ?>" width="25">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.php">Your Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Profile Details</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Profile Picture Section -->
                        <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
                            <!-- Profile Picture -->
                            <img src="<?php echo $profilepicture ?>" alt="Profile Picture" class="profile-image img-fluid rounded-circle" height="200">
                            <br><br>
                            <a href="profile.php" class="btn btn-primary btn-block">Change Picture</a>
                        </div>
                        <!-- User Details Section -->
                        <div class="col-12 col-md-8">
                            <h4 class="mb-3">Personal Information</h4>
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Name:</strong> <?php echo $firstname . " " . $lastname; ?></li>
                                <li class="list-group-item"><strong>Email:</strong> <?php echo $email ?></li>
                                <li class="list-group-item"><strong>Phone:</strong> <?php echo $phone ?></li>
                                <li class="list-group-item"><strong>Address:</strong> 123 Main Street, City, Country</li>
                            </ul>

                            <br>

                            <!-- Edit Button -->
                            <a href="profile.php" class="btn btn-warning btn-block">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



                        <!--/tab-content-->

                    </div>
                    <!--/col-9-->
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="js/feather.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script>
        feather.replace()
    </script>
    <script type="text/javascript">
        $(document).ready(function() {


            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.avatar').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function() {
                readURL(this);
            });
        });
    </script>

</body>

</html>