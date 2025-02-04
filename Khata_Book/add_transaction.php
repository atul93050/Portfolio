<?php
include "db/connection.php";
include "db/fetch_userdetails.php";
include_once "db/insert_data.php";
session_start();
$connection = connection();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$username =  $_SESSION['user_id'];

$userdetails = fetch_userdetails($username);



// Fetch profile details
$firstname = $userdetails['FirstName'] ?? 'N/A';
$lastname = $userdetails['LastName'] ?? 'N/A';
$phone = $userdetails['Phone'] ?? 'N/A';
$email = $userdetails['Email'] ?? 'N/A';
$profilepicture = fetch_userphoto($username) ?? "uploads/profile_default.png";

//Expense transactions details

$TransAmount = $_POST['trans_amount'] ?? null;
$TransRemark = $_POST['trans_remark'] ?? null;
$TransSource = $_POST['trans_source'] ?? null;
$TransType = $_POST['trans_type'] ?? null;

// Validate inputs (basic validation, adjust according to your needs)
if (is_numeric($TransAmount)) {
    // Insert function calling
 $transaction_message = insert_transaction($username, $TransAmount, $TransType, $TransSource, $TransRemark);
 echo $transaction_message;
} else {
    // Handle validation error
    //  echo "Invalid input data.";
}



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="icon/Khata.png">
    <title>Easy Khata - Add Transaction</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Feather JS for Icons -->
    <script src="js/feather.min.js"></script>

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
            <div class="user">
                <img class="img img-fluid rounded-circle" src="<?php echo $profilepicture ?>" width="120">
                <h5><?php echo $firstname . " " . $lastname ?></h5>
                <p><?php echo $email ?></p>
            </div>
            <div class="sidebar-heading">Management</div>
            <div class="list-group list-group-flush">
                <a href="index.php" class="list-group-item list-group-item-action"><span data-feather="home"></span> Dashboard</a>
                <a href="add_transaction.php" class="list-group-item list-group-item-action sidebar-active"><span data-feather="plus-square"></span> Add Transaction</a>

                <a href="manage_expense.php" class="list-group-item list-group-item-action"><span data-feather="dollar-sign"></span> Manage Expenses</a>
            </div>
            <div class="sidebar-heading">Settings </div>
            <div class="list-group list-group-flush">
                <a href="profile.php" class="list-group-item list-group-item-action "><span data-feather="user"></span> Profile</a>
                <a href="logout.php" class="list-group-item list-group-item-action "><span data-feather="power"></span> Logout</a>
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
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img img-fluid rounded-circle" src="<?php echo $profilepicture  ?>" width="25">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.phcol-mdp">Your Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>


            <div class="container">
                <h3 class="mt-4 text-center">Add Your Transaction </h3>
                <hr>
                <div class="row ">

                    <div class="col-md-3"></div>

                    <div class="col-md" style="margin:0 auto;">
                        <form action="add_transaction.php" method="POST" id="trans_form">
                           
                            <div class="form-group row">
                                <label for="trans_amount" class="col-sm-6 col-form-label"><b>Enter Amount(₹)</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control col-sm-12" placeholder="Enter Amount" id="trans_amount" name="trans_amount" required >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="trans_type" class="col-sm-6 col-form-label"><b>Type</b></label>
                                <div class="col-md-6">
                                    <select id="trans_type" name="trans_type" class="form-select form-control col-sm-12" aria-label="Default select example" required>
                                        <option selected value="Not">Select Type</option>
                                        <option value="C" >Credit</option>
                                        <option value="D">Debit</option>
                                    </select>
                                </div>
                                <div id="trans-type" class="invalid-feedback text-center"></div>

                            </div>


                            <div id="debit" class="form-group row" style="display:none;">
                                <label for="trans_source" class="col-sm-6 col-form-label"><b>Source</b></label>
                                <div class="col-md-6">
                                    <select id="trans_source" name="trans_source" class="form-select form-control col-sm-12" aria-label="Default select example" required>
                                        <option value="Other" >Other</option>
                                        <option value="Rent" >Rent</option>
                                        <option value="Medical bills" >Medical bills</option>
                                        <option value="Health insurance premiums">Health insurance premiums</option>
                                        <option value="Movie tickets">Movie tickets</option>
                                        <option value="Personal loan repayments">Personal loan repayments</option>
                                        <option value="Meals" >Meals</option>

                                    </select>
                                </div>
                            </div>

                            <div id="credit" class="form-group row" style="display:none;">
                                <label for="trans_source" class="col-sm-6 col-form-label"><b>Source</b></label>
                                <div class="col-md-6">
                                    <select id="trans_source" name="trans_source" class="form-select form-control col-sm-12" aria-label="Default select example" required>
                                        <option selected >Other</option>
                                        <option value="Salary" >Salary</option>
                                        <option value="CashBack" >CashBack</option>
                                        <option value="Refund" >Refund</option>
                                        <option value="Cash Collection" >Cash Collection</option>
                                        <option value="Cash Advance" >Cash Advance</option>
                                        <option value="Loan Amount">Loan Amount</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="trans_remark" class="col-sm-6 col-form-label"><b>Remark</b></label>
                                <div class="col-md-6">
                                    <textarea class="form-control" id="trans_remark" rows="3" placeholder="Remark Here" name="trans_remark"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12 text-right">

                                    <button class="btn btn-lg btn-block btn-warning" style="border-radius: 0%;" type="submit" name="trans_add">Add</button>

                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-3"></div>

                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

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

        // Form submission handler
        const form = document.getElementById("trans_form");
        form.addEventListener("submit", function(event) {
            const errorMessage = document.getElementById("trans-type");
            const selectedType = document.getElementById("trans_type").value;

            // Validate the selected type
            if (selectedType === "Not") {
                errorMessage.innerHTML = "Please select an amount type!";
                errorMessage.style.display = "block";
                event.preventDefault();
            } else {
                errorMessage.style.display = "none";
            }
        });

        function toggleSourceOptions() {
            var type = document.getElementById("trans_type").value;
            var debitSource = document.getElementById("debit");
            var creditSource = document.getElementById("credit");


            if (type === "C") {
                debitSource.style.display = "none";
                creditSource.style.display = "flex";
            } else if (type === "D") {
                creditSource.style.display = "none";
                debitSource.style.display = "flex";
            } else {
                debitSource.style.display = "none";
                creditSource.style.display = "none";
            }
        }

        document.getElementById("trans_type").addEventListener("change", toggleSourceOptions);
    </script>
    <script>
        feather.replace();
    </script>
    <script>

    </script>
</body>

</html>