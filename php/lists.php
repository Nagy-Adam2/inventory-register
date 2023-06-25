<?php

include "db.inc";
logincheck();
if (!($connection=@mysqli_connect($hostName, $username, $password))) showerror();

if (!mysqli_select_db($connection,$databaseName)) showerror();

include('connection.php');
$conn;
Connect ($conn);

function lists($conn)
{
$comm = "SELECT * FROM commodity ORDER BY commodity_id DESC LIMIT 5;";

$result = mysqli_query($conn,$comm) or die(print("Nem tudtam az utasítást végrehajtani! A hiba oka: ". mysqli_error($conn)));

print ("<table border=\"1\" class='white'>");

print ("<tr><td><b>Cikk azon.</b></td><td><b>Cikk név</b></td><td><b>Mennyiségi egység</b></td><td><b>
Mennyiség</b></td><td><b>Leírás</b></td>");
  
while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
{
  {
    print ("<tr>");
    foreach ($row as $i=>$value)
    {
      print "<td>$value</td>";
    }
    print "</tr>";
  }
}
print ("</table>");
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8" />
  <meta name="AUTHOR" content="Nagy &Aacute;d&aacute;m" />
  <meta name="MADE" content="info@nagyadamworks.com" />
  <meta name="DATE" content="2018.11.24." />
  <meta http-equiv="CONTENT-LANGUAGE" content="hungarian" />
  <title>Árucikkek listázása</title>
  <link rel="stylesheet" type="text/css" href="../css/styles.css" />
</head>
<body>

<div class="frame">

  <nav class="menu">
    <a class="menu-item" href="main.php">Kezdőoldal</a>
    <a class="menu-item" href="lists.php">Árucikkek listázása</a>
    <a class="menu-item" href="material_handl.php">Árucikk beérkeztetése/kiadása</a>
    <a class="menu-item" href="fastening_form.php">Új készlet felvétele</a>
    <a class="menu-item" href="deletion.php">Árucikk törlése</a>
  </nav>

  
  <div class="center">
  <div>
    <h1 style="text-align: center;">Aktuális raktárkészlet</h1>
    
    <table>
    <?php
      echo lists($conn);
    ?>
    </table>
    </div>
  </div>

  <div class="message">
    <form action="lists_di.php" method="post">
    <iframe name="Chat" src="answer.php" width="100%" height="250px" frameborder="0" framespacing="0" border="0" marginheight="0" marginwidth="0"></iframe>	
      <label for="textarea_id">Írj a üzenetet:</label><br />
      <textarea id="textarea_id" name="item"></textarea><br />
    
      <input type="submit" name="dispatch" Value="Küldés">
    </form>
  </div>

</div>

</body>
</html>