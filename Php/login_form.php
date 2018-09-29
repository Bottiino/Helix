<?php 
    include '../Security/session.php'; 
    include '../Jquery/database.php';
    include_once '../Security/validate.php';
    
    $error = filter_input(INPUT_GET, 'error');
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
        <title>Login</title>
    </head>
    <body>
        <?php include '../Random/header.php' ?>
            <main class='formMain'>
                <div id="formBgRight">
                    <div class="formRight">
                        <form action="../Security/login.php" method="post">

                            <div id='formTextLog'>
                                <img id="logImg" src="../Images/capture.png"/>
                            </div>

                            <input type="text" name="username" placeholder="Name" required='required' >  
                                
                            <input type="password" name="password" placeholder="********" required >
                          
                            <button class="formSub" type="submit" name="login">Login</button>
                                            
                            <?Php 
                                if(isset($error))
                                {
                                    echo
                                    '<div id="loginErr">'
                                        . $error
                                    . '</div>';
                                }
                            ?>
                            
                        </form>
                    </div>
                </div>
            </main>
        <?php include '../Random/footer.php';?>
    </body>
</html>