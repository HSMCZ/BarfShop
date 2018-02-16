<?php
  session_start();
  include 'pripojeni/udaje.php';
  include 'pripojeni/pripojeni.php';
  $sqlDotaz = "SELECT * FROM zboziBarf";  
  $result = $conn->query($sqlDotaz);
  $conn->close(); 
  $j = 1;
  echo "<h2>Souhrn objednávky</h2>";
  
    while($row = $result->fetch_assoc())
    {
        if (!$_SESSION["produkt" . $j] == 0)
        {            
           echo  "<a href='index.php?stranka=detail&produkt=" . $row["detail"] . "'>" . $row["vyrobek"] . ":</a> " . $_SESSION["produkt" . $j] . " krát";
           echo "<br>";          
        }
        $j++;
    }
?>

<h2>Zadejte údaje k doručení</h2>
     
      <form method="post" action="index.php?stranka=potvrzeni">  
        Jméno: <input type="text" name="jmeno" value="">
        <br><br>
        Příjmení: <input type="text" name="prijmeni" value="">
        <br><br>
        E-mail: <input type="text" name="email" value="">
        <br><br>
        Město: <input type="text" name="mesto" value="">
        <br><br>
        Ulice a č.p.: <input type="text" name="ulice" value="">
        <br><br>
        Poznámky: <textarea name="comment" rows="5" cols="40"></textarea>
        <br><br>
        
        <a href="index.php?stranka=trasy"><b>Trasa:</b></a>
        <br>
        <input type="radio" name="trasa" value="TrasaA">Trasa A
        <br>
        <input type="radio" name="trasa" value="TrasaB">Trasa B
        <br>
        <input type="radio" name="trasa" value="TrasaC">Trasa C
        <br>
        <input type="radio" name="trasa" value="TrasaD">Trasa D
        
        <br><br>
        
        <input type="submit" name="submit" value="Odeslat">
          
      </form>
      
      <form method="post" action="index.php?stranka=nabidka">
        <input type="submit" name="submit" value="Objednat znovu">        
     </form>