<?php
// Get the food data
$group_id = filter_input(INPUT_POST, 'group_id', FILTER_VALIDATE_INT);
$name = check_input(INPUT_POST, 'name');
$kcal = check_input(INPUT_POST, 'kcal', FILTER_VALIDATE_FLOAT);
$fat = check_input(INPUT_POST, 'fat', FILTER_VALIDATE_FLOAT);
$carb = check_input(INPUT_POST, 'carb', FILTER_VALIDATE_FLOAT);
$sugar = check_input(INPUT_POST, 'sugar', FILTER_VALIDATE_FLOAT);
$fiber = check_input(INPUT_POST, 'fiber', FILTER_VALIDATE_FLOAT);
$pro = check_input(INPUT_POST, 'pro', FILTER_VALIDATE_FLOAT);

$group_id = check_input($group_id);
$name = check_input($name);
$kcal = check_input($kcal);
$fat = check_input($fat);
$carb = check_input($carb);
$sugar = check_input($sugar);
$fiber = check_input($fiber);
$pro = check_input($pro);

// Validate inputs
if (!isset($group_id) || !is_numeric($group_id) ||
    !isset($name) || 
    !isset($kcal) || !is_numeric($kcal) || 
    !isset($fat) || !is_numeric($fat) || 
    !isset($carb) || !is_numeric($carb) || 
    !isset($sugar) || !is_numeric($sugar) || 
    !isset($fiber) || !is_numeric($fiber) || 
    !isset($pro) || !is_numeric($pro)) {
    $error = "Invalid food data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the food to the database 
    $query = "INSERT INTO foods
                 (groupID, foodName, kcal, fat, carb, sugar, fiber, pro)
              VALUES
                 (:group_id, :name, :kcal, :fat, :carb, :sugar, :fiber, :pro)";
    $statement = $db->prepare($query);
    $statement->bindValue(':group_id', $group_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':kcal', $kcal);
    $statement->bindValue(':fat', $fat);
    $statement->bindValue(':carb', $carb);
    $statement->bindValue(':sugar', $sugar);
    $statement->bindValue(':fiber', $fiber);
    $statement->bindValue(':pro', $pro);
    $statement->execute();
    $statement->closeCursor();

    // Display the Food List page
    header('Location: ../Php/foods.php');
}
?>