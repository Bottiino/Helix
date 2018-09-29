<?php include '../Jquery/databaseInfo.php' ?>
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
        <title>Groups</title>
    </head>
    
    <body>
        <?php include '../Random/header.php' ?>
            <header><h1><a href="delete_group_form.php">-- </a>Groups<a href="add_group_form.php"> +</a></h1></header>
            <main id="pageContent">               
                <?php foreach ($groups as $group) : ?>
                    <div id="<?php echo $group['groupName']; ?>" class="type">
                        <?php echo '<a href="foodGroup.php?ID=' . $group['groupID'] . '"class="action-button">'; ?>
                            <?php echo $group['groupName']; ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </main>
        <?php include '../Random/footer.php';?>
    </body>  

</html>