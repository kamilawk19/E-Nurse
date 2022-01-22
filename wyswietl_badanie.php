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
		
		$school_id = $_SESSION['school_id'];	
		$student_id = $_GET['student_id'];	
		$class_id = $_GET['class_id'];	
		$id_karty = $_GET['id_karty'];			
				
		
		echo "Wybrałeś szkołę o id =" . $school_id . "<br>";
		echo "Wybrałeś ucznia o id =" . $student_id . "<br>";
		echo "Wybrałeś klasę o id =" . $class_id . "<br>";		
		echo "Wybrałeś kartę o id =" . $id_karty . "<br>";
		
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
		
		/*$class_id = $_GET['class_id'];
		$school_id = $_SESSION['school_id'];
		$student_id = $_GET['student_id'];		
		
		echo "Wybrałeś szkołę o id =" . $school_id . "<br>";
		echo "Wybrałeś klasę o id =" . $class_id . "<br>";		
		echo "Wybrałeś ucznia o id =" . $student_id . "<br>";
		
		// dodatkowy warunek do zaimplemenotwania w przyszłości : jeśli zmienna $x jest nieustawiona, wróć do wyboru szkoły.php		
		
		//echo '<br><a href="main.php?school_id='.$school_id.' ">Strona główna</a>';
		
		//echo ' <a href="klasy.php?school_id='.$school_id.' ">Klasy</a>';
		
		/*require_once "connect_edziennik.php";			
		
		$conn = @new mysqli($servername, $username, $password, $dbname);	

		if($conn->connect_errno!=0)
		{			
			echo "Błąd połączenia".$conn->connect_errno()."\n";
		}
		else
		{	
			$sql = "SELECT * FROM student WHERE Id_User = $student_id";		

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
						echo $row["First_Name"] . " " . $row["Second_Name"] . " " . $row["Last_Name"] . "<br>";
						echo $row["Nationality"] . " " . $row["Birth_Date"] . " " . $row["Sex"] . "<br>" ;
						echo $row["Phone_Number"] . " " . $row["Email"]."";
						echo '<br>';							
					}						
				}
				
				else 
				{ 
					echo "błąd";						
				}       
			}
			
			$conn->close();
		}*/
		
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
			/*$get_kzu_id = "SELECT Id_Karty FROM kzu WHERE Id_Ucznia = $student_id";										

			$kzu_result = $conn->query($get_kzu_id);							

			if($kzu_result) // znaleziono kartę
			{
				$kzu_number_of_rows = $kzu_result->num_rows;
				
				if($kzu_number_of_rows>0)
				{										
					$row = $kzu_result->fetch_assoc();										
					
					$id_karty = $row['Id_Karty'];		
					echo "<br> id_karty = $id_karty <br>";
				}
				
				else 
				{										
					echo "[ brak karty zdrowia ]";						
				}   		
			}	*/				
			
			// CHOROBY
			/*if(isset($id_karty))
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
							echo "Rok życia : ".$row['Rok_Zycia'].", Choroba : ".$row['choroba'].", " . $row["Rodzaj_Choroby"] . "<br>";										
						}				
					}
					
					else 
					{ 
						echo "[ brak ]";						
					} 			
				}
			}	*/		
				
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			//echo "<br> Id_karty = $id_karty<br>";
			
			// PROBLEM ZDROWOTNY, SZKOLNY, SPOŁECZNY			
			
			/*if(isset($id_karty))
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
			}	*/	
			
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			// KWALIFIKACJA DO WYCHOWANIA FIZYCZNEGO
			
			/*if(isset($id_karty))
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
						
						$row = $kzu_wf_result->fetch_assoc();
						
					//echo "<b>choroba : </b><br>";
						echo "Data : ".$row['Data'] . "<br>Grupa : " . $row['Grupa'] . "<br>Zalecenia : ".$row['Zalecenia']."<br>";							
								
						$kzu_wf_data = $row['Data'];
						$kzu_wf_grupa = $row['Grupa'];
						$kzu_wf_zalecenia = $row['Zalecenia'];			
					}				
					else 
					{ // nie znaleziono rekordów w bd
							
											//$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';	
											//header('Location: index.php');
						echo "[ brak ]";						
					}   		
				}
			}		
			$conn->close();	*/	
			
			require_once "connect.php";				
		
			$conn = @new mysqli($servername, $username, $password, $dbname);		

			if($conn->connect_errno!=0)
			{			
				echo "Błąd połączenia".$conn->connect_errno()."\n";
			}
			else
			{					
				//$get_kzu_id = "SELECT Id_Karty FROM kzu WHERE Id_Ucznia = $student_id";										
				$get_kzu = "SELECT * FROM kzu WHERE Id_Karty = $id_karty";										

				$kzu_result = $conn->query($get_kzu);							

				if($kzu_result) // znaleziono kartę
				{
					$kzu_number_of_rows = $kzu_result->num_rows;
					
					if($kzu_number_of_rows>0)
					{										
						while($row = $kzu_result->fetch_assoc())
						{
							echo "Id_Karty = ".$row['Id_Karty'].", Id_Ucznia = ".$row['Id_Ucznia'].", Niepełnosprawność = ".$row['Niepelnosprawnosc'].", Nurse_Id = ".$row['Nurse_Id']."<br>";
						}				
					}
					
					else 
					{										
						echo "[ brak ]";						
					}   		
				}
				
				/* 
				
				SELECT * FROM kzu_testy_przesiewowe
				JOIN kzu_testy_do_wykrycia
				ON kzu_testy_do_wykrycia.Id_Karty = kzu_testy_przesiewowe.Id_Karty
				JOIN kzu_wzrok
				ON kzu_wzrok.Id_Karty = kzu_testy_przesiewowe.Id_Karty
				JOIN kzu_sluch
				ON kzu_sluch.Id_Karty = kzu_testy_przesiewowe.Id_Karty 
				
				*/
								
				
				
				
				
				
				$get_kzu_tp = "SELECT * FROM kzu_testy_przesiewowe WHERE Id_Karty = $id_karty";				
				
				$kzu_result = $conn->query($get_kzu_tp);							

				if($kzu_result) // znaleziono kartę
				{
					$kzu_number_of_rows = $kzu_result->num_rows;
					
					if($kzu_number_of_rows>0)
					{		
				
						//echo "<br>kzu_testy_przesiewowe : <br>";
						echo "<br><b>Testy przesiewowe : </b><br>";
				
						while($row = $kzu_result->fetch_assoc())
						{
							///if(($class_id == 1) || ($class_id == 2) || ($class_id == 3) || ($class_id == 4) || ($class_id == 5))
							//{
								//echo "Id_Karty = " . $row['Id_Karty'] . "<br>";							
								//echo "Id_Badania= " . $row['Id_Badania'] . "<br>";								
								echo "Data = " . $row['Data'] . "<br>";								
								echo "Wiek = " . $row['Wiek'] . "<br>";								
								echo "Wysokosc (cm) = " . $row['Wysokosc_Ciala_Cm'] . "<br>";								
								echo "Wysokosc (centyl) = " . $row['Wysokosc_Ciala_Centyl'] . "<br>";								
								echo "Masa (kg) = " . $row['Masa_Ciala_Kg'] . "<br>";								
								echo "Masa (centyl) = " . $row['Masa_Ciala_Centyl'] . "<br>";							
								echo "BMI = " . $row['Masa_Ciala_Bmi'] . "<br><br>";			
							//}
					
							/*if(($class_id == 4))
							{
								//echo "Id_Karty = " . $row['Id_Karty'] . "<br>";							
								//echo "Id_Badania= " . $row['Id_Badania'] . "<br>";								
								echo "Data = " . $row['Data'] . "<br>";								
								echo "Wiek = " . $row['Wiek'] . "<br>";								
								echo "Wysokosc (cm) = " . $row['Wysokosc_Ciala_Cm'] . "<br>";								
								echo "Wysokosc (centyl) = " . $row['Wysokosc_Ciala_Centyl'] . "<br>";								
								echo "Masa (kg) = " . $row['Masa_Ciala_Kg'] . "<br>";								
								echo "Masa (centyl) = " . $row['Masa_Ciala_Centyl'] . "<br>";							
								echo "BMI = " . $row['Masa_Ciala_Bmi'] . "<br>";			
							}	*/			
						}
						
					}
					
					else 
					{										
						echo "[ brak ]";						
					}   		
				}
				
				$get_kzu_tp = "SELECT * FROM kzu_wzrok WHERE Id_Karty = $id_karty";				
				
				$kzu_result = $conn->query($get_kzu_tp);							

				if($kzu_result) // znaleziono kartę
				{
					$kzu_number_of_rows = $kzu_result->num_rows;
					
					if($kzu_number_of_rows>0)
					{		
				
						//echo "<br>kzu_wzrok : <br>";
						echo "<b>Wzrok : </b><br>";
				
						while($row = $kzu_result->fetch_assoc())
						{ 					 // 0  				// 1       		     // 2
							if(($class_id == 1) || ($class_id == 2) || ($class_id == 3))
							{
								//echo "Id_Karty = " . $row['Id_Karty'] . "<br>";							
								//echo "Id_Badania= " . $row['Id_Badania'] . "<br>";								
								echo "Data = " . $row['Data'] . "<br>";								
								echo "Cover test = " . $row['Zez_Cover_Test'] . "<br>";									
								echo "Test Hirschberga = " . $row['Zez_Odbicie_Swiatla_Na_Rogowkach'] . "<br>";								
								echo "Ostrość wzroku (OP) = " . $row['Oko_Prawe'] . "<br>";								
								echo "Ostrość wzroku (OL) = " . $row['Oko_Lewe'] . "<br><br>";								
										
							}				 // 3 				 // 4  	 			 // 5              // 6 
							if(($class_id == 4) || ($class_id == 5) || ($class_id == 6) || ($class_id == 7))
							{
								//echo "Id_Karty = " . $row['Id_Karty'] . "<br>";							
								//echo "Id_Badania= " . $row['Id_Badania'] . "<br>";								
								echo "Data = " . $row['Data'] . "<br>";							
								echo "Ostrość wzroku (OP) = " . $row['Oko_Prawe'] . "<br>";								
								echo "Ostrość wzroku (OL) = " . $row['Oko_Lewe'] . "<br>";	
								if($row['Widzenie_Barw'])
								{
									echo "Widzenie barw = " . $row['Widzenie_Barw'] . "<br>";
								}
								echo "<br>";
								
							}														  //(klasa ponad podstawowa)				
										     // 7                // 8                // 1                 // 2                 // 3  
							if(($class_id == 8) || ($class_id == 9) || ($class_id == 10) || ($class_id == 11) || ($class_id == 12) || ($class_id == 13))
							{
								//echo "Id_Karty = " . $row['Id_Karty'] . "<br>";							
								//echo "Id_Badania= " . $row['Id_Badania'] . "<br>";								
								echo "Data = " . $row['Data'] . "<br>";							
								echo "Ostrość wzroku (OP) = " . $row['Oko_Prawe'] . "<br>";								
								echo "Ostrość wzroku (OL) = " . $row['Oko_Lewe'] . "<br><br>";																
							}						
						}				
					}
					
					else 
					{										
						echo "[ brak ]";						
					}   		
				}
				
				$get_kzu_tp = "SELECT * FROM kzu_sluch WHERE Id_Karty = $id_karty";				
				
				$kzu_result = $conn->query($get_kzu_tp);							

				if($kzu_result) // znaleziono kartę
				{
					$kzu_number_of_rows = $kzu_result->num_rows;
					
					if($kzu_number_of_rows>0)
					{		
				
						//echo "<br>kzu_sluch : <br>";
						echo "<br><b>Słuch :</b><br>";
				
						while($row = $kzu_result->fetch_assoc())
						{					 // 0  				// 1       		     // 2               //7  
							if(($class_id == 1) || ($class_id == 2) || ($class_id == 3) || ($class_id == 8))
							{
								//echo "Id_Karty = " . $row['Id_Karty'] . "<br>";							
								//echo "Id_Badania= " . $row['Id_Badania'] . "<br>";								
								echo "Data = " . $row['Data_Badania'] . "<br>";								
								echo "Słuch (UP) = " . $row['Ucho_Prawe'] . "<br>";									
								echo "Słuch (UL) = " . $row['Ucho_Lewe'] . "<br><br>";														
							}	
						}				
					}
					
					else 
					{										
						echo "[ brak ]";						
					}   		
				}
				
				$get_kzu_tp = "SELECT * FROM kzu_testy_do_wykrycia WHERE Id_Karty = $id_karty";				
				
				$kzu_result = $conn->query($get_kzu_tp);							

				if($kzu_result) // znaleziono kartę
				{
					$kzu_number_of_rows = $kzu_result->num_rows;
					
					if($kzu_number_of_rows>0)
					{		
				
						//echo "<br>kzu_testy_do_wykrycia : <br>";
						echo "<br><b>Testy do wykrycia : </b><br>";
				
						while($row = $kzu_result->fetch_assoc())
						{		 			// 0  				// 1       		     // 2
							if(($class_id == 1) || ($class_id == 2) || ($class_id == 3))
							{
								//echo "Id_Karty = " . $row['Id_Karty'] . "<br>";							
								//echo "Id_Badania= " . $row['Id_Badania'] . "<br>";								
								echo "Data = " . $row['Data_Badania'] . "<br>";								
								echo "Skolioza = " . $row['Skolioza'] . "<br>";		
								echo "Stopy_Plaskokoslawe = " . $row['Stopy_Plaskokoslawe'] . "<br>";			
								echo "Koslawosc_Kolan = " . $row['Koslawosc_Kolan'] . "<br><br>";			
								
								//echo "Klifoza_Piersiowa = " . $row['Klifoza_Piersiowa'] . "<br>";									
														
																	
							}				 // 3 				 // 4  	 			 // 5              // 6 
							if(($class_id == 4) || ($class_id == 5) || ($class_id == 6) || ($class_id == 7))
							{
								//echo "Id_Karty = " . $row['Id_Karty'] . "<br>";							
								//echo "Id_Badania= " . $row['Id_Badania'] . "<br>";								
								echo "Data = " . $row['Data_Badania'] . "<br>";								
								echo "Skolioza = " . $row['Skolioza'] . "<br><br>";																	
							}				 //7
							if(($class_id == 8) || ($class_id == 9) || ($class_id == 10) || ($class_id == 11) || ($class_id == 12) || ($class_id == 13))
							{
								//echo "Id_Karty = " . $row['Id_Karty'] . "<br>";							
								//echo "Id_Badania= " . $row['Id_Badania'] . "<br>";								
								echo "Data = " . $row['Data_Badania'] . "<br>";								
								echo "Skolioza = " . $row['Skolioza'] . "<br>";																	
								if($row['Klifoza_Piersiowa'])
								{
									echo "Kifoza = " . $row['Klifoza_Piersiowa'] . "<br>";	
								}
								echo "<br>";
							}			
						}				
					}
					
					else 
					{										
						echo "[ brak ]";						
					}   		
				}
				
				
				$get_kzu_pr = "SELECT * FROM kzu_cisnienie_tetnicze_krwi WHERE Id_Karty = $id_karty";				
				
				$kzu_result = $conn->query($get_kzu_pr);							

				if($kzu_result) // znaleziono kartę
				{
					$kzu_number_of_rows = $kzu_result->num_rows;
					
					if($kzu_number_of_rows>0)
					{		
				
						//echo "<br><b>kzu_cisnienie_tetnicze_krwi : </b><br>";
						echo "<br><b>Cisnienie tętnicze krwi : </b><br>";
				
						while($row = $kzu_result->fetch_assoc())
						{							
							//echo "Id_Karty = " . $row['Id_Karty'] . "<br>";							
							//echo "Id_Badania= " . $row['Id_Badania'] . "<br>";								
							echo "Data = " . $row['Data_Badania'] . "<br>";								
							echo "Wynik = " . $row['Wynik'] . "<br>";		
							echo "Centyl = " . $row['Centyl'] . "<br><br>";																														
						}				
					}
					
					else 
					{										
						echo "[ brak ]";						
					}   		
				}
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				$conn->close();	
			}	
			
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			

			
		}				
	?>	
		
			
		</div>	
		
		<div id="footer">	
			footer		
		</div>	
		
	</div>
</body>
</html>


	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
