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
        <a class="btn-blue--filled" href="logout.php">Wyloguj się</a>
    </div>
</nav>
<div class="container">

    <header>
        <div class="col-md-4 offset-md-4">
            <h1 class="">Dziennik codzienny</h1>
            <h3 class="col-md-12">Edycja wpisu</h3>
        </div>
    </header>

    <div class="row col-md-10 offset-md-1 background__container classes">
        <div class="row">
            <div class="col-md-1 offset-md-1">
                <p class="journal_titles">Data:</p>
                <p class="journal_titles">Imię:</p>
                <p class="journal_titles">Nazwisko:</p>
                <p class="journal_titles">Klasa:</p>
            </div>
            <?php
                $school_id = $_SESSION['school_id'];
                echo "<h2>Edycja wpisu</h2> ";

                if( isset($_GET['re']) && !empty($_GET['re'])) {
                    require_once "../connect.php";
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

                require_once "../connect_edziennik.php";
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
                echo "
                <div class='col-md-8 journal_form'>
                <form action='./dziennik_validate_form_edit.php' method='post'>

                    <input type='datetime-local' id='date' name='date' value='".substr($data,0,10)."T".substr($data,-8,5)."'>";
                    
                    if(!empty($id_ucznia) && $id_ucznia!=NULL){
                        echo "<input value='.$imie.' type='text' id='imie' name='imie'>
                        <input value='.$nazwisko.' type='text' id='nazwisko' name='nazwisko'>";
                    }else{
                    echo "
                        <input type='text' id='imie' name='imie'>
                        <input type='text' id='nazwisko' name='nazwisko'>";
                    }

                    if(!empty($id_klasy) && $id_klasy!=NULL){
                        echo "<input type='text' id='klasa' name='klasa' value='.$klasa.'>";
                    }else{
                        echo "<input type='text' id='klasa' name='klasa'>";
                    }

                

                echo '</div>
				</div>
                <p>Opis</p>
                <div class="col-md-12 journal_form journal_form_desc">
                    <textarea class="journal_buton_text_area" id="opis" name="opis" rows="10" required>"'.$opis.'"</textarea>
                </div>
                <p>Podano</p>
                <div class="col-md-12 journal_form journal_form_desc">
                    <textarea class="journal_buton_text_area" id="podano" name="podano" rows="4">"'.$co_podano.'"</textarea>
                </div>
                <div class="col-md-2 offset-md-5 list-buttons">
                    <input class="btn-blue--filled list-btn" type="submit" value="Edytuj">
                </div> 
                </form>';

                //pls ostylujcie jakoś ladnie pole do opisu, póki co tylko statycznie jest
                //i jak przeniesiecie style to jednak pamiętajcie o resize: none dla teaxtarea

            //koniec php
            ?>

    </div>

</div>

</body>
</html>