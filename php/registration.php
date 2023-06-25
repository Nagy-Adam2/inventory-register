<?php
include "db.inc";
if (!($connection=@mysqli_connect($hostName, $username, $password))) showerror();
if (!mysqli_select_db($connection, $databaseName)) showerror();

function user_name_control($input,$connection)
{
  clean($input,8);
  
  mysqli_query($connection,"SET NAMES utf8");
  $query = "SELECT * FROM user WHERE user_name='$input'";

  if(!($result=@mysqli_query($connection,$query)))showerror();

  if (mysqli_num_rows($result) !=0)
    return 0;
  else 
    return 1;
}

$error=0;
$one =(isset($_POST['one']))? $_POST['one']=1:0;

if (empty($_POST['user_name']) || empty($_POST['full_name']) || empty($_POST['reg_condit']) || empty($_POST['email']) ) 
{
  $error = 1;
  if (empty($_POST['user_name']))
  {
    $errorlist[]='<p class="error">Nem adta meg a felhasználói nevét!</p>';
  }	
  if (empty($_POST['full_name']))
  {	
    $errorlist[]='<p class="error">Nem adta meg a teljes nevét!</p>';
  }
    if (empty($_POST['reg_condit']))
  {	
    $errorlist[]='<p class="error">Nem fogadta el a regisztrációs feltételt!</p>';
  }

}

if (strcmp($_POST['password1'],$_POST['password2'] ) || empty($_POST['password1']))
{
  $error=1;
  $errorlist[]='<p class="error">Nem adott meg jelszót vagy azok nem egyeznek!</p>';
}

if (!user_name_control($_POST['user_name'],$connection))
{
  $errorlist[]='<p class="error">Már létező felhasználói név, válasszon másikat!</p>';
  $_POST['user_name']='';
  $error=1;
}

if ($error==0)
{
  if (!mysqli_select_db($connection, $databaseName)) showerror();
  clean($_POST['password1'],15);
  $password=md5($_POST['password1']);
  $date=date('Y'.'m'.'d');
  
  clean($_POST['user_name'],8);
  clean($_POST['full_name'],30);
  clean($_POST['email'],30);
  mysqli_query($connection,"SET NAMES utf8");
  
  $insert_into = "INSERT INTO user VALUES ('$_POST[user_name]','$_POST[full_name]','$_POST[email]','$password','$date')";
  if(!($result=@mysqli_query($connection,$insert_into)))
    print("Nem sikerült a felvitel");
  else
    header("Location: ../index.php");
}


if ($error != 0)
{
  print('<h1 class="header">Regisztráció</h1>');
  
  
  if ($one==1)
    foreach ( $errorlist as $i => $value )
    {
      print ("$value");
    }

  echo '
  <div class="login">
    <p><span class="red">*: Kötelező mező!</span></p><br>
      <form method="post" action="'.$_SERVER['PHP_SELF'].'">
        <table>
          <tr>
            <td class="width"><p class="strong">Felhasználói név:*</p></td>
            <td><input type="text" name="user_name" value="'.$_POST['user_name'].'"size=30 maxlength=8></td>
          </tr>
          <tr>
            <td class="width"><p class="strong">Teljes név:*</p></td> 
            <td><input type="text" name="full_name" value="'.$_POST['full_name'].'"size=30 maxlength=30></td>
          </tr>
          <tr>
            <td class="width"><p class="strong">E-mail cím:*</p></td>
            <td><input type="text" name="email" value="'.$_POST['email'].'" size=30 maxlength=30></td>
          </tr>
          <tr>
            <td class="width"><p class="strong">Jelszó:*</p></td>
            <td><input type="password" name="password1" size=30 maxlength=15></td>
          </tr>
          <tr>
            <td class="width"><p class="strong">Jelszó mégegyszer:*</p></td>
            <td><input type="password" name="password2" size=30 maxlength=15></td>
          </tr>
        </table>
        <p class="strong"><input name="reg_condit" class="regist" type="checkbox" value="elfogad"'.($_POST['reg_condit'] == "elfogad" ? ' checked' : '').'>Elfogadom a regisztrációs feltételeket!	 (A regisztrációhoz szükséges)</p>
        <input type="hidden" name="one" value="'.$_POST['one'].'">	
        <p><input name="kuldes" type="submit" value="Küldés"></p>
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
  <title>Regisztrálás a raktárkészlet felületére</title>
  <link rel ="stylesheet" href="../css/styles.css">
</head>
<body>
</body>
</html>