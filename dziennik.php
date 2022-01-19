<?php
	echo "dziennik codzienny - dziennik.php";
	
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
	
	<div id="container">
	
		<div id="header">
			header		
		
		</div>	
		
		<div id="nav">			
		
		</div>	
		
		<!--<div id="left">
			left
		
		</div>-->
		
		<div id="content">
			<?php	
				echo "<p>Witaj ".$_SESSION['imie']." ".$_SESSION['nazwisko'].'! [ <a href="logout.php">Wyloguj się </a>]</p>';	
				
				$school_id = $_GET['school_id'];
				
				//echo $x;
				
				echo "Wybrałeś szkołę o id =" . $school_id . " ";
				
				// dodatkowy warunek do zaimplemenotwania w przyszłości : jeśli zmienna $x jest nieustawiona, wróć do wyboru szkoły.php		
				
				echo '<br><a href="main.php?school_id='.$school_id.' ">Strona główna</a>';
				
				echo ' <a href="klasy.php?school_id='.$school_id.' ">Klasy</a>';
				
				echo ' <a href="dziennik.php?school_id='.$school_id.' ">Dziennik codzienny</a>';
				
				
				require_once "connect.php";		
				
				//echo "<p>Witaj ".$_SESSION['imie']." ".$_SESSION['nazwisko'].'! [ <a href="logout.php">Wyloguj się </a>]</p>';	
				
				$conn = @new mysqli($servername, $username, $password, $dbname);	

				if($conn->connect_errno!=0)
				{
					/*echo "Błąd połączenia".@conn->connect_errno." = ".conn->connect_error;*/
					echo "Błąd połączenia".$conn->connect_errno()."\n";
				}
				else
				{	
					$sql = "SELECT * FROM dziennik WHERE Id_Szkoly = $school_id";		

					$result = $conn->query($sql);
					
					if($result) 
					{
						$number_of_rows = $result->num_rows;
						
						echo "<br><br><b>Dziennik codzienny :</b>";
						
						if($number_of_rows>0)
						{
							//$row = $result->fetch_assoc();
							
							echo "<br>";
							
							while($row = $result->fetch_assoc())
							{
								echo "<br>";
								echo $row["Id_Wpisu"] . " " . $row["Data"] . " " . $row["Id_Ucznia"] . $row["Id_Szkoly"] . " " . $row["Opis_Zdarzenia"] . " " . $row["Co_Podano"] . $row['Nurse_Id'] . "<br>" ;										
							}									
						}
						
						else 
						{ // nie znaleziono rekordów w bd
								
							//$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';	
							//header('Location: index.php');
							echo "[ brak ]";
								
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


	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
