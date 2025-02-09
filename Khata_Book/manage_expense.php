<?php
include "db/connection.php";
include "db/fetch_userdetails.php";
include "delete.php";
session_start();
$connection = connection();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['user_id'];

$userdetails = fetch_userdetails($username);



// Fetch profile details
$firstname = $userdetails['FirstName'] ?? 'N/A';
$lastname = $userdetails['LastName'] ?? 'N/A';
$phone = $userdetails['Phone'] ?? 'N/A';
$email = $userdetails['Email'] ?? 'N/A';
$profilepicture = fetch_userphoto($username) ?? "uploads/profile_default.png";

// fetch user transactions 

$data = fetch_transaction_data($username) ?? null;

$deleteId = $_GET['delete'] ?? null;
if ($deleteId) {
    if (delete_transaction($deleteId, $username)):

        header("Location: manage_expense.php");

    endif;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Khata Book - Dashboard</title>
    <link rel="icon" type="image/x-icon" href="icon/Khata.png">


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
                <h5>
                    <?php echo $firstname . " " . $lastname ?>
                </h5>
                <p>
                    <?php echo $email ?>
                </p>
            </div>
            <div class="sidebar-heading">Management</div>
            <div class="list-group list-group-flush">
                <a href="index.php" class="list-group-item list-group-item-action"><span data-feather="home"></span>
                    Dashboard</a>
                <a href="add_transaction.php" class="list-group-item list-group-item-action sidebar-active"><span
                        data-feather="plus-square"></span> Add Transaction</a>

                <a href="manage_expense.php" class="list-group-item list-group-item-action"><span
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
                <a class="navbar-brand nav-item" href="index.php">
                    <img src="icon/Khata.png" height="50" alt="">
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img img-fluid rounded-circle" src="<?php echo $profilepicture ?>"
                                    width="25">
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
                <h3 class="mt-4 text-center">Manage Expenses</h3>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <button class="btn btn-danger" id="Excel">Click here to Generate Excel Sheet</button>
                    </div>

                    <div class="col-md-12">
                        <table class="table align-middle mb-0 bg-white table-hover" id="transactionTable">
                            <thead class="bg-light text-center">
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Category</th>
                                    <th>Date-Time</th>
                                    <th>Updated Balance</th>
                                    <th>Remark</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle text-center">
                                <?php if (is_array($data)): ?>
                                    <?php foreach ($data as $expense): ?>
                                        <?php
                                        $transactionId = $expense[0];
                                        $amount = $expense[2];
                                        $type = $expense[3] == "C" ? "Credit" : "Debit";
                                        $color = $expense[3] == "C" ? "success" : "danger";
                                        $category = $expense[4];
                                        $date = date_create($expense[5]);
                                        $updatedBalance = $expense[7];
                                        $remark = $expense[6];
                                        ?>
                                        <tr>
                                            <td class="fw-normal mb-1">
                                                <?php echo htmlspecialchars($transactionId); ?>
                                            </td>
                                            <td>
                                                <?php echo htmlspecialchars($amount); ?>
                                            </td>
                                            <td><span class="badge rounded-pill badge-<?php echo $color; ?>">
                                                    <?php echo htmlspecialchars($type); ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?php echo htmlspecialchars($category); ?>
                                            </td>
                                            <td class="text-muted mb-0">
                                                <?php echo htmlspecialchars(date_format($date, "d M, Y H:i:s")); ?>
                                            </td>
                                            <td class="fw-normal mb-1">
                                                <?php echo htmlspecialchars($updatedBalance); ?>
                                            </td>
                                            <td class="text-muted mb-0">
                                                <?php echo htmlspecialchars($remark); ?>
                                            </td>
                                            <td><a href="edit.php?edit=<?php echo urlencode($transactionId); ?>"
                                                    class="btn btn-link">Edit</a></td>
                                            <td><a href="manage_expense.php?delete=<?php echo urlencode($transactionId); ?>"
                                                    class="btn btn-danger" id="delete">Delete</a></td>
                                        </tr>
                                    <?php endforeach; endif; ?>
                            </tbody>
                        </table>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        const deleteButton = document.getElementById('delete');
        deleteButton.addEventListener('click', function (event) {
            const reply = confirm("Are you sure ? You want to delete transaction!");
            if (!reply) {
                event.preventDefault();
            }

        });
        const excelButton = document.getElementById('Excel');
        excelButton.addEventListener('click', function () {
            exportToExcel();
        });
        function exportToExcel() {
            const rows = document.querySelectorAll("#transactionTable tbody tr");

            // Create an array to store specific data
            
            const exportData = [];

            // Add headers for the specific fields
            exportData.push(["Transaction ID", "Amount", "Type", "Category", "Date", "UpdateBalanace", "Remark"]);

            // Loop through rows and extract specific fields
            rows.forEach(row => {
                const cells = row.querySelectorAll("td");
                const transactionID = cells[0].innerText; 
                const amount = cells[1].innerText;      
                const type = cells[2].innerText;        
                const category = cells[3].innerText;     
                const date = cells[4].innerText;         
                const updatedBalance = cells[5].innerText; 
                const remark = cells[6].innerText;      


                exportData.push([transactionID, amount, type, category, date, updatedBalance, remark]);
            });

            // Create a new worksheet with the specific data
            const worksheet = XLSX.utils.aoa_to_sheet(exportData);

            // Create a new workbook and append the worksheet
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, "Transactions");

            // Export the workbook to an Excel file
            XLSX.writeFile(workbook, "Transactions.xlsx");
        }
    </script>
    <script>
        feather.replace()
    </script>

</body>

</html>