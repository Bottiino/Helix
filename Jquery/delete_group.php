<?php    
    $group_id = filter_input(INPUT_GET, 'group_id');   
    
    if (!isset($group_id)) 
    {
        $error = "Invalid group Name.";
        header("location: ../Php/error.php?error=" . urlencode($error));
    }
    else 
    {       
        require_once('database.php');
        
        $getGroupNameById = "DELETE FROM groups
                  WHERE groupID = :group_id";
        $statement1 = $db->prepare($getGroupNameById);
        $statement1->bindValue(':group_id', $group_id);
        $statement1->execute();
        $statement1->closeCursor();
        
        Header('Location: ../Php/groups.php');
    }
?>