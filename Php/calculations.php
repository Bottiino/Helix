<?php  
    require '../Jquery/database.php';
    include '../Jquery/databaseInfo.php';
    include_once '../Security/session.php'; 
    
    // Get foods for selected group
    $getAllFoodsByGroup = "SELECT * FROM foods";
    $statement3 = $db->prepare($getAllFoodsByGroup);
    $statement3->execute();
    $foods = $statement3->fetchAll();
    $statement3->closeCursor();        

    $groupCount = 0;
    $foodCount = 0;
    $totalCal = 0;
    $smallestFat = 900;
    $mostPro = 0;
    
    //Count of groups
    foreach ($groups as $group)
    {        
        $groupCount++;
    }
    
    
    //Average kcal
    foreach ($foods as $food)
    {
        $foodCount++;
        $totalCal += $food['kcal'];
    }
    $avgCal = $totalCal/$foodCount;

    
    //Food with smallest amount of fat
    foreach ($foods as $food)
    {        
        if($food['fat'] < $smallestFat)
        {
            $smallestFat = $food['fat'];
        }
    }
    //Get foods with smallest fat
    $getSmallestFatFood = "SELECT * FROM foods
                        WHERE fat = :fat";
    $statement5 = $db->prepare($getSmallestFatFood);    
    $statement5->bindValue(':fat', $smallestFat);
    $statement5->execute();
    $smallFood = $statement5->fetch();
    $statement5->closeCursor(); 
    $small = $smallFood['foodName'];
    
    
    //Food with most protein
    foreach ($foods as $food)
    {        
        if($food['pro'] > $mostPro)
        {
            $mostPro = $food['pro'];
        }
    }
    //Get food with most protein
    $getMostProFood = "SELECT * FROM foods
                        WHERE pro = :pro";
    $statement6 = $db->prepare($getMostProFood);    
    $statement6->bindValue(':pro', $mostPro);
    $statement6->execute();
    $mostFood = $statement6->fetch();
    $statement5->closeCursor(); 
    $most = $mostFood['foodName'];    
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
            <header><h1>Calculations</h1></header>
            <main id="pageContent">
                <br><br><br><br><br><br>
                <table class="deletionTable">
                        <tr>
                            <th>Group Count</th>
                            <th>Avg Kcal</th>
                            <th>Smallest Fat</th>
                            <th>Most Protein</th>
                        </tr>                             
                        <tr>                                
                            <td><?php echo $groupCount; ?></td>
                            <td><?php echo $avgCal; ?></td>
                            <td><?php echo $small; ?></td>
                            <td><?php echo $most; ?></td>
                        </tr>
                        <tr>                                
                            <td><?php echo ""; ?></td>
                            <td><?php echo ""; ?></td>
                            <td><?php echo $smallestFat; ?></td>
                            <td><?php echo $mostPro; ?></td>
                        </tr>
                    </table>
                <form method="get" action="../Php/why.php">
                    <button type="submit" class="sub">Back to Site</button>
                </form>
                
            </main>
        <?php include '../Random/footer.php';?>
    </body>
</html>