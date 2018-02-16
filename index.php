<html>
<title>BarfShop</title>
<head runat="server">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Styly/styly.css"/>
    <title>Barf</title>
</head>
<body id="telo">
          <h1>Barfujte s námi</h1>
     <div id='NavigaceT'>
          <nav>
            <a href='index.php?stranka=domu'>Domů</a>
            <a href='index.php?stranka=kontakt'>Kontakt</a>
            <a href='index.php?stranka=coetobarf'>Proč zrovna Barf?</a>
            <a href='index.php?stranka=nabidka'>Naše nabídka</a>
            <a href='index.php?stranka=trasy'>Trasy</a>
            <a href='index.php?stranka=novinky'>TOP</a>
          </nav>
     </div>
     
     <div id='obsahKontakt'>
					<?php
						if (isset($_GET['stranka']))
							$stranka = $_GET['stranka'];
						else
							$stranka = 'domu';
						if (preg_match('/^[a-z0-9]+$/', $stranka))
						{
							$vlozeno = include('podstranky/' . $stranka . '.php');
							if (!$vlozeno)
								echo('Podstránka nenalezena');
						}
						else
							echo('Neplatný parametr.');
					?>
     </div>
     <a href='http://www.dopsimisky.eu/'><img id='banner' src='img/reklama.jpg' alt='Banner Image'/></a>

</body>
</html>