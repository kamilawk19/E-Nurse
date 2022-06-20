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
        <a class="btn-blue--filled" href="../logout.php">Wyloguj się</a>
    </div>
</nav>
<div id="container">

    <header>
        <div class="col-md-4 offset-md-4">
            <h1 class="">Dziennik codzienny</h1>
            <h3 class="col-md-12">Dodawanie wpisu</h3>
        </div>
    </header>

    <div class="row col-md-10 offset-md-1 background__container classes">
        <div class="row">
            <?php
            $school_id = $_SESSION['school_id'];

            require_once "../connect_edziennik.php";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            $sql="SELECT `Name` FROM `school` WHERE `Id`='".$_SESSION['school_id']."'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result) < 2) {
                while($row = mysqli_fetch_assoc($result)) {
                    $school_name=$row["Name"];
                }
            }


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
            echo "
            <form action='../dziennik_validate_form.php' method='post'>
                <div class="row">
                    <div class="col-md-1 offset-md-1">
                        <p class="journal_titles">Data:</p>
                        <p class="journal_titles">Imię:</p>
                        <p class="journal_titles">Nazwisko:</p>
                        <p class="journal_titles">Klasa:</p>
                    </div> 
                    <div class='col-md-8 journal_form'>              
                        <input type='datetime-local' id='date' name='date' value='".date('Y-m-d\TH:i')."'>
                        <input type='text' id='klasa' name='klasa'>
                        <input type='text' id='imie' name='imie'>
                        <input type='text' id='nazwisko' name='nazwisko'>
                    </div>
                </div>
                
                <label for='opis'>Opis</label><br>
                <div class='col-md-12 journal_form journal_form_desc'>
                    <textarea class="journal_buton_text_area" id='opis' name='opis' rows='10' required></textarea>
                </div>
                
                <label for='podano'>Podano</label><br>
                <textarea class="journal_buton_text_area" id='podano' name='podano' rows='4' ></textarea><br><br>
                <div class='col-md-2 offset-md-5 list-buttons'>
                    <input type='submit' class='btn-blue--filled list-btn' value='Dodaj'>
                </div> 
                </form>";

            //pls ostylujcie jakoś ladnie pole do opisu, póki co tylko statycznie jest
            //i jak przeniesiecie style to jednak pamiętajcie o resize: none dla teaxtarea

            //koniec php
            ?>
    </div>

    <img class="img-fluid peach_vector-main" src="images/peach_vector.svg">
    <img class="img-fluid blue_vector-main" src="images/blue_vector.svg">
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>