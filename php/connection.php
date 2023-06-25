<?php

function Connect(&$conn)
{

$servername = "localhost";
$username ="root";
$password = "";

$conn = mysqli_connect($servername,$username);

if($conn==false)
{
  die("A kapcsolat nem jött létre a szerverrel! A program kilép! A hiba oka: ".mysqli_connect_error());	
}

mysqli_select_db($conn,"cellarage") or die (print("Nem sikerült az adatbázishoz csatlakozni! A hiba oka: ".mysqli_error($conn)));

mysqli_query($conn,"SET NAMES utf8");
}
?>