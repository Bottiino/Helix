<?php 
    include_once '../Security/validate.php';
    include '../Jquery/databaseInfo.php';
    
    $error = filter_input(INPUT_GET, 'error');
    $error = check_input($error);
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
        <title>Helix</title>
    </head>
    <body>
        <?php include '../Random/header.php' ?>
            <main id="pageContent">
                <img id="oops" src="../Images/oops.PNG" alt=""/>
                <img class='pic' src="../Images/errorKid.PNG" alt=""/>
                 <section>
                    <h1>There was an error !</h1>
                    <p><?php echo $error; ?></p>
                </section>
                
                <form method="get" action="../Php/why.php">
                    <button type="submit" class="sub">Back to site</button>
                </form>
            </main>
        <?php include '../Random/footer.php';?>
    </body>
</html>