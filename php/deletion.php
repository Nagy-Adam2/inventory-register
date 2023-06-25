<?php

include "db.inc";
logincheck();
if (!($connection=@mysqli_connect($hostName, $username, $password))) showerror();

if (!mysqli_select_db($connection,$databaseName)) showerror();

include('connection.php');
$conn;
Connect($conn);

function deletion ($conn, $commodity_id)
{

  $commodity_id = mysqli_real_escape_string($conn, $_POST["commodity_id"]);
  $value = "SELECT commodity_id FROM commodity WHERE commodity_id = ".$commodity_id;
  $control = mysqli_query($conn,$value) or die(print("Nem tudtam az utasítást végrehajtani! A hiba oka: ". mysqli_error($conn)));

  if(mysqli_num_rows($control)!=0 && $commodity_id == isset($value)) {
    $comm = "DELETE FROM commodity WHERE commodity_id='".$commodity_id."';";
    $eredmeny = mysqli_query($conn,$comm) or die(print("Nem tudtam az utasítást végrehajtani! A hiba oka: ". mysqli_error($conn)));
    print('<p class="center strong">'.$commodity_id.'-s id sikeres törölése az adatbázisból!</p><br /><p class="center strong">Pár másodperc múlva frissíti az oldalt!</center></p>');
    $page = $_SERVER['PHP_SELF'];
    $sec = "5";
    header("Refresh: $sec; url=$page");
  } else {
    print('<p class="center strong">'.$commodity_id.'-s id azonositójú arucikk nem létezik az adatbázisban!</p><br /><p class="center strong">Pár másodperc múlva frissíti az oldalt!</p>');
    $page = $_SERVER['PHP_SELF'];
    $sec = "5";
    header("Refresh: $sec; url=$page");
  }
  
  mysqli_close($conn);
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
  <title>Árucikk törlése</title>
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
  
      <?php if(!isset($_POST['commodity_id'])): ?>
      <form action="deletion.php" method="POST" class="form">
        <label><h1>Termék törlése az adatbázisból</h1></label>
        <label class="igazit">Árucikk azonositó: <input type="number" name="commodity_id" required></label>
        <label><input type="submit" value="Törlés"></label>
      </form>
      <?php	
      else:   
      echo deletion($conn, $_POST['commodity_id']);
      endif;
      ?>
  
    </div>
  </div>

  <div class="message">
    <form action="deletion_di.php" method="post">
    <iframe name="Chat" src="answer.php" width="100%" height="250px" frameborder="0" framespacing="0" border="0" marginheight="0" marginwidth="0"></iframe>	
      <label for="textarea_id">Írj a üzenetet:</label><br />
      <textarea id="textarea_id" name="item"></textarea><br />
    
      <input type="submit" name="dispatch" Value="Küldés">
    </form>
  </div>

</div>

</body>
</html>