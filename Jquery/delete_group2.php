<?php
    $groupName = filter_input(INPUT_POST, 'groupName');

    if (!isset($groupName)) 
    {
        $error = "Invalid group Name.";
        header("location: ../Php/error.php?error=" . urlencode($error));
    }
    else 
    {
        require ('../Jquery/database.php');
        $delete = "DELETE FROM groups
                  WHERE groupName = :groupName";
        $statement1 = $db->prepare($delete);
        $statement1->bindValue(':groupName', $groupName);
        $statement1->execute();
        $statement1->closeCursor();

        Header('Location: ../Php/groups.php');
    }
?>