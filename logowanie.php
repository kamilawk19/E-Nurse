<?php

session_start();

// jeśli kliknięto zaloguj bez podania loginu lub hasła : 
if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
{
	header('Location: index.php'); //przekieruj do pliku index.php
	exit(); // zakończ wykonywanie skryptu
}

require_once "connect.php";

//include 'connect.php';


/*$conn = @new mysqli(servername, $username, $password, $dbname);*/

$conn = @new mysqli($servername, $username, $password, $dbname);

if($conn->connect_errno!=0)
{
    /*echo "Błąd połączenia".@conn->connect_errno." = ".conn->connect_error;*/
    echo "Błąd połączenia".$conn->connect_errno()."\n";
}
else
{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8"); //zabezpieczenie przed wstrzykiwaniem sql
    
	//$haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);
	$haslo_hash = password_hash($haslo, PASSWORD_BCRYPT);
	
	
	
	
	//echo "$haslo_hash";
	
	/*$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");*/

    /*echo "login = $login";
    echo "haslo = $haslo";*/

    $sql = "SELECT * FROM user WHERE username='$login' AND password='$haslo'";

    //echo "sql = ".$sql;

    //$result = $conn->query($sql);

    //if($result = $conn->query($sql))
    //if($result = @$conn->query($sql)) 
    if($result = @$conn->query(sprintf("SELECT * FROM nurse WHERE Login='%s'", mysqli_real_escape_string($conn, $login)))) 
    {
        //echo "tak";
		//exit();

        $users_number = $result->num_rows;
		
		if($users_number>0)
		{
			$row = $result->fetch_assoc();
			
			// weryfikacja hasha :
			
			if(password_verify($haslo, $row['Haslo']))
			{				
				//echo "true";
				//exit();
				//$users_number = $result->num_rows;
				//$result->num_rows;

				/*echo "results - num rows =".$users_number;*/

				//if($users_number>0)
				/*if($result != false && $result->num_rows>0)
				{*/
			
				$_SESSION['zalogowany'] = true;		
				
				
				//$_SESSION['username'] = $row['Imie'];
				//$_SESSION['password'] = $row['password'];
				
				$_SESSION['imie'] = $row['Imie'];
				$_SESSION['nazwisko'] = $row['Nazwisko'];

				//echo "Udało ci się zalogować :) <br>";
				//echo "imie = ".$_SESSION['imie']."<br>";
				//echo "nazwisko = ".$_SESSION['nazwisko']."<br>";
				
				unset($_SESSION['blad']);		

				$result->free_result(); // close(); free(); ... free_result();*/
				//}
			
				header('Location: main.php'); // przekieruj do strony głównej (main) po zalogowaniu
			}
			
			else // // dobry login, złe hasło
			{				
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');				
			}				
		}
		
		else 
		{ // zły login, (obojętnie jakie hasło ...)
				
			$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';	
			header('Location: index.php');
				
		}       
    }
	
	$conn->close();
}


?>