<?php
include('./connection.php');
if (isset($_POST['importSubmit'])) {
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    // Validate whether selected file is a CSV file
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
        // If the file is uploaded
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            //get count of the inserted and not inserted //
            $inserted_data=0;
            $not_inserted_data=0; 
            // Parse data from CSV file line by line
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                // print_r($line);
                // echo "<br>";
                // Get row data
                $name = $line[1];
                $mobile_number = $line[2];
                //    print_r($mobile_number);
                //    echo "<br>";
                $gender = $line[3];
                $city = $line[4];
                $email_id = $line[5];
                $status = $line[6];
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT * FROM students_details WHERE email = '" . $email_id . "'";
                $result = mysqli_query($db, $prevQuery);
                $rowcount = mysqli_num_rows($result);
                // echo $rowcount;
                // echo "<br>";
                $not_inserted_data += $rowcount;
                echo $not_inserted_data;
                echo "<br>";
                while ($row_details = mysqli_fetch_array($result)) {
                    $user_name = $row_details['user_name'];
                    echo  $user_name;
                    echo "<br>";
                    $mobile_number = $row_details['mobile_number'];
                    echo $mobile_number;
                    echo "<br>";
                    $gender = $row_details['gender'];
                    echo $gender;
                    echo "<br>";
                    $city = $row_details['city'];
                    echo $city;
                    echo "<br>";
                    $email_id = $row_details['email'];
                    echo $email_id;
                    echo "<br>";
                    $status = $row_details['user_status'];
                    echo $status;
                    echo "<br>";
                }
                if ($rowcount > 0) {
                    echo "how are you";
                    echo "<br>";
                    // Update member data in the database
                    $db->query("UPDATE students_details SET user_name = '" . $name . "', mobile_number = '" . $mobile_number . "', gender = '" . $gender . "',city = '" . $city . "',email = '" . $email_id . "',user_status = '" . $status . "' WHERE email = '" . $email_id . "'");
                } else {
                    echo "hai";
                    echo "<br>";
                    // Insert member data in the database
                    $db->query("INSERT INTO students_details (user_name,mobile_number,gender,city,email,user_status) VALUES ('" . $name . "','" . $mobile_number . "', '" . $gender . "','" . $city . "','" . $email_id . "','" . $status . "')");
                   //data that inserting into the database//
                    $no_of_data_inserted=1;
                    echo $no_of_data_inserted;
                    echo "<br>";
                    $username=$name;
                    echo $username;
                    echo "<br>";
                    $mobilenumber=$mobile_number;
                    echo $mobilenumber;
                    echo "<br>";
                    $usergender=$gender;
                    echo $usergender;
                    echo "<br>";
                    $usercity=$city;
                    echo $usercity;
                    echo "<br>";
                    $emailid=$email_id ;
                    echo $emailid;
                    echo "<br>";
                    $user_status=$status;
                    echo $user_status;
                    echo "<br>";
                    $inserted_data += $no_of_data_inserted;
                    echo $inserted_data;
                    echo "<br>";
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
?>
