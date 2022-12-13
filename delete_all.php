<?php
// Load the database configuration file 
include('./connection.php');
// delete all records from the table
$delete_query = $db->query("DELETE FROM students_details");
if ($delete_query) {
    echo "<script>alert('Successfully Deleted All The Records')</script>";
}
echo "<script>window.location.href = 'index.php'</script>";
