<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$email = $name = $age = $gender = $fullyVac = $vaccineType = $booster = $boosterType = $sideEffects = $infection =  "";
$email_err = $name_err = $age_err = $gender_err = $fullyVac_err = $vaccineType_err = $booster_err = $boosterType_err = $sideEffects_err = $infection_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    include ("txtBoxChecker-eng.php");
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($age_err) && empty($gender_err) && empty($fullyVac_err) && empty($vaccineType_err) && empty($booster_err) && empty($boosterType_err)){
        // Prepare an update statement
        echo "FSADOIFNBSOEUFBN";
        $sql = "UPDATE vaccine2tbl SET name=?, age=?, gender=?, fullyVac=?, vaccineType=?, booster=?, boosterType=?, sideEffects=?, infection=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sisssssssi", $param_name, $param_age, $param_gender, $param_fullyVac, $param_vaccineType, $param_booster, $param_boosterType, $param_sideEffects, $param_infection, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_age = $age;
            $param_gender = $gender;
            $param_fullyVac = $fullyVac;
            $param_vaccineType = $vaccineType;
            $param_booster = $booster;
            $param_boosterType = $boosterType;
            $param_sideEffects = $sideEffects;
            $param_infection = $infection;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index-eng.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM vaccine2tbl WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["name"];
                    $age = $row["age"];
                    $gender = $row["gender"];
                    $fullyVac = $row["fullyVac"];
                    $vaccineType = $row["vaccineType"];
                    $booster = $row["booster"];
                    $boosterType = $row["boosterType"];
                    $sideEffects = $row["sideEffects"];
                    $infection = $row["infection"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GRQV - PH Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php include 'head.php'; ?>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <!--
      Header Bar
    -->

    <?php include 'header-eng.php'; ?>

    
    <div class="site-update">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-4">
                    <div class="cupdate text-center">
                        <h1 class="pt-3"><b>UPDATE RECORD</b></h1>
                        <h4>RECORD INFORMATION:</h4>
                    </div>

                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <div class="d-flex cupdate2 p-5">
                            <div class="w-50 mr-3">
                                <!--  -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="nameTxtBx" placeholder = "Name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>" readonly>
                                    <span class="invalid-feedback"><?php echo $name_err;?></span>
                                </div>
                                <!--  -->
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="number"name="ageTxtBx" placeholder = "Age" class="form-control <?php echo (!empty($age_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $age; ?>" min="12" max="" readonly>
                                    <span class="invalid-feedback"><?php echo $age_err;?></span>
                                </div>
                                <!--  -->
                                <div class="form-group">
                                    <label for="genderTxtBx">Gender</label>
                                    <select name="genderTxtBx" id="gender" class="form-control <?php echo (!empty($gender_err)) ? 'is-invalid' :''; ?>" readonly>
                                            <option value="<?php echo $gender; ?>" selected><?php echo $gender; ?></option>
                                    </select>
                                    <span class="invalid-feedback"><?php echo $gender_err;?></span>
                                </div>
                                <!--  -->
                                <div class="form-group">
                                    <label>Fully Vaccinated</label>
                                    <input type="text" name="fullyVacTxtBx" class="form-control <?php echo (!empty($fullyVac_err)) ? 'is-invalid' : ''; ?>" value="<?php echo "Yes"; ?>" readonly>
                                    <span class="invalid-feedback"><?php echo $fullyVac_err;?></span>
                                </div>
                                <!--  -->
                                <div class="form-group">
                                        <label for="vaccineTypeTxtBx">Vaccine Type</label>
                                        <select name="vaccineTypeTxtBx" id="vaccineTypeTxtBx" class="form-control <?php echo (!empty($vaccineType_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $vaccineType; ?>" readonly>
                                            <option value="<?php echo $vaccineType; ?>" selected><?php echo $vaccineType; ?></option>
                                    </select>
                                    <span class="invalid-feedback"><?php echo $vaccineType_err;?></span>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                <input type="submit" class="btn btn-success" value="Submit">
                                <a href="records-eng.php" class="btn btn-danger ml-2">Cancel</a>
                            </div>
                            <div class="w-50">
                                <!--  -->
                                <div class="form-group">
                                    <label for="boosterTxtBx">Booster</label>
                                    <select name="boosterTxtBx" id="boosterTxtBx" class="form-control <?php echo (!empty($booster_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $booster; ?>">
                                        <optgroup>
                                            <option value="<?php echo $booster; ?>" selected><?php echo $booster; ?></option>
                                        </optgroup>
                                        <optgroup label="">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </optgroup> 
                                    </select>
                                    <span class="invalid-feedback"><?php echo $booster_err;?></span>
                                </div>
                                <!--  -->
                                <div class="form-group">
                                        <label for="boosterTypeTxtBx">Booster Type</label>
                                        <select name="boosterTypeTxtBx" id="boosterTypeTxtBx" class="form-control <?php echo (!empty($boosterType_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $boosterType; ?>">
                                        <optgroup>
                                            <option value="<?php echo $boosterType; ?>" selected><?php echo $boosterType; ?></option>
                                        </optgroup>
                                        <optgroup label="">
                                            <option value="Pfizer">Pfizer</option>
                                            <option value="AztraZeneca">AztraZeneca</option>
                                            <option value="Moderna">Moderna</option>
                                        </optgroup> 
                                    </select>
                                    <span class="invalid-feedback"><?php echo $boosterType_err;?></span>
                                </div>
                                <!--  -->
                                <div class="form-group">
                                    <label>Side Effects</label>
                                    <textarea name="sideEffectsTxtBx" class="form-control <?php echo (!empty($sideEffects_err)) ? 'is-invalid' : ''; ?>"><?php echo $sideEffects; ?></textarea>
                                    <span class="invalid-feedback"><?php echo $sideEffects_err;?></span>
                                </div>
                                <!--  -->
                                <div class="form-group">
                                    <label>Post Vaccine Infection</label>
                                    <textarea name="infectionTxtBx" class="form-control <?php echo (!empty($infection_err)) ? 'is-invalid' : ''; ?>"><?php echo $infection; ?></textarea>
                                    <span class="invalid-feedback"><?php echo $infection_err;?></span>
                                </div>  
                            </div>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>