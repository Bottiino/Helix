<?php   
    include_once '../Security/validate.php';
    include_once '../Security/session.php';   
    require_once('../Jquery/database.php');

    // Get group_ID
    $group_id = filter_input(INPUT_GET, 'ID');
    $group_id = check_input($group_id);

    require_once('../Jquery/databaseInfo.php');
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
    </head>
    <body>
        <?php include '../Random/header.php' ?>
        <?php include '../Jquery/databaseInfo.php' ?>
        <header>
            <h1>
                <a href="../Php/askDeleteGroup.php?groupID=<?Php echo $group['groupID']; ?>">-- </a><?php echo $group['groupName']; ?><a href="add_group_food_form.php?ID=<?Php echo $group_id; ?>"> +</a></h1></header>
            <main id="pageContent">
                <h1>Food List</h1>

                <table id="foodTable">
                        <tr>
                            <th>Name</th>
                            <th>Calories</th>
                            <th>Fat</th>
                            <th>Carbs</th>
                            <th>Sugar</th>
                            <th>Fiber</th>
                            <th>Protein</th>
                            <th>Edit</th>
                            <th>Delete</th>                            
                        </tr>
                        <?php include '../Jquery/databaseInfo.php' ?>
                        <?php foreach ($foods as $food) : ?>
                        <tr>
                            <td><?php echo $food['foodName']; ?></td>
                            <td class="right"><?php echo $food['kcal']; ?></td>
                            <td class="right"><?php echo $food['fat']; ?></td>
                            <td class="right"><?php echo $food['carb']; ?></td>
                            <td class="right"><?php echo $food['sugar']; ?></td>
                            <td class="right"><?php echo $food['fiber']; ?></td>
                            <td class="right"><?php echo $food['pro']; ?></td>
                            <td><form action="edit_food_form.php" method="post"
                                      id="delete_food_form">
                                <input type="hidden" name="food_id"
                                       value="<?php echo $food['foodID']; ?>">
                                <input type="hidden" name="group_id"
                                       value="<?php echo $food['groupID']; ?>">
                                <button class="squareEdit" type="submit">Edit</button>
                            </form></td>
                            <td><form action="askDeleteFood.php" method="post"
                                      id="delete_food_form">
                                <input type="hidden" name="food_id"
                                       value="<?php echo $food['foodID']; ?>">
                                <input type="hidden" name="group_id"
                                       value="<?php echo $food['groupID']; ?>">
                                <button class="squareDel" type="submit">Delete</button>
                            </form></td>                            
                        </tr>
                        <?php endforeach; ?>
                    </table>
            </main>
        <?php include '../Random/footer.php';?>
    </body>
</html>