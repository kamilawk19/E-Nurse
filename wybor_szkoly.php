<?php
	echo "wybor szkoły - wybor_szkoly.php";
	
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
    <title>E-nurse - wybor szkoly</title>
    <link rel="stylesheet" href="style.css">	
	<style></style>	
</head>

<body>	
	<?php	
		echo '<br> [ <a href="logout.php">Wyloguj się </a>]</p>';			
	?>	
	
	<p> Wybierz placówkę szkolną :</p>		
	
	<?php	
		
		require_once "connect_edziennik.php";				
		
		$conn = @new mysqli($servername, $username, $password, $dbname);

		if($conn->connect_errno!=0)
		{			
			echo "Błąd połączenia".$conn->connect_errno()."\n";
		}		
		else
		{		
			$sql = "SELECT Id, Name FROM school";			

			$result = $conn->query($sql);
			
			if($result) 
			{
				$number_of_rows = $result->num_rows;
				
				if($number_of_rows>0)
				{
					//$row = $result->fetch_assoc();
					
					while($row = $result->fetch_assoc())
					{										
						echo '<a href="main.php?school_id='.$row['Id'].' ">';				
						echo $row["Name"];
						echo '</a><br><br>';									
						$id = $row['Id'];
					}					
				}				
				else 
				{ 					
					echo "<br>brak danych do wyświetlenia<br>";						
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


	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
