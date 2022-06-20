<?php
session_start();

    if(!isset($_SESSION['zalogowany']))
    {
        header('Location: /front/index.php');
        exit();
    }

    //require "connect.php";
    $school_id = $_SESSION['school_id'];

    //3 przypadki dodania danych
    //1 przypadek - wpis dot. ucznia
    //2 przypadek - wpis dot. klasy
    //3 przypadek - wpis dot. szkoły

    //pobranie zmiennych z formularza i zmienienie na format do bazy
    $id=$_POST['hidd'];
    //substr($id,1)
    $date=$_POST['date'];
    $date=str_replace('T',' ', $date);
    $date=$date.":00";

    $klasa = $_POST['klasa'];

    $imie = $_POST['imie'];
    $imie = strtolower($imie);
    $imie = ucfirst($imie);

    /*$imie2 = $_POST['imie2'];
    $imie2 = strtolower($imie2);
    $imie2 = ucfirst($imie2);*/

    $nazwisko = $_POST['nazwisko'];
    $nazwisko = strtolower($nazwisko);
    $nazwisko = ucfirst($nazwisko);

    $opis = $_POST['opis'];
    $podano = $_POST['podano'];

    //opis nie może być pusty
    if( empty($_POST['opis'])==1 ){
        $error="3";
        header("Location: ./dziennik_dodaj_wpis.php?er=$error");
        exit();
    }



    //przypadek 1

    if( isset($_POST["klasa"])  && isset($_POST["imie"])  && isset($_POST["nazwisko"]) && empty($_POST["klasa"])==0 && empty($_POST["imie"])==0  && empty($_POST["nazwisko"])==0){

        //sprawdzenie, czy dane są ok i ewentualnie wysłanie

        $uczen_id=0;

        require_once "..\connect_edziennik.php";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        //czy uczeń istnieje
        $sql="SELECT `student`.`Id` AS 'uczen_id', `student`.`Class_Id` AS 'class_id' FROM `student` JOIN `class` ON `class`.`Id`=`student`.`Class_Id` WHERE `First_Name`='".$imie."' AND `Last_Name`='".$nazwisko."' AND `class`.`Class`='".$klasa."' AND `class`.`Id_school`='".$_SESSION['school_id']."'";
        
        //echo '<script>alert("imie ->"+'.$imie."<br>";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result) < 2) {

            while($row = mysqli_fetch_assoc($result)) {
                $uczen_id=$row["uczen_id"];
                $class_id=$row["class_id"];
            }
            mysqli_close($conn);
        }else{
            //zle dane
            $error="1";
            mysqli_close($conn);
            header("Location: ./dziennik_edytuj_wpis.php?er=$error&re=$id");
            exit();
        }

        //uczen istnieje i jest tylko 1
        //dodanie do bazy
        require_once "../connect.php";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if($uczen_id!=0){
            $insert="UPDATE `dziennik` SET `Data`='".$date."', `Id_Ucznia`='".$uczen_id."', `Id_Klasy`='".$class_id."', `Id_Szkoly`='".$_SESSION['school_id']."', `Opis_Zdarzenia`='".$opis."', `Co_Podano` ='".$podano."', `Nurse_Id`='".$_SESSION['nurseid']."' WHERE  `Id_Wpisu`='".substr($id,1)."'";
            if (mysqli_query($conn, $insert)) {
                $error="0";
                mysqli_close($conn);
                header("Location: ./dziennik_edytuj_wpis.php?er=$error&re=$id");
                exit();
            }else {
                $error="2";
                mysqli_close($conn);
                header("Location: ./dziennik_edytuj_wpis.php?er=$error&re=$id");
                exit();
            }
        }
    }elseif( isset($_POST["klasa"]) && empty($_POST["klasa"])==0 && empty($_POST["imie"])==1 && empty($_POST["nazwisko"])==1 ){
        //przypadek 2

        require_once "connect_edziennik.php";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        //czy klasa istnieje
        $sql="SELECT `Id` FROM `class` WHERE `Class`='Klasa ".$klasa."' AND `Id_school`='".$_SESSION['school_id']."'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result) < 2) {
            while($row = mysqli_fetch_assoc($result)) {
                $class_id=$row["Id"];
            }
            mysqli_close($conn);
            echo "Klasa istnieje";
        }else{
            //zle dane
            $error="4";
            mysqli_close($conn);
            echo $sql;
            header("Location: ./dziennik_edytuj_wpis.php?er=$error&re=$id");
            exit();
        }

        //uczen istnieje i jest tylko 1
        //dodanie do bazy
        require_once "connect.php";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if(isset($class_id)){
            $insert="UPDATE  `dziennik` SET `Data`='".$date."', `Id_Klasy`='".$class_id."', `Id_Szkoly`='".$_SESSION['school_id']."', `Opis_Zdarzenia`='".$opis."', `Co_Podano`='".$podano."', `Nurse_Id`='".$_SESSION['nurseid']."' WHERE `Id_Wpisu`='".substr($id,1)."'";
            echo $insert;
            if (mysqli_query($conn, $insert)) {
                $error="0";
                mysqli_close($conn);
                header("Location: ./dziennik_edytuj_wpis.php?er=$error&re=$id");
                exit();
            }else {
                $error="2";
                mysqli_close($conn);
                header("Location: ./dziennik_edytuj_wpis.php?er=$error&re=$id");
                exit();
            }
        }

    }elseif( empty($_POST["klasa"])==1 && empty($_POST["imie"])==1 && empty($_POST["nazwisko"])==1 ){
        //przypadek 3
        require_once "connect.php";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $insert="UPDATE `dziennik` SET `Data`='".$date."', `Id_Szkoly`='".$_SESSION['school_id']."', `Opis_Zdarzenia`='".$opis."', `Co_Podano`='".$podano."', `Nurse_Id`='".$_SESSION['nurseid']."' WHERE `Id_Wpisu`='".substr($id,1)."'";
        if (mysqli_query($conn, $insert)) {
            $error="0";
            mysqli_close($conn);
            header("Location: ./dziennik_edytuj_wpis.php?er=$error&re=$id");
            exit();
        }else {
            $error="2";
            mysqli_close($conn);
            header("Location: ./dziennik_edytuj_wpis.php?er=$error&re=$id");
            exit();
        }

    }else{
        echo "Dev nie umie if'ów";
    }
    //mysqli_close($conn);
?>