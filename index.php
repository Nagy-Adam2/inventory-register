<?php
include "php/db.inc";
$user = clean($user,8);
$password = clean($password,30);
session_start();
$error=0;
$one =(isset($_POST['one']))? $_POST['one']=1:0;

if (empty($_POST['user']) || empty($_POST['password']))
{
  $error = 1;
  
  if (empty($_POST['user']))
  {
      $errorlist[]='<p class="error">Nem adta meg a felhasználói nevét!</p>';
  }	
  if (empty($_POST['password']))
  {	
      $errorlist[]='<p class="error">Nem adta meg a jelszavát!</p>';
  }
}
else
{
  if (!($connection=@mysqli_connect($hostName, $username, $password))) showerror();

  if (!mysqli_select_db($connection, $databaseName))showerror();
  
  mysqli_query($connection,"SET NAMES utf8");
  
  clean($_POST['user'],8);
  
  $query ="SELECT user_name, password FROM user WHERE user_name='$_POST[user]'";

  if(!($result=@mysqli_query($connection,$query))) showerror();

  if (mysqli_num_rows($result) == 0)
  {
      $_POST['password']='';
      
      header("Location: php/registration.php");
  }
  else
  {	
    $row= @mysqli_fetch_array($result);

    if (md5($_POST['password'])!= $row['password'])
    {
        $error=1;
        $errorlist[]=('<p class="error">Rossz jelszót adott meg! Kérem gépelje be újra!</p>');
        $_POST['password']='';
    }
    else
    {

        if(!isset($_SESSION['user']))

        $_SESSION['user'] = $_POST['user'];			
        header("Location: php/main.php");
    }
  }
}

if ($error != 0)
{
  print('<div class="header"><h1>Belépés</h1></div>');
  if ($one==1)
    foreach ( $errorlist as $i => $value )
      {
        print ("$value");
      }

  echo '
  <div class="login">		
    <form name="form" method="post" action="'.$_SERVER['PHP_SELF'].'">
    
      <h1>Bejelentkező űrlap</h1>
      <p>Amennyiben még nem regisztált felhasználónk, kérem kattintson <a href="php/registration.php">IDE!</a><br />
      <span class="red">*: Kötelező mező!</span></p><br />
      
      <label><span class="small">Felhasználói név:*</span></label>	
      <input type="text" name="user" value="'.$_POST['user'].'"size=10 maxlength=8>
  
      <label><span class="small">Jelszó:*</label></span>
      <input type="password" name="password" value="'.$_POST['password'].'" size=10 maxlength=30>
  
      <button type="submit"> Belépés </button>
  
      <input type="hidden" name="one" value="'.$_POST['one'].'">
      <div class="spacer"></div>

    </form>	
  </div>
  ';
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="AUTHOR" content="Nagy &Aacute;d&aacute;m" />
  <meta name="MADE" content="info@nagyadamworks.com" />
  <meta name="DATE" content="2018.11.24." />
  <meta http-equiv="CONTENT-LANGUAGE" content="hungarian" />
  <title>Belépés a raktárkészlet felületére</title>
  <link rel ="stylesheet" href="css/styles.css">
</head>
<body>
</body>
</html>