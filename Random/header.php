<?php 
    include '../Jquery/databaseInfo.php'; 
?>
<link href="../Css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

<div class="navbar">
    <a href="../Php/index.php"><i class="fa fa-home" aria-hidden="true"></i></a>
    <a href="../Php/why.php">Why</a>
    <a id="lnkGroups" href="../Php/groups.php">Groups <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
    <div class="groups-content" id="groupDrop">
        <?php foreach ($groups as $group) : ?>
            <?php echo '<a href="../Php/foodGroup.php?ID='. $group['groupID'] . '">'; ?>
                <?php echo $group['groupName']; ?>
            </a>
        <?php endforeach; ?>
    </div>
    <a href="../Php/foods.php">Food</a>
    <a href="../Php/calculations.php">Calculations</a>
    <?Php 
        if(!isset($_SESSION['userId']))
        {
            echo  '<a href="../Php/register_form.php">Register</a>
                    <a href="../Php/login_form.php">Login</a>';
        }
        else
        {
            echo '<a href="../Php/seeYa.php">Logout</a>';
        }
    ?>
    <div id="searchBoxContainer">
        <form id="frmSearchBox">
            <input id="txtSearchBox" type="text" placeholder="Search by word" />
        </form>
    </div>
</div>