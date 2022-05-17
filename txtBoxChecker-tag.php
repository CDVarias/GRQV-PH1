<?php 
    // Validate name 
    $input_name = trim($_POST["nameTxtBx"]);
    if(empty($input_name)){
        $name_err = "Pakiusap ilagay ang iyong buong pangalan.";
    } else{
        $name = $input_name;
    }
    
    // Validate age
    $input_age = trim($_POST["ageTxtBx"]);
    if(empty($input_age)){
        $age_err = "Pakiusap ilagay ang iyong edad.";     
    } else{
        $age = $input_age;
    }
    
    // Validate gender
    $input_gender = trim($_POST["genderTxtBx"]);
    if(empty($input_gender)){
        $gender_err = "Pakiusap ilagay ang iyong kasarian.";     
    } else{
        $gender  = $input_gender;
    }
    
    // Validate fullyvac
    $input_fullyVac = trim($_POST["fullyVacTxtBx"]);
        $fullyVac = $input_fullyVac;
    
    // Validate vactype
    $input_vaccineType = trim($_POST["vaccineTypeTxtBx"]);
    if(empty($input_vaccineType)){
        $vaccineType_err = "Pakiusap ilagay ang iyong bakuna.";     
    } else{
        $vaccineType = $input_vaccineType;
    }
    
    // Validate booster
    $input_booster = trim($_POST["boosterTxtBx"]);
    if(empty($input_booster)){
        $booster_err = "Mangyaring sabihin sa amin kung mayroon kang booster.";     
    } else{
        $booster = $input_booster;
    }
    
    // Validate booster type
    $input_boosterType = trim($_POST["boosterTypeTxtBx"]);
    if($input_booster == "Yes"){
        if(empty($input_boosterType)){
            $boosterType_err = "Mangyaring sabihin sa amin ang iyong uri ng booster.";     
        } else {
            $boosterType = $input_boosterType;
        }
    }
    
    // Validate sideeffects
    $input_sideEffects = trim($_POST["sideEffectsTxtBx"]);
        $sideEffects = $input_sideEffects;
    
    // Validate infection
    $input_infection = trim($_POST["infectionTxtBx"]);
        $infection = $input_infection;
    
?>