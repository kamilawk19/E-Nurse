<?php
	session_start();	
	
	//po wejściu na stronę index.php, jeśli jesteśmy zalogowani, przekieruje nas do maina (str głównej)
	if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) 
	{
		header('Location: main.php');
		exit(); // zakończ wykonywanie skryptu - opuszczamy plik index.php
	}
?>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>E-nurse</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>

	<p>Zaloguj się do systemu E-nurse</p>


    <form action="logowanie.php" method="post">
        Login:
            <br><input type="text" name="login"><br>
        Hasło:
			<br><input type="password" name="haslo"><br><br>

        <input type="submit" value="Zaloguj się">
    </form>
	
	<?php
		if(isset($_SESSION['blad']))
		{
			echo $_SESSION['blad'];
		}	
	?>
</body>
</html>



