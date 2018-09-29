<?php
    include_once '../Security/validate.php';
    include_once '../Security/session.php';
    require_once('database.php');

    // Get category ID
    if (!isset($group_id))
    {
        $group_id = filter_input(INPUT_GET, 'group_id', FILTER_VALIDATE_INT);
        $group_id = check_input($group_id);
        
        if ($group_id == NULL || $group_id == FALSE) 
        {
            $group_id = 1;
        }
    }
    
    // Get name for current group
    $getGroupNameById = "SELECT * FROM groups
              WHERE groupID = :group_id";
    $statement1 = $db->prepare($getGroupNameById);
    $statement1->bindValue(':group_id', $group_id);
    $statement1->execute();
    $group = $statement1->fetch();
    $statement1->closeCursor();
    $group_name = $group['groupName'];

    // Get all groups
    $getAllGroups = 'SELECT * FROM groups
              ORDER BY groupID';
    $statement2 = $db->prepare($getAllGroups);
    $statement2->execute();
    $groups = $statement2->fetchAll();
    $statement2->closeCursor();

    // Get foods for selected group
    $getAllFoodsByGroup = "SELECT * FROM foods
              WHERE groupID = :group_id
              ORDER BY foodName";
    $statement3 = $db->prepare($getAllFoodsByGroup);
    $statement3->bindValue(':group_id', $group_id);
    $statement3->execute();
    $foods = $statement3->fetchAll();
    $statement3->closeCursor();     
    
    // Get all Users
    $getAllUsers = 'SELECT * FROM users
              ORDER BY userId';
    $statement4 = $db->prepare($getAllUsers);
    $statement4->execute();
    $users = $statement4->fetchAll();
    $statement4->closeCursor();     
    
    // Get all User info
    if (isset($_SESSION['userId']))
    {
        $getAllUserInfoById = 'SELECT * FROM users
                  WHERE userId = :userId';
        $statement6 = $db->prepare($getAllUserInfoById);    
        $statement6->bindValue(':userId', $_SESSION['userId']);
        $statement6->execute();
        $userInfo = $statement6->fetch();
        $statement6->closeCursor();    
    }
    
    //Get user info
    if (isset($user_id))
    {
        $getAllUserInfoById = 'SELECT * FROM users
                  WHERE userId = :userId';
        $statement6 = $db->prepare($getAllUserInfoById);    
        $statement6->bindValue(':userId', $user_id);
        $statement6->execute();
        $userInfo = $statement6->fetch();
        $statement6->closeCursor();    
    }
?>