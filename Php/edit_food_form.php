<?php 
    include_once '../Security/validate.php';
    include '../Jquery/databaseInfo.php';
    include_once '../Security/session.php';
    require('../Jquery/database.php');

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
        <title>Edit Food</title>
    </head>
    <body>
        <?php include '../Random/header.php' ?>
            <header><h1>Food Info</h1></header>

            <main id="pageContent">
                <div class="foodForm">
                    <h1 class="sideText"><img src="../Images/edit+.png" alt=""/></h1>
                    <form action="../Jquery/edit_food.php" method="post" class="food_form">
                        <input type="hidden" name="food_id"
                               value="<?php echo $food['foodID']; ?>">

                        <label>GroupID:</label>
                        <input type="group_id" name="group_id"
                               value="<?php echo $food['groupID']; ?>">

                        <label>Name:</label>
                        <input type="text" name="name"
                               value="<?php echo $food['foodName']; ?>">

                        <label>Calories:</label>
                        <input type="input" name="kcal"
                               value="<?php echo $food['kcal']; ?>">

                        <label>Fat:</label>
                        <input type="input" name="fat"
                               value="<?php echo $food['fat']; ?>">

                        <label>Carbs:</label>
                        <input type="input" name="carb"
                               value="<?php echo $food['carb']; ?>">

                        <label>Sugar:</label>
                        <input type="input" name="sugar"
                               value="<?php echo $food['sugar']; ?>">

                        <label>Fiber:</label>
                        <input type="input" name="fiber"
                               value="<?php echo $food['fiber']; ?>">

                        <label>Protein:</label>
                        <input type="input" name="pro"
                               value="<?php echo $food['pro']; ?>">

                        <button class="sub" type="submit">Save Changes</button>
                    </form>
                </div>
            </main>
        <?php include '../Random/footer.php';?>
    </body>
</html>