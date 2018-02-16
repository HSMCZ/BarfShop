<?php
include 'pripojeni/udaje.php';

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
     
<h2>Detail produktu</h2>

<?php
    $sqlDotaz = "SELECT * FROM zboziBarf WHERE detail='" . $_GET["produkt"] . "'";
    
    $result = $conn->query($sqlDotaz);
    $i = 0;

if ($result->num_rows > 0) 
{
    // output data of each row
    echo "<table width='500' border='0' cellpadding='5'>
          <tr>";
    while($row = $result->fetch_assoc()) 
    {
    
        echo "<img style='float: left; padding-bottom: 15pt; padding-right: 15pt;' src='" . $row["img_path"] . "'/>";
        echo "<p style='padding-left: 30%;'>" . $row["popis"] . "";
        echo "<p >Cena:" . $row["cena"] . "<b> za Kilogram</b></p>";
        echo "<br></br>";
        /*                
        echo "<p style='padding: 5px;'>Selečí maso je velmi jemné. Obsahuje méně tuku než vepřové maso a je bohatým zdrojem především vitamínů skupiny B, draslíku a kolagenu.</p>";
        echo "<p style='padding: 5px;'> Je vhodné zejména v období zimních měsíců. Obsahuje viditelně bílé kousky – kousky kůží, nikoliv tuku.</p>";
        */
            /*
            $row["img_path"] $row["vyrobek"] $row["cena"] $row["ID"] $row["skladem"]
            */
        
    }
}
?>