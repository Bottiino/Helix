<?php 
    include_once '../Security/session.php';
    include '../Jquery/databaseInfo.php';
    require('../Jquery/database.php');
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
            <header><h1>Leaving so soon ?</h1></header>
            <main id="pageContent">
                
                <div id='seeYa'>
                    <img  src="../Images/seeYa.jpg" alt=""/>
                </div>
                
                <form method="get" action="../Security/logout.php">
                    <button type="submit" class="sub">Logout</button>
                </form>                
            </main>
        <?php include '../Random/footer.php';?>
    </body>
</html>