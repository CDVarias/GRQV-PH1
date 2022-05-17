<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GRQV - PH Records</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php include 'head.php'; ?>
    <style>
        .wrapper{
            width: 900px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
        table tr #effects, table tr #infect {
            max-height: 100px;
            overflow: auto;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <!--
      Header Bar
    -->

    <?php include 'header-tag.php'; ?>
    <div class="site-index">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-4">
                    <div class="clearfix cindex">
                        <h2 class="pull-left px-3 pt-3">Vaccinated Users Details:</h2>
                        <a href="create-tag.php" class="btn btn-light pull-right mt-3 mx-5"><i class="fa fa-plus"></i> Add Record</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM vaccine2tbl";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-striped intable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        // echo "<th>#</th>";
                                        echo "<th>Edad</th>";
                                        echo "<th>Kasarian</th>";
                                        echo "<th>Fully Vaccine</th>";
                                        echo "<th>Vaccine Type</th>";
                                        echo "<th>Booster</th>";
                                        echo "<th>Booster Vaccine</th>";
                                        echo "<th>Mga Epekto ng Bakuna</th>";
                                        echo "<th>Impeksyon Pagkatapos Bakunahan</th>";
                                        echo "<th></th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        // echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['age'] . "</td>";
                                        echo "<td>" . $row['gender'] . "</td>";
                                        echo "<td>" . $row['fullyVac'] . "</td>";
                                        echo "<td>" . $row['vaccineType'] . "</td>";
                                        echo "<td>" . $row['booster'] . "</td>";
                                        echo "<td>" . $row['boosterType'] . "</td>";
                                        echo "<td><div id='effects'>" . $row['sideEffects'] . "</div></td>";
                                        echo "<td><div id='infect'>" . $row['infection'] . "</div></td>";
                                        echo "<td>";
                                            // echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="confirmation-tag.php?id='. $row['id'] .'" class="mr-3 btn-success p-2 updatebutton" title="Update Info" data-toggle="tooltip">Update</a>';
                                            // echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
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