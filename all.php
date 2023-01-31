<?
include "connect.php";
$sql = "SELECT * FROM recipe";
$result = $con->query($sql);
while($row=$result->fetch()){
$n = $row['nameRecipe'];
$i = $row['ingredient'];
$d = $row['recipeDescription'];
$c = $row['categoryId'];
$dat = $row['dat'];
echo $c, $n , $i , $d,$dat;
 }


