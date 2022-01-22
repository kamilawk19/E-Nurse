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
		
		$school_id = $_SESSION['school_id'];
		$student_id = $_GET['student_id'];
		$id_karty = $_GET['id_karty'];
		$class_id = $_GET['class_id'];
		
			//echo $x;
		
		echo "Wybrałeś szkołę o id =" . $school_id . "<br>";
		echo "id_karty = " . $id_karty . "<br>";
		echo "Wybrałeś ucznia o id = " . $student_id . "<br>";
		
		
		
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
				//echo '<a href="">Wpis do dziennika codziennego</a><br><br>';				
				//echo '<a href="dodaj_badanie.php">Badanie przesiewowe</a><br><br>';
			
				
				
				$data = $_POST['data'];
				$wiek = $_POST['wiek'];
				$wysokosc_cm = $_POST['wysokosc_cm'];
				$wysokosc_ct = $_POST['wysokosc_ct'];
				$masa_kg = $_POST['masa_kg'];
				$masa_ct = $_POST['masa_ct'];
				$masa_bmi = $_POST['masa_bmi'];
				
				if(isset($_POST['zez_widoczny']))
				{
					$zez_widoczny = $_POST['zez_widoczny'];
				}
				if(isset($_POST['zez_cover_test']))
				{
					$zez_cover_test = $_POST['zez_cover_test'];
				}
				if(isset($_POST['zez_hirschberga']))
				{
					$zez_hirschberga = $_POST['zez_hirschberga'];
				}
		
				$ostrosc_op = $_POST['ostrosc_op'];
				$ostrosc_ol = $_POST['ostrosc_ol'];
				
				if(isset($_POST['widzenie_barw']))
				{
					$widzenie_barw = $_POST['widzenie_barw'];
				}
				
				if(isset($_POST['sluch_up']))
				{
					$sluch_up = $_POST['sluch_up'];
				}
				
				if(isset($_POST['sluch_ul']))
				{
					$sluch_ul = $_POST['sluch_ul'];
				}
				
				if(isset($_POST['skolioza']))
				{
					$skolioza = $_POST['skolioza'];
				}
				
				if(isset($_POST['plasko_koslawe_stopy']))
				{
					$plasko_koslawe_stopy = $_POST['plasko_koslawe_stopy'];
				}	
				
				if(isset($_POST['koslawosc_kolan']))
				{
					$koslawosc_kolan = $_POST['koslawosc_kolan'];
				}		
				
				if(isset($_POST['kifoza']))
				{
					$kifoza = $_POST['kifoza'];
				}						
				
				$cisnienie_wynik = $_POST['cisnienie_wynik'];
				$cisnienie_centyl = $_POST['cisnienie_centyl'];
					
					
				echo "-----------------------------------------------------------------<br>";			
				// Wszystkie pola formularza muszą być wypełnione ! 	
					
					
					
					
				
												
									
					
					
					
					
					
					
					
					
				echo "-----------------------------------------------------------------<br>";				
				
				
				
				/*echo "<br> Twoje dane z formularza : <br>";
				
				if(isset($data))
				{
					echo "$data<br>";
				}
				if(isset($wiek))
				{
					echo "$wiek<br>";
				}
				if(isset($wysokosc_cm))
				{
					echo "$wysokosc_cm<br>";
				}
				if(isset($wysokosc_ct))
				{
					echo "$wysokosc_ct<br>";
				}
				if(isset($masa_kg))
				{
					echo "$masa_kg<br>";
				}
				if(isset($masa_ct))
				{
					echo "$masa_ct<br>";
				}
				if(isset($masa_bmi))
				{
					echo "$masa_bmi<br>";
				}
				if(isset($zez_widoczny))
				{
					echo "$zez_widoczny<br>";
				}
				if(isset($zez_cover_test))
				{
					echo "$zez_cover_test<br>";
				}
				if(isset($zez_hirschberga))
				{
					echo "$zez_hirschberga<br>";
				}
				if(isset($ostrosc_op))
				{
					echo "$ostrosc_op<br>";
				}	
				if(isset($ostrosc_ol))
				{
					echo "$ostrosc_ol<br>";
				}					
				
				if(isset($widzenie_barw))
				{
					echo "$widzenie_barw<br>";
				}					
				
				if(isset($sluch_up))
				{
					echo "$sluch_up<br>";
				}
				if(isset($sluch_ul))
				{
					echo "$sluch_ul<br>";
				}
				if(isset($skolioza))
				{
					echo "$skolioza<br>";
				}
				if(isset($plasko_koslawe_stopy))
				{
					echo "$plasko_koslawe_stopy<br>";
				}
				if(isset($koslawosc_kolan))
				{
					echo "$koslawosc_kolan<br>";
				}
				if(isset($kifoza))
				{
					echo "$kifoza<br>";
				}
				if(isset($cisnienie_wynik))
				{
					echo "$cisnienie_wynik<br>";
				}
				if(isset($cisnienie_centyl))
				{
					echo "$cisnienie_centyl<br>";
				}*/
	
		
			echo "-----------------------------------------------------------------<br>";

			require_once "connect.php";			
		
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
						
				// pobierz numer ostatniego badania
				
				$sql = 'SELECT MAX(Id_Badania) AS Numer_ostatniego_Badania FROM kzu_testy_przesiewowe';							

				$result = $conn->query($sql);

				if($result) 
				{
					$number_of_rows = $result->num_rows;
					
					if($number_of_rows>0)
					{					
						$row = $result->fetch_assoc();
						
						echo "<br>";
						
						$ostatnie_badanie = $row['Numer_ostatniego_Badania'];
						
						//echo "Ostatnie badanie = " .$row['Numer_ostatniego_Badania'];
						
						// id ucznia = 2
						// id karty = 1
						
						
						
						//while($row = $result->fetch_assoc())
						//{
							// echo "<br>";									

							// echo '<a href="klasa.php?school_id='.$school_id.'&class_id='.$class_id.'"> <- Powrót do listy klas </a><br><br>';
							// echo "Informacje o uczniu <br><br>";
							// echo "<b>dane osobowe : </b><br>";
								// // ! UWZGLĘDNIAĆ ZGODE UCZNIA NA ŚWIADZCENIE USŁUG - wyświetlać tylko tych uczniów którzy sie zgodzili
							// echo "Imię: ". $row["First_Name"] . " " . $row["Second_Name"] ."<br>";
							// echo " Nazwisko: " . $row["Last_Name"] . "<br>";
							// //echo "Narodowość: " . $row["Nationality"] . " " .
							// echo "Data urodzenia: " .$row["Birth_Date"] . "<br>" ;
							// echo "Pesel: " . $row["Pesel"] . "<br>" ;
							// echo "Płeć: " . $row["Sex"] . "<br>" ;
							// echo "Adres: ul. " . $row["Street"] . " " . $row["Bulding_Number"] . "/" . $row["Flat_Number"] . " " . $row["City"] . " " . $row["Zip"] . "<br>";						
							// echo "Telefon: " . $row["Phone_Number"] . "<br>";
							// echo "e-mail: " .$row["Email"]. "<br>";
							// echo '<br>';						
						//}						
					}
					
					else 
					{ 
						echo "[ błąd ]";						
					}       
				}
				
				// DODANIE BADANIA 
					             //0 				 //1 				 //2 
				if(($class_id == 1) || ($class_id == 2) || ($class_id == 3))
				{
					
					/*if(
					(!isset($_POST['data']) || $_POST['data'] = '0000-00-00 00:00:00') 
					|| (!isset($_POST['wiek']) || $_POST['wiek'] = '')
					|| (!isset($_POST['wysokosc_cm'])|| $_POST['wysokosc_cm'] = '')
					|| (!isset($_POST['wysokosc_ct'])|| $_POST['wysokosc_ct'] = '')
					|| (!isset($_POST['masa_kg'])|| $_POST['masa_kg'] = '')
					|| (!isset($_POST['masa_ct']) || $_POST['masa_ct'] = '')
					|| (!isset($_POST['masa_bmi']) || $_POST['masa_bmi'] = '')
					|| (!isset($_POST['zez_widoczny']) || $_POST['zez_widoczny'] = '')
					|| (!isset($_POST['zez_cover_test']) || $_POST['zez_cover_test'] = '')
					|| (!isset($_POST['zez_hirschberga']) || $_POST['zez_hirschberga'] = '')
					|| (!isset($_POST['ostrosc_op']) || $_POST['ostrosc_op'] = '')
					|| (!isset($_POST['ostrosc_ol']) || $_POST['ostrosc_ol'] = '')
					|| (!isset($_POST['sluch_up']) || $_POST['sluch_up'] = '')
					|| (!isset($_POST['sluch_ul']) || $_POST['sluch_ul'] = '')
					|| (!isset($_POST['skolioza']) || $_POST['skolioza'] = '')
					|| (!isset($_POST['plasko_koslawe_stopy']) || $_POST['plasko_koslawe_stopy'] = '')
					|| (!isset($_POST['koslawosc_kolan']) || $_POST['koslawosc_kolan'] = '')
					|| (!isset($_POST['cisnienie_wynik']) || $_POST['cisnienie_wynik'] = '')
					|| (!isset($_POST['cisnienie_centyl']) || $_POST['cisnienie_centyl'] = '')	)
					{
						
						//header('Location: dodaj_badanie.php?student_id='.$student_id.'&id_karty='.$id_karty.'&class_id='.$class_id.''); 
						echo "<br> ERROR ! <br>";
						
						exit();							
					}*/
					
					/*if(
					
					
					((!isset($_POST['data'])) || ($_POST['data'] = '0000-00-00 00:00:00') ) 
					|| (!isset($_POST['wiek']) || $_POST['wiek'] = '')
					|| (!isset($_POST['wysokosc_cm'])|| $_POST['wysokosc_cm'] = '')
					|| (!isset($_POST['wysokosc_ct'])|| $_POST['wysokosc_ct'] = '')
					|| (!isset($_POST['masa_kg'])|| $_POST['masa_kg'] = '')
					|| (!isset($_POST['masa_ct']) || $_POST['masa_ct'] = '')
					|| (!isset($_POST['masa_bmi']) || $_POST['masa_bmi'] = '')
					|| (!isset($_POST['zez_widoczny']) || $_POST['zez_widoczny'] = '')
					|| (!isset($_POST['zez_cover_test']) || $_POST['zez_cover_test'] = '')
					|| (!isset($_POST['zez_hirschberga']) || $_POST['zez_hirschberga'] = '')
					|| (!isset($_POST['ostrosc_op']) || $_POST['ostrosc_op'] = '')
					|| (!isset($_POST['ostrosc_ol']) || $_POST['ostrosc_ol'] = '')
					|| (!isset($_POST['sluch_up']) || $_POST['sluch_up'] = '')
					|| (!isset($_POST['sluch_ul']) || $_POST['sluch_ul'] = '')
					|| (!isset($_POST['skolioza']) || $_POST['skolioza'] = '')
					|| (!isset($_POST['plasko_koslawe_stopy']) || $_POST['plasko_koslawe_stopy'] = '')
					|| (!isset($_POST['koslawosc_kolan']) || $_POST['koslawosc_kolan'] = '')
					|| (!isset($_POST['cisnienie_wynik']) || $_POST['cisnienie_wynik'] = '')
					|| (!isset($_POST['cisnienie_centyl']) || $_POST['cisnienie_centyl'] = '')	)
					{
						
						//header('Location: dodaj_badanie.php?student_id='.$student_id.'&id_karty='.$id_karty.'&class_id='.$class_id.''); 
						echo "<br> ERROR ! <br>";
						
						exit();							
					}*/
					
					
					/*
					
					*/
					
					/*echo "<br>////////////////////////<br>";
					
					echo "<br> Data = ";
						
						echo "$data";
					
					echo "<br>";					
					echo "<br>////////////////////////<br>";	

					if($data == '')
					{
						echo "<br> Data jest pusta ! ";
					}

					echo "<br>////////////////////////<br>";	
					
					exit();*/					
					
					
					echo "<br>////////////////////////<br>";
					
					/*echo "<br> wiek = ";
						
						echo "$wiek";
					
					echo "<br>";					
					echo "<br>////////////////////////<br>";	

					if($wiek == '')
					{
						echo "<br> $wiek jest pusta ! ";
					}

					echo "<br>////////////////////////<br>";	
					
					exit();*/
						
					if(	
					
					($data == '') || ($wiek == '') || ($wysokosc_cm == '') || ($wysokosc_ct == '')
					|| ($masa_kg == '') || ($masa_ct == '') || ($masa_bmi == '') || ($zez_widoczny == '')
					|| ($zez_cover_test == '') || ($zez_hirschberga == '') || ($ostrosc_op == '') || ($ostrosc_ol == '')
					|| ($sluch_up == '') || ($sluch_ul == '') || ($skolioza == '') || ($plasko_koslawe_stopy == '')
					|| ($koslawosc_kolan == '') || ($cisnienie_wynik == '') || ($cisnienie_centyl == '')
					
					)
					{
						echo "<br> ERROR --- Wszystkie pola muszą być wypełnione ! ";
						//echo "<br> wiek jest pusta ! ";
						echo '<br><a href="dodaj_badanie.php?student_id='.$student_id.'&id_karty='.$id_karty.'&class_id='.$class_id.'"> <- Powrót do formularza</a><br><br>';
						
						exit();
					}				
					//echo "<br> Wszystkie pola są wypełnione";			
					//exit();					
					
					$sql_kzu_testy_przesiewowe = 'INSERT INTO kzu_testy_przesiewowe (Id_Karty, Data, Wiek, Wysokosc_Ciala_Cm, Wysokosc_Ciala_Centyl, Masa_Ciala_Kg, Masa_Ciala_Centyl, Masa_Ciala_Bmi) VALUES('.$id_karty.', "'.$data.'", '.$wiek.', '.$wysokosc_cm.', '.$wysokosc_ct.', '.$masa_kg.', '.$masa_ct.', '.$masa_bmi.')';							

					$result_kzu_testy_przesiewowe = $conn->query($sql_kzu_testy_przesiewowe);

					if($result_kzu_testy_przesiewowe) 
					{
						echo "<br>Wstawiono nowe badanie do bazy - kzu_testy_przesiewowe";
					}
					else
					{
						echo "<br>nie udało się wstawić zapytania - kzu_testy_przesiewowe";
					}
							  
						//$sql_kzu_wzrok = 'INSERT INTO kzu_wzrok (Id_Karty, Data, Zez_Widoczny, Zez_Cover_Test, Zez_Odbicie_Swiatla_Na_Rogowkach, Oko_Prawe, Oko_Lewe) VALUES('.$id_karty.', "'.$data.'", '.$zez_widoczny.', '.$zez_cover_test.', '.$zez_hirschberga.', '.$ostrosc_op.', '.$ostrosc_ol.')';	

						//$sql_kzu_wzrok = 'INSERT INTO kzu_wzrok (Id_Karty, Data, Zez_Widoczny, Zez_Cover_Test, Zez_Odbicie_Swiatla_Na_Rogowkach, Oko_Prawe, Oko_Lewe) VALUES('.$id_karty.', "'.$data.'", '.$zez_widoczny.', '.$zez_cover_test.', '.$zez_hirschberga.', '.$ostrosc_op.', '.$ostrosc_ol.')';
						
						//$sql_kzu_wzrok = "INSERT INTO kzu_wzrok (Id_Karty, Data, Zez_Widoczny, Zez_Cover_Test, Zez_Odbicie_Swiatla_Na_Rogowkach, Oko_Prawe, Oko_Lewe) VALUES($id_karty, $data, $zez_widoczny, $zez_cover_test, $zez_hirschberga, $ostrosc_op, $ostrosc_ol)";
						
					$sql_kzu_wzrok = 'INSERT INTO kzu_wzrok (Id_Karty, Data, Zez_Widoczny, Zez_Cover_Test, Zez_Odbicie_Swiatla_Na_Rogowkach, Oko_Prawe, Oko_Lewe) VALUES('.$id_karty.', "'.$data.'", '.$zez_widoczny.', "'.$zez_cover_test.'", '.$zez_hirschberga.', "'.$ostrosc_op.'", "'.$ostrosc_ol.'")';
						
					$result_kzu_wzrok = $conn->query($sql_kzu_wzrok);

					if($result_kzu_wzrok) 
					{
						echo "<br>Wstawiono nowe badanie do bazy - kzu_wzrok";
					}
					else
					{
						echo "<br>nie udało się wstawić zapytania - kzu_wzrok";
					}
					
							// echo "<br>--------------------------<br>";						
							// echo "data = $data";						
							// echo "<br><br>";						
							// echo $sql_kzu_wzrok;
					
					$sql_kzu_sluch = 'INSERT INTO kzu_sluch (Id_Karty, Data_Badania, Ucho_Prawe, Ucho_Lewe) VALUES('.$id_karty.', "'.$data.'", "'.$sluch_up.'", "'.$sluch_ul.'")';
									
					$result_kzu_sluch = $conn->query($sql_kzu_sluch);

					if($result_kzu_sluch) 
					{
						echo "<br>Wstawiono nowe badanie do bazy - kzu_sluch";
					}
					else
					{
						echo "<br>nie udało się wstawić zapytania - kzu_sluch";
					}
					
					/*echo "<br>--------------------------<br>";						
					echo "data = $data";						
					echo "<br><br>";						
					echo $sql_kzu_sluch;*/
					
					
					//kzu_testy_do_wykrycia
					
					$sql_kzu_testy_do_wykrycia = 'INSERT INTO kzu_testy_do_wykrycia (Id_Karty, Data_Badania, Skolioza, Stopy_Plaskokoslawe, Koslawosc_Kolan) VALUES('.$id_karty.', "'.$data.'", '.$skolioza.', '.$plasko_koslawe_stopy.', '.$koslawosc_kolan.')';
									
					$result_kzu_testy_do_wykrycia = $conn->query($sql_kzu_testy_do_wykrycia);

					if($result_kzu_testy_do_wykrycia) 
					{
						echo "<br>Wstawiono nowe badanie do bazy - kzu_testy_do_wykrycia";
					}
					else
					{
						echo "<br>nie udało się wstawić zapytania - kzu_testy_do_wykrycia";
					}
					
					/*echo "<br>--------------------------<br>";						
					echo "data = $data";						
					echo "<br><br>";						
					echo $sql_kzu_testy_do_wykrycia;*/	
					
					// kzu_cisnienie_tetnicze_krwi				
					$sql_kzu_cisnienie_tetnicze_krwi = 'INSERT INTO kzu_cisnienie_tetnicze_krwi (Id_Karty, Data_Badania, Wynik, Centyl) VALUES('.$id_karty.', "'.$data.'", "'.$cisnienie_wynik.'", "'.$cisnienie_centyl.'")';
									
					$result_kzu_cisnienie_tetnicze_krwi = $conn->query($sql_kzu_cisnienie_tetnicze_krwi);

					if($result_kzu_cisnienie_tetnicze_krwi) 
					{
						echo "<br>Wstawiono nowe badanie do bazy - kzu_cisnienie_tetnicze_krwi";
					}
					else
					{
						echo "<br>nie udało się wstawić zapytania - kzu_cisnienie_tetnicze_krwi";
					}
					
					echo "<br>--------------------------<br>";						
					//echo "data = $data";						
					echo "<br><br>";						
					echo $sql_kzu_cisnienie_tetnicze_krwi;
				}
				
				// klasy 3-6
				
				if(($class_id == 4) || ($class_id == 5) || ($class_id == 6) || ($class_id == 7))
				{
					
					if(	
					
					($data == '') || ($wiek == '') || ($wysokosc_cm == '') || ($wysokosc_ct == '')
					|| ($masa_kg == '') || ($masa_ct == '') || ($masa_bmi == '') || ($ostrosc_op == '') || ($ostrosc_ol == '')
					|| ($widzenie_barw == '') ($skolioza == '') || ($cisnienie_wynik == '') || ($cisnienie_centyl == '')					
					)
					{
						echo "<br> ERROR --- Wszystkie pola muszą być wypełnione ! ";
						//echo "<br> wiek jest pusta ! ";
						echo '<br><a href="dodaj_badanie.php?student_id='.$student_id.'&id_karty='.$id_karty.'&class_id='.$class_id.'"> <- Powrót do formularza</a><br><br>';
						
						exit();
					}	
					
					$sql_kzu_testy_przesiewowe = 'INSERT INTO kzu_testy_przesiewowe (Id_Karty, Data, Wiek, Wysokosc_Ciala_Cm, Wysokosc_Ciala_Centyl, Masa_Ciala_Kg, Masa_Ciala_Centyl, Masa_Ciala_Bmi) VALUES('.$id_karty.', "'.$data.'", '.$wiek.', '.$wysokosc_cm.', '.$wysokosc_ct.', '.$masa_kg.', '.$masa_ct.', '.$masa_bmi.')';							

					$result_kzu_testy_przesiewowe = $conn->query($sql_kzu_testy_przesiewowe);

					if($result_kzu_testy_przesiewowe) 
					{
						echo "<br>Wstawiono nowe badanie do bazy - kzu_testy_przesiewowe";
					}
					else
					{
						echo "<br>nie udało się wstawić zapytania - kzu_testy_przesiewowe";
					}
							  
						//$sql_kzu_wzrok = 'INSERT INTO kzu_wzrok (Id_Karty, Data, Zez_Widoczny, Zez_Cover_Test, Zez_Odbicie_Swiatla_Na_Rogowkach, Oko_Prawe, Oko_Lewe) VALUES('.$id_karty.', "'.$data.'", '.$zez_widoczny.', '.$zez_cover_test.', '.$zez_hirschberga.', '.$ostrosc_op.', '.$ostrosc_ol.')';	

						//$sql_kzu_wzrok = 'INSERT INTO kzu_wzrok (Id_Karty, Data, Zez_Widoczny, Zez_Cover_Test, Zez_Odbicie_Swiatla_Na_Rogowkach, Oko_Prawe, Oko_Lewe) VALUES('.$id_karty.', "'.$data.'", '.$zez_widoczny.', '.$zez_cover_test.', '.$zez_hirschberga.', '.$ostrosc_op.', '.$ostrosc_ol.')';
						
						//$sql_kzu_wzrok = "INSERT INTO kzu_wzrok (Id_Karty, Data, Zez_Widoczny, Zez_Cover_Test, Zez_Odbicie_Swiatla_Na_Rogowkach, Oko_Prawe, Oko_Lewe) VALUES($id_karty, $data, $zez_widoczny, $zez_cover_test, $zez_hirschberga, $ostrosc_op, $ostrosc_ol)";
						
					//$sql_kzu_wzrok = 'INSERT INTO kzu_wzrok (Id_Karty, Data, Widzenie_Barw, Oko_Prawe, Oko_Lewe) VALUES('.$id_karty.', "'.$data.'", "'.$ostrosc_op.'", "'.$ostrosc_ol.'")';
					$sql_kzu_wzrok = 'INSERT INTO kzu_wzrok (Id_Karty, Data, Widzenie_Barw, Oko_Prawe, Oko_Lewe) VALUES('.$id_karty.', "'.$data.'", "'.$widzenie_barw.'", "'.$ostrosc_op.'", "'.$ostrosc_ol.'")';
						
					$result_kzu_wzrok = $conn->query($sql_kzu_wzrok);

					if($result_kzu_wzrok) 
					{
						echo "<br>Wstawiono nowe badanie do bazy - kzu_wzrok";
					}
					else
					{
						echo "<br>nie udało się wstawić zapytania - kzu_wzrok";
					}
					
							// echo "<br>--------------------------<br>";						
							// echo "data = $data";						
							// echo "<br><br>";						
							// echo $sql_kzu_wzrok;
					
					/*$sql_kzu_sluch = 'INSERT INTO kzu_sluch (Id_Karty, Data_Badania, Ucho_Prawe, Ucho_Lewe) VALUES('.$id_karty.', "'.$data.'", "'.$sluch_up.'", "'.$sluch_ul.'")';
									
					$result_kzu_sluch = $conn->query($sql_kzu_sluch);

					if($result_kzu_sluch) 
					{
						echo "<br>Wstawiono nowe badanie do bazy - kzu_sluch";
					}
					else
					{
						echo "<br>nie udało się wstawić zapytania - kzu_sluch";
					}*/
					
					/*echo "<br>--------------------------<br>";						
					echo "data = $data";						
					echo "<br><br>";						
					echo $sql_kzu_sluch;*/
					
					
					//kzu_testy_do_wykrycia
					
					$sql_kzu_testy_do_wykrycia = 'INSERT INTO kzu_testy_do_wykrycia (Id_Karty, Data_Badania, Skolioza) VALUES('.$id_karty.', "'.$data.'", '.$skolioza.')';
									
					$result_kzu_testy_do_wykrycia = $conn->query($sql_kzu_testy_do_wykrycia);

					if($result_kzu_testy_do_wykrycia) 
					{
						echo "<br>Wstawiono nowe badanie do bazy - kzu_testy_do_wykrycia";
					}
					else
					{
						echo "<br>nie udało się wstawić zapytania - kzu_testy_do_wykrycia";
					}
					
					/*echo "<br>--------------------------<br>";						
					echo "data = $data";						
					echo "<br><br>";						
					echo $sql_kzu_testy_do_wykrycia;*/	
					
					// kzu_cisnienie_tetnicze_krwi				
					$sql_kzu_cisnienie_tetnicze_krwi = 'INSERT INTO kzu_cisnienie_tetnicze_krwi (Id_Karty, Data_Badania, Wynik, Centyl) VALUES('.$id_karty.', "'.$data.'", "'.$cisnienie_wynik.'", "'.$cisnienie_centyl.'")';
									
					$result_kzu_cisnienie_tetnicze_krwi = $conn->query($sql_kzu_cisnienie_tetnicze_krwi);

					if($result_kzu_cisnienie_tetnicze_krwi) 
					{
						echo "<br>Wstawiono nowe badanie do bazy - kzu_cisnienie_tetnicze_krwi";
					}
					else
					{
						echo "<br>nie udało się wstawić zapytania - kzu_cisnienie_tetnicze_krwi";
					}
					
					echo "<br>--------------------------<br>";						
					//echo "data = $data";						
					echo "<br><br>";						
					echo $sql_kzu_cisnienie_tetnicze_krwi;
				}
				
				// klasy 7-8
				
				if(($class_id == 8) || ($class_id == 9))
				{
					if(	
					
					($data == '') || ($wiek == '') || ($wysokosc_cm == '') || ($wysokosc_ct == '')
					|| ($masa_kg == '') || ($masa_ct == '') || ($masa_bmi == '') || ($ostrosc_op == '') || ($ostrosc_ol == '')
					|| ($sluch_up == '') || ($sluch_ul == '') || ($skolioza == '') || ($kifoza == '')
					|| ($cisnienie_wynik == '') || ($cisnienie_centyl == '')					
					)
					{
						echo "<br> ERROR --- Wszystkie pola muszą być wypełnione ! ";
						//echo "<br> wiek jest pusta ! ";
						echo '<br><a href="dodaj_badanie.php?student_id='.$student_id.'&id_karty='.$id_karty.'&class_id='.$class_id.'"> <- Powrót do formularza</a><br><br>';
						
						exit();
					}	
					
					
					$sql_kzu_testy_przesiewowe = 'INSERT INTO kzu_testy_przesiewowe (Id_Karty, Data, Wiek, Wysokosc_Ciala_Cm, Wysokosc_Ciala_Centyl, Masa_Ciala_Kg, Masa_Ciala_Centyl, Masa_Ciala_Bmi) VALUES('.$id_karty.', "'.$data.'", '.$wiek.', '.$wysokosc_cm.', '.$wysokosc_ct.', '.$masa_kg.', '.$masa_ct.', '.$masa_bmi.')';							

					$result_kzu_testy_przesiewowe = $conn->query($sql_kzu_testy_przesiewowe);

					if($result_kzu_testy_przesiewowe) 
					{
						echo "<br>Wstawiono nowe badanie do bazy - kzu_testy_przesiewowe";
					}
					else
					{
						echo "<br>nie udało się wstawić zapytania - kzu_testy_przesiewowe";
					}
							  
						//$sql_kzu_wzrok = 'INSERT INTO kzu_wzrok (Id_Karty, Data, Zez_Widoczny, Zez_Cover_Test, Zez_Odbicie_Swiatla_Na_Rogowkach, Oko_Prawe, Oko_Lewe) VALUES('.$id_karty.', "'.$data.'", '.$zez_widoczny.', '.$zez_cover_test.', '.$zez_hirschberga.', '.$ostrosc_op.', '.$ostrosc_ol.')';	

						//$sql_kzu_wzrok = 'INSERT INTO kzu_wzrok (Id_Karty, Data, Zez_Widoczny, Zez_Cover_Test, Zez_Odbicie_Swiatla_Na_Rogowkach, Oko_Prawe, Oko_Lewe) VALUES('.$id_karty.', "'.$data.'", '.$zez_widoczny.', '.$zez_cover_test.', '.$zez_hirschberga.', '.$ostrosc_op.', '.$ostrosc_ol.')';
						
						//$sql_kzu_wzrok = "INSERT INTO kzu_wzrok (Id_Karty, Data, Zez_Widoczny, Zez_Cover_Test, Zez_Odbicie_Swiatla_Na_Rogowkach, Oko_Prawe, Oko_Lewe) VALUES($id_karty, $data, $zez_widoczny, $zez_cover_test, $zez_hirschberga, $ostrosc_op, $ostrosc_ol)";
						
					//$sql_kzu_wzrok = 'INSERT INTO kzu_wzrok (Id_Karty, Data, Widzenie_Barw, Oko_Prawe, Oko_Lewe) VALUES('.$id_karty.', "'.$data.'", "'.$ostrosc_op.'", "'.$ostrosc_ol.'")';
					$sql_kzu_wzrok = 'INSERT INTO kzu_wzrok (Id_Karty, Data, Oko_Prawe, Oko_Lewe) VALUES('.$id_karty.', "'.$data.'", "'.$ostrosc_op.'", "'.$ostrosc_ol.'")';
						
					$result_kzu_wzrok = $conn->query($sql_kzu_wzrok);

					if($result_kzu_wzrok) 
					{
						echo "<br>Wstawiono nowe badanie do bazy - kzu_wzrok";
					}
					else
					{
						echo "<br>nie udało się wstawić zapytania - kzu_wzrok";
					}
					
							// echo "<br>--------------------------<br>";						
							// echo "data = $data";						
							// echo "<br><br>";						
							// echo $sql_kzu_wzrok;
					
					$sql_kzu_sluch = 'INSERT INTO kzu_sluch (Id_Karty, Data_Badania, Ucho_Prawe, Ucho_Lewe) VALUES('.$id_karty.', "'.$data.'", "'.$sluch_up.'", "'.$sluch_ul.'")';
									
					$result_kzu_sluch = $conn->query($sql_kzu_sluch);

					if($result_kzu_sluch) 
					{
						echo "<br>Wstawiono nowe badanie do bazy - kzu_sluch";
					}
					else
					{
						echo "<br>nie udało się wstawić zapytania - kzu_sluch";
					}
					
					/*echo "<br>--------------------------<br>";						
					echo "data = $data";						
					echo "<br><br>";						
					echo $sql_kzu_sluch;*/
					
					
					//kzu_testy_do_wykrycia
					
					$sql_kzu_testy_do_wykrycia = 'INSERT INTO kzu_testy_do_wykrycia (Id_Karty, Data_Badania, Skolioza, Klifoza_Piersiowa) VALUES('.$id_karty.', "'.$data.'", '.$skolioza.', '.$kifoza.')';
									
					$result_kzu_testy_do_wykrycia = $conn->query($sql_kzu_testy_do_wykrycia);

					if($result_kzu_testy_do_wykrycia) 
					{
						echo "<br>Wstawiono nowe badanie do bazy - kzu_testy_do_wykrycia";
					}
					else
					{
						echo "<br>nie udało się wstawić zapytania - kzu_testy_do_wykrycia";
					}
					
					/*echo "<br>--------------------------<br>";						
					echo "data = $data";						
					echo "<br><br>";						
					echo $sql_kzu_testy_do_wykrycia;*/	
					
					// kzu_cisnienie_tetnicze_krwi				
					$sql_kzu_cisnienie_tetnicze_krwi = 'INSERT INTO kzu_cisnienie_tetnicze_krwi (Id_Karty, Data_Badania, Wynik, Centyl) VALUES('.$id_karty.', "'.$data.'", "'.$cisnienie_wynik.'", "'.$cisnienie_centyl.'")';
									
					$result_kzu_cisnienie_tetnicze_krwi = $conn->query($sql_kzu_cisnienie_tetnicze_krwi);

					if($result_kzu_cisnienie_tetnicze_krwi) 
					{
						echo "<br>Wstawiono nowe badanie do bazy - kzu_cisnienie_tetnicze_krwi";
					}
					else
					{
						echo "<br>nie udało się wstawić zapytania - kzu_cisnienie_tetnicze_krwi";
					}
					
					echo "<br>--------------------------<br>";						
					//echo "data = $data";						
					echo "<br><br>";						
					echo $sql_kzu_cisnienie_tetnicze_krwi;
				}
				
				
				
				
				
			
			
			
				echo '<br><br><a href="wyswietl_badanie.php?student_id='.$student_id.'&id_karty='.$id_karty.'&class_id='.$class_id.'"> Wyświetl badania </a>';
				
				
				
				
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


	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
