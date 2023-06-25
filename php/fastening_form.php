<?php
include "db.inc";
logincheck();
if (!($connection=@mysqli_connect($hostName, $username, $password))) showerror();

if (!mysqli_select_db($connection,$databaseName)) showerror();
?>

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
  
  <div class="center">
    <div>
      <h1>Új készlet rögzítése az adatbázisban</h1>
    
      <form action="fastening.php" method="POST">
        <table>
          <tr><td><label>Árucikk neve:</td> <td><input type="text" name="commodity_name" required></label></td></tr>		
          <tr><td><label>Mennyiségi egység:</td> <td><input type="text" name="amount_unit" required></label></td></tr>
          <tr><td><label>Mennyiség:</td> <td><input type="number" name="amount" required></label></td></tr>
          <tr><td><label>Leírás:</td> <td><input type="text" name="description" required></label></td></tr>			
          <tr><td colspan="2"><input type="submit" value="Mentés"></td></tr>
        </table>
      </form>	
    </div>	
  </div>
    
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