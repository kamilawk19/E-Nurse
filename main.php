<?php
	echo "strona główna - main.php";
	
	session_start();
	
	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php'); 
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
		echo "<p>Witaj ".$_SESSION['imie']." ".$_SESSION['nazwisko'].'! [ <a href="logout.php">Wyloguj się </a>]</p>';	
		
		$x = $_GET['school_id'];
		
		//echo $x;
		
		echo "Wybrałeś szkołę o id =" . $x . " ";
		
			// dodatkowy warunek do zaimplemenotwania w przyszłości : jeśli zmienna $x jest nieustawiona, wróć do wyboru szkoły.php		
			
		/*echo '<br><a href="main.php?school_id='.$x.' ">Strona główna</a>';
		
		echo ' <a href="klasy.php?school_id='.$x.' ">Klasy</a>';
		
		echo ' <a href="dziennik.php?school_id='.$x.' ">Dziennik codzienny</a>';*/
	?>	
	
	<div id="container">
	
		<div id="header">
			header		
		
		</div>	
		
		<div id="nav">			
			
			<?php
				echo '<a href="main.php?school_id='.$x.' ">Strona główna</a><br>';
				echo '<a href="klasy.php?school_id='.$x.' ">Klasy</a><br>';
				echo '<a href="dziennik.php?school_id='.$x.' ">Dziennik codzienny</a><br>';
			?>
			
			
			
		</div>	
		
		<!--<div id="left">
			left
		
		</div>-->
		
		<div id="content">
			content
		
			
		</div>	
		
		<div id="footer">	
			footer		
		</div>	
		
	</div>
</body>
</html>


	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
