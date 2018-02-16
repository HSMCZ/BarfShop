<?php 
// Druh navázání spojení
$conn = new mysqli($servername, $username, $password, $databaze);

// Druh navázání spojení
$pripojeni = mysqli_connect($servername, $username, $password);

// Kontrola spojení s DB
if (!$pripojeni) 
{
   header('Location: ' . $newURL . '?stranka=error');
}

mysqli_set_charset($conn,"utf8");
mysqli_set_charset($pripojeni,"utf8");
  
?>