<?php
session_start();
$school_id = $_SESSION['school_id'];
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
        echo '<a href="main.php?school_id='.$school_id.'"><li class="navbar__list-item navbar__list-item-current"><h3>Home</h3></li></a>';
        echo '<a href="../klasy.php?school_id='.$school_id.'"><li class="navbar__list-item "><h3>Klasy</h3></li></a>';
        echo '<a href="../dziennik.php?school_id='.$school_id.'"><li class="navbar__list-item "><h3>Dziennik codzienny</h3></li></a>';
        echo '<a href="main.php?school_id='.$school_id.'"><li class="navbar__list-item "><h3>Wiadomości</h3></li></a>';
        echo '<a href="main.php?school_id='.$school_id.'"><li class="navbar__list-item "><h3>Kalendarz</h3></li></a>';
        ?>
    </ul>

    <div class="navbar__buttons-container">
        <a class="" href="notifications.html"><img class="notiffication_img img-fluid" src="images/notification.svg"></a>
        <a class="" href="setting.html"><img class="setting_img img-fluid" src="images/setting.svg"></a>
        <a class="btn-blue--filled" href="../logout.php">Wyloguj się</a>
    </div>
</nav>

<div class="container">

    <header>
        <a class="col-md-3 offset-md-1 btn-back" href="choose_school.php"><img src="images/Arrow.svg"><h3>Zmień szkołę</h3></a>
        <?php
        //echo "<p>Witaj ".$_SESSION['imie']." ".$_SESSION['nazwisko'].'! [ <a href="logout.php">Wyloguj się </a>]</p>';

        echo '<h1 class="col-md-4">Witaj '.$_SESSION['imie'].'!</h1>';
        echo '<h3 class="col-md-12">ID = '.$school_id.'</h3>';
        //echo $x;
        //echo "Wybrałeś szkołę o id =" . $school_id . " ";
        // dodatkowy warunek do zaimplemenotwania w przyszłości : jeśli zmienna $x jest nieustawiona, wróć do wyboru szkoły.php
        /*echo '<br><a href="main.php?school_id='.$x.' ">Strona główna</a>';
        echo ' <a href="klasy.php?school_id='.$x.' ">Klasy</a>';
        echo ' <a href="dziennik.php?school_id='.$x.' ">Dziennik codzienny</a>';*/
        ?>
    </header>

    <div class="row col-md-10 offset-md-1">

        <div class="col-md-6  upcoming_events background__container">
            <h2>Zblizające się wydarzenia</h2>
            <div class="upcoming_event">
                <div class="col-md-2 date background__container">
                    <p>kwi</p>
                    <h2>1</h2>
                </div>
                <h3 class="col-md-10 offset-md-1 evet_title">Badania przesiewowe uczniów klasy 1a</h3>
            </div>
            <div class="upcoming_event">
                <div class="col-md-2 date background__container">
                    <p>kwi</p>
                    <h2>1</h2>
                </div>
                <h3 class="col-md-10 offset-md-1 evet_title">Badania przesiewowe uczniów klasy 1a</h3>
            </div>
            <div class="upcoming_event">
                <div class="col-md-2 date background__container">
                    <p>kwi</p>
                    <h2>1</h2>
                </div>
                <h3 class="col-md-10 offset-md-1 evet_title">Badania przesiewowe uczniów klasy 1a</h3>
            </div>
        </div>

        <div class="col-md-6 colum_journal_class">
            <div class="journal_main background__container">
                <h2>Dziennik codzienny</h2>
                <a class="btn-blue--filled" href="../dziennik_dodaj_wpis.php">Dodaj zdarzenie</a>
            </div>
            <div class="recent_classes background__container">
                <h2>Ostatnio przeglądane klasy</h2>
                <div class="recent__classes">
                    <div class="recent_class" id="recent_class1">
                        <h5>3A</h5>
                        <p>Wychowawca</p>
                        <p class="teacher">Grażyna Jurczyk</p>
                    </div>
                    <div class="recent_class" id="recent_class2">
                        <h5>3A</h5>
                        <p>Wychowawca</p>
                        <p class="teacher">Grażyna Jurczyk</p>
                    </div>
                    <div class="recent_class" id="recent_class3">
                        <h5>3A</h5>
                        <p>Wychowawca</p>
                        <p class="teacher">Grażyna Jurczyk</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <img class="img-fluid peach_vector-main" src="images/peach_vector.svg">
    <img class="img-fluid blue_vector-main" src="images/blue_vector.svg">
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
