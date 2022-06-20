<?php
	echo "strona główna - main.php";
	
	session_start();
	
	if(!isset($_SESSION['zalogowany'])) // jeśli wejdziemy na stronę główną a nie jesteśmy zalogowani ....
	{
		header('Location: /front/index.php'); // wypierdalaj na index.php
		exit();
	}
?>

<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Strona główna E-Nurse</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>

<body>
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
        echo '<a href="../klasy.php?school_id='.$_SESSION['school_id'].'"><li class="navbar__list-item "><h3>Klasy</h3></li></a>';
        echo '<a href="../dziennik.php?school_id='.$_SESSION['school_id'].'"><li class="navbar__list-item "><h3>Dziennik codzienny</h3></li></a>';
        echo '<a href="main.php?school_id='.$_SESSION['school_id'].'"><li class="navbar__list-item "><h3>Wiadomości</h3></li></a>';
        echo '<a href="main.php?school_id='.$_SESSION['school_id'].'"><li class="navbar__list-item "><h3>Kalendarz</h3></li></a>';
        ?>
    </ul>
    <div class="navbar__buttons-container">
        <a class="" href="notifications.html"><img class="notiffication_img img-fluid" src="images/notification.svg"></a>
        <a class="" href="setting.html"><img class="setting_img img-fluid" src="images/setting.svg"></a>
        <a class="btn-blue--filled" href="logout.php">Wyloguj się</a>
    </div>
</nav>
<div class="container">

    <header>
        <a class="col-md-3 offset-md-1 btn-back" href="wybor_szkoly.php"><img src="images/Arrow.svg"><h3>Zmień szkołę</h3></a>
        <div class="col-md-4">
            <h1 class="">Klasy</h1>
            <h3 class="col-md-12">Zespół Szkół Nr 3 Policach</h3>
<!--            $_SESSION['school_id']-->
        </div>
    </header>

    <div class="row col-md-10 offset-md-1 background__container classes">
        <div class="sort_filtr">
            <h3>Sortuj</h3>
            <div class="dropdown">
                <button class="dropdown-toggle btn-white" type="button" data-toggle="dropdown">Poziom klasy rosnąco</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Poziom klasy rosnąco</a>
                    <a class="dropdown-item" href="#">Poziom klasy malejąco</a>
                </div>
            </div>
        </div>
        <div class="">
			<!--content-->
			<?php
				require_once "connect_edziennik.php";		
				
				//echo "<p>Witaj ".$_SESSION['imie']." ".$_SESSION['nazwisko'].'! [ <a href="logout.php">Wyloguj się </a>]</p>';	
				
				$conn = @new mysqli($servername, $username, $password, $dbname);

				$school_id = $_SESSION['school_id'];


				if($conn->connect_errno!=0)
				{
					/*echo "Błąd połączenia".@conn->connect_errno." = ".conn->connect_error;*/
					echo "Błąd połączenia".$conn->connect_errno()."\n";
				}
				else
				{					
					$sql = "SELECT * FROM class WHERE Id_School = $school_id";					

					$result = $conn->query($sql);
				
					if($result) 
					{
						$number_of_rows = $result->num_rows;
						
						if($number_of_rows>0)
						{				
							while($row = $result->fetch_assoc())
							{						
								//echo '<br><a href="klasa.php?class_id='.$row['Id'].'&school_id='.$school_id.'">';										
								
								echo '<div class="class" id=class_div>';
									echo '<a href="klasa.php?class_id='.$row['Id'].'">';								
										echo $row["Class"];
									echo '</a><br>';	
								echo '</div>';
								//echo "<br>";
							}				
						}
						
						else 
						{ 
							echo "<br>[ brak ]";						
						}       
					}
					
					$conn->close();
				}	
			?>
        </div>
			
    </div>

    <img class="img-fluid peach_vector-main" src="images/peach_vector.svg">
    <img class="img-fluid blue_vector-main" src="images/blue_vector.svg">
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>


	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
