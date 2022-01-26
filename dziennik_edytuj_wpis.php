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
            echo "<h2>Edycja wpisu</h2> ";

            if( isset($_GET['re']) && !empty($_GET['re'])) {
                require_once "connect.php";
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                $sql="SELECT * FROM `dziennik` WHERE `Id_Wpisu`='".substr($_GET['re'],1)."'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result) < 2) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $data=$row["Data"];
                        $id_ucznia=$row["Id_Ucznia"];
                        $id_klasy=$row["Id_Klasy"];
                        $id_szkoly=$row["Id_Szkoly"];
                        $opis=$row["Opis_Zdarzenia"];
                        $co_podano=$row["Co_Podano"];
                        $nurse_id=$row["Nurse_Id"];
                    }
                }
            }

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

            if(isset($id_ucznia) && !empty($id_ucznia) && $id_ucznia!=NULL){
                //pobranie danych ucznia na podstawie id
                $sql="SELECT `First_Name`,`Second_Name`,`Last_Name` FROM `student` WHERE `Id`='".$id_ucznia."'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result) < 2) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $imie=$row["First_Name"];
                        $imie2=$row["Second_Name"];
                        $nazwisko=$row["Last_Name"];
                    }
                }
            }

            if(isset($id_klasy) && !empty($id_klasy) && $id_klasy!=NULL){
                //pobranie numeru klasy na podstawie id
                $sql="SELECT `Class` FROM `class` WHERE `Id`='".$id_klasy."'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result) < 2) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $klasa=$row["Class"];
                    }
                }
            }

            //pobieram drugie imie, żeby uniknąć nieprzyjemnej sytuacji, ze jest dwóch uczniów o takim samym imieniu i nazwisku w klasie
            echo "<form action='./dziennik_validate_form_edit.php' method='post'>

            <input type='hidden' id='hidd' name='hidd' value='".$_GET['re']."'>

            <label for='date'>Wybierz datę</label><br>
            <input type='datetime-local' id='date' name='date' value='".substr($data,0,10)."T".substr($data,-8,5)."'><br>";

            if(!empty($id_klasy) && $id_klasy!=NULL){
                echo "<label for='klasa'>Klasa</label><br>
                <input type='text' id='klasa' name='klasa' value='".$klasa."'><br><br>";
            }else{
                echo "<label for='klasa'>Klasa</label><br>
                <input type='text' id='klasa' name='klasa'><br><br>";
            }

            if(!empty($id_ucznia) && $id_ucznia!=NULL){
                echo " <label for='imie'>Imię ucznia</label><br>
                <input value='".$imie."' type='text' id='imie' name='imie'><br><br>

                <label for='imie2'>Drugie imię ucznia</label><br>
                <input value='".$imie2."' type='text' id='imie2' name='imie2'><br><br>

                <label for='nazwisko'>Nazwisko ucznia</label><br>
                <input value='".$nazwisko."' type='text' id='nazwisko' name='nazwisko'><br><br>";
            }else{
            echo " <label for='imie'>Imię ucznia</label><br>
                <input type='text' id='imie' name='imie'><br><br>

                <label for='imie2'>Drugie imię ucznia</label><br>
                <input type='text' id='imie2' name='imie2'><br><br>

                <label for='nazwisko'>Nazwisko ucznia</label><br>
                <input type='text' id='nazwisko' name='nazwisko'><br><br>";
            }

            echo "<label for='opis'>Opis</label><br>
            <textarea id='opis' name='opis' rows='10' style='resize: none' required>".$opis."</textarea><br><br>

            <label for='podano'>Podano</label><br>
            <textarea id='podano' name='podano' rows='4' style='resize: none'>".$co_podano."</textarea><br><br>

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

</body>
</html>