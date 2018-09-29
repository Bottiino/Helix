<?php
    include '../Jquery/databaseInfo.php';
    require('../Jquery/database.php');
    include_once '../Security/validate.php';

    $food_id = filter_input(INPUT_POST, 'food_id', FILTER_VALIDATE_INT);
    $food_id = check_input($food_id);
    
    $query = 'SELECT *
              FROM foods
              WHERE foodID = :food_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':food_id', $food_id);
    $statement->execute();
    $food = $statement->fetch();
    $statement->closeCursor();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../images/apple.png" type="image/x-icon" />

        <link href="../Css/header.css" rel="stylesheet" type="text/css"/>
        <link href="../Css/common.css" rel="stylesheet" type="text/css"/>
        <link href="../Css/footer.css" rel="stylesheet" type="text/css"/>

        <link href="../Css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

        <script src="../Js/jquery.min.js" type="text/javascript"></script>
        <script src="../Js/header.js" type="text/javascript"></script>
        <title>Dairy</title>
    </head>
    <body>
        <?php include '../Random/header.php' ?>
            <header><h1>You Sure?</h1></header>
            <main id="pageContent">
                <h1>Selected Food</h1>

                <form method="get" action="../Jquery/delete_food.php">
                    <input type="input" class="hide" name="food_id">
                    <button type="submit" class="subv2">Delete</button>
                </form>
                
            </main>
        <?php include '../Random/footer.php';?>
    </body>
</html>