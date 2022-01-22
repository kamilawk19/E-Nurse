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
	
		$nurse_id = $_SESSION['nurseid']; // pobierz ID pielęgniarki która się zalogowała ✓
		
		// wybierz tylko tę szkoły, do których należy pielęgniarka		
		
			//echo "<br> nurse_id = $nurse_id <br>";		
		
		require_once "connect.php";				
		
		$conn = @new mysqli($servername, $username, $password, $dbname);

		if($conn->connect_errno!=0)
		{				
			echo "[ Błąd połączenia ] (".$conn->connect_errno."), Opis: ".$conn->connect_error;
		}		
		else
		{		
			$sql = "SELECT School_Id FROM nurse_school WHERE Nurse_Id=$nurse_id";	 		
			//$sql = "SELECT School_Id FROM nurse_school";		

			$result = $conn->query($sql);
			
			if($result) 
			{
				$number_of_rows = $result->num_rows;
				
				if($number_of_rows>0)
				{
					//$row = $result->fetch_assoc();
					
					while($row = $result->fetch_assoc())
					{										
						//echo '<a href="main.php?school_id='.$row['Id'].' ">';				
						//echo $row["Name"];
						//echo '</a><br><br>';											
						//echo $row["School_Id"];
						$school_id = $row['School_Id'];									
					}					
				}				
				else 
				{ 					
					echo "<br>brak danych do wyświetlenia<br>";						
				}       
			}			
			$conn->close();
		}
	
	
		//echo "school_id = $school_id<br>";
	
		//$_SESSION['nurseid'];
				
		require_once "connect_edziennik.php";				
		
		$conn = @new mysqli($servername, $username, $password, $dbname);

		if($conn->connect_errno!=0)
		{			
			echo "Błąd połączenia".$conn->connect_errno()."\n";
		}		
		else
		{		
			$sql = "SELECT Id, Name FROM school WHERE Id=$school_id";			

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
						//$id = $row['Id'];
						$_SESSION['school_id'] = $row['Id']; 
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
	
	<!--<div id="container">
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
	</div>-->
</body>
</html>


	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
