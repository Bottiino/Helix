<?php 
    include_once '../Security/session.php';
    include '../Jquery/databaseInfo.php';
    include_once '../Security/validate.php';
    
    $id = check_input($_SESSION['userId']);
  
    if(empty($id) || !isset($id))
    {
        header("Location: login.php");
    }
    
    if($userInfo['admin'] != 1)
    {
        header("Location: ../Php/peasent.php");
    }
?>
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
        <title>AllUsers</title>
    </head>
    <body>
        <?php include '../Random/header.php' ?>
            <header><h1>Member List</h1></header>
            <main id="pageContent">
                <h1>All Users</h1>

                <table id="foodTable">
                        <tr>
                            <th>Admin</th>
                            <th>UserId</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Delete</th>
                        </tr>
                        
                        <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo $user['admin']; ?></td>
                            <td><?php echo $user['userId']; ?></td>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><form action="askDeleteUser.php" method="post"
                                      id="delete_food_form">
                                <input type="hidden" name="user_id"
                                       value="<?php echo $user['userId']; ?>">
                                <input type="submit" value="Delete">
                            </form></td>                           
                        </tr>
                        <?php endforeach; ?>
                    </table>
            </main>
        <?php include '../Random/footer.php';?>
    </body>
</html>