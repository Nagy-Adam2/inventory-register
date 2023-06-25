<!DOCTYPE html>
<html>
<head lang="hu">
  <meta charset="UTF-8" />
  <meta name="AUTHOR" content="Nagy &Aacute;d&aacute;m" />
  <meta name="MADE" content="info@nagyadamworks.com" />
  <meta name="DATE" content="2018.11.24." />
  <meta http-equiv="CONTENT-LANGUAGE" content="hungarian" />
  <title>Új megrendelés</title>
  <link rel="stylesheet" type="text/css" href="../css/styles.css" />
</head>
<body>

<div class="frame"	>

  <nav class="menu">
    <a class="menu-item" href="main.php">Kezdőoldal</a>
    <a class="menu-item" href="lists.php">Árucikkek listázása</a>
    <a class="menu-item" href="material_handl.php">Árucikk beérkeztetése/kiadása</a>
    <a class="menu-item" href="fastening_form.php">Új készlet felvétele</a>
    <a class="menu-item" href="deletion.php">Árucikk törlése</a>
  </nav>

  <div class="message">
    <form action="fastening_di.php" method="post">
    <iframe name="Chat" src="answer.php" width="100%" height="250px" frameborder="0" framespacing="0" border="0" marginheight="0" marginwidth="0"></iframe>	
      <label for="textarea_id">Írj a üzenetet:</label><br />
      <textarea id="textarea_id" name="item"></textarea><br />
    
      <input type="submit" name="dispatch" Value="Küldés">
    </form>
  </div>

</div>	

</body>
</html>

<?php
include "db.inc";
logincheck();
if (!($connection=@mysqli_connect($hostName, $username, $password))) showerror();

if (!mysqli_select_db($connection,$databaseName)) showerror();

include('connection.php');
$conn;
Connect($conn);

function insertion($conn)
{	
  $commodity_name = mysqli_real_escape_string($conn, $_POST['commodity_name']);
  $amount_unit = $conn->real_escape_string($_POST['amount_unit']);
  $amount = $conn->real_escape_string($_POST['amount']);
  $description = $conn->real_escape_string($_POST['description']);
  
  print('<p class="center strong"> A '.$commodity_name.' felvétele megtörtént!</p><br /><p class="center strong">Pár másodperc múlva frissíti az oldalt!</p>');

  $comm = "insert into commodity (commodity_name, amount_unit, amount, description) values ('".$commodity_name."','".$amount_unit."',".$amount.",'".$description."')";
    
  if(!mysqli_query($conn,$comm))
{
  die('Hiba: '.mysqli_error($conn));	
}

header("refresh:5;URL=fastening_form.php");
     
mysqli_close($conn);
}

insertion($conn);

?>