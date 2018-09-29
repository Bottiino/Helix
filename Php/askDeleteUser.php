<?php       
    require '../Jquery/database.php';
    include '../Jquery/databaseInfo.php';
    include_once '../Security/session.php';
    include_once '../Security/validate.php';
    
    $user_id = filter_input(INPUT_POST, 'user_id');
    $user_id = check_input($user_id);
    
    $getAllUserInfoById = 'SELECT * FROM users
                  WHERE userId = :userId';
    $statement6 = $db->prepare($getAllUserInfoById);    
    $statement6->bindValue(':userId', $user_id);
    $statement6->execute();
    $userInfo = $statement6->fetch();
    $statement6->closeCursor();
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
                <h1 class="deleteTitle">Selected User</h1>

                <table class="deletionTable">
                        <tr>
                            <th>Admin</th>
                            <th>UserId</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>                                                                    
                        <tr>
                            <td><?php echo $userInfo['admin']; ?></td>
                            <td><?php echo $userInfo['userId']; ?></td>
                            <td><?php echo $userInfo['username']; ?></td>
                            <td><?php echo $userInfo['email']; ?></td>
                        </tr>
                    </table>
                <form method="get" action="../Jquery/deleteUser.php">
                    <input type="input" class="hide" name="user_id" value="<?php echo $userInfo['userId'] ?>">
                    <button type="submit" class="sub" id="foodButton">Delete</button>
                </form>
                
            </main>
        <?php include '../Random/footer.php';?>
    </body>
</html>