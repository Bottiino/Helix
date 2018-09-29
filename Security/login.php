<?php
include_once 'session.php';
include_once '../Jquery/databaseInfo.php';
include_once '../Jquery/database.php';
include_once 'validate.php';

if(isset($_POST['login']))
{
    //array to hold errors
    $form_errors = array();

    //validate
    $required_fields = array('username', 'password');
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));
	
    if(empty($form_errors))
    {
        //collect form data
        $username = check_input($_POST['username']);
        $password = check_input($_POST['password']);

        //check if user exist in the database
        $query = "SELECT * FROM users WHERE username = :username";
        $statement = $db->prepare($query);
        $statement -> bindValue(':username', $username);
        $statement -> execute();        
        $row = $statement->fetch();
        $statement ->closeCursor();
                
        //If row exists (returned)
        if($row != null)
        {
            //get user ID from db
            $id = $row['userId']; 
            
            //get username
            $username = $row['username'];    
            
            //get hashed password          
            $hash = $row['password'];
                                  
            //verify the password 
            if(password_verify($password, $hash))
            {
                $_SESSION['userId'] = $id;
                 
                if($row['admin'] == 1)
                {
                    header("location: ../Php/private.php");
                }
                else
                {
                    header("location: ../Php/why.php");               
                }
                exit();
            }
            else
            {
                $result = "Invalid username or password";
            }
        }
        else
        {
            $result = "Invalid username or password";
        }
        if(isset($result))
        {
            header("location: ../Php/login_form.php?error=" . urlencode($result));
        }
    }
    else
    {
        if(count($form_errors) == 1)
        {
            $result = "There was one error in the form";
        }
        else
        {
            $result = "There were " .count($form_errors). " errors in the form";
        }
        echo $result;
    }
}
else
{
    $error = "Please enter details!";
    header("location: ../Php/login_form.php?error=" . urlencode($error));
}
?>