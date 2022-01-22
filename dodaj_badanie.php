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
		echo "Wybrałeś ucznia o id =" . $student_id . "<br>";
		echo "Wybrałeś klasę o id = " . $class_id . "<br>";
		
		
		
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
			
				echo "Badanie przesiewowe <br><br>";
				
				echo "Formularz badania : <br><br>";
				
				
				//echo '<a href="dodaj_badanie.php?school_id='.$school_id.'&student_id='.$student_id.'&id_karty='.$id_karty.'">Badanie przesiewowe</a><br><br>';
				
				/* Badanie przesiewowe :
				
				✓
				
				Data			Wysokość ciała
				Wiek			Masa ciała
				Komentarz		Ostrość wzroku
								Ciśnienie
				
				
				Skierowania		Testy do wykonania
									(skolioza, 
									koślawość kolan,
									Płasko koślawe stopy)
				
				Inne:			Wzrok - zez i widzenie barw
				(słuch,				(widoczny,
				wada wymowy)		 cover test,
									 odbicie światła na rogówkach)
				
				
				
				
				
				✓
				
				
				
				*/
				
				
				
				/*echo '<form action="dodaj_badanie_form.php?id_karty='.$id_karty.'&student_id='.$student_id.'&school_id='.$school_id.'" method="post">';
					echo "<br>nazwa :";
							echo '<br><input type="text" name="nazwa"><br><br>';
							echo '<br><input type="date" name="data"><br><br>';
							echo '<br><input type="text" name="komentarz"><br><br>';							
					echo '<input type="submit" value="Dodaj">';
				echo '</form>';*/
					
				echo "-----------------------------------------------------------------<br>";
		
				if(($class_id == 1) || ($class_id == 2) || ($class_id == 3))
				{					
					echo "id klasy = $class_id<br>";						
					echo "klasy 0-2<br>";						
						// Data dla każdej tabeli będzie ta sama ... 
						
						echo '<form action="badanie.php?id_karty='.$id_karty.'&student_id='.$student_id.'&class_id='.$class_id.'" method="post">';
							
							echo "Data:";
								echo'<br><input type="date" name="data"><br>';
							echo "Wiek:";
								echo '<br><input type="text" name="wiek"><br>';
								
							echo "Wysokość ciała (cm):";
								echo '<br><input type="text" name="wysokosc_cm"><br>';
							echo "Wysokość ciała (centyl):";
								echo '<br><input type="text" name="wysokosc_ct"><br>';								
								
							echo "Masa ciała (kg):";
								echo '<br><input type="text" name="masa_kg"><br>';
							echo "Masa ciała (centyl):";
								echo '<br><input type="text" name="masa_ct"><br>';
							echo "Masa ciała (BMI):";
								echo '<br><input type="text" name="masa_bmi"><br>';	
								
								
							//wzrok															
														
							echo "Zez widoczny :";
								echo '<br><input type="text" name="zez_widoczny"><br>';
							echo "Cover test :";
								echo '<br><input type="text" name="zez_cover_test"><br>';	
							echo "Test Hirschberga (Odbicie światłą na rogówkach) :";
								echo '<br><input type="text" name="zez_hirschberga"><br>';					
					
							
							echo "Ostrosć wzroku (OP):";
								echo '<br><input type="text" name="ostrosc_op"><br>';
							echo "Ostrosć wzroku (OL):";
								echo '<br><input type="text" name="ostrosc_ol"><br>';
								
				
							echo "Słuch (UP):";				
								echo '<br><input type="text" name="sluch_up"><br>';
							echo "Słuch (UL):";				
								echo '<br><input type="text" name="sluch_ul"><br>';
										
							//Testy do wykonania :<br>	//kzu_testy_do_wykrycia
							echo "Skolioza :";
								echo '<br><input type="text" name="skolioza"><br>';
							echo "Płasko koślawe stopy :";
								echo '<br><input type="text" name="plasko_koslawe_stopy"><br>';														
							echo "Koślawośc kolan :";
								echo '<br><input type="text" name="koslawosc_kolan"><br>';							
							
							echo "Ciśnienie: <br>";				
							echo "Wynik:";				
								echo '<br><input type="text" name="cisnienie_wynik"><br>';
							echo "Centyl:";				
								echo '<br><input type="text" name="cisnienie_centyl"><br>';	

							echo '<input type="submit" value="Dodaj">';
						echo '</form>';	
				}
				
				if(($class_id == 4) || ($class_id == 5) || ($class_id == 6) || ($class_id == 7))
				{
					echo "id klasy = $class_id<br>";						
					echo "klasy 3-6<br>";							
						// Data dla każdej tabeli będzie ta sama ... 
						
						echo '<form action="badanie.php?id_karty='.$id_karty.'&student_id='.$student_id.'&class_id='.$class_id.'" method="post">';
							
							echo "Data:";
								echo'<br><input type="date" name="data"><br>';
							echo "Wiek:";
								echo '<br><input type="text" name="wiek"><br>';
								
							echo "Wysokość ciała (cm):";
								echo '<br><input type="text" name="wysokosc_cm"><br>';
							echo "Wysokość ciała (centyl):";
								echo '<br><input type="text" name="wysokosc_ct"><br>';								
								
							echo "Masa ciała (kg):";
								echo '<br><input type="text" name="masa_kg"><br>';
							echo "Masa ciała (centyl):";
								echo '<br><input type="text" name="masa_ct"><br>';
							echo "Masa ciała (BMI):";
								echo '<br><input type="text" name="masa_bmi"><br>';	
								
								
							//wzrok															
														
							/*echo "Zez widoczny :";
								echo '<br><input type="text" name="zez_widoczny"><br>';
							echo "Cover test :";
								echo '<br><input type="text" name="zez_cover_test"><br>';	
							echo "Test Hirschberga (Odbicie światłą na rogówkach) :";
								echo '<br><input type="text" name="zez_hirschberga"><br>';*/	
				
							echo "Ostrosć wzroku (OP):";
								echo '<br><input type="text" name="ostrosc_op"><br>';
							echo "Ostrosć wzroku (OL):";
								echo '<br><input type="text" name="ostrosc_ol"><br>';
							echo "Widzenie barw :";
								echo '<br><input type="text" name="widzenie_barw"><br>';						
				
							/*echo "Słuch (UP):";				
								echo '<br><input type="text" name="sluch_up"><br>';
							echo "Słuch (UL):";				
								echo '<br><input type="text" name="sluch_ul"><br>';*/
										
							//Testy do wykonania :<br>	//kzu_testy_do_wykrycia
							echo "Skolioza :";
								echo '<br><input type="text" name="skolioza"><br>';
							/*echo "Płasko koślawe stopy :";
								echo '<br><input type="text" name="plasko_koslawe_stopy"><br>';														
							echo "Koślawośc kolan :";
								echo '<br><input type="text" name="koslawosc_kolan"><br>';	*/						
							
							echo "Ciśnienie: <br>";				
							echo "Wynik:";				
								echo '<br><input type="text" name="cisnienie_wynik"><br>';
							echo "Centyl:";				
								echo '<br><input type="text" name="cisnienie_centyl"><br>';	

							echo '<input type="submit" value="Dodaj">';
						echo '</form>';	
				}
				
				if(($class_id == 8) || ($class_id == 9))
				{
					echo "id klasy = $class_id<br>";				
					echo "klasy 7-8<br>";							
						// Data dla każdej tabeli będzie ta sama ... 
						
						echo '<form action="badanie.php?id_karty='.$id_karty.'&student_id='.$student_id.'&class_id='.$class_id.'" method="post">';
							
							echo "Data:";
								echo'<br><input type="date" name="data"><br>';
							echo "Wiek:";
								echo '<br><input type="text" name="wiek"><br>';
								
							echo "Wysokość ciała (cm):";
								echo '<br><input type="text" name="wysokosc_cm"><br>';
							echo "Wysokość ciała (centyl):";
								echo '<br><input type="text" name="wysokosc_ct"><br>';								
								
							echo "Masa ciała (kg):";
								echo '<br><input type="text" name="masa_kg"><br>';
							echo "Masa ciała (centyl):";
								echo '<br><input type="text" name="masa_ct"><br>';
							echo "Masa ciała (BMI):";
								echo '<br><input type="text" name="masa_bmi"><br>';	
								
								
							//wzrok															
														
							/*echo "Zez widoczny :";
								echo '<br><input type="text" name="zez_widoczny"><br>';
							echo "Cover test :";
								echo '<br><input type="text" name="zez_cover_test"><br>';	
							echo "Test Hirschberga (Odbicie światłą na rogówkach) :";
								echo '<br><input type="text" name="zez_hirschberga"><br>';*/	
				
							echo "Ostrosć wzroku (OP):";
								echo '<br><input type="text" name="ostrosc_op"><br>';
							echo "Ostrosć wzroku (OL):";
								echo '<br><input type="text" name="ostrosc_ol"><br>';
							//echo "Widzenie barw :";
							//	echo '<br><input type="text" name="widzenie_barw"><br>';						
				
							echo "Słuch (UP):";				
								echo '<br><input type="text" name="sluch_up"><br>';
							echo "Słuch (UL):";				
								echo '<br><input type="text" name="sluch_ul"><br>';
										
							//Testy do wykonania :<br>	//kzu_testy_do_wykrycia
							echo "Skolioza :";
								echo '<br><input type="text" name="skolioza"><br>';
							echo "Kifoza :";
								echo '<br><input type="text" name="kifoza"><br>';								
							/*echo "Płasko koślawe stopy :";
								echo '<br><input type="text" name="plasko_koslawe_stopy"><br>';														
							echo "Koślawośc kolan :";
								echo '<br><input type="text" name="koslawosc_kolan"><br>';	*/						
							
							echo "Ciśnienie: <br>";				
							echo "Wynik:";				
								echo '<br><input type="text" name="cisnienie_wynik"><br>';
							echo "Centyl:";				
								echo '<br><input type="text" name="cisnienie_centyl"><br>';	

							echo '<input type="submit" value="Dodaj">';
						echo '</form>';	
				}
				
				if(($class_id == 10) || ($class_id == 11) || ($class_id == 12))
				{
					echo "id klasy = $class_id<br>";				
					echo "klasy ponadpodstawowe 1-3<br>";							
						// Data dla każdej tabeli będzie ta sama ... 
						
						echo '<form action="badanie.php?id_karty='.$id_karty.'&student_id='.$student_id.'&class_id='.$class_id.'" method="post">';
							
							echo "Data:";
								echo'<br><input type="date" name="data"><br>';
							echo "Wiek:";
								echo '<br><input type="text" name="wiek"><br>';
								
							echo "Wysokość ciała (cm):";
								echo '<br><input type="text" name="wysokosc_cm"><br>';
							echo "Wysokość ciała (centyl):";
								echo '<br><input type="text" name="wysokosc_ct"><br>';								
								
							echo "Masa ciała (kg):";
								echo '<br><input type="text" name="masa_kg"><br>';
							echo "Masa ciała (centyl):";
								echo '<br><input type="text" name="masa_ct"><br>';
							echo "Masa ciała (BMI):";
								echo '<br><input type="text" name="masa_bmi"><br>';	
								
								
							//wzrok															
														
							/*echo "Zez widoczny :";
								echo '<br><input type="text" name="zez_widoczny"><br>';
							echo "Cover test :";
								echo '<br><input type="text" name="zez_cover_test"><br>';	
							echo "Test Hirschberga (Odbicie światłą na rogówkach) :";
								echo '<br><input type="text" name="zez_hirschberga"><br>';*/	
				
							echo "Ostrosć wzroku (OP):";
								echo '<br><input type="text" name="ostrosc_op"><br>';
							echo "Ostrosć wzroku (OL):";
								echo '<br><input type="text" name="ostrosc_ol"><br>';
							//echo "Widzenie barw :";
							//	echo '<br><input type="text" name="widzenie_barw"><br>';						
				
							//echo "Słuch (UP):";				
							//	echo '<br><input type="text" name="sluch_up"><br>';
							//echo "Słuch (UL):";				
							//	echo '<br><input type="text" name="sluch_ul"><br>';
										
							//Testy do wykonania :<br>	//kzu_testy_do_wykrycia
							echo "Skolioza :";
								echo '<br><input type="text" name="skolioza"><br>';
							echo "Kifoza :";
								echo '<br><input type="text" name="kifoza"><br>';								
							/*echo "Płasko koślawe stopy :";
								echo '<br><input type="text" name="plasko_koslawe_stopy"><br>';														
							echo "Koślawośc kolan :";
								echo '<br><input type="text" name="koslawosc_kolan"><br>';	*/						
							
							echo "Ciśnienie: <br>";				
							echo "Wynik:";				
								echo '<br><input type="text" name="cisnienie_wynik"><br>';
							echo "Centyl:";				
								echo '<br><input type="text" name="cisnienie_centyl"><br>';	

							echo '<input type="submit" value="Dodaj">';
						echo '</form>';	
				}
				if($class_id == 13)
				{
					echo "id klasy = $class_id<br>";						
					echo "klasy ponadpodstawowa - 4<br>";							
						// Data dla każdej tabeli będzie ta sama ... 
						
						echo '<form action="badanie.php?id_karty='.$id_karty.'&student_id='.$student_id.'&class_id='.$class_id.'" method="post">';
							
							echo "Data:";
								echo'<br><input type="date" name="data"><br>';
							echo "Wiek:";
								echo '<br><input type="text" name="wiek"><br>';
								
							echo "Wysokość ciała (cm):";
								echo '<br><input type="text" name="wysokosc_cm"><br>';
							echo "Wysokość ciała (centyl):";
								echo '<br><input type="text" name="wysokosc_ct"><br>';								
								
							echo "Masa ciała (kg):";
								echo '<br><input type="text" name="masa_kg"><br>';
							echo "Masa ciała (centyl):";
								echo '<br><input type="text" name="masa_ct"><br>';
							echo "Masa ciała (BMI):";
								echo '<br><input type="text" name="masa_bmi"><br>';	
								
								
							//wzrok															
														
							/*echo "Zez widoczny :";
								echo '<br><input type="text" name="zez_widoczny"><br>';
							echo "Cover test :";
								echo '<br><input type="text" name="zez_cover_test"><br>';	
							echo "Test Hirschberga (Odbicie światłą na rogówkach) :";
								echo '<br><input type="text" name="zez_hirschberga"><br>';*/	
				
							echo "Ostrosć wzroku (OP):";
								echo '<br><input type="text" name="ostrosc_op"><br>';
							echo "Ostrosć wzroku (OL):";
								echo '<br><input type="text" name="ostrosc_ol"><br>';
							//echo "Widzenie barw :";
							//	echo '<br><input type="text" name="widzenie_barw"><br>';						
				
							//echo "Słuch (UP):";				
							//	echo '<br><input type="text" name="sluch_up"><br>';
							//echo "Słuch (UL):";				
							//	echo '<br><input type="text" name="sluch_ul"><br>';
										
							//Testy do wykonania :<br>	//kzu_testy_do_wykrycia
							//echo "Skolioza :";
							//	echo '<br><input type="text" name="skolioza"><br>';
							//echo "Kifoza :";
							//	echo '<br><input type="text" name="kifoza"><br>';								
							/*echo "Płasko koślawe stopy :";
								echo '<br><input type="text" name="plasko_koslawe_stopy"><br>';														
							echo "Koślawośc kolan :";
								echo '<br><input type="text" name="koslawosc_kolan"><br>';	*/						
							
							echo "Ciśnienie: <br>";				
							echo "Wynik:";				
								echo '<br><input type="text" name="cisnienie_wynik"><br>';
							echo "Centyl:";				
								echo '<br><input type="text" name="cisnienie_centyl"><br>';	

							echo '<input type="submit" value="Dodaj">';
						echo '</form>';	
				}
				
				
				
				
				
				
				
		
				echo "-----------------------------------------------------------------<br>";
		
		
				/*switch ($numer_klasy) 
				{
					case 0:
						echo "numer_klasy = 0";						
						// Data dla każdej tabeli będzie ta sama ... 
						
						echo '<form action="badanie.php?id_karty=$id_karty&student_id=$student_id" method="post">';
							
							echo "Data:";
								echo'<br><input type="date" name="data"><br>';
							echo "Wiek:";
								echo '<br><input type="text" name="wiek"><br>';
								
							echo "Wysokość ciała (cm):";
								echo '<br><input type="text" name="wysokosc_cm"><br>';
							echo "Wysokość ciała (centyl):";
								echo '<br><input type="text" name="wysokosc_ct"><br>';
								
								
							echo "Masa ciała (kg):";
								echo '<br><input type="text" name="masa_kg"><br>';
							echo "Masa ciała (centyl):";
								echo '<br><input type="text" name="masa_ct"><br>';
														
														
							echo "Zez widoczny :";
								echo '<br><input type="text" name="zez_widoczny"><br>';
							echo "Cover test :";
								echo '<br><input type="text" name="zez_cover_test"><br>';	
							echo "Test Hirschberga (Odbicie światłą na rogówkach) :";
								echo '<br><input type="text" name="zez_hirschberga"><br>';					
					
					
							echo "Ostrosć wzroku (OP):";
								echo '<br><input type="text" name="ostrosc_op"><br>';
							echo "Ostrosć wzroku (OL):";
								echo '<br><input type="text" name="ostrosc_ol"><br>';
								
				
							echo "Słuch (UP):";				
								echo '<br><input type="text" name="sluch_up"><br>';
							echo "Słuch (UL):";				
								echo '<br><input type="text" name="sluch_ul"><br>';
										
							//Testy do wykonania :<br>
							echo "Skolioza :";
								echo '<br><input type="text" name="skolioza"><br>';
							echo "Płasko koślawe stopy :";
								echo '<br><input type="text" name="plasko_koslawe_stopy"><br>';														
							echo "Koślawośc kolan :";
								echo '<br><input type="text" name="koslawosc_kolan"><br>';
							
							
							echo "Wada wymowy:";				
								echo '<br><input type="text" name="wada_wymowy"><br>';

							echo '<input type="submit" value="Dodaj">';
						echo '</form>';	
						
					break;	
						

					
					case 3:
						echo "numer_klasy = 3";			
						
						echo '<form action="badanie.php?id_karty=$id_karty&student_id=$student_id" method="post">';
							
							echo "Data:";
								echo'<br><input type="date" name="data"><br>';
							echo "Wiek:";
								echo '<br><input type="text" name="wiek"><br>';
								
							echo "Wysokość ciała (cm):";
								echo '<br><input type="text" name="wysokosc_cm"><br>';
							echo "Wysokość ciała (centyl):";
								echo '<br><input type="text" name="wysokosc_ct"><br>';
								
								
							echo "Masa ciała (kg):";
								echo '<br><input type="text" name="masa_kg"><br>';
							echo "Masa ciała (centyl):";
								echo '<br><input type="text" name="masa_ct"><br>';
														
														
							// echo "Zez widoczny :";
								// echo '<br><input type="text" name="zez_widoczny"><br>';
							// echo "Cover test :";
								// echo '<br><input type="text" name="zez_cover_test"><br>';	
							// echo "Test Hirschberga (Odbicie światłą na rogówkach) :";
								// echo '<br><input type="text" name="zez_hirschberga"><br>';	
				
							echo "Ostrosć wzroku (OP):";
								echo '<br><input type="text" name="ostrosc_op"><br>';
							echo "Ostrosć wzroku (OL):";
								echo '<br><input type="text" name="ostrosc_ol"><br>';
							echo "Widzenie barw :";
								echo '<br><input type="text" name="widzenie_barw"><br>';				
					

							echo '<input type="submit" value="Dodaj">';
						echo '</form>';	
						
					break;			
					case 5:
						echo "numer_klasy equals 5";
					break;	
					case 7:
						echo "numer_klasy equals 7";
					break;	
				}*/			








					
							
			?>
			
			<!--<form action="dodaj_badanie_form.php" method="post">
				nazwa:
					<br><input type="text" name="nazwa"><br><br>
				

				<input type="submit" value="Dodaj">
			</form>-->
			
			<!-- -----------------------------------------------------------------<br> -->
			<!-- Formularz (html) : -->
			
			
			
			<!-- <form action="badanie.php?id_karty=<?php echo $id_karty ?>&student_id=<?php echo $student_id?>" method="post">
				Data:
					<br><input type="date" name="data"><br>
				Wiek:
					<br><input type="text" name="wiek"><br>
				Komentarz:
					<br><input type="text" name="komentarz"><br>
					
				Wysokość ciała (cm):
					<br><input type="text" name="wysokosc_cm"><br>
				Wysokość ciała (centyl):
					<br><input type="text" name="wysokosc_ct"><br>
				Masa ciała (kg):
					<br><input type="text" name="masa_kg"><br>
				Masa ciała (centyl):
					<br><input type="text" name="masa_ct"><br>
				Ostrosć wzroku (OP):
					<br><input type="text" name="ostrosc_op"><br>
				Ostrosć wzroku (OL):
					<br><input type="text" name="ostrosc_ol"><br>
				Ciśnienie (Wynik):
					<br><input type="text" name="cisnienie_wynik"><br>
				Ciśnienie (Centyl):
					<br><input type="text" name="cisnienie_ct"><br>
				
				
				Skierowania :
					<br><input type="text" name="skierowania"><br>
				
				
				Testy do wykonania :<br>
				Skolioza :
					<br><input type="text" name="skolioza"><br>
				Koślawośc kolan :
					<br><input type="text" name="koslawosc_kolan"><br>
				Płasko koślawe stopy :
					<br><input type="text" name="plasko_koslawe_stopy"><br>
				
				
				Inne: <br>
				Słuch (UP):				
					<br><input type="text" name="sluch_up"><br>
				Słuch (UL):				
					<br><input type="text" name="sluch_ul"><br>
				Wada wymowy:				
					<br><input type="text" name="wada_wymowy"><br>	
					
					
				Wzrok - zez i widzenie barw <br>				
				Widoczny:				
					<br><input type="text" name="wzrok_widoczny"><br>	
				Cover test:				
					<br><input type="text" name="cover_test"><br>	
				Odbicie światła na rogówkach:				
					<br><input type="text" name="odbicie_swiatla"><br>						

				<input type="submit" value="Dodaj">
			</form> -->
			
			
			
			
		</div>	
		
		<div id="footer">	
			footer		
		</div>	
		
	</div>
</body>
</html>


	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
