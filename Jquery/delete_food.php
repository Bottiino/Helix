<?php
    include_once '../Security/validate.php';
    require_once('../Jquery/database.php');        
    include('../Jquery/databaseInfo.php');        
        
    $food_id = filter_input(INPUT_GET, 'food_id', FILTER_VALIDATE_INT);
    $food_id = check_input($food_id);
    
    //Delete the product from the database
    if (isset($food_id) && is_numeric($food_id)) 
    {
        $query = "DELETE FROM foods
                  WHERE foodID = :food_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':food_id', $food_id);
        $statement->execute();
        $statement->closeCursor();   
        
        // Display the Food List page
        header('Location: ../Php/foods.php');
    }
    else
    {
        $error = "Invalid product data. Check all fields and try again.";
        header("location: ../Php/register_form.php?error=" . urlencode($error));
    }
?>