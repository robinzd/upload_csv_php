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
</head>
<style>
    .col-xs-5 {
        text-align: center !important;
        white-space: nowrap !important;
    }

    #instruction {
        color: red;
        margin-left: 30px;
    }
</style>

<body>
    <div id="wrap">
        <div class="container">
            <div class="row">
                <form class="form-horizontal" action="function.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>
                        <!-- Form Name -->
                        <legend>Import File Here</legend>
                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="importSubmit" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <?php
    if ($statusType == 'alert-success' && $not_inserted > 0) {
        echo "<h5 id='instruction'>File Attached With The Not Inserted Datas Click To Download The Attachment</h5>";
        echo "<div class='container'>
        <button class='btn btn-primary' type='button'>Download CSV File</button>
       </div><br>";
    }
    ?>
    </div>
    <?php if (!empty($statusMsg)) {
    ?>
        <div class="col-xs-5">
            <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
        </div>
    <?php }
    ?>
</body>
</html>