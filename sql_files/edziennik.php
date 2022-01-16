<?php
//nie wszystkie dane zostały przekazane przez ten skrypt,
//niektóre tabele mają na tyle danych, że mogłam to zrobić przez phpmyadmin

$servername = "localhost";
$username = "root";
$password = "";
$dbname="e-dziennik";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$imiona_k= array("Zofia", "Katarzyna", "Bronisława", "Dorota", "Jaśmina", "Julia", "Józefa", "Krystyna", "Magdalena", "Karolina", "Maja", "Lena", "Maria", "Nikola");
$imiona_m=array("Alfred", "Alan", "Aleks", "Kevin", "Bogdan", "Bożydar", "Cezary", "Paweł", "Adam", "Jan", "Daniel", "Gustaw", "Sebastian", "Kacper", "Mateusz", "Michał");
$imiona_k2= array("Zofia", "Katarzyna", "Bronislawa", "Dorota", "Jasmina", "Julia", "Jozefa", "Krystyna", "Magdalena", "Karolina", "Maja", "Lena", "Maria", "Nikola");
$imiona_m2=array("Alfred", "Alan", "Aleks", "Kevin", "Bogdan", "Bozydar", "Cezary", "Paweł", "Adam", "Jan", "Daniel", "Gustaw", "Sebastian", "Kacper", "Mateusz", "Michal");

$nazwiska_k=array("Szymańska", "Pawłowska", "Kowalska", "Wróbel", "Dudek", "Towarek", "Kalinowska", "Duda", "Biejat", "Wysocka", "Mazur", "Żmuda", "Czarnota", "Żmijewska", "Wołyniak", "Wołoszek", "Polak", "Pomorska", "Prus", "Norwecka", "Szkot", "Kaszub", "Góral", "Gal", "Ziemba", "Nowak", "Szemis", "Helma", "Sala", "Wiśniewska", "Zielińska", "Woźniak", "Lewandowska", "Dąbrowska");
$nazwiska_m=array("Szymański", "Pawłowski", "Kowalski", "Wróbel", "Dudek", "Towarek", "Kalinowski", "Duda", "Biejat", "Wysocki", "Mazur", "Żmuda", "Czarnota", "Żmijewski", "Wołyniak", "Wołoszek", "Polak", "Pomorski", "Prus", "Norwecki", "Szkot", "Kaszub", "Góral", "Gal", "Ziemba", "Nowak", "Szemis", "Helma", "Sala", "Wiśniewski", "Zieliński", "Woźniak", "Lewandowski", "Dąbrowski");
$nazwiska_k2=array("Szymanska", "Pawlowska", "Kowalska", "Wrobel", "Dudek", "Towarek", "Kalinowska", "Duda", "Biejat", "Wysocka", "Mazur", "Zmuda", "Czarnota", "Zmijewska", "Wolyniak", "Woloszek", "Polak", "Pomorska", "Prus", "Norwecka", "Szkot", "Kaszub", "Goral", "Gal", "Ziemba", "Nowak", "Szemis", "Helma", "Sala", "Wisniewska", "Zielinska", "Wozniak", "Lewandowska", "Dabrowska");
$nazwiska_m2=array("Szymanski", "Pawlowski", "Kowalski", "Wrobel", "Dudek", "Towarek", "Kalinowski", "Duda", "Biejat", "Wysocki", "Mazur", "Zmuda", "Czarnota", "Zmijewski", "Wolyniak", "Woloszek", "Polak", "Pomorski", "Prus", "Norwecki", "Szkot", "Kaszub", "Goral", "Gal", "Ziemba", "Nowak", "Szemis", "Helma", "Sala", "Wisniewski", "Zielinski", "Wozniak", "Lewandowski", "Dabrowski");

//adresy dla szkoły x2
/*$bulding_num=rand(1,40);
$flat_num=NULL;
$street=array("Żołnierska", "Niemierzyńska", "Mickiewicza", "Bohaterów Warszawy", "Kolejowa", "Kubusia Puchatka", "Polna", "Leśna", "Krótka", "Lipowa", "Brzozowa", "Ogrodowa", "Słoneczna", "Struga", "Szkolna", "3 maja", "1 maja");
$city=array("Szczecin", "Reptowo", "Mierzyn", "Stargard", "Police");
$zip_code=array("70-001", "73-108", "72-553", "73-110", "71-873");

$num_records_to_add=2;
for($i=0; $i<$num_records_to_add; $i++){
    $losu=rand(0,count($city)-1);
    $losu2=rand(0,count($street)-1);
    $sql="INSERT INTO `adress`(`Bulding_Number`, `Flat_Number`, `Street`, `City`, `Zip`) VALUES ('$bulding_num', '$flat_num', '$street[$losu2]', '$city[$losu]', '$zip_code[$losu]' )";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}*/

