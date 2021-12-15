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
    $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");

    /*echo "login = $login";
    echo "haslo = $haslo";*/

    $sql = "SELECT * FROM user WHERE username='$login' AND password='$haslo'";

    //echo "sql = ".$sql;

    //$result = $conn->query($sql);

    //if($result = $conn->query($sql))
    //if($result = @$conn->query($sql)) 
    if($result = @$conn->query(sprintf("SELECT * FROM user WHERE username='%s' AND password='%s'", mysqli_real_escape_string($conn, $login), mysqli_real_escape_string($conn, $haslo)))) 
    {
        /*echo "tak";*/

        $users_number = $result->num_rows;
		
		if($users_number>0)
		{
			//$users_number = $result->num_rows;
			//$result->num_rows;

			/*echo "results - num rows =".$users_number;*/

			//if($users_number>0)
			/*if($result != false && $result->num_rows>0)
			{*/
		
			$_SESSION['zalogowany'] = true;		
			
			$row = $result->fetch_assoc();

			$_SESSION['username'] = $row['username'];
			$_SESSION['password'] = $row['password'];

			//echo "Udało ci się zalogować :) <br>";
			//echo "username = $username <br>";
			//echo "password = $password";
			
			unset($_SESSION['blad']);		

			$result->free_result(); // close(); free(); ... free_result();*/
			//}
		
			header('Location: main.php'); // przekieruj do strony głównej (main) po zalogowaniu
		
		}
		
		else // gdy podano niepoprawne dane
		{
			echo "Zły login lub hasło";
			
			header('Location: index.php');
			
			
			
		}        
    }
	
	$conn->close();
}


?>