<?php
include_once "connection.php";
function update_username($id, $firstname, $lastname)
{
    $conn = connection();
    $sql = mysqli_prepare($conn, "update users set Firstname = ?, LastName = ? where userID = ?");
    mysqli_stmt_bind_param($sql, "sss", $firstname, $lastname, $id);
    mysqli_stmt_execute($sql);
}

function update_transaction($id, $trans_id, $amount, $type, $source, $remark)
{

    $conn = connection();
    try {

        // Start the transaction
        mysqli_begin_transaction($conn);

        //fetch user balance
        $balance = fetch_balance($id);

      


        //updated balance
        if ($type === "C") {
            $updated_balance = $balance + $amount;
        } else {
            $updated_balance = $balance - $amount;
        }
        $query1 = mysqli_prepare($conn, "UPDATE user_credits SET amount = ?, transaction_type = ?, source = ?, transaction_time = NOW(), remark = ?, updated_balance = ? WHERE UserID = ? AND id = ?");
        if (!$query1) {
            throw new Exception("Failed to prepare statement for user_credits: " . mysqli_error($conn));
        }

        // Bind parameters for the first statement
        mysqli_stmt_bind_param($query1, "dsssdii", $amount, $type, $source, $remark, $updated_balance, $id, $trans_id); // Assuming $recordId is defined

        // Execute the first statement
        if (!mysqli_stmt_execute($query1)) {
            throw new Exception("Execute failed: " . mysqli_stmt_error($query1));
        }

        // Prepare the second statement
        $query2 = mysqli_prepare($conn, "UPDATE user_balance SET Balance = ? WHERE UserID = ?");
        if (!$query2) {
            throw new Exception("Failed to prepare statement: " . mysqli_error($conn));
        }

        // Bind parameters for the second statement
        mysqli_stmt_bind_param($query2, "ii",  $updated_balance, $id);

        // Execute the second statement
        if (!mysqli_stmt_execute($query2)) {
            throw new Exception("Execute failed: " . mysqli_stmt_error($query2));
        }

        // Check if any rows were affected by the first query
        if (mysqli_stmt_affected_rows($query1) > 0 && mysqli_stmt_affected_rows($query2)) {
            // Commit the transaction if everything is successful
            mysqli_commit($conn);
            mysqli_stmt_close($query1);
            mysqli_stmt_close($query2);

            $transaction_message = "<script>alert('Transaction successfully completed.')</script>";
            return $transaction_message;
        } else {
            throw new Exception("No rows affected by the first query.");
        }
    } catch (Exception $e) {
        // Rollback the transaction on error
        mysqli_rollback($conn);
        return "<script>alert('Transaction failed: " . $e->getMessage() . "')</script>";
    } finally {
    }
}
