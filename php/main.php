<?php
include "db.inc";
logincheck();
if (!($connection=@mysqli_connect($hostName, $username, $password))) showerror();

if (!mysqli_select_db($connection,$databaseName)) showerror();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8" />
  <meta name="AUTHOR" content="Nagy &Aacute;d&aacute;m" />
  <meta name="MADE" content="info@nagyadamworks.com" />
  <meta name="DATE" content="2018.11.24." />
  <meta http-equiv="CONTENT-LANGUAGE" content="hungarian" />
  <title>Kezdőoldal</title>
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
      <h1>Raktárkészlet nyilvántartás</h1>		
      <p>Kedves Kolléga!
      Üdvözölek a raktárkészlet kezelő alkalmazás nyitóoldalán!</p>		
      <h2>További tudnivalók:</h2>
      <p>A fenti menüpontok közül választva az alábbi feladatokat tudod elvégezni:</p>		
      <ul>
        <li>Kezdőoldal: ez az oldal ahol most vagy.</li>
        <li>Raktárkészlet: itt tudod megjeleníteni a raktárkészletet.</li>
        <li>Anyagmozgás: itt tudsz árubeérkezést vagy árukiadást rögzíteni.</li>
        <li>Új készlet felvétele: itt tudsz új készletet felvenni.</li>
        <li>Árucikk törlés: itt tudsz árucikket törölni.</li>
      </ul>
    </div>
  </div>

  <div class="message">
    <form action="main_di.php" method="post">
    <iframe name="Chat" src="answer.php" width="100%" height="240px" frameborder="0" framespacing="0" border="0" marginheight="0" marginwidth="0"></iframe>	
      <label for="textarea_id">Írj a üzenetet:</label><br />
      <textarea id="textarea_id" name="item"></textarea><br />
    
      <input type="submit" name="dispatch" Value="Küldés">
    </form>
  </div>

</div>

</body>
</html>