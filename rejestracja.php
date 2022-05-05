<a href="index.php"> index </a><br><br>

<?php
	session_start();

	if(
	(isset($_POST['imie'])) &&
	(isset($_POST['nazwisko'])) &&
	(isset($_POST['nick'])) &&
	(isset($_POST['email'])) &&
	(isset($_POST['haslo1'])) &&
	(isset($_POST['haslo2'])) &&	
	(isset($_POST['telefon'])) &&	
	(isset($_POST['licencja']))&&	
	(isset($_POST['numer_szkoly']))	
	) 
	{			
		$wszystko_OK = true;				
		
		$nick = $_POST['nick'];
		$imie = $_POST['imie'];
		$nazwisko = $_POST['nazwisko'];
		$telefon = $_POST['telefon'];
		$licencja = $_POST['licencja'];
		$numer_szkoly = $_POST['numer_szkoly'];
			
			
		if( (strlen($nick)<3) || (strlen($nick)>20) )
		{
			$wszystko_OK = false;
			$_SESSION['e_nick'] = "Nick musi posiadać od 3 do 20 znaków!";		
		}	
		
		if(ctype_alnum($nick) == false) 
		{
			$wszystko_OK = false;
			$_SESSION['e_nick'] = "Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
		}		
		
		if((strlen($imie)<1))
		{
			$wszystko_OK = false;
			$_SESSION['e_imie'] = "Podaj poprawne imię!";		
		}
		
		if(ctype_alnum($imie) == false)
		{
			$wszystko_OK = false;
			$_SESSION['e_imie'] = "Podaj poprawne imię!";
		}
		
		if((strlen($nazwisko)<1))
		{
			$wszystko_OK = false;
			$_SESSION['e_nazwisko'] = "Podaj poprawne nazwisko!";		
		}
		
		if(ctype_alnum($nazwisko) == false)
		{
			$wszystko_OK = false;
			$_SESSION['e_nazwisko'] = "Podaj poprawne nazwisko!";
		}
		
		if((strlen($telefon)<3))
		{
			$wszystko_OK = false;
			$_SESSION['e_telefon'] = "Podaj poprawny numer telefonu!";		
		}
		
		if((strlen($licencja)<3))
		{
			$wszystko_OK = false;
			$_SESSION['e_licencja'] = "Podaj poprawną licencję!";		
		}
		
		if(ctype_alnum($licencja) == false) 
		{
			$wszystko_OK = false;
			$_SESSION['e_licencja'] = "Licencja może składać się tylko z liter i cyfr !";
		}		
		
		$email = $_POST['email'];		
		
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL); 		
		
		if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false))
		{			
			$wszystko_OK = false;
			$_SESSION['e_email'] = "Podaj poprawny adres e-mail!";
		}		
		
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if((strlen($haslo1)<8) || (strlen($haslo1)>20)) 
		{
			$wszystko_OK = false;
			$_SESSION['e_haslo'] = "Hasło musi posiadać od 8 do 20 znaków!";
		}		
		
		if($haslo1 != $haslo2)
		{
			$wszystko_OK = false;
			$_SESSION['e_haslo'] = "Podane hasła nie są identyczne!";
		}
		
		$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
		
		if(!isset($_POST['regulamin']))
		{
			$wszystko_OK = false;
			$_SESSION['e_regulamin'] = "Potwierdź akceptację regulaminu!";
		}				
		
		$sekret = "6LcW48gfAAAAALDhZZERPDMpGD5aYMcLJ3s_IszG"; // secret key
		
		
		//$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']); j
		$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
				
		$odpowiedz = json_decode($sprawdz); 
		
		//if(!($odpowiedz->success))       // można także użyć takiego zapisu
		/*if($odpowiedz->success == false) // właściwość success
		{
			$wszystko_OK = false;
			$_SESSION['e_bot'] = "Potwierdź, że nie jesteś botem!";
		}*/
		
		if ($odpowiedz->success==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
		}
		
		//////////////////////////////////////////////////////////////////
		
		// Zapamiętanie danych z formularza : 
		// Formularz pamiętający wprowadzone dane :
		
		// Zapamiętaj wprowadzone dane :
		
		$_SESSION['fr_nick'] = $nick; 
		$_SESSION['fr_email'] = $email; 
		$_SESSION['fr_haslo1'] = $haslo1; 
		$_SESSION['fr_haslo2'] = $haslo2; 		
		
		if(isset($_POST['regulamin'])) 
		{
			$_SESSION['fr_regulamin'] = true;
		}		
		
		//////////////////////////////////////////////////////////////////
		
		//sprawdzenie czy taki user (login i hasło) istnieje już w bazie :
				
		require_once "connect.php";
		
		mysqli_report(MYSQLI_REPORT_STRICT); // chcemy rzucać EXCEPTION		
		
		try 
		{			
			$polaczenie = new mysqli($servername, $username, $password, $dbname);
			
			if($polaczenie->connect_errno!=0) 
			{			
				throw new Exception(mysqli_connect_errno()); 
			}
			else	
			{							
				$rezultat = $polaczenie->query("SELECT Id FROM nurse WHERE Email='$email'");
				
				if(!$rezultat) 
				{
					throw new Exception($polaczenie->error); 
				}
				
				$ile_takich_maili = $rezultat->num_rows; 
				
				if($ile_takich_maili>0)
				{
					$wszystko_OK = false;
					$_SESSION['e_email'] = "Istnieje już konto przypisane do tego adresu email!";
				}					
										
				$rezultat = $polaczenie->query("SELECT Id FROM nurse WHERE Login='$nick'");
				
				if(!$rezultat) 
				{
					throw new Exception($polaczenie->error);
				}
				
				$ile_takich_nickow = $rezultat->num_rows; 
				
				if($ile_takich_nickow>0)
				{
					$wszystko_OK = false;
					$_SESSION['e_nick'] = "Istnieje już gracz o takim nicku! Wybierz inny.";
				}	

				if($wszystko_OK == true)
				{					
					$result_nurse = $polaczenie->query("INSERT INTO nurse VALUES (NULL, '$imie', '$nazwisko', '$nick', '$haslo_hash', '$telefon', '$email', '$licencja')");					
					
					if($result_nurse) 
					{
						$result = $polaczenie->query("SELECT Id FROM nurse WHERE Login='$nick'");
						
						$wiersz = $result->fetch_assoc();		
			
						//$_SESSION['abc'] = $wiersz['Id'];
						//					 $wiersz['Id']; // Id pielęgniarki (nowy użytkownik)						
						
						$nurse_id = $wiersz['Id'];
						
						$result_nurse_school = $polaczenie->query("INSERT INTO nurse_school VALUES ('$numer_szkoly', '$nurse_id')");
						
						if($result_nurse_school) 
						{														
							$_SESSION['udanarejestracja'] = true;
							
							header('Location: index.php');
						}
						else 
						{						
							throw new Exception($polaczenie->error); 
						}									
					}
					else 
					{						
						throw new Exception($polaczenie->error); 
					}
					
				}						
				
				$polaczenie->close(); 
			}		
			
		}
		catch(Exception $e)
		{		
			echo '<div class="error"> [ Błąd serwera. Przepraszamy za niegodności i prosimy o rejestrację w innym terminie! ]</div>';

			echo '<br><span style="color:red">Informacja developerska: </span>'.$e; 
		}			
	}
	
	/*
	if(
	(empty($_POST['nick'])) &&
	(empty($_POST['email'])) &&
	(empty($_POST['haslo1'])) &&
	(empty($_POST['haslo2']))	
	) 
	{	
		echo "<br> Zmienne są puste ! <br>";		
	}
	else
	{
		echo "<br> Zmienne nie są puste <br>";
	}*/
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>e nurse</title>
	<!-- Tutaj umieszczamy kod reCAPTCHA (v3 Documentation) -->
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<!-- <link rel="stylesheet" href="style.css"> -->
	<!-- <style>
		.error
		{
			color: red;
			margin: 10px 0px 10px 0px;
		}
	</style>	-->	
