<?php
  session_start();
  include 'pripojeni/udaje.php';
  include 'pripojeni/pripojeni.php';
  $sqlDotaz = "SELECT * FROM zboziBarf";  
  $result = $conn->query($sqlDotaz);
  $conn->close(); 
  $j = 1;
  $produkty = array();
  $pocty = array();
  echo "<h2>Souhrn objednávky</h2>";
  
    while($row = $result->fetch_assoc())
    {
        if (!$_SESSION["produkt" . $j] == 0)
        {  
           echo  "<a href='index.php?stranka=detail&produkt=" . $row["detail"] . "'>" . $row["vyrobek"] . ":</a> " . $_SESSION["produkt" . $j] . " krát";
           echo "<br>";
           
           array_push($produkty, $row["vyrobek"]);
           array_push($pocty, $_SESSION["produkt" . $j]);
           //print_r($produkty);      
        }
        $j++;
    }
    //pole produktů a cen
    //print_r($produkty);
    //print_r($pocty);

if ($_POST["jmeno"] == null || $_POST["prijmeni"] == null || $_POST["email"] == null || $_POST["mesto"] == null || $_POST["ulice"] == null)
{
   echo "Špatně vyplněné údaje, prosím, vyplňte objednávku znovu.";
   echo "<br><br>";
   
   echo "<form method='post' action='index.php?stranka=nabidka'>
          <input type='submit' name='submit' value='Objednat znovu'>
          </form>";
}

else 
{
    echo "<h3>Děkujeme za Vaši objednávku na BarfShop.cz!!</h3>";
    $to = $_POST["email"];
    $subject = "Objednávka na stránkách www.barfujteUMufa.cz";
    $txt = "Vaše objednávka byla přijata.<br> Prosím neodepisujte na tuto e-mailovou adresu.";
    $headers = "Content-Type: text/html; charset=UTF-8";
    //headers =  . "From: hsmBarf@gmail.com" . "\r\n" . "CC: hsmBarf@gmail.com"

    if (mail($to,$subject,$txt,$headers))
    {
        echo "<p>Faktura bude odeslána přílohou do e-mailu a objednávky expedujeme do 2 - 5 pracovních dnů.</p>";
    
        echo "<br>";
        
    
        echo "<form method='post' action='index.php'>
          <input type='submit' name='submit' value='Domů'>
          </form>";
    }

    else 
    {
        echo "<p>Chyba při zpracování údajů, prosím, vyřiďte objednávku znovu.</p>";
    
        echo "<form method='post' action='index.php?stranka=nabidka'>
          <input type='submit' name='submit' value='Objednat znovu'>
          </form>";
    }
}
?>