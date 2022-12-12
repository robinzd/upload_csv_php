<?php
include('./connection.php');
$_SERVER['SCRIPT_NAME'];
$get_string = $_SERVER['QUERY_STRING'];
parse_str($get_string, $get_array);
$inserted = $get_array['inserted'];
$not_inserted = $get_array['NotInserted'];
if (!empty($_GET['status'])) {
    switch ($_GET['status']) {
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Data imported successfully,Datas Insereted:' . "" . $inserted . "," . 'Not Inserted Datas:' . "" . $not_inserted;
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <!-- link the external stylesheet -->
    <link rel="stylesheet" type="text/css" href="./index.css">
</head>

<body>
    <div id="wrap">
        <div class="container">
            <div class="row">
                <form class="form-horizontal" action="import_csv.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>
                        <!-- Form Name -->
                        <legend>Import File Here</legend>
                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" class=file name="file" id="file" class="input-large">
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4" id="importbutton">
                                <button type="submit" id="submit" name="importSubmit" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <?php
        if ($statusType == 'alert-success' && $not_inserted > 0) {
            echo "<h5 id='instruction'>File Attached With The Duplicate Datas That was Not Inserted Click To Download The Attachment</h5>";
            echo "<div class='container'>
        <a href='export_csv.php'><button class='btn btn-primary' type='button'>Download CSV File</button></a>
       </div><br>";
        }
        ?>
    </div>
    <?php if (!empty($statusMsg)) {
    ?>
        <div class="col-xs-5">
            <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg;?></div>
        </div>
    <?php }
    ?>
    </div>
    <?php if($statusType == 'alert-success' || $not_inserted > 0 || $inserted > 0 ||$statusType == 'alert-danger'){?>
    <div class="table-responsive col-xs-12">
        <div class="table-wrapper">
            <div align="right" class="container">
                <a href="./delete_all.php"><button type="button" class="btn btn-danger">Delete All</button></a>
            </div>
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Students Details Management</h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Mobile Number</th>
                        <th>Gender</th>
                        <th>City</th>
                        <th>Email</th>
                        <th>User Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ret = mysqli_query($db, "select * from students_details");
                    $cnt = 1;
                    $row = mysqli_num_rows($ret);
                    if ($row > 0) {
                        while ($row = mysqli_fetch_array($ret)) {

                    ?>
                            <!--Fetch the Records -->
                            <tr>
                                <td><?php echo $cnt; ?></td>
                                <td><?php echo $row['user_name']; ?></td>
                                <td><?php echo $row['mobile_number']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['city']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['user_status']; ?></td>
                            </tr>
                        <?php
                            $cnt = $cnt + 1;
                        }
                    } else { ?>
                        <tr>
                            <th style="text-align:center; color:red;" colspan="7">No Record Found</th>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>

        </div>
    </div>

    <?php }?>
</body>

</html>