</head>

<body>

	<!-- Formularz rejestracji -->	
	
	<form method="post">
		<!-- brak atrybutu action - ten sam plik rejestracja.php przetwarza formularz		
		bez atrybutu action, domyślnie - ten sam plik otrzyma post'em przesłane dane 
						WALIDACJA DANYCH W W TYM SAMYM PLIKU ! (rejestracja.php) -->
		
		Numer szkoły (ID) : <br> <input type="number" name="numer_szkoly"> <br>		
		
		<?php		
			if(isset($_SESSION['e_imie'])) // błąd z imieniem ...
			{
				echo '<div class="error">'.$_SESSION['e_imie'].'</div>';
				unset($_SESSION['e_imie']);
			}		
		?>
		
		Imie: <br> <input type="text" name="imie"> <br>		
		
		<?php		
			if(isset($_SESSION['e_imie'])) // błąd z imieniem ...
			{
				echo '<div class="error">'.$_SESSION['e_imie'].'</div>';
				unset($_SESSION['e_imie']);
			}		
		?>
		
		Nazwisko: <br> <input type="text" name="nazwisko"> <br>		
		
		<?php		
			if(isset($_SESSION['e_nazwisko'])) // błąd z nazwiskiem ...
			{
				echo '<div class="error">'.$_SESSION['e_nazwisko'].'</div>';
				unset($_SESSION['e_nazwisko']);
			}		
		?>		
		
		
		Nickname: <br> <input type="text" name="nick" value="<?php 		
			if(isset($_SESSION['fr_nick']))
			{
				echo $_SESSION['fr_nick'];
				unset($_SESSION['fr_nick']);
			}		
		?>"> <br>		
		
		<?php		
			if(isset($_SESSION['e_nick'])) // błąd z nickiem użytkownika ...
			{
				echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
				unset($_SESSION['e_nick']);
			}		
		?>
		
		Telefon: <br> <input type="text" name="telefon"><br>		
		
		<?php		
			if(isset($_SESSION['e_telefon'])) // błąd z nazwiskiem ...
			{
				echo '<div class="error">'.$_SESSION['e_telefon'].'</div>';
				unset($_SESSION['e_telefon']);
			}		
		?>
		
		Licencja: <br> <input type="text" name="licencja"><br>		
		
		<?php		
			if(isset($_SESSION['e_licencja'])) // błąd z nazwiskiem ...
			{
				echo '<div class="error">'.$_SESSION['e_licencja'].'</div>';
				unset($_SESSION['e_licencja']);
			}		
		?>		
		
		E-mail: <br> <input type="text" name="email" value="<?php 		
			if(isset($_SESSION['fr_email']))
			{
				echo $_SESSION['fr_email'];
				unset($_SESSION['fr_email']);
			}		
		?>"> <br>
		<?php		
			if(isset($_SESSION['e_email'])) // błąd z nickiem użytkownika ...
			{
				echo '<div class="error">'.$_SESSION['e_email'].'</div>';
				unset($_SESSION['e_email']);
			}		
		?>
		
		
		Hasło: <br> <input type="password" name="haslo1" value="<?php 		
			if(isset($_SESSION['fr_haslo1']))
			{
				echo $_SESSION['fr_haslo1'];
				unset($_SESSION['fr_haslo1']);
			}		
		?>"> <br>
		<?php		
			if(isset($_SESSION['e_haslo'])) // błąd z nickiem użytkownika ...
			{
				echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
				unset($_SESSION['e_haslo']);
			}		
		?>
		Powtórz hasło: <br> <input type="password" name="haslo2" value="<?php 		
			if(isset($_SESSION['fr_haslo2']))
			{
				echo $_SESSION['fr_haslo2'];
				unset($_SESSION['fr_haslo2']);
			}		
		?>"> <br>
	
		<label>
			<input type="checkbox" name="regulamin" <?php
			
				if(isset($_SESSION['fr_regulamin']))
				{
					echo "checked";
					unset($_SESSION['fr_regulamin']);
				}
			
			?>> Akceptuję regulamin
		</label>
		<?php		
			if(isset($_SESSION['e_regulamin'])) // błąd z akceptacją regulaminu (checkbox) ...
			{
				echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
				unset($_SESSION['e_regulamin']);
			}		
		?>	
		<br>	
				
		<div class="g-recaptcha" data-sitekey="6LcW48gfAAAAAGUsG8FaLDe_j8U6ZPbECr8egdx1"></div>		
		
		<?php		
			if(isset($_SESSION['e_bot'])) // błąd z re'captcha ...
			{
				echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
				unset($_SESSION['e_bot']);
			}		
		?>			
		
		<br>		
		<input type="submit" value="Zarejestruj się" >	
		
		<!-- reCAPTCHA (v2) - konto jan.nowak.6820@gmail.com

			klucze reCAPTCHA (v2) :
				Site key = klucz jawny (HTML)
				Secret key = klucz tajny (PHP)		
						
			Tworzenie reCaptcha:

				google.com/recaptcha

				-> v3 Admin Console 
				-> Utwórz + (google.com/recaptcha/admin/create)

			etykieta: "XAMPP"
			nazwa domeny : "localhost"

			Site Key   : 6LcW48gfAAAAAGUsG8FaLDe_j8U6ZPbECr8egdx1   	(html)
			Secret Key : 6LcW48gfAAAAALDhZZERPDMpGD5aYMcLJ3s_IszG		(PHP)	

			Umieszceznie reCAPTCHA w html :			
			-> v3 Documentation
		-->
		
	</form>	
</body>
</html>