<?php

include "db.inc";
logincheck();
if (!($connection=@mysqli_connect($hostName, $username, $password))) showerror();

if (!mysqli_select_db($connection,$databaseName)) showerror();

include('connection.php');
$conn;
Connect($conn);

if(!$conn){die("Nem sikerült kapcsolatot létesíteni! A hiba: ".mysqli_connect_error($conn));}
mysqli_select_db($conn,"cellarage");
$comm="insert into message (messages) values ('$_POST[item]')";

if(!mysqli_query($conn,$comm))
{
  die ('Hiba: '. mysqli_error($conn));
}
header ("location: fastening_form.php");
?>