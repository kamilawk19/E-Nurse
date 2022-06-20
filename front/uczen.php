<?php

session_start();

if(!isset($_SESSION['zalogowany'])) // jeśli wejdziemy na stronę główną a nie jesteśmy zalogowani ....
{
    header('Location: index.php'); // wypierdalaj na index.php
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

    <!--<div id="left">
        left

    </div>-->

    <div id="container">
        <header>
            <div class="col-md-4 offset-md-4">
                <h1 class="">Dziennik codzienny</h1>
                <h3 class="col-md-12">Dodawanie wpisu</h3>
            </div>
        </header>
        <div class="row col-md-10 offset-md-1">
        <?php

        $class_id = $_GET['class_id'];
        $school_id = $_GET['school_id'];
        $student_id = $_GET['student_id'];
//
//        echo "Wybrałeś szkołę o id =" . $school_id . "<br>";
//        echo "Wybrałeś klasę o id =" . $class_id . "<br>";
//        echo "Wybrałeś ucznia o id =" . $student_id . "<br>";

        // dodatkowy warunek do zaimplemenotwania w przyszłości : jeśli zmienna $x jest nieustawiona, wróć do wyboru szkoły.php

        /*echo '<br><a href="main.php?school_id='.$school_id.' ">Strona główna</a>';

        echo ' <a href="klasy.php?school_id='.$school_id.' ">Klasy</a>';*/

        require_once "../connect_edziennik.php";

        $conn = @new mysqli($servername, $username, $password, $dbname);

        if($conn->connect_errno!=0)
        {
            echo "Błąd połączenia".$conn->connect_errno()."\n";
        }
        else
        {
            //$sql = "SELECT * FROM student WHERE Id_User = $student_id";
            /*$sql = "SELECT * FROM student
                    JOIN adress
                    ON adress.Id = student.Adress_Id
                    WHERE Id_User = $student_id";*/

            $sql = "SELECT First_Name, Second_Name, Last_Name, SUBSTR(Birth_Date, 1, 10) AS Birth_Date, Pesel, 
					Sex, Phone_Number, Email, Street, Bulding_Number, Flat_Number, City, Zip FROM student 
					JOIN adress
					ON adress.Id = student.Adress_Id
					WHERE Id_User = $student_id";

            $result = $conn->query($sql);

            if($result)
            {
                $number_of_rows = $result->num_rows;

                if($number_of_rows>0)
                {
                    echo "<br>";

                    while($row = $result->fetch_assoc())
                    {
                        echo '
                        <div class="col-md-7">
                            <div class="background__container student_blocks student_info">
                                <h2>Dane osobowe</h2>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p>Imię:</p>
                                        <p>Nazwisko:</p>
                                        <p>Data urodzenia:</p>
                                        <p>Pesel:</p>
                                        <p>Płęć:</p>
                                    </div>
                                    <div class="col-md-2 student_info_">
                                        <p>'.$row["First_Name"].' '.$row["Second_Name"].'</p>
                                        <p>'.$row["Last_Name"].'</p>
                                        <p>'.$row["Birth_Date"].'</p>
                                        <p>'.$row["Pesel"].'</p>
                                        <p>'.$row["Sex"].'</p>
                                    </div>
                                    <div class="col-md-2 offset-md-1">
                                        <p>E-mail:</p>
                                        <p>Telefon:</p>
                                        <p>Adres:</p>
                                    </div>
                                    <div class="col-md-4 student_info_">
                                        <p>'.$row["Email"].'</p>
                                        <p>'.$row["Phone_Number"].'</p>
                                        <p>'.$row["Street"].' '.$row["Bulding_Number"].'/'.$row["Flat_Number"].' '.$row["City"].' '.$row["Zip"].'</p>
                                    </div>
                                </div>                      
                            </div>
                        </div>
                        ';
                    }
                }

                else
                {
                    echo "błąd";
                }
            }

            $conn->close();
        }

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        // PRZEBYTE CHOROBY :

        require_once "../connect.php";

        $conn = @new mysqli($servername, $username, $password, $dbname);

        if($conn->connect_errno!=0)
        {
            echo "Błąd połączenia".$conn->connect_errno()."\n";
        }
        else
        {
            $get_kzu_id = "SELECT Id_Karty FROM kzu WHERE Id_Ucznia = $student_id";

            $kzu_result = $conn->query($get_kzu_id);

            if($kzu_result) // znaleziono kartę
            {
                $kzu_number_of_rows = $kzu_result->num_rows;

                if($kzu_number_of_rows>0)
                {
                    $row = $kzu_result->fetch_assoc();

                    $id_karty = $row['Id_Karty'];
//                    echo "id_karty = $id_karty <br>";
                }

                else
                {
//                    echo "[ brak karty zdrowia ]";
                }
            }

            // CHOROBY
            if(isset($id_karty))
            {
                $get_kzu_choroby =
                    "SELECT Id_Karty, kzu_choroby.Id_Choroby, Rok_Zycia, Rodzaj_Choroby, choroby.id_choroby, choroby.choroba 
				 FROM kzu_choroby 
				 JOIN choroby
				 ON kzu_choroby.Id_Choroby = choroby.id_choroby
				 WHERE Id_Karty = $id_karty
				 ";

                $kzu_choroby_result = $conn->query($get_kzu_choroby);
                echo '<div class="background__container student_blocks">
                        <div class="row student_blocks_titles">
                            <h2 class="col-md-9">Przebyte choroby</h2>
                            <a class="col-md-3 btn-peach--filled" href="#">Dodaj</a>
                        </div>
                        <div class="row student_titles">
                            <p class="col-md-2">Rok życia</p>                          
                            <p class="col-md-10">Rodzaj</p>
                        </div>
';
                if($kzu_choroby_result)
                {
                    $kzu_number_of_rows = $kzu_choroby_result->num_rows;

                    echo "<br><b>przebyte choroby : </b><br>";

                    if($kzu_number_of_rows>0)
                    {
                        while($row = $kzu_choroby_result->fetch_assoc())
                        {
                            echo '
                            <div class="row student_diseases_">
                                <p class="col-md-1 background__container">'.$row['Rok_Zycia'].'</p>                     
                                <p class="col-md-10 background__container">'.$row['choroba'].' '.$row["Rodzaj_Choroby"].'</p>
                            </div> 
                            ';
                        }
                    }

                    else
                    {
                        echo "[ brak ]";
                    }
                }
                echo '</div>';
            }

            /////////////////////////////////////////////////////////////////////////////////////////////////////
            //echo "<br> Id_karty = $id_karty<br>";

            // PROBLEM ZDROWOTNY, SZKOLNY, SPOŁECZNY
            echo '
            <div class="background__container student_blocks">
                        <h2>Problemy zdrowotne, szkolne, społeczne</h2>
                    <div class="row student_blocks_titles">
                        <a class="col-md-3 offset-md-4 btn-peach--filled" href="#">Dodaj</a>
                    </div>
                    <div class="row student_titles">
                        <p class="col-md-3 student_pe_date">Data</p>                          
                        <p class="col-md-8">Rodzaj</p>
                    </div>
            ';
            if(isset($id_karty))
            {
                $get_kzu_problem = "SELECT * FROM kzu_problemy WHERE Id_Karty = $id_karty";

                $kzu_problem_result = $conn->query($get_kzu_problem);

                if($kzu_problem_result) // znaleziono kartę
                {
                    $kzu_number_of_rows = $kzu_problem_result->num_rows;

                    if($kzu_number_of_rows>0)
                    {
                        while($row = $kzu_problem_result->fetch_assoc())
                        {
                            echo '
                            <div class="row student_diseases_">
                                <p class="col-md-3 background__container">'.$row['Data'].'</p>                     
                                <p class="col-md-8 background__container">'.$row['Rodzaj_Problemu'].'</p>
                            </div> 
                            ';
                        }
                    }
                    else
                    {
                        echo "[ brak ]";
                    }
                }
            }


            /////////////////////////////////////////////////////////////////////////////////////////////////////
            // KWALIFIKACJA DO WYCHOWANIA FIZYCZNEGO
            echo '
            </div>
           <div class="background__container student_blocks">
                    <h2>Klasyfikacja do wychowania fizycznego</h2>
                    <div class="row student_titles">
                        <p class="col-md-7  student_pe_date">Data</p>                          
                        <p class="col-md-4">Grupa</p>
                    </div>
            ';
            if(isset($id_karty))
            {
                $get_kzu_wf = "SELECT * FROM kzu_kwalifikacja_wf WHERE Id_Karty = $id_karty";  // a co dany uczeń nie ma założonej karty ? -> do rozwiązania w przyszłości

                $kzu_wf_result = $conn->query($get_kzu_wf);

                if($kzu_wf_result) // znaleziono kartę
                {
                    $kzu_number_of_rows = $kzu_wf_result->num_rows;

                    echo "<br><b>Kwalifikacja do wychowania fizycznego : </b><br>";

                    if($kzu_number_of_rows>0)
                    {
                        //echo "<br>";

                        /*$row = $kzu_wf_result->fetch_assoc();
                        echo "Data : ".$row['Data'] . "<br>Grupa : " . $row['Grupa'] . "<br>";
                        if($row['Zalecenia'] != "")
                        {
                            echo "Zalecenia : ".$row['Zalecenia']."<br>";
                        }
                        $kzu_wf_data = $row['Data'];
                        $kzu_wf_grupa = $row['Grupa'];
                        $kzu_wf_zalecenia = $row['Zalecenia'];*/


                        while($row = $kzu_wf_result->fetch_assoc())
                        {
                            echo '
                             <div class="row student_pe">
                                <p class="col-md-7 background__container">'.$row['Data'].'</p>                     
                                <p class="col-md-4 background__container">'.$row['Grupa'].'</p>
                            </div>
                            ';

                            if($row['Zalecenia'] != "")
                            {
                                echo '
                                <div class="row student_titles">
                                    <p class="col-md-11">Zalecenia</p>
                                </div>
                                <div class="row student_pe">
                                    <p class="col-md-11 background__container">'.$row['Zalecenia'].'</p>
                                </div>
                                ';
                            }
                        }
                    }
                    else
                    {
                        echo "[ brak ]";
                    }
                }
            }
            //$conn->close();


            /////////////////////////////////////////////////////////////////////////////////////////////////////
            // Wywiady środowiskowe

//            if(isset($id_karty))
//            {
//                $get_kzu_wf = "SELECT * FROM kzu_wywiady_srodowiskowe WHERE Id_Karty = $id_karty";  // a co dany uczeń nie ma założonej karty ? -> do rozwiązania w przyszłości
//
//                $sql = $conn->query($get_kzu_wf);
//
//                if($sql) // znaleziono kartę
//                {
//                    $kzu_number_of_rows = $sql->num_rows;
//
//                    echo "<br><b>Wywiady środowiskowe : </b><br>";
//
//                    if($kzu_number_of_rows>0)
//                    {
//                        //echo "<br>";
//
//                        $row = $sql->fetch_assoc();
//
//
//                        echo "Data : ".$row['Data'] . "<br>Wnioski : " . $row['Wnioski'] . "<br>";
//                    }
//                    else
//                    { // nie znaleziono rekordów w bd
//
//                        //$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
//                        //header('Location: index.php');
//                        echo "[ brak ]<br>";
//                    }
//                }
//            }
            $conn->close();

            if(isset($id_karty))
            {
                echo '<br><a href="wyswietl_badanie.php?student_id='.$student_id.'&id_karty='.$id_karty.'&class_id='.$class_id.'">Badania przesiewowe</a>';
            }
        }
        ?>

                <img class="img-fluid peach_vector-main" src="images/peach_vector.svg">
                <img class="img-fluid blue_vector-main" src="images/blue_vector.svg">
            </div>

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>



























