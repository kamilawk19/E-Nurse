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
		
		//$school_id = $_GET['school_id'];
		$school_id = $_SESSION['school_id'];
		$student_id = $_GET['student_id'];
		$class_id = $_GET['class_id'];
		
			//echo $x;
		
		echo "Wybrałeś szkołę o id =" . $school_id . "<br>";
		echo "Wybrałeś ucznia o id =" . $student_id . "<br>";
		echo "Wybrałeś klasę o id =" . $class_id . " ";
		
		
				// dodatkowy warunek do zaimplemenotwania w przyszłości : jeśli zmienna $x jest nieustawiona, wróć do wyboru szkoły.php		
				
			/*echo '<br><a href="main.php?school_id='.$x.' ">Strona główna</a>';
			
			echo ' <a href="klasy.php?school_id='.$x.' ">Klasy</a>';
			
			echo ' <a href="dziennik.php?school_id='.$x.' ">Dziennik codzienny</a>';*/
			
			
		// połącz się z e-dziennikiem
		// zdobądź numer klasy na podstawie id (funkcja sqla)
			
			
			
		//	
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
	?>	
	
	<div id="container">
	
		<div id="header">
			header		
		
		</div>	
		
		<div id="nav">			
			
			<?php
				echo '<a href="main.php?school_id='.$school_id.' ">Strona główna</a><br>';
				echo '<a href="klasy.php?school_id='.$school_id.' ">Klasy</a><br>';
				echo '<a href="dziennik.php?school_id='.$school_id.' ">Dziennik codzienny</a><br>';
			?>		
			
		</div>	
		
		<!--<div id="left">
			left
		
		</div>-->
		
		<div id="content">
			
			<?php			
			
				// POBIERZ ID KARTY ZDROWIA dla tego ucznia : 
				require_once "connect.php";				
			
				$conn = @new mysqli($servername, $username, $password, $dbname);		

				if($conn->connect_errno!=0)
				{			
					echo "Błąd połączenia".$conn->connect_errno()."\n";
				}
				else
				{					
					$get_kzu_id = "SELECT Id_Karty FROM kzu WHERE Id_Ucznia = $student_id";										

					$kzu_result = $conn->query($get_kzu_id);							

					if($kzu_result) // znaleziono kartę
					{
						$kzu_number_of_rows = $kzu_result->num_rows;
						
						if($kzu_number_of_rows>0)
						{										
							$row = $kzu_result->fetch_assoc();										
							
							$id_karty = $row['Id_Karty'];	
							echo "id_karty = ".$id_karty."<br><br>";
						}
						
						else 
						{										
							echo "[ brak karty zdrowia ]<br>";
							exit();
						}   		
					}
				}
				
				$conn->close();
				
			?>
			

			<!-- na podstawie numeru klasy, formularz dodawania badania będzię się różnić : -->			
			<?php				
				require_once "connect_edziennik.php";				
				
				$conn = @new mysqli($servername, $username, $password, $dbname);		

				if($conn->connect_errno!=0)
				{			
					echo "Błąd połączenia".$conn->connect_errno()."\n";
				}
				else
				{					
					$get_class_number = "SELECT Class, REGEXP_SUBSTR(Class, '[0-9]+') AS numer_klasy FROM class WHERE Id=$class_id";							
					$kzu_result = $conn->query($get_class_number);							

					if($kzu_result) // znaleziono kartę
					{
						$kzu_number_of_rows = $kzu_result->num_rows;
						
						if($kzu_number_of_rows>0)
						{										
							$row = $kzu_result->fetch_assoc();										
							
							$numer_klasy = $row['numer_klasy'];	
							echo "numer_klasy = ".$numer_klasy."<br><br>";
						}
						
						else 
						{										
							echo "[ brak karty zdrowia ]<br>";
							exit();
						}   		
					}
				}
				
				$conn->close();
				
				echo '<a href="">Wpis do dziennika codziennego</a><br><br>';				
				
				echo "-----------------------------------------------------------------<br>";
				
				echo "Badanie przesiewowe : <br><br>";
				
				echo '<a href="dodaj_badanie.php?student_id='.$student_id.'&id_karty='.$id_karty.'&class_id='.$class_id.'">Badanie przesiewowe</a><br><br>';			
				
			?>
			
		</div>	
		
		<div id="footer">	
			footer		
			
			
		</div>	
		
	</div>
</body>
</html>


	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
