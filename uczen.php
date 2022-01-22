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
		echo "<p>Witaj ".$_SESSION['imie']." ".$_SESSION['nazwisko'].'! [ <a href="logout.php">Wyloguj się </a>]</p>';	
		
		$school_id = $_GET['school_id'];		
		
		echo "Wybrałeś szkołę o id =" . $school_id . " ";
		
		// dodatkowy warunek do zaimplemenotwania w przyszłości : jeśli zmienna $x jest nieustawiona, wróć do wyboru szkoły.php		
		
		/*echo '<br><a href="main.php?school_id='.$school_id.' ">Strona główna</a> ';
		
		echo '<a href="klasy.php?school_id='.$school_id.' ">Klasy</a><br>';*/
		
		
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
		echo "<p>Witaj ".$_SESSION['imie']." ".$_SESSION['nazwisko'].'! [ <a href="logout.php">Wyloguj się </a>]</p>';	
		
		$class_id = $_GET['class_id'];
		$school_id = $_GET['school_id'];
		$student_id = $_GET['student_id'];		
		
		echo "Wybrałeś szkołę o id =" . $school_id . "<br>";
		echo "Wybrałeś klasę o id =" . $class_id . "<br>";		
		echo "Wybrałeś ucznia o id =" . $student_id . "<br>";
		
		// dodatkowy warunek do zaimplemenotwania w przyszłości : jeśli zmienna $x jest nieustawiona, wróć do wyboru szkoły.php		
		
		/*echo '<br><a href="main.php?school_id='.$school_id.' ">Strona główna</a>';
		
		echo ' <a href="klasy.php?school_id='.$school_id.' ">Klasy</a>';*/	
	
		require_once "connect_edziennik.php";			
		
		$conn = @new mysqli($servername, $username, $password, $dbname);	

		if($conn->connect_errno!=0)
		{			
			echo "Błąd połączenia".$conn->connect_errno()."\n";
		}
		else
		{	
			//$sql = "SELECT * FROM student WHERE Id_User = $student_id";	
			/*$sql = "SELECT * FROM student 
					JOIN adress
					ON adress.Id = student.Adress_Id
					WHERE Id_User = $student_id";*/
					
			$sql = "SELECT First_Name, Second_Name, Last_Name, SUBSTR(Birth_Date, 1, 10) AS Birth_Date, Pesel, 
					Sex, Phone_Number, Email, Street, Bulding_Number, Flat_Number, City, Zip FROM student 
					JOIN adress
					ON adress.Id = student.Adress_Id
					WHERE Id_User = $student_id";							

			$result = $conn->query($sql);
			
			if($result) 
			{
				$number_of_rows = $result->num_rows;
				
				if($number_of_rows>0)
				{					
					echo "<br>";
					
					while($row = $result->fetch_assoc())
					{
						echo "<br>";									

						echo '<a href="klasa.php?school_id='.$school_id.'&class_id='.$class_id.'"> <- Powrót do listy klas </a><br><br>';
						echo "Informacje o uczniu <br><br>";
						echo "<b>dane osobowe : </b><br>";
					// ! UWZGLĘDNIAĆ ZGODE UCZNIA NA ŚWIADZCENIE USŁUG - wyświetlać tylko tych uczniów którzy sie zgodzili
						echo "Imię: ". $row["First_Name"] . " " . $row["Second_Name"] ."<br>";
						echo " Nazwisko: " . $row["Last_Name"] . "<br>";
						/*echo "Narodowość: " . $row["Nationality"] . " " .*/
						echo "Data urodzenia: " .$row["Birth_Date"] . "<br>" ;
						echo "Pesel: " . $row["Pesel"] . "<br>" ;
						echo "Płeć: " . $row["Sex"] . "<br>" ;
						echo "Adres: ul. " . $row["Street"] . " " . $row["Bulding_Number"] . "/" . $row["Flat_Number"] . " " . $row["City"] . " " . $row["Zip"] . "<br>";						
						echo "Telefon: " . $row["Phone_Number"] . "<br>";
						echo "e-mail: " .$row["Email"]. "<br>";
						echo '<br>';							
					}						
				}
				
				else 
				{ 
					echo "błąd";						
				}       
			}
			
			$conn->close();
		}		
		
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
		
		// PRZEBYTE CHOROBY : 
		
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
					echo "id_karty = $id_karty <br>";
				}
				
				else 
				{										
					echo "[ brak karty zdrowia ]";						
				}   		
			}					
			
			// CHOROBY
			if(isset($id_karty))
			{				
				$get_kzu_choroby = 
				"SELECT Id_Karty, kzu_choroby.Id_Choroby, Rok_Zycia, Rodzaj_Choroby, choroby.id_choroby, choroby.choroba 
				 FROM kzu_choroby 
				 JOIN choroby
				 ON kzu_choroby.Id_Choroby = choroby.id_choroby
				 WHERE Id_Karty = $id_karty
				 ";	
			
				$kzu_choroby_result = $conn->query($get_kzu_choroby);				
				
				if($kzu_choroby_result) 
				{
					$kzu_number_of_rows = $kzu_choroby_result->num_rows;
					
					echo "<br><b>przebyte choroby : </b><br>";
					
					if($kzu_number_of_rows>0)
					{
						while($row = $kzu_choroby_result->fetch_assoc())
						{										
							echo "Rok życia : ".$row['Rok_Zycia'].", Choroba : ".$row['choroba']." " . $row["Rodzaj_Choroby"] . "<br>";										
						}				
					}
					
					else 
					{ 
						echo "[ brak ]";						
					} 			
				}
			}			
				
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			//echo "<br> Id_karty = $id_karty<br>";
			
			// PROBLEM ZDROWOTNY, SZKOLNY, SPOŁECZNY			
			
			if(isset($id_karty))
			{
				$get_kzu_problem = "SELECT * FROM kzu_problemy WHERE Id_Karty = $id_karty";						
			
				$kzu_problem_result = $conn->query($get_kzu_problem);
				
				if($kzu_problem_result) // znaleziono kartę
				{
					$kzu_number_of_rows = $kzu_problem_result->num_rows;
					
					echo "<br><b>Problem zdrowotny, szkolny, społeczny : </b><br>";
					
					if($kzu_number_of_rows>0)
					{					
						while($row = $kzu_problem_result->fetch_assoc())
						{
							//echo "<br>";
							echo "Data : ".$row['Data'] . ", Rodzaj :" . $row['Rodzaj_Problemu']."<br>";
						}						
					}				
					else 
					{ 
						echo "[ brak ]";						
					}  		
				}	
			}		
			
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			// KWALIFIKACJA DO WYCHOWANIA FIZYCZNEGO
			
			if(isset($id_karty))
			{
				$get_kzu_wf = "SELECT * FROM kzu_kwalifikacja_wf WHERE Id_Karty = $id_karty";  // a co dany uczeń nie ma założonej karty ? -> do rozwiązania w przyszłości						
			
				$kzu_wf_result = $conn->query($get_kzu_wf);
				
				if($kzu_wf_result) // znaleziono kartę
				{
					$kzu_number_of_rows = $kzu_wf_result->num_rows;
					
					echo "<br><b>Kwalifikacja do wychowania fizycznego : </b><br>";
					
					if($kzu_number_of_rows>0)
					{
						//echo "<br>";
						
						/*$row = $kzu_wf_result->fetch_assoc();								
						echo "Data : ".$row['Data'] . "<br>Grupa : " . $row['Grupa'] . "<br>";						
						if($row['Zalecenia'] != "")
						{
							echo "Zalecenia : ".$row['Zalecenia']."<br>";	
						}						
						$kzu_wf_data = $row['Data'];
						$kzu_wf_grupa = $row['Grupa'];
						$kzu_wf_zalecenia = $row['Zalecenia'];*/

						
						while($row = $kzu_wf_result->fetch_assoc())
						{
							//echo "<br>";
							echo "Data : ".$row['Data'] . "<br>Grupa : " . $row['Grupa'] . "<br>";
							
							if($row['Zalecenia'] != "")
							{
								echo "Zalecenia : ".$row['Zalecenia']."<br>";	
							}								
						}		
					}				
					else 
					{ 
						echo "[ brak ]";						
					}   		
				}
			}			
			//$conn->close();	
			
			
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			// Wywiady środowiskowe
			
			if(isset($id_karty))
			{
				$get_kzu_wf = "SELECT * FROM kzu_wywiady_srodowiskowe WHERE Id_Karty = $id_karty";  // a co dany uczeń nie ma założonej karty ? -> do rozwiązania w przyszłości						
			
				$sql = $conn->query($get_kzu_wf);
				
				if($sql) // znaleziono kartę
				{
					$kzu_number_of_rows = $sql->num_rows;
					
					echo "<br><b>Wywiady środowiskowe : </b><br>";
					
					if($kzu_number_of_rows>0)
					{
						//echo "<br>";
						
						$row = $sql->fetch_assoc();
						
					
						echo "Data : ".$row['Data'] . "<br>Wnioski : " . $row['Wnioski'] . "<br>";										
					}				
					else 
					{ // nie znaleziono rekordów w bd
							
											//$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';	
											//header('Location: index.php');
						echo "[ brak ]<br>";						
					}   		
				}
			}			
			$conn->close();	

			if(isset($id_karty))
			{
				echo '<br><a href="wyswietl_badanie.php?student_id='.$student_id.'&id_karty='.$id_karty.'&class_id='.$class_id.'">Badania przesiewowe</a>';
			}	
		}				
	?>	
		
			
		</div>	
		
		<div id="footer">	
			footer		
		</div>	
		
	</div>
</body>
</html>


	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
