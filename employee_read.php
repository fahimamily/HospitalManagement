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
                            <h3><span class="label label-default">Individual Employee Record</span></h3>
                            <br>
                            <br>
                            <br>


                            <a href="home.php" class="btn btn-primary" role="button">Home</a>


                            <a href="employee_create.php" class="btn btn-primary" role="button">Add A New Employee</a>

                            <a href="employee_index.php" class="btn btn-primary" role="button">View All Employee</a>
                            
                            <a href="logout.php" class="btn btn-primary">Logout</a>



                        </div>

                        <?php
// Check existence of id parameter before processing further
                        if (isset($_GET["employeeid"]) && !empty(trim($_GET["employeeid"]))) {
                            // Include config file
                            require_once "config.php";

                            // Prepare a select statement
                            $sql = "SELECT * FROM trackhs.employees WHERE employeeid = ?";

                            if ($stmt = mysqli_prepare($link, $sql)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "i", $param_employeeid);

                                // Set parameters
                                $param_employeeid = trim($_GET["employeeid"]);

                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt)) {
                                    $result = mysqli_stmt_get_result($stmt);

                                    if (mysqli_num_rows($result) == 1) {
                                        /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                                        // Retrieve individual field value
                                        echo "<table class='table table-bordered'>";
                                        echo "<tr>";
                                        echo "<th>Employee Id</th>";
                                        echo "<th>First Name</th>";
                                        echo "<th>Last Name</th>";
                                        echo "<th>Street</th>";
                                        echo "<th>City</th>";
                                        echo "<th>State</th>";
                                        echo "<th>Zipcode</th>";
                                        echo "<th>Position</th>";
                                        echo "<th>Email</th>";

                                        echo "</tr>";
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
                                        echo "</tr>";
                                    } else {
                                        // URL doesn't contain valid faculty_id parameter. Redirect to error page
                                        header("location: error.php");
                                        exit();
                                    }
                                } else {
                                    echo "Oops! Something went wrong. Please try again later.";
                                }
                            }

                            // Close statement
                            mysqli_stmt_close($stmt);

                            // Close connection
                            mysqli_close($link);
                        } else {
                            // URL doesn't contain id parameter. Redirect to error page
                            header("location: error.php");
                            exit();
                        }
                        ?>
                    </div>
                </div>        
            </div>

        </div>
    </body>
</html>

