<?php
    include_once '../Security/validate.php';
    require_once('../Jquery/database.php');        
    include('../Jquery/databaseInfo.php');        
        
    $user_id = filter_input(INPUT_GET, 'user_id', FILTER_VALIDATE_INT);
    $user_id = check_input($user_id);
    
    //Delete the product from the database
    if (isset($user_id) && is_numeric($user_id)) 
    {
        $query = "DELETE FROM users
                  WHERE userId = :user_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
        $statement->closeCursor();   
        
        // Display the Food List page
        header('Location: ../Php/private.php');
    }
    else
    {
        $error = "Invalid user data. Check all fields and try again.";
        header("location: ../Php/register_form.php?error=" . urlencode($error));
    }
?>