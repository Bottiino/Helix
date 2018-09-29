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
        <title>Error Page</title>
    </head>
    <body>
        <?php include '../Random/header.php' ?>
            <header><h1>Helix</h1></header>

            <main id="pageContent">
                <h1>Database Error</h1>
                <p>There was an error connecting to the database.</p>
                <p>The database must be installed as described in the appendix.</p>
                <p>MySQL must be running as described in chapter 1.</p>
                <p>Error message: <?php echo $error_message; ?></p>
                <p>&nbsp;</p>
            </main>
        <?php include '../Random/footer.php';?>
    </body>
</html>