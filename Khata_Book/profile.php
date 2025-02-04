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
                    <div class="col-md-6">
                        <h3 class="mt-4 text-center">Update Profile</h3>
                        <hr>
                        <form class="form" method="post" action="db/upload.php" enctype='multipart/form-data'>
                            <div class="text-center mt-3">
                                <img src="<?php echo $profilepicture?>"  class="text-center img img-fluid rounded-circle avatar" width="120"
                                    alt="Profile Picture">
                            </div>
                            <div class="input-group col-md mb-3 mt-3">
                                <div class="custom-file">
                                    <input type="file" name='file' class="custom-file-input" id="profilepic"
                                        aria-describedby="profilepicinput">
                                    <label class="custom-file-label" for="profilepic">Change Photo</label>
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="submit" name='upload'
                                        id="profilepicinput">Upload Picture</button>
                                </div>
                            </div>


                        </form>



                        <form class="form" action="profile.php" method="post" id="registrationForm" autocomplete="off">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">

                                        <div class="col-md">
                                            <label for="first_name">
                                                First name
                                            </label>
                                            <input type="text" class="form-control" name="first_name" id="first_name"
                                                placeholder="First Name" value="<?php echo $firstname; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">

                                        <div class="col-md">
                                            <label for="last_name">
                                                Last name
                                            </label>
                                            <input type="text" class="form-control" name="last_name" id="last_name"
                                                value="<?php echo $lastname; ?>" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-md">
                                    <label for="email">
                                        Email
                                    </label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="<?php echo $email; ?>" >
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-md">
                                    <label for="phone">
                                        Phone
                                    </label>
                                    <input type="tel" class="form-control" name="phone" id="phone"
                                        value="<?php echo $phone; ?>" >
                                </div>
                            </div>
                           
                            <div class="mb-3 row">
                                <label for="register" class="col-sm-6 col-form-label">Registered On</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $registered; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md">
                                    <br>
                                    <button class="btn btn-block btn-md btn-success" style="border-radius:0%;"
                                        name="save" type="submit">Save Changes</button>
                                </div>
                            </div>
                        </form>
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