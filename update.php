<?
if (isset($_POST['recipeId']) and isset($_POST['nameRecipe']) and isset($_POST['ingredient']) and isset($_POST['recipeDescription'])) {

  // var_dump($_POST);  
  require "connect.php";

  $sql = "UPDATE recipe 
SET nameRecipe = :nameRecipe, ingredient = :ing, recipeDescription = :descr, link = :link
WHERE recipeId = :id";

  $stmt = $con->prepare($sql);

  $stmt->bindParam(":id", $_POST['recipeId']);
  $stmt->bindParam(":nameRecipe", $_POST['nameRecipe']);
  $stmt->bindParam(":ing", $_POST['ingredient']);
  $stmt->bindParam(":descr", $_POST['recipeDescription']);
  $stmt->bindParam(":link", $_POST['link']);

  $result = $stmt->execute();
  header("Refresh:3;url=index.php");
  echo "Рецепт обновлен";
} else echo "Error update!!!";
