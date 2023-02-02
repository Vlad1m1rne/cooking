<?php
if($_COOKIE['show']){
  
   setcookie("show","on",time()-100);
    header("Location: index.php"); die();
  }
if($_GET['show']){
  setcookie("show","on",time()+1000);
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="jquery.js"></script>
  <script src="main.js"></script>
  <title>Кулинарная книга</title>
</head>

<body>
  <div class="conteiner">
    <header>
      <h1>Приятного аппетита!</h1>
    </header>

    <aside>
      <form method="GET">
      <ul type="none">
      <button class="btn" name="show" type="submit" value="all">
        <li class="li0"><img src="./images/arrow1.png"><span> Все рецепты</span></li></button>
        <button class="btn" name="show" type="submit" value="first">
        <li class="li1"><img src="./images/arrow1.png"><span> Первые блюда </span></li></button>
        <button class="btn" name="show" type="submit" value="second">
        <li class="li2"><img src="./images/arrow1.png"><span> Вторые блюда</span></li></button>
        <button class="btn" name="show" type="submit" value="salat">
        <li class="li3"><img src="./images/arrow1.png"><span> Салаты</span></li></button>
        <button class="btn" name="show" type="submit" value="cake">
        <li class="li4"><img src="./images/arrow1.png"><span> Выпечка</span></li></button>
        <button class="btn" name="show" type="submit" value="other">
        <li class="li5"><img src="./images/arrow1.png"><span> Другое</span></li></button>
      </ul>
      </form>
    </aside>

    <main>
      <h3><?
      if(!(isset($_GET['show']))) echo"Выберите категорию";
      if($_GET['show']=='all')echo "Все рецепты";
      if($_GET['show']=='first')echo "Первые блюда";
      if($_GET['show']=='second')echo "Вторые блюда";
      if($_GET['show']=='salat')echo "Салаты";
      if($_GET['show']=='cake')echo "Выпечка";
      if($_GET['show']=='other')echo "Другое";
      ?></h3>
      <img class="mainImg" src=<?
      if(!(isset($_GET['show']))) echo"\images\all.jpg";
      if($_GET['show']=='all')echo "\images\all.jpg";
      if($_GET['show']=='first')echo "./images/first.jpg";
      if($_GET['show']=='second')echo "./images/second.jpg";
      if($_GET['show']=='salat')echo "./images/salat.jpg";
      if($_GET['show']=='cake')echo "./images/cake.jpg";
      if($_GET['show']=='other')echo "./images/other.jpg";
      
      ?>>

      <div class="panel">
        <form method="GET">
          <select name="show">
            <option selected value="all">Все</option>
            <option value="first">Первые блюда</option>
            <option value="second">Вторые блюда</option>
            <option value="salat">Салаты</option>
            <option value="cake">Выпечка</option>
            <option value="other">Другое</option>
          </select>
          <input id="btn3" type="submit" value="Показать">
        </form>

        <input id="btn1" type="button" value="Добавить рецепт">
      </div>

      <div class="add_form" style="display: none">
        <form action="add.php" method="POST">
          <span>Категория:</span>
          <select name="categoryId">
            <option selected value="1">Первые блюда</option>
            <option value="2">Вторые блюда</option>
            <option value="3">Салаты</option>
            <option value="4">Выпечка</option>
            <option value="5">Другое</option>
          </select><br>
          <input type="text" size="48" name="nameRecipe"><span>Название рецепта</span><br>
          <textarea rows="8" cols="50" name="ingredient"></textarea><span>Ингридиенты</span><br>
          <textarea rows="12" cols="53" name="recipeDescription"></textarea><span>Описание</span><br>
          <input type="url" size="48" name="link"><span>Ссылка на рецепт</span>

          <br><input type="submit" value="Сохранить рецепт">
          <input id="btn2" type="reset" value="Отмена">
        </form>

      </div>

      <table class="mainT">
        <tr>
          <th>Категория</th>
          <th>Название</th>
          <th>Ингридиенты</th>
          <th>Рецепт</th>
          <th>Ссылка</th>
          <th>Дата добавления</th>
        </tr>

        <?php
        if (isset($_GET['show'])) {
          if ($_GET['show'] == 'all') {
            $sql = "SELECT nameCategory, nameRecipe, ingredient, recipeDescription, link, dat FROM recipe JOIN category using(categoryId) ORDER BY dat";
          }
          if ($_GET['show'] == 'first') {
            $sql = "SELECT nameCategory, nameRecipe, ingredient, recipeDescription, link, dat FROM recipe JOIN category using(categoryId) WHERE categoryId = 1 ORDER BY dat";
          }
          if ($_GET['show'] == 'second') {
            $sql = "SELECT nameCategory, nameRecipe, ingredient, recipeDescription, link, dat FROM recipe JOIN category using(categoryId) WHERE categoryId = 2 ORDER BY dat";
          }
          if ($_GET['show'] == 'salat') {
            $sql = "SELECT nameCategory, nameRecipe, ingredient, recipeDescription, link, dat FROM recipe JOIN category using(categoryId) WHERE categoryId = 3 ORDER BY dat";
          }
          if ($_GET['show'] == 'cake') {
            $sql = "SELECT nameCategory, nameRecipe, ingredient, recipeDescription, link, dat FROM recipe JOIN category using(categoryId) WHERE categoryId = 4 ORDER BY dat";
          }
          if ($_GET['show'] == 'other') {
            $sql = "SELECT nameCategory, nameRecipe, ingredient, recipeDescription, link, dat FROM recipe JOIN category using(categoryId) WHERE categoryId = 5 ORDER BY dat";
          }

          require "connect.php";
          $result =  $con->query($sql);
          while ($row = $result->fetch()) {
            echo "<tr> ";
            echo "<td>" . $row['nameCategory'] . "</td>";
            echo "<td>" . $row['nameRecipe'] . "</td>";
            echo "<td>" . $row['ingredient'] . "</td>";
            echo "<td>" . $row['recipeDescription'] . "</td>";
            if ($row['link']) echo "<td><a href=" . $row['link'] . ">Ссылка</a></td>";
            else echo "<td>" . $row['link'] . "</td>";
            echo "<td>" . $row['dat'] . "</td>";
            echo "</tr>";
          }
        
        }
        ?>

      </table>
    </main>

    <footer>
      <img class='dn' src="./images/night.png" alt="Day/Night">
    </footer>
  </div>
</body>

</html>