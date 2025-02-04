<?php
include_once "connection.php";

function fetch_userdetails($id)
{
    $conn = connection();
    $userID = $id;
    $query = mysqli_prepare($conn, "SELECT 
            ud.FirstName, 
            ud.LastName, 
            ud.RegisteredOn, 
            ue.Email, 
            uc.Phone 
        FROM 
            user_details ud 
        LEFT JOIN 
            user_emails ue ON ud.UserId = ue.UserId 
        LEFT JOIN 
            user_contacts uc ON ud.UserId = uc.UserId 
        WHERE 
            ud.UserId = ?");
    mysqli_stmt_bind_param($query, "i", $userID);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function fetch_userphoto($id)
{
    $conn = connection();
    $userID = $id;
    $query = mysqli_prepare($conn, "Select Path from user_photos where UserID=? ORDER BY PhotoID DESC LIMIT 1");
    mysqli_stmt_bind_param($query, "i", $userID);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        return $row['Path'];
    }
}

function fetch_balance($id)
{
    $conn = connection();
    try {
        mysqli_begin_transaction($conn);
        $query = mysqli_prepare($conn, "SELECT Balance FROM user_balance WHERE UserID = ?");
        mysqli_stmt_bind_param($query, "i", $id);
        mysqli_stmt_execute($query);
        $row = mysqli_stmt_get_result($query);
        $row = mysqli_fetch_assoc($row);
        if ($row) {
            mysqli_commit($conn);

            return $row['Balance'];
        }
    } catch (Exception $e) {
        mysqli_rollback($conn);
        mysqli_stmt_close($query);
        return $e->getMessage();
    } finally {
        // Ensure the connection is closed
        if (isset($query)) {
            mysqli_stmt_close($query);
        }
        mysqli_close($conn);
    }
}
function fetch_transaction_data($id)
{
    $conn = connection();
    try {
        mysqli_begin_transaction($conn);
        $query = mysqli_prepare($conn, "SELECT * FROM user_credits WHERE UserID = ?");
        mysqli_stmt_bind_param($query, "i", $id);
        mysqli_stmt_execute($query);
        $row = mysqli_stmt_get_result($query);
        $row = mysqli_fetch_all($row);
        if ($row) {
            mysqli_commit($conn);

            return $row;
        }
    } catch (Exception $e) {
        mysqli_rollback($conn);
        mysqli_stmt_close($query);
        return $e->getMessage();
    } finally {
        // Ensure the connection is closed
        if (isset($query)) {
            mysqli_stmt_close($query);
        }
        mysqli_close($conn);
    }
}
function fetch_transaction($trans_id, $id)
{
    $conn = connection();
    try {
        mysqli_begin_transaction($conn);
        $query = mysqli_prepare($conn, "SELECT * FROM user_credits WHERE id = ? and UserID = ?");
        mysqli_stmt_bind_param($query, "ii", $trans_id, $id);
        mysqli_stmt_execute($query);
        $row = mysqli_stmt_get_result($query);
        $row = mysqli_fetch_assoc($row);
        if ($row) {
            mysqli_commit($conn);

            return $row;
        }
    } catch (Exception $e) {
        mysqli_rollback($conn);
        mysqli_stmt_close($query);
        return $e->getMessage();
    } finally {
        // Ensure the connection is closed
        if (isset($query)) {
            mysqli_stmt_close($query);
        }
        mysqli_close($conn);
    }
}

function fetch_expense_amount($id,$type)
{
    $conn = connection();   
    try {
        mysqli_begin_transaction($conn);
        $query = mysqli_prepare($conn, "SELECT DISTINCT SUM(amount) FROM user_credits where UserId = ? and transaction_type = ?");
        mysqli_stmt_bind_param($query, "is", $id,$type);
        mysqli_stmt_execute($query);
        $row = mysqli_stmt_get_result($query);
        $row = mysqli_fetch_assoc($row);
        if ($row) {
            mysqli_commit($conn);

            return $row["SUM(amount)"];
        }
    } catch (Exception $e) {
        mysqli_rollback($conn);
        mysqli_stmt_close($query);
        return $e->getMessage();
    } finally {
        // Ensure the connection is closed
        if (isset($query)) {
            mysqli_stmt_close($query);
        }
        mysqli_close($conn);
    }
}
