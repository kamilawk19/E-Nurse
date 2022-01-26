<?php
	echo "dziennik codzienny - dziennik.php";
	session_start();
	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: /front/index.php');
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
	<div id="container">
	
		<div id="header">
			header		
		</div>	
		
		<div id="nav">			
			<?php
				//echo '<a href="main.php?school_id='.$school_id.' ">Strona główna</a><br>';
				echo '<a href="/front/main.php">Strona główna</a><br>';
				echo '<a href="klasy.php">Klasy</a><br>';
				echo '<a href="dziennik.php">Dziennik codzienny</a><br>';
			?>	
		</div>	
		
		<!--<div id="left">
			left
		
		</div>-->
		
		<div id="content">
			<?php	

				//pobranie info z e-nurse
				$school_id = $_SESSION['school_id'];
				require_once "connect.php";

				$numer=array();
				$data=array();
				$id_ucznia=array();
				$id_klasy=array();
				$klasa=array();
				$uczen=array();
				$opis=array();
				$podano=array();
				$id_autor=array();
				$autor=array();

				$conn = @new mysqli($servername, $username, $password, $dbname);	
				if($conn->connect_errno!=0){
					echo "Błąd połączenia".$conn->connect_errno()."\n";
				}else{	
					$sql = "SELECT * FROM dziennik WHERE Id_Szkoly ='".$school_id."'";		
					$result = $conn->query($sql);
					if($result) {
						$number_of_rows = $result->num_rows;
						if($number_of_rows>0){
							while($row = $result->fetch_assoc())
							{
								array_push($numer, $row["Id_Wpisu"]);
								array_push($data, $row["Data"]);
								if( empty($row["Id_Ucznia"]) || $row["Id_Ucznia"]==NULL){
									array_push($id_ucznia, "NULL");
								}else{
									array_push($id_ucznia, $row["Id_Ucznia"]);
								}
								if( empty($row["Id_Klasy"]) || $row["Id_Klasy"]==NULL ){
									array_push($id_klasy, "NULL");
								}else{
									array_push($id_klasy, $row["Id_Klasy"]);
								}
								array_push($opis, $row["Opis_Zdarzenia"]);
								array_push($podano, $row["Co_Podano"]);
								array_push($id_autor, $row['Nurse_Id']);									
							}									
						}else{ 
							echo "<h3>Brak wpisów</h3>";
						}
					}

					for($i=0; $i<count($id_autor);$i++){
						if($id_autor[$i]!="NULL"){
							$sql="SELECT `Imie`, `Nazwisko` FROM `nurse` WHERE `Id`='".$id_autor[$i]."'";
							$result = $conn->query($sql);
							if($result) {
								$number_of_rows = $result->num_rows;
								if($number_of_rows>0){
									while($row = $result->fetch_assoc())
									{
										$au=$row['Imie']." ".$row['Nazwisko']."";
										array_push($autor,$au);								
									}									
								}
							}
						}
					}

					$conn->close();
				}

				echo "<p>Witaj ".$_SESSION['imie']." ".$_SESSION['nazwisko'].'! [ <a href="logout.php">Wyloguj się </a>]</p>';	
				require_once "connect_edziennik.php";
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				$sql="SELECT `Name` FROM `school` WHERE `Id`='".$_SESSION['school_id']."'";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result) < 2) {
					while($row = mysqli_fetch_assoc($result)) {
						$school_name=$row["Name"];
					}
				}
				
				echo "Wybrałeś szkołę: " . $school_name . " ";
				// dodatkowy warunek do zaimplementowania w przyszłości : jeśli zmienna $x jest nieustawiona, wróć do wyboru szkoły.php		
				
				echo '<button id="redirect_add" class="submit-button" >Dodaj badanie</button><br>';
				echo "<h2>Dziennik codzienny </h2>";

				for($i=0; $i<count($id_klasy);$i++){
					if($id_klasy[$i]!="NULL"){
						$sql="SELECT `Class` FROM `class` WHERE `Id`='".$id_klasy[$i]."' AND `Id_School`='".$_SESSION['school_id']."'";
						$result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_assoc($result)) {
								array_push($klasa,$row["Class"]);
							}
						}
					}else{
						array_push($klasa,"-");
					}
				}

				for($i=0; $i<count($id_ucznia);$i++){
					if($id_ucznia[$i]!="NULL"){
						$sql="SELECT `First_Name`, `Second_Name`, `Last_Name` FROM `student` WHERE `Id`='".$id_ucznia[$i]."' AND `School_Id`='".$_SESSION['school_id']."'";
						$result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result) < 2) {
							while($row = mysqli_fetch_assoc($result)) {
								$stu=$row['First_Name']." ".$row['Second_Name']." ".$row['Last_Name']."";
								array_push($uczen,$stu);
							}
						}
					}else{
						array_push($uczen,"-");
					}
				}

				echo "<table>";
				for($i=0;$i<count($numer);$i++){

					if($i==0){
						echo"<tr> <th>Numer wpisu</th> <th>Data</th> <th>Klasa</th> <th>Uczeń</th> <th>Opis</th> <th>Co podano</th> <th>Pielęgniarka</th> </tr>";
					}

					echo "<tr>";
					echo "<td>".$numer[$i]."</td>";
					echo "<td>".$data[$i]."</td>";
					echo "<td>".$klasa[$i]."</td>";
					echo "<td>".$uczen[$i]."</td>";
					echo "<td>".$opis[$i]."</td>";
					echo "<td>".$podano[$i]."</td>";
					echo "<td>".$autor[$i]."</td>";
					echo "</tr>";
				}
				echo "</table>";

				mysqli_close($conn);
			?>	
		</div>	
		
		<div id="footer">	
			<p>footer</p>
		</div>	
		
	</div>

<!--skrypt z js ->

<script type="text/javascript">
    document.getElementById("redirect_add").onclick = function () {
        location.href = "dziennik_dodaj_wpis.php";
    };
</script>

</body>
</html>