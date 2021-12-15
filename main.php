<?php
	echo "strona główna - main.php";
	
	session_start();
	
	if(!isset($_SESSION['zalogowany'])) // jeśli wejdziemy na stronę główną a nie jesteśmy zalogowani ....
	{
		header('Location: index.php'); // wypierdalaj na index.php
		exit();
	}
?>
	
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>E-nurse - strona główna</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>

    <?php	
		echo "<p>Witaj ".$_SESSION['username'].'! [ <a href="logout.php">Wyloguj się </a>]</p>';	
	?>	
	
	<div id="container">
		<div id="header">
		
		
		</div>	
		
		<div id="nav">
		
		
		</div>	
		<div id="left">
		
		
		</div>	
		<div id="content">
		
		
		</div>	
		<div id="footer">
		
		
		</div>		
	</div>
</body>
</html>


	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
