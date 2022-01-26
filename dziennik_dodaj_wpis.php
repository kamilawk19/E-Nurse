<?php
	echo "dziennik codzienny - dziennik_dodaj_wpis.php";
	
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
    <title>E-nurse - dodaj wpis do dziennika codziennego</title>
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
            $school_id = $_SESSION['school_id'];
            echo "<h2>Nowy wpis</h2> ";
            
            require_once "connect_edziennik.php";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            $sql="SELECT `Name` FROM `school` WHERE `Id`='".$_SESSION['school_id']."'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result) < 2) {
                while($row = mysqli_fetch_assoc($result)) {
                    $school_name=$row["Name"];
                }
            }

            echo "<h4>Operujesz w ramach $school_name</h4>";

            //tutaj będą bledy z formularza pokazywane
            echo "<div id='form_info'>";
            if(isset($_GET['er'])){
                if($_GET["er"]==1){
                    echo "<p>Niepoprawne dane ucznia</p>";
                }elseif($_GET["er"]==2){
                    echo "<p>Niepoprawne dane.</p>";
                }elseif($_GET["er"]==3){
                    echo "<p>Nie podano opisu.</p>";
                }elseif($_GET["er"]==4){
                    echo "<p>W tej szkole taka klasa nie isnieje</p>";
                }

                if($_GET["er"]==0){
                    echo "<p>Dodano wpis</p>";
                }
            }
            echo "</div>";

            //pobieram drugie imie, żeby uniknąć nieprzyjemnej sytuacji, ze jest dwóch uczniów o takim samym imieniu i nazwisku w klasie
            echo "<form action='./dziennik_validate_form.php' method='post'>

            <label for='date'>Wybierz datę</label><br>
            <input type='datetime-local' id='date' name='date' value='".date('Y-m-d\TH:i')."'><br>
            
            <label for='klasa'>Klasa</label><br>
            <input type='text' id='klasa' name='klasa'><br><br>

            <label for='imie'>Imię ucznia</label><br>
            <input type='text' id='imie' name='imie'><br><br>

            <label for='imie2'>Drugie imię ucznia</label><br>
            <input type='text' id='imie2' name='imie2'><br><br>

            <label for='nazwisko'>Nazwisko ucznia</label><br>
            <input type='text' id='nazwisko' name='nazwisko'><br><br>

            <label for='opis'>Opis</label><br>
            <textarea id='opis' name='opis' rows='10' style='resize: none' required></textarea><br><br>

            <label for='podano'>Podano</label><br>
            <textarea id='podano' name='podano' rows='4' style='resize: none'></textarea><br><br>

            <input type='submit' value='Dodaj wpis'>
            </form>";

            //pls ostylujcie jakoś ladnie pole do opisu, póki co tylko statycznie jest
            //i jak przeniesiecie style to jednak pamiętajcie o resize: none dla teaxtarea
        
        //koniec php
        ?>	
        
    </div>	
    
    <div id="footer">	
        footer		
    </div>	
    
</div>

<!-- skrypt z js ->

<script type="text/javascript">
    document.getElementById("redirect_add").onclick = function () {
        location.href = "dziennik_dodaj_wpis.php";
    };
</script>


</body>
</html>