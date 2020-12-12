<?php
// Include config file
require_once "config.php";
// Define variables and initialize with empty values
$firstname = $lastname = $street = $city = $state = $zipcode = $position = $email = $employeeid = "";
$firstname_err = $lastname_err = $street_err = $city_err = $state_err = $zipcode_err = $position_err = $email_err = $employeeid_err = "";
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $input_firstname = trim($_POST["firstname"]);
    if (empty($input_firstname)) {
        $firstname_err = "Please enter first name.";
    } elseif (!filter_var($input_firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $firstname_err = "Please enter a valid first name.";
    } else {
        $firstname = $input_firstname;
    }

    // Validate title
    $input_lastname = trim($_POST["lastname"]);
    if (empty($input_lastname)) {
        $lastname_err = "Please enter last name.";
    } elseif (!filter_var($input_lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $lastname_err = "Please enter a valid last name.";
    } else {
        $lastname = $input_lastname;
    }

    // Validate email
    $input_street = trim($_POST["street"]);
    if (empty($input_street)) {
        $street_err = "Please enter an street .";
    } else {
        $street = $input_street;
    }
    
    
        // Validate email
    $input_city = trim($_POST["city"]);
    if (empty($input_city)) {
        $city_err = "Please enter an city .";
    } else {
        $city = $input_city;
    }
    
   $input_state = trim($_POST["state"]);
    if (empty($input_state)) {
        $state_err = "Please enter a state .";
    } else {
        $state = $input_state;
    }
    
      $input_zipcode = trim($_POST["zipcode"]);
    if (empty($input_zipcode)) {
        $zipcode_err = "Please enter the zipcode number .";
    } elseif (!ctype_digit($input_zipcode)) {
        $zipcode_err = "Please enter a positive integer value.";
    } else {
        $zipcode = $input_zipcode;
    }
    
     // Validate room
    $input_position = trim($_POST["position"]);
    if (empty($input_position)) {
        $position_err = "Please enter position ";
    } else {
        $position = $input_position;
    }
    
      $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please enter email ";
    } else {
        $email = $input_email;
    }
  
    // Validate phone
    $input_employeeid = trim($_POST["employeeid"]);
    if (empty($input_employeeid)) {
        $employeeid_err = "Please enter the employee number .";
    } elseif (!ctype_digit($input_employeeid)) {
        $employeeid_err = "Please enter a positive integer value.";
    } else {
        $employeeid = $input_employeeid;
    }




    // Check input errors before inserting in database
    if (empty($firstname_err) && empty($lastname_err) &&
            empty($street_err) &&  empty($city_err) &&  empty($state_err) &&  empty($zipcode_err) && empty($position_err) && empty($email_err) && empty($employeeid_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO trackhs.employees (firstname, lastname, street, city, state, zipcode, position, email, employeeid) 
        VALUES (?, ?, ?, ?,?,?,?, ?,?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssissi", $param_firstname, $param_lastname, $param_street,$param_city,$param_state, 
                    $param_zipcode, $param_position, $param_email, $param_employeeid);
            // Set parameters );
            // Set parameters);
            // Set parameters
            $param_firstname = $firstname;
            $param_lastname = $lastname;
            $param_street = $street;
            $param_city = $city;
            $param_state = $state;
            $param_zipcode = $zipcode;
            $param_position = $position;
            $param_email = $email;
            $param_employeeid = $employeeid;
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
// Records created successfully. Redirect to landing page
                header("location:employee_index.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

// Close statement
        mysqli_stmt_close($stmt);
    }
// Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Create Record</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            .wrapper{
                width: 500px;
                margin: 0 auto;
            }
        </style>
    </head>

    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h2>Create An Employee Record</h2>
                        </div>
                        <p>Please fill this form and submit to add employee 
                            record to the database.</p>
                        <form 
                            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" 
                            method="post">
                            
                             <div class="form-group 
                                 <?php echo (!empty($employeeid_err)) ? 'has-error' : ''; ?>">
                                <label>Employee Id</label>
                                <input type="number" name="employeeid" class="form-control" 
                                       value="<?php echo $employeeid; ?>">
                                <span class="help-block"><?php echo $employeeid_err; ?></span>
                            </div>
                            
                            <div class="form-group 
                                 <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                                <label>First Name</label>
                                <input type="text" name="firstname" class="form-control" 
                                       value="<?php echo $firstname; ?>">
                                <span class="help-block"><?php echo $firstname_err; ?></span>
                            </div>
                            
                            <div class="form-group 
                                 <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                                <label>Last Name</label>
                                <input type="text" name="lastname" class="form-control" 
                                       value="<?php echo $lastname; ?>">
                                <span class="help-block"><?php echo $lastname_err; ?></span>
                            </div>

                            <div class="form-group 
                                 <?php echo (!empty($street_err)) ? 'has-error' : ''; ?>">
                                <label>Street</label>
                               <input type="text" name="street" class="form-control" 
                                       value="<?php echo $street; ?>">
                                <span class="help-block"><?php echo $street_err; ?></span>
                            </div>

                             <div class="form-group 
                                 <?php echo (!empty($city_err)) ? 'has-error' : ''; ?>">
                                <label>City</label>
                               <input type="text" name="city" class="form-control" 
                                       value="<?php echo $city; ?>">
                                <span class="help-block"><?php echo $city_err; ?></span>
                            </div>
                            
                             <div class="form-group 
                                 <?php echo (!empty($state_err)) ? 'has-error' : ''; ?>">
                                <label>State</label>
                               <input type="text" name="state" class="form-control" 
                                       value="<?php echo $state; ?>">
                                <span class="help-block"><?php echo $state_err; ?></span>
                            </div>
                            
                            
                            <div class="form-group 
                                 <?php echo (!empty($zipcode_err)) ? 'has-error' : ''; ?>">
                                <label>zip Code</label>
                                <input type="number" name="zipcode" class="form-control" 
                                       value="<?php echo $zipcode; ?>"
                                <span class="help-block"><?php echo $zipcode_err; ?></span>
                            </div>

                            <div class="form-group 
                                 <?php echo (!empty($position_err)) ? 'has-error' : ''; ?>">
                                <label>Position</label>
                                <input type="text" name="position" class="form-control" 
                                       value="<?php echo $position; ?>">
                                <span class="help-block"><?php echo $position_err; ?></span>
                            </div>
                            
                            
                            
                            <div class="form-group 
                                 <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" 
                                       value="<?php echo $email; ?>">
                                <span class="help-block"><?php echo $email_err; ?></span>
                            </div>

                           




                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="employee_index.php" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>        
            </div>
        </div>
    </body>
</html>


