<?php
    include_once '../Security/validate.php';
    
    // Get the food data
    $food_id = filter_input(INPUT_POST, 'food_id', FILTER_VALIDATE_INT);
    $group_id = filter_input(INPUT_POST, 'group_id', FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $kcal = filter_input(INPUT_POST, 'kcal', FILTER_VALIDATE_FLOAT);
    $fat = filter_input(INPUT_POST, 'fat', FILTER_VALIDATE_FLOAT);
    $carb = filter_input(INPUT_POST, 'carb', FILTER_VALIDATE_FLOAT);
    $sugar = filter_input(INPUT_POST, 'sugar', FILTER_VALIDATE_FLOAT);
    $fiber = filter_input(INPUT_POST, 'fiber', FILTER_VALIDATE_FLOAT);
    $pro = filter_input(INPUT_POST, 'pro', FILTER_VALIDATE_FLOAT);
    
    $food_id = check_input($food_id);
    $group_id = check_input($group_id);
    $name = check_input($name);
    $kcal = check_input($kcal);
    $fat =check_input($fat);
    $carb = check_input($carb);
    $sugar = check_input($sugar);
    $fiber = check_input($fiber);
    $pro = check_input($pro);
    
    // Validate inputs
    if (!isset($food_id) || !is_numeric($food_id) || 
        !isset($group_id) || !is_numeric($group_id) || 
        !isset($name)  || 
        !isset($kcal) || !is_numeric($kcal) || 
        !isset($fat) || !is_numeric($fat) || 
        !isset($carb) || !is_numeric($carb) || 
        !isset($sugar) || !is_numeric($sugar) || 
        !isset($fiber) || !is_numeric($fiber) || 
        !isset($pro) || !is_numeric($pro)) 
    {
        $error = "Invalid inputs !";
        header("location: ../Php/error.php?error=" . urlencode($error));
    } 
    else 
    {
        require_once('database.php');
        
        // If valid, update the product in the database
        $query = "UPDATE 
                    foods
                  SET groupID = :group_id,
                      foodName = :name,
                      kcal = :kcal,
                      fat = :fat,
                      carb = :carb,
                      sugar = :sugar,
                      fiber = :fiber,
                      pro = :pro
                  WHERE 
                      foodID = :food_id";
        
        $statement = $db->prepare($query);
        $statement->bindValue(':group_id', $group_id);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':kcal', $kcal);
        $statement->bindValue(':fat', $fat);
        $statement->bindValue(':carb', $carb);
        $statement->bindValue(':sugar', $sugar);
        $statement->bindValue(':fiber', $fiber);
        $statement->bindValue(':pro', $pro);  
        $statement->bindValue(':food_id', $food_id);
        $statement->execute();
        $statement->closeCursor();

        // Display the food List page
        header("location: ../Php/foods.php");
    }
?>