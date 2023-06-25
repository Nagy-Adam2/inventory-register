<?php
error_reporting (E_ALL ^ E_NOTICE);

$hostName = "localhost";
$databaseName = "cellarage";
$username = "root";
$password = "";

function showerror()
{
  if (mysqli_connect_error()) die("Hibakód: " . mysqli_connect_errno() . " Leírás: " . mysqli_connect_error());  
}

function clean($input, $maxlength)
{
  $input = substr($input, 0, $maxlength);
  $input = EscapeShellCmd($input);
  return ($input);
}

function logincheck()
{
  session_start();

  if(!isset($_SESSION['user']))
    header("Location: ../index.php");
}  
?>
