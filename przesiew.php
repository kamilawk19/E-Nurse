<?php
echo "strona główna - main.php";

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
    <title>E-Nurse</title>

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
        <a class="col-md-2 offset-md-1 btn-back" href="uczen.php"><img src="images/Arrow.svg"><h3>Powrót do klasy</h3></a>
        <div class="col-md-6">
            <h1>Badanie przesiewowe</h1>
            <h3 class="subtitle_name">Bator Szymon</h3>
            <h3>KL. "O"</h3>
        </div>
        <div class="col-md-3 badanie_edit">
            <a class="btn-blue--filled" href="#">Edytuj</a>
        </div>

    </header>

    <div class="row col-md-10 offset-md-1 background__container">
        <?php
        $student_id = $_GET['student_id'];
        $id_karty = $_GET['id_karty'];
        $class_id = $_GET['class_id'];
        echo "<h2>Formularz badania</h2>";
        if(($class_id == 1) || ($class_id == 2) || ($class_id == 3)) {
            <<<EOD
        <div class=" student_blocks student_info">
            <form action="badanie.php?id_karty='.$id_karty.'&student_id='.$student_id.'&class_id='.$class_id.'" method="post">
                <div class="row">
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-3">
                                <p>Data:</p>
                                <p>Wiek:</p>
                            </div>
                            <div class="col-md-8 bold_info">
                                <input type="date" name="data">
                                <input type="text" name="wiek">
                            </div>
                        </div>
                        <div class="badanie_group">
                            <p class="offset-md-5 bold_title ">Skierowania</p>
                            <p>Okulista</p>
                        </div>
                        <div class="row">
                            <p class="offset-md-6 bold_title badanie_group">Inne</p>
                            <div class="col-md-2">
                                <p>Słuch</p>
                                <p>Wada wymowy:</p>
                            </div>
                            <div class="col-md-2">
                                <p>UP</p>
                                <p class="bold_info">Tak</p>
                            </div>
                            <p class="col-md-3 bold_info">prawidłowo</p>
                            <p class="col-md-2">UL</p>
                            <p class="col-md-3 bold_info">prawidłowo</p>
                        </div>
                    </div>
                    <div class="row col-md-6  offset-1">
                        <div class="col-md-4">
                            <p>Wysokość ciała:</p>
                            <p>Masa ciała:</p>
                            <p>Ostrość wzroku:</p>
                            <p>Ciśnienie:</p>
                        </div>
                        <div class="col-md-2">
                            <p>Cm</p>
                            <p>Kg</p>
                            <p>OP</p>
                            <p>Wynik:</p>
                        </div>
                        <div class="col-md-2 bold_info">
                            <input type="text" name="wysokosc_cm">
                            <input type="text" name="masa_kg">
                            <input type="text" name="ostrosc_op">
                            <input type="text" name="cisnienie_wynik">
                        </div>
                        <div class="col-md-2">
                            <p>Centyl:</p>
                            <p>Centyl:</p>
                            <p>OL</p>
                            <p>Centyl:</p>
                        </div>
                        <div class="col-md-2 bold_info">
                            <input type="text" name="wysokosc_ct">
                            <input type="text" name="masa_ct">
                            <input type="text" name="ostrosc_ol">
                            <input type="text" name="cisnienie_centyl">
                        </div>
                        <p class="offset-md-1 bold_title">Testy do wykonania</p>
                        <div class="col-md-4">
                            <p>Skolioza:</p>
                            <p>Koślawość kolan:</p>
                            <p>Płasko koslawe stopy:</p>
                        </div>
                        <div class="col-md-3 bold_info">
                            <p>Tak</p>
                            <p>Nie</p>
                            <p>Tak</p>
                        </div>
                        <p class="offset-md-1 bold_title">Wzrok - zez i widzenie barw</p>
                        <div class="col-md-4">
                            <p>Zez widoczny:</p>
                            <p>Cover test:</p>
                            <p>Odbicie światła na rogówkach:</p>
                        </div>
                        <div class="col-md-3 bold_info">
                            <p>Niewidoczny</p>
                            <p>ujemny</p>
                            <p>symetryczne</p>
                        </div>
                </div>
                <input type="submit" value="Dodaj">
            </form>
        </div>
        EOD;
        }

        echo "id klasy = $class_id<br>";
        echo "klasy 0-2<br>";
        // Data dla każdej tabeli będzie ta sama ...

        echo '<form action="badanie.php?id_karty='.$id_karty.'&student_id='.$student_id.'&class_id='.$class_id.'" method="post">';

        echo "Data:";
        echo'<br><input type="date" name="data"><br>';
        echo "Wiek:";
        echo '<br><input type="text" name="wiek"><br>';

        echo "Wysokość ciała (cm):";
        echo '<br><input type="text" name="wysokosc_cm"><br>';
        echo "Wysokość ciała (centyl):";
        echo '<br><input type="text" name="wysokosc_ct"><br>';
        ?>
        <h2>Formularz badania</h2>
