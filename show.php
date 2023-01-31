<?
require 'connect.php';
if(isset($_POST['show'])){
  
  if($_POST['show'] == 'other') $query = "SELECT * FROM recipe";

if($_POST['show'] === 'all') $query = "SELECT nameRecipe, dat as Дата_добавления FROM recipe";

if($_POST['show'] == 'first') $query = "SELECT nameRecipe, dat as Дата_добавления FROM recipe join category using(categoryId) WHERE nameCategory = 'Первые блюда'";

if($_POST['show'] == 'second') $query = "SELECT nameRecipe, dat as Дата_добавления FROM recipe join category using(categoryId) WHERE nameCategory = 'Вторые блюда'";

if($_POST['show'] == 'salat') $query = "SELECT nameRecipe, dat as Дата_добавления FROM recipe join category using(categoryId) WHERE nameCategory = 'Салаты'";

if($_POST['show'] == 'cake') $query = "SELECT nameRecipe, dat as Дата_добавления FROM recipe join category using(categoryId) WHERE nameCategory = 'Выпечка'";

else{
  echo "error POST<br>";
  print_r($_POST['show']);
  exit;

}
}



$result = $con->query($query);

 

 


var_dump($row);


echo "<table><tr><th>namerecipe</th><th>ingr</th><th>description</th>";

  while($row = $result->fetch()){
  echo "<tr> ";
 echo "<td>" . $row['nameRecipe'] . "</td>";
 echo "<td>" . $row['ingredient'] . "</td>";
 echo "<td>" . $row['recipeDescription'] . "</td>";
 echo "</tr>";}
 
echo "</table>";

// var_dump($result);
// var_dump($query);