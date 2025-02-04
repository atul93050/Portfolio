<?php
include "db/connection.php";
include "db/fetch_userdetails.php";
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
$profilepicture = fetch_userphoto($username) ?? 'uploads/profile_default.png';

$totalcredit= fetch_expense_amount($username,"C") ?? null;
$totaldebit= fetch_expense_amount($username,"D") ?? null;


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/x-icon" href="icon/Khata.png">
  <title>Khata Book</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Feather JS for Icons -->
  <script src="js/feather.min.js"></script>
  <style>
    .card a {
      color: #000;
      font-weight: 500;
    }

    .card a:hover {
      color: #28a745;
      text-decoration: dotted;
    }
  </style>

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-right" id="sidebar-wrapper">
      <div class="user">
        <img class="img img-fluid img-circle rounded-circle" src="<?php echo $profilepicture ?>" width="120">
        <h5><?php echo $firstname . " " . $lastname ?></h5>
        <p><?php echo $email ?></p>
      </div>
      <div class="sidebar-heading">Management</div>
      <div class="list-group list-group-flush">
        <a href="dashboard.php" class="list-group-item list-group-item-action bg-active "><span
            data-feather="home"></span> Dashboard</a>
        <a href="add_transaction.php" class="list-group-item list-group-item-action sidebar-active"><span data-feather="plus-square"></span> Add Transaction</a>


        <a href="manage_expense.php" class="list-group-item list-group-item-action  "><span
            data-feather="dollar-sign"></span> Manage Expenses</a>
      </div>
      <div class="sidebar-heading">Settings </div>
      <div class="list-group list-group-flush">
        <a href="profile.php" class="list-group-item list-group-item-action "><span data-feather="user"></span>
          Profile</a>
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
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img img-fluid rounded-circle" src="<?php echo $profilepicture  ?>" width="25">
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="dashboard.php"><?php echo $firstname . " " . $lastname ?></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="profile.php">Your Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <h3 class="mt-4">Dashboard</h3>
        <div class="row">
          <div class="col-md">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col text-center">
                    <a href="add_expense.php"><img src="icon/addex.png" width="57px" />
                      <p>Add Expenses</p>
                    </a>
                  </div>
                  <div class="col text-center">
                    <a href="add_credit.php"><img src="icon/Credit.png" width="57px" />
                      <p>Add Credit</p>
                    </a>
                  </div>
                  <div class="col text-center">
                    <a href="manage_expense.php"><img src="icon/maex.png" width="57px" />
                      <p>Manage Expenses</p>
                    </a>
                  </div>
                  <div class="col text-center">
                    <a href="profile.php"><img src="icon/prof.png" width="57px" />
                      <p>User Profile</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <h3 class="mt-4">Full-Expense Report</h3>
        <div class="row">
          <div class="col-md">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title text-center">Yearly Expenses</h5>
              </div>
              <div class="card-body">
              <canvas id="myChart"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title text-center">Expense Amount</h5>
              </div>
              <div class="card-body">
              <canvas id="myPieChart"></canvas>
              </div>
            </div>
          </div>
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
  </script>
  <script>
    feather.replace()
  </script>
  <script>
    // Get the canvas element
    var ctx = document.getElementById('myPieChart').getContext('2d');
    const totalCredit = <?php echo $totalcredit ?>;
    const totalDebit = <?php echo $totaldebit ?>;

    // Debugging the values
    console.log("Total Credit: ", totalCredit);
    console.log("Total Debit: ", totalDebit);

    // Create the pie chart
    var myPieChart = new Chart(ctx, {
        type: 'pie',  // Define chart type as 'pie'
        data: {
            labels: ['Debit', 'Credit'],  // Labels for the sections of the pie
            datasets: [{
                label: 'Expense Chart',
                data: [totalCredit,totalDebit],  // Values for each section of the pie chart
                backgroundColor: ['#FF0000', '#00ff14'],  // Colors for each section
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,  // Make the chart responsive
            plugins: {
                legend: {
                    position: 'top',  // Position the legend at the top
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
</script>


</body>

</html>