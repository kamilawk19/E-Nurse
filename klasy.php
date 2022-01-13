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
		
		$school_id = $_GET['school_id'];
		
		//echo $x;
		
		echo "Wybrałeś szkołę o id =" . $school_id . " ";
		
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

			//$sql = "SELECT DISTINCT Class FROM class";
			
			
			//$sql = "SELECT * FROM class GROUP BY Class";
			$sql = "SELECT * FROM class WHERE Id_School = $school_id";	
			
			//$sql_id = "SELECT Id FROM school";

			//echo "sql = ".$sql;

			$result = $conn->query($sql);
			//$result_id = $conn->query($sql_id);

			
			//if($result = $conn->query($sql))
			//if($result = @$conn->query($sql)) 
			if($result) 
			{
				//echo "tak";
				//exit();

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
							
							echo '<a href="klasa.php?class_id='.$row['Id'].'&school_id='.$school_id.'">';						
							//echo '<span name="school_id" >';
								//echo $row["Id"] . ", ". $row["Name"]. "<br>";
								//echo $row["Id"] . ", ". $row["Name"];
								//echo $row['Id'] . ", " . $row["Class"] . ", " . $row['Profile'] . ", " . $row['Id_School']  ;
								echo $row["Class"];
							echo '</a><br>';
							
							// ! SELECT * FROM `class` GROUP BY Class
							
							
							
							
							
							
							
							
							
							
						
						//echo '<input type="submit" value="wyslij">';
						
						//echo '</form>';
						
						
						
						//$id = $row['Id'];

						

						//echo '<button onclick="hello()">'.$id.'</button>';	
						
						//$_SESSION['school_id'] = $id;
						
						//echo "<br> zmienna sesyjna = " .$_SESSION['school_id'] . "<br>";
						
						//echo "<a href='test.php'>test.php</a>";
						
						








						
					}
					
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


	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
