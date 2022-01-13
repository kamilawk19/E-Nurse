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
    <link rel="stylesheet" href="style1.css">

		
</head>


<body>

    <?php	
		echo "<p>Witaj ".$_SESSION['imie']." ".$_SESSION['nazwisko'].'! [ <a href="logout.php">Wyloguj się </a>]</p>';	
		
		$class_id = $_GET['class_id'];
		$school_id = $_GET['school_id'];
		$student_id = $_GET['student_id'];
		
		//echo $x;
		
		echo "Wybrałeś szkołę o id =" . $school_id . "<br>";
		echo "Wybrałeś klasę o id =" . $class_id . "<br>";		
		echo "Wybrałeś ucznia o id =" . $student_id . "<br>";
		
		// dodatkowy warunek do zaimplemenotwania w przyszłości : jeśli zmienna $x jest nieustawiona, wróć do wyboru szkoły.php		
		
		echo '<br><a href="main.php?school_id='.$school_id.' ">Strona główna</a>';
		
		echo ' <a href="klasy.php?school_id='.$school_id.' ">Klasy</a>';
		
		require_once "connect_edziennik.php";		
		
		//echo "<p>Witaj ".$_SESSION['imie']." ".$_SESSION['nazwisko'].'! [ <a href="logout.php">Wyloguj się </a>]</p>';	
		
		$conn = @new mysqli($servername, $username, $password, $dbname);	

		if($conn->connect_errno!=0)
		{
			/*echo "Błąd połączenia".@conn->connect_errno." = ".conn->connect_error;*/
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
					//$row = $result->fetch_assoc();
					
					echo "<br>";
					
					while($row = $result->fetch_assoc())
					{
						echo "<br>";
						
						/*foreach($row as $field => $value)
						{
							echo $value. " ";
							
							//$_SESSION['school_name'] = $value;							
							//echo "<br> school name = ".$_SESSION['school_name'];															
						}	*/

						//echo "id: " . $row["Id"] . ", Name = ". $row["Name"]. "<br>";
						
						//echo '<form action="test.php" method="post">';
						
							//echo '<span id='.$row["Id"].' onclick="ge_school_id(this);">';						
							//echo '<a href="test.php" name='.$row["Id"].' onclick="get_school_id(this);">';						
							//echo '<p name='.$row["Id"].' onclick="get_school_id(this);">';						
							//echo '<a href="test.php?var1=4" name="value">';						
							//echo '<a href="test.php?var1='.$row['Id'].' name="value">';						
							//echo '<a href="main.php?school_id='.$row['Id'].' ">';						
							//echo '<span name="school_id" >';
								//echo $row["Id"] . ", ". $row["Name"]. "<br>";
								//echo $row["Id"] . ", ". $row["Name"];
								//echo $row["Class"];
							echo '<br>';
							
							//echo '<a href="klasa.php?class_id='.$row['Id'].' ">';						
									//echo '<span name="school_id" >';
										//echo $row["Id"] . ", ". $row["Name"]. "<br>";
										//echo $row["Id"] . ", ". $row["Name"];
								echo '<a href="klasa.php?school_id='.$school_id.'&class_id='.$class_id.'"> <- Powrót do listy klas </a><br><br>';
								echo "Informacje o uczniu <br><br>";
								echo "<b>dane osobowe : </b><br>";
								
								
								echo $row["First_Name"] . " " . $row["Second_Name"] . " " . $row["Last_Name"] . "<br>";
								echo $row["Nationality"] . " " . $row["Birth_Date"] . " " . $row["Sex"] . "<br>" ;
								echo $row["Phone_Number"] . " " . $row["Email"]."";
							echo '<br>';
							
					}	
								
					/*echo "<b>przebyte choroby : </b><br>";
					
					//$get_kzu_id = "SELECT Id_Karty FROM kzu WHERE Id_Ucznia = $student_id";					
					$get_kzu_id = "SELECT * FROM kzu WHERE Id_Ucznia = $student_id";					
					
					$kzu_result = $conn->query($get_kzu_id);
					
					//$kzu_number_of_rows = $kzu_result->num_rows;
					
					if($kzu_result)
					{
						$kzu_number_of_rows = $kzu_result->num_rows;
						
						if($kzu_number_of_rows>0)
						{
							echo "<br>";
							
							$row = $kzu_result->fetch_assoc();
									
							echo $row["Id_Karty"] . ", ". $row["Id_Ucznia"]. ", " . $row["Niepelnosprawnosc"]. "," . $row['Nurse_Id'] . "<br>";	
								
								
								// ! SELECT * FROM `class` GROUP BY Class								
						}								
					}*/
					
					
					
						
							
							
							
							
							
							
						
						//echo '<input type="submit" value="wyslij">';
						
						//echo '</form>';
						
						
						
						//$id = $row['Id'];

						

						//echo '<button onclick="hello()">'.$id.'</button>';	
						
						//$_SESSION['school_id'] = $id;
						
						//echo "<br> zmienna sesyjna = " .$_SESSION['school_id'] . "<br>";
						
						//echo "<a href='test.php'>test.php</a>";						


							
					
					/*while($row = $result_id->fetch_assoc())
					{
						echo "<br>";
						
						foreach($row as $field => $value)
						{
							echo $value. " ";
							
							//$_SESSION['school_name'] = $value;
							
							//echo "<br> school name = ".$_SESSION['school_name'];
							
							
							
							//echo $value. " ";
						}					
					}*/
					
					
					
					
					
					
															// weryfikacja hasha :
															
																//echo "true";
																//exit();
																//$users_number = $result->num_rows;
																//$result->num_rows;

																/*echo "results - num rows =".$users_number;*/

																//if($users_number>0)
																/*if($result != false && $result->num_rows>0)
																{*/
															
																//$_SESSION['zalogowany'] = true;		
																
																
																//$_SESSION['username'] = $row['Imie'];
																//$_SESSION['password'] = $row['password'];
						
						/*$_SESSION['school_id'] = $row['Id'];
						$_SESSION['school_name'] = $row['Name'];

						echo "Udało się pobrać dane z bazy danych <br>";
						echo "Id = ".$_SESSION['school_id']."<br>";
						echo "Name = ".$_SESSION['school_name']."<br>";							
						
						unset($_SESSION['blad']);		

						$result->free_result();*/ // close(); free(); ... free_result();*/
																	//}
																
																	//header('Location: main.php'); // przekieruj do strony głównej (main) po zalogowaniu
																	//header('Location: wybor_szkoly.php');  
															
															
																	/*else // // dobry login, złe hasło
																	{				
																		$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
																		header('Location: index.php');				
																	}*/				
				}
				
				else 
				{ // nie znaleziono rekordów w bd
						
					//$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';	
					//header('Location: index.php');
					echo "błąd";
						
				}       
			}
			
			$conn->close();
		}
		
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
		
		// PRZEBYTE CHOROBY : 
		
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
			$get_kzu_id = "SELECT Id_Karty FROM kzu WHERE Id_Ucznia = $student_id";										

			$kzu_result = $conn->query($get_kzu_id);

							//$kzu_number_of_rows = $kzu_result->num_rows;

			if($kzu_result) // znaleziono kartę
			{
				$kzu_number_of_rows = $kzu_result->num_rows;
				
				if($kzu_number_of_rows>0)
				{
					//echo "<br>";
					
					$row = $kzu_result->fetch_assoc();
							
					//echo $row["Id_Karty"] . "<br>";							
					
					$id_karty = $row['Id_Karty'];
										//echo "<br> Id karty = $id_karty <br>";
							
				}
				
				/*else 
				{						 // nie znaleziono rekordów w bd
											
										//$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';	
										//header('Location: index.php');
					echo "błąd";						
				}   	*/		
			}		
			
			
			if(isset($id_karty))
			{
				//$get_kzu_choroby = "SELECT * FROM kzu_choroby WHERE Id_Karty = $id_karty";	
				$get_kzu_choroby = 
				"SELECT Id_Karty, kzu_choroby.Id_Choroby, Rok_Zycia, Rodzaj_Choroby, choroby.id_choroby, choroby.choroba 
				 FROM kzu_choroby 
				 JOIN choroby
				 ON kzu_choroby.Id_Choroby = choroby.id_choroby
				 WHERE Id_Karty = $id_karty
				 ";	
			
				$kzu_choroby_result = $conn->query($get_kzu_choroby);
				
				
				
				if($kzu_choroby_result) // znaleziono kartę
				{
					$kzu_number_of_rows = $kzu_choroby_result->num_rows;
					
					echo "<br><b>przebyte choroby : </b><br>";
					
					if($kzu_number_of_rows>0)
					{
						//echo "<br>";
						
						//$row = $kzu_choroby_result->fetch_assoc();
						
						//echo "<br><b>przebyte choroby : </b><br>";
					//echo /*$row["Id_Karty"] . ", " . $row['Id_Choroby'] . ", " .*/ "Rok życia : " . $row['Rok_Zycia'] . "<br> Rodzaj choroby : " . $row['Rodzaj_Choroby'] .      "<br>";							
							
						

						while($row = $kzu_choroby_result->fetch_assoc())
						{							
							//echo $row['Id_Karty'] ." ," . $row['Id_Choroby']. ", ".$row['Rok_Zycia'].", ". $row['choroba'].", " . $row["Rodzaj_Choroby"] . "<br>";
							echo "Rok życia : ".$row['Rok_Zycia'].", Choroba : ".$row['choroba'].", " . $row["Rodzaj_Choroby"] . "<br>";
							
							
							
							
							/*foreach($row as $field => $value)
							{
								echo $value. " ";
								
								//$_SESSION['school_name'] = $value;							
								//echo "<br> school name = ".$_SESSION['school_name'];															
							}	*/
						}

								
						//$id_choroby = $row['Id_Choroby'];					
						//$rok_zycia = $row['Rok_Zycia']; 
						//$rodzaj_choroby = $row['Rodzaj_Choroby']; 
						
						//echo "$rok_zycia , $rodzaj_choroby <br>";
											//$id_karty = $row['Id_Karty'];
											//echo "<br> Id karty = $id_karty <br>";
								
					}
					
					else 
										{ // nie znaleziono rekordów w bd
												
											//$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';	
											//header('Location: index.php');
						echo "[ brak ]";						
					} 			
				}
			}					
			
			// tabela "choorby" 
			if(isset($id_choroby))
			{
				$get_kzu_choroba = "SELECT choroba FROM choroby WHERE Id_Choroby = $id_choroby";						
			
				$kzu_choroba_result = $conn->query($get_kzu_choroba);
				
				if($kzu_choroba_result) // znaleziono kartę
				{
					$kzu_number_of_rows = $kzu_choroba_result->num_rows;
					
					if($kzu_number_of_rows>0)
					{
						//echo "<br>";
						
						$row = $kzu_choroba_result->fetch_assoc();
						
					//echo "<b>choroba : </b><br>";
										//echo /*$row["Id_Karty"] . ", " . $row['Id_Choroby'] . ", " .*/ "Rok życia : " . $row['Rok_Zycia'] . "<br> Rodzaj choroby : " . $row['Rodzaj_Choroby'] .      "<br>";							
									
						$choroba = $row['choroba']; 
											//$rodzaj_choroby = $row['Rodzaj_Choroby']; 
						
						//echo "$choroba <br>";
											//$id_karty = $row['Id_Karty'];
											//echo "<br> Id karty = $id_karty <br>";
								
					}
					
					/*else 
					{ // nie znaleziono rekordów w bd
							
											//$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';	
											//header('Location: index.php');
						echo "brak danych do wyświetlenia";						
					}   */			
				}	
			
			}
			
			//$rok_zycia;
			//$rodzaj_choroby;
			//$choroba;
			
			/*echo "<br><b>przebyte choroby : </b><br>";
			
			if(isset($rok_zycia) && isset($choroba))
			{
				echo "Rok życia : $rok_zycia <br>";
				
				if(isset($rodzaj_choroby))
				{
					echo "Rodzaj choroby : $choroba $rodzaj_choroby <br>";
				}
				else
				{
					echo "Rodzaj choroby : $choroba <br>";
				}
				
			}
			else
			{
				echo "[ brak ]";
			}*/
			
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			//echo "<br> Id_karty = $id_karty<br>";
			
			// PROBLEM ZDROWOTNY, SZKOLNY, SPOŁECZNY
			
			$get_kzu_problem = "SELECT * FROM kzu_problemy WHERE Id_Karty = $id_karty";						
			
			$kzu_problem_result = $conn->query($get_kzu_problem);
			
			if($kzu_problem_result) // znaleziono kartę
			{
				$kzu_number_of_rows = $kzu_problem_result->num_rows;
				
				echo "<br><b>Problem zdrowotny, szkolny, społeczny : </b><br>";
				
				if($kzu_number_of_rows>0)
				{
					//echo "<br>";
					
					//$row = $kzu_problem_result->fetch_assoc();
					
				//echo "<b>choroba : </b><br>";
					//echo "<br>" . $row["Id_Karty"] . ", " . $row['Id_Problemu'] . ", " . " " . $row['Data'] . " " . $row['Rodzaj_Problemu'] .      "<br>";							
					
					while($row = $kzu_problem_result->fetch_assoc())
					{
						//echo "<br>";
						echo "Data : ".$row['Data'] . ", Rodzaj :" . $row['Rodzaj_Problemu']."<br>";
					}
					//$kzu_problem_data = $row['Data'];
					//$kzu_problem_rodzaj = $row['Rodzaj_Problemu'];
					
					//$choroba = $row['choroba']; 
										//$rodzaj_choroby = $row['Rodzaj_Choroby']; 
					
					//echo "$choroba <br>";
										//$id_karty = $row['Id_Karty'];
										//echo "<br> Id karty = $id_karty <br>";
							
				}
				
				else 
				{ // nie znaleziono rekordów w bd
						
										//$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';	
										//header('Location: index.php');
					echo "[ brak ]";						
				}  		
			}	
		
			/*echo "<br><b>Problem zdrowotny, szkolny, społeczny : </b><br>";
			
			if(isset($kzu_problem_data) && isset($kzu_problem_rodzaj))
			{
				echo "Data : $kzu_problem_data <br>";
				echo "Rodzaj : $kzu_problem_rodzaj <br>";			
			}
			else
			{
				echo "[ brak ]";
			}*/
			
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			// KWALIFIKACJA DO WYCHOWANIA FIZYCZNEGO
			
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
			
			/*echo "<br><b>Kwalifikacja do wychowania fizycznego : </b><br>";
			
			if(isset($kzu_wf_data) && isset($kzu_wf_grupa) && isset($kzu_wf_zalecenia))
			{
				echo "Data : $kzu_wf_data <br>";
				echo "Grupa : $kzu_wf_grupa <br>";			
				echo "Zalecenia : $kzu_wf_zalecenia <br>";			
			}
			else
			{
				echo "[ brak ]";
			}*/
			
			
			
			
			
			$conn->close();				
		}
			
				
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


	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
