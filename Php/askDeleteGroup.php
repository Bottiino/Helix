<?php 
    include_once '../Security/validate.php';
    
    $group_id = filter_input(INPUT_GET, 'groupID', FILTER_VALIDATE_INT);
    $group_id = check_input($group_id);
    
    require '../Jquery/database.php';
    include '../Jquery/databaseInfo.php';
    include_once '../Security/session.php';      
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
                            <th class="right">Fiber</th>
                            <th class="right">Protein</th>
                        </tr>                             
                        <?php foreach ($foods as $food) : ?>
                            <tr>                                
                                <td><?php echo $food['foodName']; ?></td>
                                <td class="right"><?php echo $food['kcal']; ?></td>
                                <td class="right"><?php echo $food['fat']; ?></td>
                                <td class="right"><?php echo $food['carb']; ?></td>
                                <td class="right"><?php echo $food['sugar']; ?></td>
                                <td class="right"><?php echo $food['fiber']; ?></td>
                                <td class="right"><?php echo $food['pro']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <form method="get" action="../Jquery/delete_group.php">
                    <input type="input" class="hide" name="group_id" value="<?php echo $group_id; ?>">
                    <button type="submit" class="sub">Delete</button>
                </form>
                
            </main>
        <?php include '../Random/footer.php';?>
    </body>
</html>