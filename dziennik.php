<?php
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
    <title>E-Nurse - Dziennik codzienny</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>

<script type="text/javascript">
    function re(idd){
        window.location.href = "dziennik_edytuj_wpis.php?re="+idd;
    };

    function rd(idd){
        var warning="Czy jesteś pewien, że chcesz usunąć wpis o numerze "+idd.slice(1,2)+"?";
        if (confirm(warning)) {
            window.location.href = "dziennik_usun_wpis.php?rd="+idd;
        }
    };



</script>

    <nav class="navbar">

        <div class="navbar-brand navbar__heading">
            <img src="images/logo.svg" alt="E-Nurse logo" />
            <div class="subtitle">
                <h3>System zarządzania</h3>
                <h3>medycyną szkolną</h3>
            </div>
        </div>

        <ul class="navbar__list">
            <?php
            echo '<a href="main.php?school_id='.$_SESSION['school_id'].'"><li class="navbar__list-item navbar__list-item-current"><h3>Home</h3></li></a>';
            echo '<a href="klasy.php?school_id='.$_SESSION['school_id'].'"><li class="navbar__list-item "><h3>Klasy</h3></li></a>';
            echo '<a href="dziennik.php?school_id='.$_SESSION['school_id'].'"><li class="navbar__list-item "><h3>Dziennik codzienny</h3></li></a>';
            echo '<a href="main.php?school_id='.$_SESSION['school_id'].'"><li class="navbar__list-item "><h3>Wiadomości</h3></li></a>';
            echo '<a href="main.php?school_id='.$_SESSION['school_id'].'"><li class="navbar__list-item "><h3>Kalendarz</h3></li></a>';
            ?>
        </ul>

        <div class="navbar__buttons-container">
            <a class="" href="notifications.html"><img class="notiffication_img img-fluid" src="images/notification.svg"></a>
            <a class="" href="setting.html"><img class="setting_img img-fluid" src="images/setting.svg"></a>
            <a class="btn-blue--filled" href="../logout.php">Wyloguj się</a>
        </div>
    </nav>
    <div class="container">

			<?php	

                //alert od usuniecia danych
                if(isset($_GET['err'])){
                    if($_GET["err"]==0){
                        echo "<script type='text/javascript'>alert('Usunięto wpis')</script>";
                    }
                    if($_GET["err"]==1){
                        echo "<script type='text/javascript'>alert('Nie udało się usunąć wpisu')</script>";
                    }
                }



				//pobranie info z e-nurse
				$school_id = $_SESSION['school_id'];
				require_once "../connect.php";

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

//				echo "<p>Witaj ".$_SESSION['imie']." ".$_SESSION['nazwisko'].'! [ <a href="logout.php">Wyloguj się </a>]</p>';
				require_once "../connect_edziennik.php";
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				$sql="SELECT `Name` FROM `school` WHERE `Id`='".$_SESSION['school_id']."'";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result) < 2) {
					while($row = mysqli_fetch_assoc($result)) {
						$school_name=$row["Name"];
					}
				}

                echo '<header>
                    <div class="col-md-6 offset-md-3">
                        <h1 class="">Dziennik codzienny</h1>
                        <h3 class="col-md-12">'.$school_name.'</h3>
                    </div>
                    <div class="col-md-3 badanie_edit_btn">
                        <a id="redirect_add" class="btn-peach--filled submit-button" href="#">Dodaj</a>
                    </div>
                </header>
				 <div class="row col-md-10 offset-md-1 background__container classes">
                    <div class="journal_buttons">
                        <button href="gen.php/?t=1" class="btn-white journal_buton journal_buton-checked">Dzisiaj</button>
                        <button class="btn-white journal_buton">Wczoraj</button>       
                        <button class="btn-white journal_buton">Tydzień</button>       
                        <button href="gen.php/?t=2" class="btn-white journal_buton">Miesiąc</button>   
                        <button class="btn-white journal_buton">Rok</button>       
                        <button href="gen.php/?t=3" class="btn-white journal_buton">Wszystko</button>                     
                    </div>
                    <div class="sort_filtr">   
                        <h3>Sortuj</h3>
                        <div class="dropdown">
                            <button class="dropdown-toggle btn-white" type="button" data-toggle="dropdown">Najnowsze</button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Najnowsze</a>
                              <a class="dropdown-item" href="#">Najstarsze</a>
                            </div>
                        </div>
                    </div>
                ';

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
                        echo '
                        <div class="row titles">
                            <p class="col-md-1 title">Nr</p>
                            <p class="col-md-2 journal_title">Data</p>
                            <p class="col-md-1 journal_title">Klasa</p> 
                            <p class="col-md-1 journal_title">Uczeń</p>  
                            <p class="col-md-3 journal_title">Opis</p>    
                            <p class="col-md-1 journal_title">Co podano</p>
                            <p class="col-md-1 journal_title">Pielęgniarka</p>            
                        </div>
                        <div class="students">
';

//						echo"<tr> <th>Numer wpisu</th> <th>Data</th> <th>Klasa</th> <th>Uczeń</th> <th>Opis</th> <th>Co podano</th> <th>Pielęgniarka</th>  <th></th> </tr>";
					}


					//echo '<a onclick='re(this.id);' class='redirect_button_edit' id='r".$numer[$i]."'>Edytuj</a>'	

                    echo '
                    <div class="row background__container student">
                        <p class="col-md-1 title">'.$numer[$i].'</p>
                        <p class="col-md-2 journal_p">'.$data[$i].'</p>
                        <p class="col-md-1 journal_p">'.$klasa[$i].'</p>
                        <p class="col-md-1 journal_p">'.$uczen[$i].'</p>
                        <p class="col-md-3 journal_p">'.$opis[$i].'</p>    
                        <p class="col-md-1 journal_p">'.$podano[$i].'</p>
                        <p class="col-md-1 journal_p">'.$autor[$i].'</p>
                        <div class="col-md-1 list-buttons">';                       


                    echo '<a onclick="re(this.id);" class="redirect_button_edit btn-blue--filled list-btn" id="r'.$numer[$i].'">Edytuj</a>';          

                    echo '</div>                    
                    </div>';
					

				}
				echo "</div>";

				mysqli_close($conn);
			?>
    <img class="img-fluid peach_vector-main" src="images/peach_vector.svg">
    <img class="img-fluid blue_vector-main" src="images/blue_vector.svg">
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script type="text/javascript">

    document.getElementById("redirect_add").onclick = function () {
        location.href = "dziennik_dodaj_wpis.php";
    };

</script>


<script type="text/javascript">    document.getElementById("redirect_add").onclick = function () {        location.href = "dziennik_dodaj_wpis.php";    };</script>

</body>
</html>