//dodanie klas

/*for($i=0; $i<9; $i++){
    $class="Klasa ".$i;
    $school_id=4;
    $sql="INSERT INTO `class`(`Class`, `Id_School`) VALUES ('$class','$school_id')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}*/

/*for($i=1; $i<=4; $i++){
    $class="Klasa ".$i;
    $school_id=5;
    $profile="humanistyczna";
    $sql="INSERT INTO `class`(`Class`, `Profile`, `Id_School`) VALUES ('$class', '$profile','$school_id')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}*/

//uczniowie
//klasa 0

$street=array("Żołnierska", "Niemierzyńska", "Mickiewicza", "Bohaterów Warszawy", "Kolejowa", "Kubusia Puchatka", "Polna", "Leśna", "Krótka", "Lipowa", "Brzozowa", "Ogrodowa", "Słoneczna", "Struga", "Szkolna", "3 maja", "1 maja");
$city=array("Szczecin", "Reptowo", "Mierzyn", "Stargard", "Police");
$zip_code=array("70-001", "73-108", "72-553", "73-110", "71-873");

//!!!!!!!!!!!!!!!!!!!!!!!!!
//$school_id=5;
//!!!!!!!!!!!!!!!!!!!!!!!!!

/*for($i=10; $i<=13; $i++){
    //podstawowa: 8 klas, liczyć od 1 do 9
    //liceum: 4 klasy, liczyć od 10 d0 13
    for($j=1; $j<=7; $j++){
        //podst.: 7 uczniow
        //liceum: 7 uczniow
        //adres
        $bulding_num=rand(1,60);
        $flat_num=rand(1,14);
        $losu=rand(0,count($city)-1);
        $losu2=rand(0,count($street)-1);

        //uczeń
        $class_id=$i;
            
        $year=substr((date("Y")-6+1-$i), -2);
        $month=rand(1,12);
        if(strlen((string)$month)==1){
            $month='0'.$month;
        }
            $day=rand(1,31);
        if(strlen((string)$day)==1){
            $day='0'.$day;
        }

        $birth_date=(date("Y")-6+1-$i)."-".$month."-".$day;
        $pesel=$year.$month.$day.rand(10000,99999);

        if($j % 2 == 0){
            //parzysta - dodaje kobiety

            //losowanie
            $r_imie_nr=rand(0, count($imiona_k)-1);
            $r_imie2_nr=rand(0, count($imiona_k)-1);
            while($r_imie_nr == $r_imie2_nr){
                $r_imie2_nr=rand(0, count($imiona_k)-1);
            }
            $r_nazwisko_nr=rand(0, count($nazwiska_k)-1);

            //faktycznie imiona i nazwisko
            $r_imie=$imiona_k[$r_imie_nr];
            $r_imie2=$imiona_k[$r_imie2_nr];
            $r_nazwisko=$nazwiska_k[$r_nazwisko_nr];
            $sex="K";

            //tworzenie loginu
            $first_letter=lcfirst($imiona_k2[$r_imie_nr]);
            $first_letter=substr($first_letter, 0,1);
            $lower_surname=strtolower($nazwiska_k2[$r_nazwisko_nr]);
            $login= $first_letter.$lower_surname;

        }
        else{
            //nieparzysta - dodaje mężczyzn

            //losowanie
            $r_imie_nr=rand(0, count($imiona_m)-1);
            $r_imie2_nr=rand(0, count($imiona_m)-1);
            while($r_imie_nr == $r_imie2_nr){
                $r_imie2_nr=rand(0, count($imiona_k)-1);
            }
            $r_nazwisko_nr=rand(0, count($nazwiska_m)-1);

            //faktycznie imiona i nazwisko
            $r_imie=$imiona_m[$r_imie_nr];
            $r_imie2=$imiona_m[$r_imie2_nr];
            $r_nazwisko=$nazwiska_m[$r_nazwisko_nr];
            $sex="M";

            //tworzenie loginu
            $first_letter=lcfirst($imiona_m2[$r_imie_nr]);
            $first_letter=substr($first_letter, 0,1);
            $lower_surname=strtolower($nazwiska_m2[$r_nazwisko_nr]);
            $login= $first_letter.$lower_surname;
        }
        $nationality='polskie';
        $passwd=password_hash($login, PASSWORD_BCRYPT);
        $email=$login."@edziennik.pl";
        $phone=rand(100000000,999999999);


        //trzeba stworzyć od razu user tab
        //$login
        //$passwd
        $usertype='U';

        //kolejnosc dodania: address, user, student

        $sql="INSERT INTO `adress`(`Bulding_Number`, `Flat_Number`, `Street`, `City`, `Zip`) VALUES ('$bulding_num', '$flat_num', '$street[$losu2]', '$city[$losu]', '$zip_code[$losu]' )";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully -adres";
            $get_add = "SELECT MAX(`Id`) AS 'max' FROM `adress`";
            $result = mysqli_query($conn, $get_add);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "Max id: " . $row["max"];
                    $max_address_id=$row["max"];
                }
            }
            //user tab

            $sql="INSERT INTO `user`(`Login`, `Password`, `UserType`) VALUES ('$login', '$passwd', '$usertype')";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully - user";
                $get_add = "SELECT MAX(`Id_User`) AS 'max' FROM `user`";
                $result = mysqli_query($conn, $get_add);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "Max id: " . $row["max"];
                        $max_user_id=$row["max"];
                    }
                }
                $sql="INSERT INTO `student`(`School_Id`, `Adress_Id`, `Class_Id`, `Id_User`, `Pesel`, `First_Name`, `Second_Name`, `Last_Name`, `Nationality`, `Birth_Date`, `Sex`, `Phone_Number`, `Email`) VALUES ('$school_id', '$max_address_id', '$class_id', '$max_user_id', '$pesel', '$r_imie', '$r_imie2', '$r_nazwisko', '$nationality', '$birth_date', '$sex', '$phone', '$email')";
                if(mysqli_query($conn,$sql)){
                    echo "New record created successfully - student";
                }else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                //koniec add user tab
            }else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            //koniec add address tab
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        //echo $pesel." ".$r_imie." ".$r_imie2." ".$r_nazwisko." ".$nationality." ".$birth_date." ".$sex." ".$phone." ".$email."\r\n";
        //echo " ".$login." ".$passwd."\r\n";


    }
}
*/

