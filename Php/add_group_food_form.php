<?php
    include_once '../Security/validate.php';
    include_once '../Security/session.php';
    require('../Jquery/database.php');
    
    $group_id = filter_input(INPUT_GET, 'ID');
    $group_id = check_input($group_id);
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
        <title>Add Food</title>
    </head>
    <body>
        <?php include '../Random/header.php' ?>
        <header><h1>Food Info</h1></header>
            <main id="pageContent">
                <div class="foodForm">
                    <h1 class="sideText"><img src="../Images/add+.png" alt=""/></h1>
                    <form action="add_food.php" method="post" class="food_form">
                        </select>
                        <br>

                        <input type="hidden" name="group_id" value="<?Php echo $group_id; ?>">
                        <br>

                        <label>Name:</label>
                        <input type="text" name="name">
                        <br>

                        <label>Calories:</label>
                        <input type="input" name="kcal">
                        <br>

                        <label>Fat:</label>
                        <input type="input" name="fat">
                        <br>

                        <label>Carbs:</label>
                        <input type="input" name="carb">
                        <br>

                        <label>Sugar:</label>
                        <input type="input" name="sugar">
                        <br>

                        <label>Fiber:</label>
                        <input type="input" name="fiber">
                        <br>

                        <label>Protein:</label>
                        <input type="input" name="pro">
                        <br>

                        <button class="sub" type="submit">Add Product</button>
                        <br>
                    </form>
                </div>
            </main>
        <?php include '../Random/footer.php';?>
    </body>
</html>