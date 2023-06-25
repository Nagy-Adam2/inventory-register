<?php

include "db.inc";
logincheck();
if (!($connection=@mysqli_connect($hostName, $username, $password))) showerror();

if (!mysqli_select_db($connection,$databaseName)) showerror();

include('connection.php');
$conn;
Connect($conn);

function amount($conn, $item, $amo) 
{
  
  $comm = "SELECT * FROM commodity WHERE commodity_id=".$item;
  $control = mysqli_query($conn,$comm) or die(print("Nem tudtam az utasítást végrehajtani! A hiba oka: ". mysqli_error($conn)));
  
  if(mysqli_num_rows($control)!=0)
  {
    $comm = "update commodity set amount=amount+".$amo." where commodity_id=".$item;
    $result = mysqli_query($conn,$comm) or die(print("Nem tudtam az utasítást végrehajtani! A hiba oka: ". mysqli_error($conn)));
    print ('<p class="center strong"> A rögzítés megtörtént!</p><br /><p class="center strong">Pár másodperc múlva frissíti az oldalt!</p>');
    $page = $_SERVER['PHP_SELF'];
    $sec = "5";
    header("Refresh: $sec; url=$page");
  }
  else print ('<p class="center strong"> Nincs ilyen azonosítójú árucikk!</p><br /><p class="center strong">Pár másodperc múlva frissíti az oldalt!</center></p>');
  $page = $_SERVER['PHP_SELF'];
  $sec = "5";
  header("Refresh: $sec; url=$page");
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
  <title>Árucikk beérkeztetése/kiadása</title>
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
      <?php if(!isset($_POST['item'])): ?>
      <form action="material_handl.php" method="POST">
        <table><h1>Árubeérkezés/árukiadás</h1>
          <p>Adja meg, hogy a rögziteni kívánt anyagmozgás melyik cikkhez tartozik és milyen darabszámmal.</p> 
          <p>Negatív darabszám anyagkiadást jelent.</p>
          <tr><td>Cikk azonosító:</td> <td><input type="number" name="item" required></td></tr>
          <tr><td>Mennyiség:</td> <td><input type="number" name="amo" required></td></tr>
          <tr><td colspan="2"><input type="submit" value="Rögzités"></td></tr>
        </table>
      </form>
      <?php
        else:
        amount($conn, $_POST['item'],$_POST['amo']);
        endif;
      ?>
    </div>
  </div>

  <div class="message">
    <form action="material_handl_di.php" method="post">
    <iframe name="Chat" src="answer.php" width="100%" height="250px" frameborder="0" framespacing="0" border="0" marginheight="0" marginwidth="0"></iframe>	
      <label for="textarea_id">Írj a üzenetet:</label><br />
      <textarea id="textarea_id" name="item"></textarea><br />
    
      <input type="submit" name="dispatch" Value="Küldés">
    </form>
  </div>

</div>

</body>
</html>