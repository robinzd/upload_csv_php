<?php
include('./connection.php');
if (isset($_POST['importSubmit'])) {
    // First delete All The Data In The another Database Query Starts//
    $delete_query = mysqli_query($db, "Delete from `not_inserted_students_details`");
    // First delete All The Data In The another Database Query Ends//
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    // Validate whether selected file is a CSV file
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
        // If the file is uploaded
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            //get count of the inserted and not inserted //
            $inserted_data = 0;
            $not_inserted_data = 0;
            // Parse data from CSV file line by line
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                $name = $line[1];
                $mobile_number = $line[2];
                $gender = $line[3];
                $city = $line[4];
                $email_id = $line[5];
                $status = $line[6];
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT * FROM students_details WHERE email = '" . $email_id . "'";
                $result = mysqli_query($db, $prevQuery);
                $rowcount = mysqli_num_rows($result);
                $not_inserted_data += $rowcount;
                while ($row_details = mysqli_fetch_array($result)) {
                    $user_name = $row_details['user_name'];
                    $mobile_number = $row_details['mobile_number'];
                    $gender = $row_details['gender'];
                    $city = $row_details['city'];
                    $email_id = $row_details['email'];
                    $status = $row_details['user_status'];
                }
                // Insereted Data Into The Another Database Query Started //
                if ($rowcount > 0) {
                    $insert_query = mysqli_query($db, "INSERT INTO `not_inserted_students_details`(`user_name`, `mobile_number`, `gender`, `city`, `email`, `user_status`) VALUES ('$user_name ','$mobile_number','$gender','$city','$email_id','$status')");
                }
                // Insereted Data Into The Another Database Query Ends//
                if ($rowcount > 0) {
                        // Update member data in the database
                        $db->query("UPDATE students_details SET user_name = '" . $name . "', mobile_number = '" . $mobile_number . "', gender = '" . $gender . "',city = '" . $city . "',email = '" . $email_id . "',user_status = '" . $status . "' WHERE email = '" . $email_id . "'");
                    } else {
                        // Insert member data in the database
                        $db->query("INSERT INTO students_details (user_name,mobile_number,gender,city,email,user_status) VALUES ('" . $name . "','" . $mobile_number . "', '" . $gender . "','" . $city . "','" . $email_id . "','" . $status . "')");
                        //data that inserting into the database//
                        $no_of_data_inserted = 1;
                        $username = $name;
                        $mobilenumber = $mobile_number;
                        $usergender = $gender;
                        $usercity = $city;
                        $emailid = $email_id;
                        $user_status = $status;
                        $inserted_data += $no_of_data_inserted;
                    }
                }
            // Close opened CSV file
            fclose($csvFile);
            $qstring = 'status=succ';
        } else {
            $qstring = 'status=err';
        }
    } else {
        $qstring = 'status=invalid_file';
    }
}
// Redirect to the listing page
header("Location: index.php?inserted=$inserted_data&NotInserted=$not_inserted_data&$qstring");
