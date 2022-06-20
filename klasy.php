<?php
	echo "strona główna - main.php";
	
	session_start();
	
	if(!isset($_SESSION['zalogowany'])) // jeśli wejdziemy na stronę główną a nie jesteśmy zalogowani ....
	{
		header('Location: /front/index.php'); // wypierdalaj na index.php
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
		
		//$school_id = $_GET['school_id'];		
		
		//echo "Wybrałeś szkołę o id =" . $school_id . " ";
		
		// dodatkowy warunek do zaimplemenotwania w przyszłości : jeśli zmienna $x jest nieustawiona, wróć do wyboru szkoły.php		
		
		//echo '<br><a href="main.php?school_id='.$school_id.' ">Strona główna</a> ';
		
		//echo '<a href="klasy.php?school_id='.$school_id.' ">Klasy</a><br>';		
				
	?>	
	
	<div id="container">
	
		<div id="header">
			header		
		
		</div>	
		
		<div id="nav">
			<?php
				echo '<a href="front/main.php">Strona główna</a><br>';
				echo '<a href="klasy.php">Klasy</a><br>';
				echo '<a href="dziennik.php">Dziennik codzienny</a><br>';
			?>
		
		</div>	
		
		<!--<div id="left">
			left
		
		</div>-->
		
		<div id="content">
			<!--content-->
			<?php
				require_once "connect_edziennik.php";		
				
				//echo "<p>Witaj ".$_SESSION['imie']." ".$_SESSION['nazwisko'].'! [ <a href="logout.php">Wyloguj się </a>]</p>';	
				
				$conn = @new mysqli($servername, $username, $password, $dbname);

				$school_id = $_SESSION['school_id'];


				if($conn->connect_errno!=0)
				{
					/*echo "Błąd połączenia".@conn->connect_errno." = ".conn->connect_error;*/
					echo "Błąd połączenia".$conn->connect_errno()."\n";
				}
				else
				{					
					$sql = "SELECT * FROM class WHERE Id_School = $school_id";					

					$result = $conn->query($sql);
				
					if($result) 
					{
						$number_of_rows = $result->num_rows;
						
						if($number_of_rows>0)
						{				
							while($row = $result->fetch_assoc())
							{						
								//echo '<br><a href="klasa.php?class_id='.$row['Id'].'&school_id='.$school_id.'">';										
								
								echo '<div id=class_div>';
									echo '<a href="klasa.php?class_id='.$row['Id'].'">';								
										echo $row["Class"];
									echo '</a><br>';	
								echo '</div>';
								//echo "<br>";
							}				
						}
						
						else 
						{ 
							echo "<br>[ brak ]";						
						}       
					}
					
					$conn->close();
				}	
			?>
			
		</div>	
		
		<div id="footer">	
			footer		
		</div>	
		
	</div>
</body>
</html>


	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
