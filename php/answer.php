<?php
include "db.inc";
logincheck();
if (!($connection=@mysqli_connect($hostName, $username, $password))) showerror();

if (!mysqli_select_db($connection,$databaseName)) showerror();
?>

<html lang="hu">
<head>
  <meta charset="UTF-8" />
  <meta name="AUTHOR" content="Nagy &Aacute;d&aacute;m" />
  <meta name="MADE" content="info@nagyadamworks.com" />
  <meta name="DATE" content="2018.11.24." />
  <meta http-equiv="CONTENT-LANGUAGE" content="hungarian" />
  <script type="text/javascript" src="../js/script.js"></script>
</head>
<body onLoad="refresh(true)">
<?php
include('connection.php');
$conn;
Connect($conn);
$conn or die ("Hibás csatlakozás!");
mysqli_query($conn,'SET NAMES UTF-8');
mysqli_query($conn,"SET character_set_results=UTF-8");
mysqli_set_charset($conn,'UTF-8');
  if (mysqli_select_db($conn,'cellarage')) {
    $sql="SELECT * FROM message ORDER BY `id` DESC";
    $res=mysqli_query($conn, $sql) or die ('Hibautasítás!');
    echo '<div id="chat">';
    echo '<table border=0>';
    echo '<tr>';
    echo '<th>Üzenetek:</th>';
    echo '</tr>';
    while (($current_row=mysqli_fetch_assoc($res))!= null) {
    echo'<tr>';
    echo'<td>'.$current_row["messages"].'</td>';
    echo'</tr>';
    }
    echo '</table>';
    echo '</div>';
    mysqli_free_result($res);
  }else{
    die ('Nem sikerült csatlakozni az adatbázishoz.');
  }
  mysqli_close($conn);
?>
</body>
</html>