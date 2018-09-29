<?php 
    include_once '../Security/validate.php';
    require('../Jquery/database.php');
    include '../Jquery/databaseInfo.php';
    include_once '../Security/session.php';
?>
<?php
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
                <h1 class="deleteTitle">Selected Food</h1>

                <table class="deletionTable">
                        <tr>
                            <th>Name</th>
                            <th>Calories</th>
                            <th>Fat</th>
                            <th>Carbs</th>
                            <th>Sugar</th>
                            <th>Fiber</th>
                            <th>Protein</th>
                        </tr>                                                                    
                        <tr>
                            <td><?php echo $food['foodName']; ?></td>
                            <td><?php echo $food['kcal']; ?></td>
                            <td><?php echo $food['fat']; ?></td>
                            <td><?php echo $food['carb']; ?></td>
                            <td><?php echo $food['sugar']; ?></td>
                            <td><?php echo $food['fiber']; ?></td>
                            <td><?php echo $food['pro']; ?></td>
                        </tr>
                    </table>
                <form method="get" action="../Jquery/delete_food.php">
                    <input type="input" class="hide" name="food_id" value="<?php echo $food['foodID'] ?>">
                    <button type="submit" class="sub" id="foodButton">Delete</button>
                </form>
                
            </main>
        <?php include '../Random/footer.php';?>
    </body>
</html>