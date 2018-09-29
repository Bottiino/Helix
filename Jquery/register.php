<?PHP
    include_once '../Security/validate.php';
    include_once '../Security/session.php';
    include_once 'database.php';
    
    $username = check_input($_POST['username']);
    $email = check_input($_POST['email']);
    $password = check_input($_POST['password']);
    
    $form_errors = array();

    $required_fields = array('username', 'email', 'password');

    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    $fields_to_check_length = array('username' => 6, 'password' => 8);
    	
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));
    
    $form_errors = array_merge($form_errors, valid_password($password));
	
    
    
    if(!empty($form_errors))
    {
        $errorString = implode(",\n", $form_errors);
        header("location: ../Php/register_form.php?error=" . urlencode($errorString));
    }
    else 
    {            
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = 'INSERT INTO users (admin, userId, username, email, password)'
                    . ' VALUES (admin, userId, :username, :email, :password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $hashed_password);   
        $statement->execute();

        header("location: ../Php/welcome.php");
    }
?>