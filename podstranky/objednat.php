<?php
if (!isset($_SESSION))
  {
    session_start();
  }

include 'pripojeni/udaje.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $databaze);

// Create connection
$pripojeni = mysqli_connect($servername, $username, $password);

// Check connection
if (!$pripojeni) 
{
   header('Location: ' . $newURL . '?stranka=error');
   die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
mysqli_set_charset($pripojeni,"utf8");

    $sqlDotaz = "SELECT * FROM zboziBarf";
    
    $result = $conn->query($sqlDotaz);
    $i = 0;
    
$conn->close();   

?>

<h2>Vaše objednávka</h2>
      
<?php
  
  if ($result->num_rows > 0) 
  {
    $i = 1;
    $j = 1;
    $kosik = 0;
    //Test týhle hovadiny session
    //$_SESSION["Test"] = "TestovacíString";
    while($row = $result->fetch_assoc())
    {
        if(isset ($_POST["kus" . $i]))
          {
            $_SESSION["produkt" . $j] = $_POST["kus" . $i];
          }
          
        if (!$_SESSION["produkt" . $j] == 0)
        {          
          echo  "<a href='index.php?stranka=detail&produkt=" . $row["detail"] . "'>" . $row["vyrobek"] . ":</a> " . $_SESSION["produkt" . $j] . " krát";
          echo "<br>";          
          $kosik++;
        }
        $i++;
        $j++;
    }
       
      echo "<br>";
  
  
  if ($kosik <= 0)
  {
      echo "Košík je prázdný!";
      echo "<br><br>";
      echo "<form method='post' action='index.php?stranka=nabidka'>
            <input type='submit' name='submit' value='Objednat znovu'>        
            </form>";
  }
  
  else
  {
      echo "<form method='post' action='index.php?stranka=udaje'>
            <input type='submit' name='submit' value='K objednávce'>        
            </form>";
            
      echo "<form method='post' action='index.php?stranka=nabidka'>
            <input type='submit' name='submit' value='Objednat znovu'>        
            </form>";
  }
}
?>