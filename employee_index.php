<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
        <style type="text/css">
            .wrapper{
                width: 650px;
                margin: 0 auto;
            }
            .page-header h2{
                margin-top: 0;
            }
            table tr td:last-child a{
                margin-right: 15px;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>

    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header clearfix">
                            <h2 class="pull-left">
                               All Employee Informations </h2>
                            <br>
                            <br>
                            <br>


                            <a href="home.php" class="btn btn-primary" role="button">Home</a>


                            <a href="employee_create.php" class="btn btn-primary" role="button">Add New Employee Information</a>
          
                            <a href="logout.php" class="btn btn-primary">Logout</a>
    


                        </div>
                        <?php
                        // Include config file
                        require_once "config.php";
                        // Attempt select query executionS
                        $sql = "SELECT * FROM trackhs.employees";
                        if ($result = mysqli_query($link, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>Employee ID</th>";
                                echo "<th>First Name</th>";
                                echo "<th>Last Name</th>";
                                echo "<th>Street</th>";
                                echo "<th>City</th>";
                                echo "<th>State</th>";
                                echo "<th>Zipcode</th>";
                                echo "<th>Position</th>";
                                echo "<th>Email</th>";
                                echo "<th>Action</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['employeeid'] . "</td>";
                                    echo "<td>" . $row['firstname'] . "</td>";
                                    echo "<td>" . $row['lastname'] . "</td>";
                                    echo "<td>" . $row['street'] . "</td>";
                                    echo "<td>" . $row['city'] . "</td>";
                                    echo "<td>" . $row['state'] . "</td>";
                                    echo "<td>" . $row['zipcode'] . "</td>";
                                    echo "<td>" . $row['position'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>";
                                    echo "<a href='employee_read.php?employeeid=" . $row['employeeid'] . "' title='View Record' data-toggle='tooltip'><span class='btn btn-info btn-xs'>View Record</span></a>";
                                    echo "<a href='employee_update.php?employeeid=" . $row['employeeid'] . "' title='Update Record' data-toggle='tooltip'><span class='btn btn-warning btn-xs'>Update</span></a>";
                                    echo "<a href='employee_delete.php?employeeid=" . $row['employeeid'] . "' title='Delete Record' data-toggle='tooltip'><span class='btn btn-danger btn-xs'>Delete</span></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else {
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        } else {
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }
                        // Close connection
                        mysqli_close($link);
                        ?>
                    </div>
                </div>        
            </div>

        </div>
    </body>
</html>

