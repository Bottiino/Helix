<?php
    require('../Jquery/database.php');
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
        <title>Add Food</title>
    </head>
    <body>
        <?php include '../Random/header.php' ?>
        <header><h1>Group Name</h1></header>
            <main id="pageContent">
                <div class="foodForm">
                    <h1 class="rotate"><img src="../Images/addFood+.png" alt=""/></h1>
                    <form action="../Jquery/delete_group2.php" method="post" class="food_form">
                        <br>

                        <label>Name:</label>
                        <input type="text" name="groupName">
                        <br>

                        <button class="sub" type="submit">Delete Group</button>
                        <br>
                    </form>
                </div>
            </main>
        <?php include '../Random/footer.php';?>
    </body>
</html>