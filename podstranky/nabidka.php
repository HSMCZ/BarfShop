<meta charset="UTF-8">
<?php 
include 'pripojeni/udaje.php';
include 'pripojeni/pripojeni.php';
?>
     
<h2>Naše nabídka</h2>
  
<form method="post" action="index.php?stranka=objednat">
  <?php
    $sqlDotaz = "SELECT * FROM zboziBarf";
    
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
            <a href='index.php?stranka=detail&produkt=" . $row["detail"] . "'>" . $row["vyrobek"] . "</a><a> " . $row["cena"] . " Kč/kg</a>
            <br>
            <input type='number' min='0' max='" . $row["skladem"] . "' value='0' name='kus" . $row["ID"] . "'>
            <br />
            <a>" . $row["skladem"] . " kusů skladem</a>
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
    echo "Chyba v databázi";
}


$conn->close();   
  ?>
  
  <br> 
     <input type="submit" name="submit" value="OBJEDNAT">
</form>
                                                            
<br>    
<a class="cenyDPH" >Ceny jsou uváděny s DPH</a>

<?php
/*
if (isset($_GET['stranka']))

							$stranka = $_GET['stranka'];
              
						else
							$stranka = 'error';
              
						if (preg_match('/^[a-z0-9]+$/', $stranka))
						{
							//$vlozeno = include('podstranky/' . $stranka . '.php');
              header("Location: index.php?stranka=" . $row["stranka"] ."");
							if (!$vlozeno)
								echo('Podstránka nenalezena');
						}
						else
							echo('Neplatný parametr.');
*/
?>