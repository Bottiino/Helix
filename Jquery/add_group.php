<?php
    include_once '../Security/validate.php';

    // Get the group data
    $name = filter_input(INPUT_POST, 'name');
    $name = check_input($name);

    // Validate inputs
    if ($name == null) {
        $error = "Invalid category data. Check all fields and try again.";
        include('../Php/error.php');
    } else {
        require_once('../Jquery/database.php');

        // Add the group to the database
        $query = "INSERT INTO groups (groupName)
                  VALUES (:name)";
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->execute();
        $statement->closeCursor();

        // Display the group List page
        header("location: ../Php/groups.php");
    }
?>