<?php

session_start();

if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
{
	header('Location: index.php'); 
	exit();
}

require_once "connect.php";

$conn = @new mysqli($servername, $username, $password, $dbname);

if($conn->connect_errno!=0)
{    
    echo "Błąd połączenia".$conn->connect_errno()."\n";
}
else
{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8");     
	
	$haslo_hash = password_hash($haslo, PASSWORD_BCRYPT);

    //$sql = "SELECT * FROM user WHERE username='$login' AND password='$haslo'";
   
    if($result = @$conn->query(sprintf("SELECT * FROM nurse WHERE Login='%s'", mysqli_real_escape_string($conn, $login)))) 
    {
        $users_number = $result->num_rows;
		
		if($users_number>0)
		{
			$row = $result->fetch_assoc();	
			
			if(password_verify($haslo, $row['Haslo']))
			{									
				$_SESSION['zalogowany'] = true;	
				
				$_SESSION['nurseid'] = $row['Id'];
				$_SESSION['imie'] = $row['Imie'];
				$_SESSION['nazwisko'] = $row['Nazwisko'];			
						
				
				unset($_SESSION['blad']);		

				$result->free_result(); // close(); free(); ... free_result();*/			
			
				header('Location: wybor_szkoly.php');  
			}			
			else 
			{				
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');				
			}				
		}		
		else 
		{ 				
			$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';	
			header('Location: index.php');				
		}       
    }
	
	$conn->close();
}

?>