//get wszystkie id uczniow
$students=array();
$get_student = "SELECT `Id` as 'ID' FROM `student`";
$result = mysqli_query($conn, $get_student);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $students[]=$row["ID"];
    }
}else {
    echo "Error: " .$get_student. "<br>" . mysqli_error($conn);
}


//add user tab dla rodzica
for($i=1; $i<=count($students);$i++){

    do{
        $login="par".rand(10000, 99999);
        $check_login = "SELECT `Login` FROM `user` WHERE `Login`='$login';";
        $result = mysqli_query($conn, $check_login);
        if (mysqli_num_rows($result) > 0) {
            $exists=1;
        }else{
            $exists=0;
        }
    }while($exists==1);
    
    $passwd=password_hash($login, PASSWORD_BCRYPT);
    $usertype='P';

    $sql="INSERT INTO `user`(`Login`, `Password`, `UserType`) VALUES ('$login', '$passwd', '$usertype')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully - user";
        $get_add = "SELECT MAX(`Id_User`) AS 'max' FROM `user`";
        $result = mysqli_query($conn, $get_add);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $max_parent_id=$row["max"];
            }
        }
        //add parent
        $email=$login."@edziennik.pl";
        $phone=rand(100000000,999999999);
        $sql="INSERT INTO `parent`(`Id_User`, `Phone_Number`, `Email`) VALUES ('$max_parent_id', '$phone','$email')";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully - parent";
            $get_add = "SELECT MAX(`Id`) AS 'max' FROM `parent`";
            $result = mysqli_query($conn, $get_add);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    $parent_id=$row["max"];
                }
            }
            //add parent_student tab
            $sql="INSERT INTO `parent_student`(`Student_Id`, `Parent_Id`) VALUES ('$i','$parent_id')";
            if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully - parent_student";
            }else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>