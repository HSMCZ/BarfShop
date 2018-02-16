<?php 
//$GLOBALS['pocetKusu1'] = 6;
$newURL = "index.php";
$servername = "localhost";
$username = "civrny";
$password = "Martas83";
$databaze = "civrny";

//$nazvyProduktů = array("Volvo", "BMW", "Toyota");
//$IDProduktů = array("Volvo", "BMW", "Toyota");

// Create connection
$conn = new mysqli($servername, $username, $password, $databaze);

// Create connection
$pripojeni = mysqli_connect($servername, $username, $password);

// Check connection
if (!$pripojeni) 
{
   //header('Location: ' . $newURL . '?stranka=error');
   die("Connection failed: " . mysqli_connect_error());
   echo mysqli_connect_error(); 
}

mysqli_set_charset($conn,"utf8");
mysqli_set_charset($pripojeni,"utf8");
  
?>
     
<a>Zde naleznete každý týden trojici <b>NEJ</b> zboží</a>
     
<?php
    $sqlDotaz = "SELECT * FROM zboziBarf ORDER BY koupeno DESC LIMIT 3";
    
    
    $result = $conn->query($sqlDotaz);
    $i = 0;

if ($result->num_rows > 0) 
{
    // output data of each row
    echo "<table width='500' border='0' cellpadding='5'>
          <tr>";
    while($row = $result->fetch_assoc()) 
    {
    
        echo "<td align='center' valign='center'>
            <img src='" . $row["img_path"] . "' alt='" . $row["vyrobek"] . "' />
            <br />
            <a>" . $row["vyrobek"] . " " . $row["cena"] . " Kč/kg</a>
            <br>
            <a class='koupeno'>Uživatelů koupilo: " . $row["koupeno"] . "</a>
            <br />
        </td>";
        
        if ($i++ == 2) 
        {
          echo '</tr><tr>';
        }
    }
    echo "</table>";
        
}

else 
{
    echo "0 results";
}


$conn->close();   
?>
   
<br>  
<a class="cenyDPH" >Ceny jsou uváděny s DPH</a>
    
</div>