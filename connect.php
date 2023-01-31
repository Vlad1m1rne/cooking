<?
try{
  $con = new PDO("mysql:host=localhost;dbname=cooking","root","root");
  echo "db activated!<br>";
}
catch(PDOException $e){
  echo"Error DataBase" . $e->getMessage();
}