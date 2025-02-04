<?php
function delete_transaction($trans_id, $id): bool
{
    $conn = connection();
    try {
        mysqli_begin_transaction($conn);
        
        $query = mysqli_prepare($conn, "DELETE FROM user_credits WHERE id = ? AND UserID = ?");
        if ($query === false) {
            throw new Exception('Failed to prepare statement: ' . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($query, "ii", $trans_id, $id);
        
        if (!mysqli_stmt_execute($query)) {
            throw new Exception('Execute failed: ' . mysqli_stmt_error($query));
        }

        // Check if any rows were affected
        if (mysqli_stmt_affected_rows($query) > 0) {
            echo "<script>Transaction Deleted !<?script>";
            mysqli_commit($conn);
            return true;
        } else {
            mysqli_rollback($conn);
            return false; // No rows were deleted
        }
    } catch (Exception $e) {
        mysqli_rollback($conn);
        return false; // Return false on error
    } finally {
        if (isset($query)) {
            mysqli_stmt_close($query);
        }
        mysqli_close($conn);
    }
}