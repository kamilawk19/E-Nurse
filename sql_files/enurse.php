<?php

//nie wszystkie dane zostały przekazane przez ten skrypt,
//niektóre tabele mają na tyle danych, że mogłam to zrobić przez phpmyadmin

$servername = "localhost";
$username = "root";
$password = "";
$dbname_nurse="e-nurse";
$dbname_dziennik="e-dziennik";

// Create connection
$conn2 = mysqli_connect($servername, $username, $password, $dbname_dziennik);
if (!$conn2) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$student_id=array();
$student_school=array();
$student_adress=array();
$student_class=array();
$student_pesel=array();
$student_first_name=array();
$student_second_name=array();
$student_last_name=array();
$student_nationality=array();
$student_birthdate=array();
$student_sex=array();
$student_phone_number=array();
$student_email=array();

$get_student = "SELECT * FROM `student`";
$result = mysqli_query($conn2, $get_student);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $student_id=$row["Id"];
        $student_school=$row["School_Id"];
        $student_adress=$row["Adress_Id"];
        $student_class=$row["Class_Id"];
        $student_pesel=$row["Pesel"];
        $student_first_name=$row["First_Name"];
        $student_second_name=$row["Second_Name"];
        $student_last_name=$row["Last_Name"];
        $student_nationality=$row["Nationality"];
        $student_birthdate=$row["Birth_Date"];
        $student_sex=$row["Sex"];
        $student_phone_number=$row["Phone_Number"];
        $student_email=$row["Email"];
    }
}else{
    echo "No result for student";
}

mysqli_close($conn2);
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname_nurse);

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
$nazwiska_k2=array("Szymanska", "Pawlowska", "Kowalska", "Wrobel", "Dudek", "Towarek", "Kalinowska", "Duda", "Biejat", "Wysocka", "Mazur", "Zmuda", "Czarnota", "Zmijewska", "Wolyniak", "Woloszek", "Polak", "Pomorska", "Prus", "Norwecka", "Szkot", "Kaszub", "Goral", "Gal", "Ziemba", "Nowak", "Szemis", "Helma", "Sala", "Wisniewska", "Zielinska", "Wozniak", "Lewandowska", "Dąbrowska");
$nazwiska_m2=array("Szymanski", "Pawlowski", "Kowalski", "Wrobel", "Dudek", "Towarek", "Kalinowski", "Duda", "Biejat", "Wysocki", "Mazur", "Zmuda", "Czarnota", "Zmijewski", "Wolyniak", "Woloszek", "Polak", "Pomorski", "Prus", "Norwecki", "Szkot", "Kaszub", "Goral", "Gal", "Ziemba", "Nowak", "Szemis", "Helma", "Sala", "Wisniewski", "Zielinski", "Wozniak", "Lewandowski", "Dąbrowski");

//insert nurse x4
/*$num_records_to_add=4;
for($i=1; $i<=$num_records_to_add; $i++){
    if($i % 2 == 0){
        //parzysta - dodaje kobiety 
        $r_imie=$imiona_k[rand(0, count($imiona_k)-1)];
        $r_nazwisko=$nazwiska_k[rand(0, count($nazwiska_k)-1)];
    }
    else{
        //nieparzysta - dodaje mężczyzn
        $r_imie=$imiona_m[rand(0, count($imiona_k)-1)];
        $r_nazwisko=$nazwiska_m[rand(0, count($nazwiska_k)-1)];
    }

    $first_letter=lcfirst($r_imie);
    $first_letter=substr($first_letter, 0,1);
    $first_letter=iconv('utf8', 'ascii//translit', $first_letter);
    $lower_surname=strtolower($r_nazwisko);
    $lower_surname=iconv('utf8', 'ascii//translit', $lower_surname);
    $login= $first_letter.$lower_surname;
    $passwd=password_hash($login, PASSWORD_BCRYPT);
    $email=$login."@enurse.pl";
    $phone=rand(100000000,999999999);
    //Nr prawa do wykonywania zawodu to 7 cyfr i litera P lub A na końcu (p - pięlegniarka, a - położna)
    $nr_pwd= rand(1111111,9999999).'P';
    //query bez dodawania statycznie id
    $sql="INSERT INTO `nurse`(`Imie`, `Nazwisko`, `Login`, `Haslo`, `Numer_telefonu`, `Email`, `Licencja`) VALUES ('$r_imie','$r_nazwisko','$login','$passwd','$phone','$email','$nr_pwd')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}*/

//print data

/*$sql = "SELECT * FROM nurse";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "Id: " . $row["Id"]. " Imie i Nazwisko: " . $row["Imie"]. " " . $row["Nazwisko"]. "<br>";
  }
} else {
  echo "0 results";
}*/

//testy_przesiewowe

/*$klasa_prze=array("Szkoła podstawowa, Kl. 0", "Szkoła podstawowa, Kl. 3", "Szkoła podstawowa, Kl. 5", "Szkoła podstawowa, Kl. 7", "Szkoła Ponadpodstawowa, Kl. 1", "Szkoła Ponadpodstawowa, Kl. ostatnia");
for($i=0; $i<count($klasa_prze);$i++){
    if($i==0){
        //0
        $rodzaj_prze=array("Pomiar wysokości", "Pomiar masy ciała", "Cover test", "Test Hirschberga(w kierunku zeza)", "Badanie ostrości wzroku", "Badanie słuchu", "Wykrywanie bocznego skrzywienia kręgosłupa", "Wykrywanie płasko-koślawych stóp", "Wykrywanie koślawości kolan", "Orientacyjne wykrywanie wady wymowy", "Orientacyjne wykrywanie zaburzeń statyki ciała", "Pomiar RR");
        for($j=0; $j<count($rodzaj_prze); $j++){
            $sql="INSERT INTO `testy_przesiewowe`(`Klasa_Przesiewowa`, `Rodzaj_Przesiewu`) VALUES ('$klasa_prze[$i]','$rodzaj_prze[$j]')";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    } elseif($i==1){
        //3
        $rodzaj_prze=array("Pomiar wysokości", "Pomiar masy ciała", "Badanie ostrości wzroku", "Wykrywanie zaburzeń widzenia barwnego", "Wykrywanie bocznego skrzywienia kręgosłupa");
        for($j=0; $j<count($rodzaj_prze); $j++){
            $sql="INSERT INTO `testy_przesiewowe`(`Klasa_Przesiewowa`, `Rodzaj_Przesiewu`) VALUES ('$klasa_prze[$i]','$rodzaj_prze[$j]')";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    } elseif($i==2){
        //5
        $rodzaj_prze=array("Pomiar wysokości", "Pomiar masy ciała", "Badanie ostrości wzroku", "Wykrywanie zaburzeń widzenia barwnego", "Wykrywanie bocznego skrzywienia kręgosłupa");
        for($j=0; $j<count($rodzaj_prze); $j++){
            $sql="INSERT INTO `testy_przesiewowe`(`Klasa_Przesiewowa`, `Rodzaj_Przesiewu`) VALUES ('$klasa_prze[$i]','$rodzaj_prze[$j]')";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    } elseif($i==3){
        //7
        $rodzaj_prze=array("Pomiar wysokości", "Pomiar masy ciała", "Badanie ostrości wzroku", "Badanie słuchu", "Wykrywanie bocznego skrzywienia kręgosłupa", "Wykrywanie nadmiernej kifozy", "Pomiar RR");
        for($j=0; $j<count($rodzaj_prze); $j++){
            $sql="INSERT INTO `testy_przesiewowe`(`Klasa_Przesiewowa`, `Rodzaj_Przesiewu`) VALUES ('$klasa_prze[$i]','$rodzaj_prze[$j]')";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    } elseif($i==4){
        //1
        $rodzaj_prze=array("Pomiar wysokości", "Pomiar masy ciała", "Badanie ostrości wzroku", "Wykrywanie bocznego skrzywienia kręgosłupa", "Wykrywanie nadmiernej kifozy", "Pomiar RR");
        for($j=0; $j<count($rodzaj_prze); $j++){
            $sql="INSERT INTO `testy_przesiewowe`(`Klasa_Przesiewowa`, `Rodzaj_Przesiewu`) VALUES ('$klasa_prze[$i]','$rodzaj_prze[$j]')";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    } elseif($i==5){
        //ost
        $rodzaj_prze=array("Pomiar wysokości", "Pomiar masy ciała", "Badanie ostrości wzroku", "Pomiar RR");
        for($j=0; $j<count($rodzaj_prze); $j++){
            $sql="INSERT INTO `testy_przesiewowe`(`Klasa_Przesiewowa`, `Rodzaj_Przesiewu`) VALUES ('$klasa_prze[$i]','$rodzaj_prze[$j]')";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
}*/



//TO_DO:
//dodanie ucznia w uczen_help
/*for($i=1;$i<=91;$i++){
    if($i<=63){
        $date="2021-09-07 10:17:18";
    }else{
        $date="2021-09-08 11:18:34";
    }
    $zgoda1=1;
    $zgoda2=1;
    $sql="INSERT INTO `uczen_help`(`Id_Ucznia`, `Data`, `Zgoda_Na_Swiadczenia_Pielegniarki`, `Zgoda_Na_Info_Kadry_O_Zdrowiu`) VALUES ('$i','$date','$zgoda1','$zgoda2')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}*/
//W phpmyadmin zgody zostały zmienione dla uczniow z id 1 i 17!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//stworzenie kzu dla wszystkich uczniów poza tymi, co nie są w tab uczen_help
/*for($i=1;$i<=91;$i++){
    if($i<=63){
        //podstawowka
        if(rand(1,10)%2==0){
            $id_nurse=1;
        }else{
            $id_nurse=4;
        }
        $niep=0;

    }else{
        //liceum
        if(rand(1,10)%2==0){
            $id_nurse=2;
        }else{
            $id_nurse=3;
        }
        $niep=0;
    }
    if($i!=1 && $i!=17){
        //oni nie mają zgody rodzica na świadczenia pielęgniarki
        $sql="INSERT INTO `kzu`(`Id_Ucznia`, `Niepelnosprawnosc`, `Nurse_Id`) VALUES ('$i','$niep','$id_nurse')";
        if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}*/

//choroby tab

/*$choroby=array("Anemia", "Cukrzyca typu I", "Cukrzyca typu II", "Anemia", "Astma", "Depresja", "Otyłość", "Alergia", "Częste bóle głowy", "Nowotwór złośliwy", "Reumatoidalne zapalenie stawów", "Zapalenie stawów i/lub kości", "Choroba wrzodowa żołądka lub dwunastnicy", "Wysokie ciśnienie krwi", "Przewlekłe choroby nerek", "Bóle szyi", "Choroby tarczycy", "Przewlekłe zapalenie oskrzeli");
foreach($choroby as $ch){
    $sql="INSERT INTO `choroby`(`choroba`) VALUES ('$ch')";
    if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}*/

//wypełnienie każdej tabeli z początkiem kzu_*

    //kzu_choroby

    /*for($i=1;$i<=7;$i++){
        do{
        $id_karty=rand(1,89);
        }while($id_karty==1 || $id_karty==17);
        $id_choroby=rand(1,18);

        $sql="INSERT INTO `kzu_choroby`(`Id_Karty`, `Id_Choroby`) VALUES ('$id_karty','$id_choroby')";
        if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }*/

    //kzu_cisnienie_tetnicze_krwi
    //klasy:0,3,5,7,1,4

    /*function klasa0(&$skurczowe, &$rozkurczowe, &$centyl){
        $skurczowe=rand(83,124);
        $rozkurczowe=rand(43,77);
        if($skurczowe>=83 && $skurczowe<=88){
            $centyl=rand(1,5)."/";
        }elseif($skurczowe>88 && $skurczowe<=91){
            $centyl=rand(5,10)."/";
        }elseif($skurczowe>91 && $skurczowe<=96){
            $centyl=rand(10,25)."/";
        }elseif($skurczowe>96 && $skurczowe<=101){
           $centyl=rand(25,50)."/";
        }elseif($skurczowe>101 && $skurczowe<=107){
            $centyl=rand(50,75)."/";
        }elseif($skurczowe>107 && $skurczowe<=113){
            $centyl=rand(75,90)."/";
        }elseif($skurczowe>113 && $skurczowe<=117){
            $centyl=rand(90,95)."/";
        }elseif($skurczowe>117 && $skurczowe<=124){
            $centyl=rand(95,99)."/";
        }

        if($rozkurczowe>=43 && $rozkurczowe<=47){
            $centyl=$centyl.rand(1,5);
        }elseif($rozkurczowe>47 && $rozkurczowe<=50){
           $centyl=$centyl.rand(25,50);
        }elseif($rozkurczowe>50 && $rozkurczowe<=54){
            $centyl=$centyl.rand(50,75);
        }elseif($rozkurczowe>54 && $rozkurczowe<=59){
            $centyl=$centyl.rand(75,90);
        }elseif($rozkurczowe>59 && $rozkurczowe<=64){
            $centyl=$centyl.rand(90,95);
        }elseif($rozkurczowe>64 && $rozkurczowe<=68){
            $centyl=$centyl.rand(95,99);
        }elseif($rozkurczowe>68 && $rozkurczowe<=71){
             $centyl=$centyl.rand(95,99);
        }elseif($rozkurczowe>71 && $rozkurczowe<=77){
             $centyl=$centyl.rand(95,99);
        }
    }

    function klasa3(&$skurczowe, &$rozkurczowe, &$centyl){
        $skurczowe=rand(85,126);
        $rozkurczowe=rand(44,78);
        if($skurczowe>=85 && $skurczowe<=90){
            $centyl=rand(1,5)."/";
        }elseif($skurczowe>90 && $skurczowe<=93){
            $centyl=rand(5,10)."/";
        }elseif($skurczowe>93 && $skurczowe<=98){
            $centyl=rand(10,25)."/";
        }elseif($skurczowe>98 && $skurczowe<=103){
           $centyl=rand(25,50)."/";
        }elseif($skurczowe>103 && $skurczowe<=110){
            $centyl=rand(50,75)."/";
        }elseif($skurczowe>110 && $skurczowe<=116){
            $centyl=rand(75,90)."/";
        }elseif($skurczowe>116 && $skurczowe<=119){
            $centyl=rand(90,95)."/";
        }elseif($skurczowe>119 && $skurczowe<=126){
            $centyl=rand(95,99)."/";
        }

        if($rozkurczowe>=44 && $rozkurczowe<=49){
            $centyl=$centyl.rand(1,5);
        }elseif($rozkurczowe>49 && $rozkurczowe<=51){
           $centyl=$centyl.rand(25,50);
        }elseif($rozkurczowe>51 && $rozkurczowe<=55){
            $centyl=$centyl.rand(50,75);
        }elseif($rozkurczowe>55 && $rozkurczowe<=60){
            $centyl=$centyl.rand(75,90);
        }elseif($rozkurczowe>60 && $rozkurczowe<=65){
            $centyl=$centyl.rand(90,95);
        }elseif($rozkurczowe>65 && $rozkurczowe<=70){
            $centyl=$centyl.rand(95,99);
        }elseif($rozkurczowe>70 && $rozkurczowe<=73){
             $centyl=$centyl.rand(95,99);
        }elseif($rozkurczowe>73 && $rozkurczowe<=78){
             $centyl=$centyl.rand(95,99);
        }
    }

    function klasa5(&$skurczowe, &$rozkurczowe, &$centyl){
        $skurczowe=rand(86,129);
        $rozkurczowe=rand(45,79);

        if($skurczowe>=86 && $skurczowe<=92){
            $centyl=rand(1,5)."/";
        }elseif($skurczowe>92 && $skurczowe<=95){
            $centyl=rand(5,10)."/";
        }elseif($skurczowe>95 && $skurczowe<=100){
            $centyl=rand(10,25)."/";
        }elseif($skurczowe>100 && $skurczowe<=106){
           $centyl=rand(25,50)."/";
        }elseif($skurczowe>106 && $skurczowe<=112){
            $centyl=rand(50,75)."/";
        }elseif($skurczowe>112 && $skurczowe<=118){
            $centyl=rand(75,90)."/";
        }elseif($skurczowe>118 && $skurczowe<=122){
            $centyl=rand(90,95)."/";
        }elseif($skurczowe>122 && $skurczowe<=129){
            $centyl=rand(95,99)."/";
        }

        if($rozkurczowe>=45 && $rozkurczowe<=49){
            $centyl=$centyl.rand(1,5);
        }elseif($rozkurczowe>49 && $rozkurczowe<=52){
           $centyl=$centyl.rand(25,50);
        }elseif($rozkurczowe>52 && $rozkurczowe<=56){
            $centyl=$centyl.rand(50,75);
        }elseif($rozkurczowe>56 && $rozkurczowe<=61){
            $centyl=$centyl.rand(75,90);
        }elseif($rozkurczowe>61 && $rozkurczowe<=66){
            $centyl=$centyl.rand(90,95);
        }elseif($rozkurczowe>66 && $rozkurczowe<=71){
            $centyl=$centyl.rand(95,99);
        }elseif($rozkurczowe>71 && $rozkurczowe<=74){
             $centyl=$centyl.rand(95,99);
        }elseif($rozkurczowe>74 && $rozkurczowe<=79){
             $centyl=$centyl.rand(95,99);
        }
    }

    function klasa7(&$skurczowe, &$rozkurczowe, &$centyl){
        $skurczowe=rand(89,135);
        $rozkurczowe=rand(46,81);

        if($skurczowe>=89 && $skurczowe<=95){
            $centyl=rand(1,5)."/";
        }elseif($skurczowe>95 && $skurczowe<=98){
            $centyl=rand(5,10)."/";
        }elseif($skurczowe>98 && $skurczowe<=104){
            $centyl=rand(10,25)."/";
        }elseif($skurczowe>104 && $skurczowe<=110){
           $centyl=rand(25,50)."/";
        }elseif($skurczowe>110 && $skurczowe<=117){
            $centyl=rand(50,75)."/";
        }elseif($skurczowe>117 && $skurczowe<=123){
            $centyl=rand(75,90)."/";
        }elseif($skurczowe>123 && $skurczowe<=127){
            $centyl=rand(90,95)."/";
        }elseif($skurczowe>127 && $skurczowe<=135){
            $centyl=rand(95,99)."/";
        }

        if($rozkurczowe>=46 && $rozkurczowe<=50){
            $centyl=$centyl.rand(1,5);
        }elseif($rozkurczowe>50 && $rozkurczowe<=53){
           $centyl=$centyl.rand(25,50);
        }elseif($rozkurczowe>53 && $rozkurczowe<=57){
            $centyl=$centyl.rand(50,75);
        }elseif($rozkurczowe>57 && $rozkurczowe<=62){
            $centyl=$centyl.rand(75,90);
        }elseif($rozkurczowe>62 && $rozkurczowe<=67){
            $centyl=$centyl.rand(90,95);
        }elseif($rozkurczowe>67 && $rozkurczowe<=72){
            $centyl=$centyl.rand(95,99);
        }elseif($rozkurczowe>72 && $rozkurczowe<=75){
             $centyl=$centyl.rand(95,99);
        }elseif($rozkurczowe>75 && $rozkurczowe<=81){
             $centyl=$centyl.rand(95,99);
        }
    }

    function klasa11(&$skurczowe, &$rozkurczowe, &$centyl){
        $skurczowe=rand(94,144);
        $rozkurczowe=rand(47,83);

        if($skurczowe>=94 && $skurczowe<=100){
            $centyl=rand(1,5)."/";
        }elseif($skurczowe>100 && $skurczowe<=104){
            $centyl=rand(5,10)."/";
        }elseif($skurczowe>104 && $skurczowe<=110){
            $centyl=rand(10,25)."/";
        }elseif($skurczowe>110 && $skurczowe<=117){
           $centyl=rand(25,50)."/";
        }elseif($skurczowe>117 && $skurczowe<=124){
            $centyl=rand(50,75)."/";
        }elseif($skurczowe>124 && $skurczowe<=131){
            $centyl=rand(75,90)."/";
        }elseif($skurczowe>131 && $skurczowe<=135){
            $centyl=rand(90,95)."/";
        }elseif($skurczowe>135 && $skurczowe<=144){
            $centyl=rand(95,99)."/";
        }

        if($rozkurczowe>=47 && $rozkurczowe<=52){
            $centyl=$centyl.rand(1,5);
        }elseif($rozkurczowe>52 && $rozkurczowe<=55){
           $centyl=$centyl.rand(25,50);
        }elseif($rozkurczowe>55 && $rozkurczowe<=59){
            $centyl=$centyl.rand(50,75);
        }elseif($rozkurczowe>59 && $rozkurczowe<=64){
            $centyl=$centyl.rand(75,90);
        }elseif($rozkurczowe>64 && $rozkurczowe<=69){
            $centyl=$centyl.rand(90,95);
        }elseif($rozkurczowe>69 && $rozkurczowe<=74){
            $centyl=$centyl.rand(95,99);
        }elseif($rozkurczowe>74 && $rozkurczowe<=77){
             $centyl=$centyl.rand(95,99);
        }elseif($rozkurczowe>77 && $rozkurczowe<=83){
             $centyl=$centyl.rand(95,99);
        }
    }

    function klasa14(&$skurczowe, &$rozkurczowe, &$centyl){
        $skurczowe=rand(97,150);
        $rozkurczowe=rand(49,86);

        if($skurczowe>=97 && $skurczowe<=103){
            $centyl=rand(1,5)."/";
        }elseif($skurczowe>103 && $skurczowe<=107){
            $centyl=rand(5,10)."/";
        }elseif($skurczowe>107 && $skurczowe<=113){
            $centyl=rand(10,25)."/";
        }elseif($skurczowe>113 && $skurczowe<=121){
           $centyl=rand(25,50)."/";
        }elseif($skurczowe>121 && $skurczowe<=128){
            $centyl=rand(50,75)."/";
        }elseif($skurczowe>128 && $skurczowe<=136){
            $centyl=rand(75,90)."/";
        }elseif($skurczowe>136 && $skurczowe<=140){
            $centyl=rand(90,95)."/";
        }elseif($skurczowe>140 && $skurczowe<=150){
            $centyl=rand(95,99)."/";
        }

        if($rozkurczowe>=49 && $rozkurczowe<=54){
            $centyl=$centyl.rand(1,5);
        }elseif($rozkurczowe>54 && $rozkurczowe<=56){
           $centyl=$centyl.rand(25,50);
        }elseif($rozkurczowe>56 && $rozkurczowe<=61){
            $centyl=$centyl.rand(50,75);
        }elseif($rozkurczowe>61 && $rozkurczowe<=66){
            $centyl=$centyl.rand(75,90);
        }elseif($rozkurczowe>66 && $rozkurczowe<=72){
            $centyl=$centyl.rand(90,95);
        }elseif($rozkurczowe>72 && $rozkurczowe<=77){
            $centyl=$centyl.rand(95,99);
        }elseif($rozkurczowe>77 && $rozkurczowe<=80){
             $centyl=$centyl.rand(95,99);
        }elseif($rozkurczowe>80 && $rozkurczowe<=86){
             $centyl=$centyl.rand(95,99);
        }
    }

    for($i=1;$i<=91;$i++){
        if($i!=1 && $i!=17){
            $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$i";
            $result = mysqli_query($conn, $get_karta);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    $id_ka=$row["id_k"];
                }
            }

            if($i>=1 && $i<=7){
                //klasa 0 - wiek:6
                $data="2022-01-10 20:17:01";
                $skurczowe=0;
                $rozkurczowe=0;
                $centyl=0;

                klasa0($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }elseif($i>7 && $i<=14){
                //klasa 1 - wiek:7
                $data="2021-01-10 20:17:01";
                $skurczowe=0;
                $rozkurczowe=0;
                $centyl=0;

                klasa0($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }elseif($i>=15 && $i<=21){
                //klasa 2 - wiek: 8
                $data="2020-01-10 20:17:01";
                $skurczowe=0;
                $rozkurczowe=0;
                $centyl=0;

                klasa0($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }elseif($i>=22 && $i<=28){
                //klasa 3 - wiek: 9
                $data3="2022-01-10 20:17:01";
                $data0="2019-01-10 20:17:01";
                $skurczowe=0;
                $rozkurczowe=0;
                $centyl=0;

                klasa3($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data3', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa0($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data0', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }elseif($i>=29 && $i<=35){
                //klasa 4 - wiek: 10
                $data3="2021-01-10 20:17:01";
                $data0="2018-01-10 20:17:01";
                $skurczowe=0;
                $rozkurczowe=0;
                $centyl=0;

                klasa3($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data3', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa0($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data0', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }elseif($i>=36 && $i<=42){
                //klasa 5 - wiek: 11
                $data5="2022-01-10 20:17:01";
                $data3="2020-01-10 20:17:01";
                $data0="2017-01-10 20:17:01";
                $skurczowe=0;
                $rozkurczowe=0;
                $centyl=0;

                klasa5($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data5', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa3($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data3', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa0($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data0', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }elseif($i>=43 && $i<=49){
                //klasa 6 - wiek: 12
                $data5="2021-01-10 20:17:01";
                $data3="2019-01-10 20:17:01";
                $data0="2016-01-10 20:17:01";
                $skurczowe=0;
                $rozkurczowe=0;
                $centyl=0;

                klasa5($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data5', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa3($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data3', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa0($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data0', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }elseif($i>=50 && $i<=56){
                //klasa 7 - wiek: 13
                $data7="2022-01-10 20:17:01";
                $data5="2020-01-10 20:17:01";
                $data3="2018-01-10 20:17:01";
                $data0="2015-01-10 20:17:01";
                $skurczowe=0;
                $rozkurczowe=0;
                $centyl=0;

                klasa7($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data7', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa5($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data5', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa3($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data3', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa0($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data0', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }elseif($i>=57 && $i<=63){
                //klasa 8 - wiek: 14

                $data7="2021-01-10 20:17:01";
                $data7="2021-01-10 20:17:01";
                $data5="2019-01-10 20:17:01";
                $data3="2017-01-10 20:17:01";
                $data0="2014-01-10 20:17:01";
                $skurczowe=0;
                $rozkurczowe=0;
                $centyl=0;

                klasa7($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data7', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa5($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data5', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa3($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data3', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa0($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data0', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }elseif($i>=64 && $i<=70){
                //klasa 1 - wiek: 15
                $data11="2022-01-10 20:17:01";
                $data7="2020-01-10 20:17:01";
                $data5="2018-01-10 20:17:01";
                $data3="2016-01-10 20:17:01";
                $data0="2013-01-10 20:17:01";
                $skurczowe=0;
                $rozkurczowe=0;
                $centyl=0;

                klasa11($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data11', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa7($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data7', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa5($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data5', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa3($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data3', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa0($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data0', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }


            }elseif($i>=71 && $i<=77){
                //klasa 2 - wiek: 16
                $data11="2021-01-10 20:17:01";
                $data7="2019-01-10 20:17:01";
                $data5="2017-01-10 20:17:01";
                $data3="2015-01-10 20:17:01";
                $data0="2012-01-10 20:17:01";
                $skurczowe=0;
                $rozkurczowe=0;
                $centyl=0;

                klasa11($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data11', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa7($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data7', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa5($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data5', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa3($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data3', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa0($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data0', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }elseif($i>=78 && $i<=84){
                //klasa 3 - wiek: 17
                $data11="2020-01-10 20:17:01";
                $data7="2018-01-10 20:17:01";
                $data5="2016-01-10 20:17:01";
                $data3="2014-01-10 20:17:01";
                $data0="2011-01-10 20:17:01";
                $skurczowe=0;
                $rozkurczowe=0;
                $centyl=0;

                klasa11($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data11', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa7($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data7', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa5($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data5', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa3($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data3', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa0($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data0', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }elseif($i>=85 && $i<=91){
                //klasa 4 - wiek: 18
                $data14="2022-01-10 20:17:01";
                $data11="2019-01-10 20:17:01";
                $data7="2017-01-10 20:17:01";
                $data5="2015-01-10 20:17:01";
                $data3="2013-01-10 20:17:01";
                $data0="2010-01-10 20:17:01";
                $skurczowe=0;
                $rozkurczowe=0;
                $centyl=0;

                klasa11($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data11', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa7($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data7', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa5($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data5', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa3($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data3', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                klasa0($skurczowe, $rozkurczowe, $centyl);
                $wynik=$skurczowe."/".$rozkurczowe;
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data0', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }
        }
    }*/

    //kzu_wzrok
        // Tutaj badania dla jednego ucznia się będą powtarzać:
        //Klasy: 0, 3, 5, 7, 1sr, ost sr
        //zez tylko dla 0
        //barwa tylko : 3, 5,
        /*for($i=1;$i<=91;$i++){
            if($i!=1 && $i!=17){
                $Zez_Widoczny=0;
                $Zez_Cover_Test="-";
                $Zez_Odbicie_Swiatla_Na_Rogowkach='0';
                $Oko_Prawe='5/5';
                $Oko_Lewe='5/5';
                $Widzenie_Barw='14/14';
                //$Uwagi

                //dane
                if($i==23){
                    $Oko_Prawe='5/10';
                    $Oko_Lewe='5/10';
                }

                if($i>=1 && $i<=7){
                    //klasa 0 - wiek:6
                    $data="2022-01-10 10:30:18";

                    $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$i";
                    $result = mysqli_query($conn, $get_karta);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $id_ka=$row["id_k"];
                        }
                    }

                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Zez_Widoczny`, `Zez_Cover_Test`, `Zez_Odbicie_Swiatla_Na_Rogowkach`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data', '$Zez_Widoczny', '$Zez_Cover_Test', '$Zez_Odbicie_Swiatla_Na_Rogowkach', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

                }elseif($i>7 && $i<=14){
                    //klasa 1 - wiek:7
                    $data="2021-01-10 10:30:18";

                    $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$i";
                    $result = mysqli_query($conn, $get_karta);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $id_ka=$row["id_k"];
                        }
                    }

                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Zez_Widoczny`, `Zez_Cover_Test`, `Zez_Odbicie_Swiatla_Na_Rogowkach`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data', '$Zez_Widoczny', '$Zez_Cover_Test', '$Zez_Odbicie_Swiatla_Na_Rogowkach', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }elseif($i>14 && $i<=21){
                    //klasa 2 - wiek:8
                    $data="2020-01-10 10:30:18";

                    $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$i";
                    $result = mysqli_query($conn, $get_karta);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $id_ka=$row["id_k"];
                        }
                    }

                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Zez_Widoczny`, `Zez_Cover_Test`, `Zez_Odbicie_Swiatla_Na_Rogowkach`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data', '$Zez_Widoczny', '$Zez_Cover_Test', '$Zez_Odbicie_Swiatla_Na_Rogowkach', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                

                }elseif($i>=22 && $i<=28){
                    //klasa 3 - wiek: 9
                    //dodanie 0,3x2
                    //klasa 0 - wiek:6
                    $data3="2022-01-10 10:30:18";
                    $data0="2019-01-10 10:30:18";

                    $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$i";
                    $result = mysqli_query($conn, $get_karta);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $id_ka=$row["id_k"];
                        }
                    }

                    //klasa 0 ucznia
                    //to do zapytanie sql
                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Zez_Widoczny`, `Zez_Cover_Test`, `Zez_Odbicie_Swiatla_Na_Rogowkach`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data0', '$Zez_Widoczny', '$Zez_Cover_Test', '$Zez_Odbicie_Swiatla_Na_Rogowkach', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    //klasa 3
                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Widzenie_Barw`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data3', '$Widzenie_Barw', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

                }elseif($i>=29 && $i<=35){
                    //klasa 4 - wiek: 10
                    //dodanie 0,3x2
                    //klasa 0 - wiek:6
                    $data3="2021-01-10 10:30:18";
                    $data0="2018-01-10 10:30:18";

                    $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$i";
                    $result = mysqli_query($conn, $get_karta);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $id_ka=$row["id_k"];
                        }
                    }

                    //klasa 0 ucznia
                    //to do zapytanie sql
                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Zez_Widoczny`, `Zez_Cover_Test`, `Zez_Odbicie_Swiatla_Na_Rogowkach`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data0', '$Zez_Widoczny', '$Zez_Cover_Test', '$Zez_Odbicie_Swiatla_Na_Rogowkach', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    //klasa 3
                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Widzenie_Barw`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data3', '$Widzenie_Barw', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

                }elseif($i>=36 && $i<=42){
                    //klasa 5 - wiek: 11
                    //klasa 3 - wiek: 9
                    //klasa 0 - wiek: 6
                    $data5="2022-01-10 10:30:18";
                    $data3="2020-01-10 10:30:18";
                    $data0="2017-01-10 10:30:18";

                    $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$i";
                    $result = mysqli_query($conn, $get_karta);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $id_ka=$row["id_k"];
                        }
                    }

                    //klasa 0 ucznia
                    //to do zapytanie sql
                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Zez_Widoczny`, `Zez_Cover_Test`, `Zez_Odbicie_Swiatla_Na_Rogowkach`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data0', '$Zez_Widoczny', '$Zez_Cover_Test', '$Zez_Odbicie_Swiatla_Na_Rogowkach', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    //klasa 3
                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Widzenie_Barw`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data3', '$Widzenie_Barw', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    //klasa 5
                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Widzenie_Barw`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data5', '$Widzenie_Barw', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

                }elseif($i>=43 && $i<=49){
                    //klasa 6
                    $data5="2021-01-10 10:30:18";
                    $data3="2019-01-10 10:30:18";
                    $data0="2016-01-10 10:30:18";

                    $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$i";
                    $result = mysqli_query($conn, $get_karta);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $id_ka=$row["id_k"];
                        }
                    }

                    //klasa 0 ucznia
                    //to do zapytanie sql
                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Zez_Widoczny`, `Zez_Cover_Test`, `Zez_Odbicie_Swiatla_Na_Rogowkach`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data0', '$Zez_Widoczny', '$Zez_Cover_Test', '$Zez_Odbicie_Swiatla_Na_Rogowkach', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    //klasa 3
                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Widzenie_Barw`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data3', '$Widzenie_Barw', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    //klasa 5
                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Widzenie_Barw`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data5', '$Widzenie_Barw', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }elseif($i>=50 && $i<=56){
                    //klasa 7 - wiek: 13
                    //klasa 5 - wiek: 11
                    //klasa 3 - wiek: 9
                    //klasa 0 - wiek: 6
                    $data7="2022-01-10 10:30:18";
                    $data5="2020-01-10 10:30:18";
                    $data3="2018-01-10 10:30:18";
                    $data0="2015-01-09 10:30:18";

                    $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$i";
                    $result = mysqli_query($conn, $get_karta);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $id_ka=$row["id_k"];
                        }
                    }

                    //klasa 0 ucznia
                    //to do zapytanie sql
                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Zez_Widoczny`, `Zez_Cover_Test`, `Zez_Odbicie_Swiatla_Na_Rogowkach`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data0', '$Zez_Widoczny', '$Zez_Cover_Test', '$Zez_Odbicie_Swiatla_Na_Rogowkach', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    //klasa 3
                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Widzenie_Barw`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data3', '$Widzenie_Barw', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    //klasa 5
                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Widzenie_Barw`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data5', '$Widzenie_Barw', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    //klasa 7
                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`,`Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data5', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

				}elseif($i>=57 && $i<=63){
					//klasa 8 - wiek: 14
                    $data7="2021-01-10 10:30:18";
                    $data5="2019-01-10 10:30:18";
                    $data3="2017-01-10 10:30:18";
                    $data0="2014-01-09 10:30:18";

                    $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$i";
                    $result = mysqli_query($conn, $get_karta);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $id_ka=$row["id_k"];
                        }
                    }

                    //klasa 0 ucznia
                    //to do zapytanie sql
                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Zez_Widoczny`, `Zez_Cover_Test`, `Zez_Odbicie_Swiatla_Na_Rogowkach`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data0', '$Zez_Widoczny', '$Zez_Cover_Test', '$Zez_Odbicie_Swiatla_Na_Rogowkach', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    //klasa 3
                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Widzenie_Barw`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data3', '$Widzenie_Barw', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    //klasa 5
                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Widzenie_Barw`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data5', '$Widzenie_Barw', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    //klasa 7
                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`,`Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data5', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
					
					
					
                }elseif($i>=64 && $i<=70){
                    //klasa 1 - wiek: 15
                   //klasa 7 - wiek: 13
                   //klasa 5 - wiek: 11
                   //klasa 3 - wiek: 9
                   //klasa 0 - wiek: 6
                   $data11="2022-01-10 10:30:18";
                   $data7="2020-01-10 10:30:18";
                   $data5="2018-01-10 10:30:18";
                   $data3="2016-01-08 10:30:18";
                   $data0="2013-01-10 10:30:18";

                   $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$i";
                   $result = mysqli_query($conn, $get_karta);
                   if (mysqli_num_rows($result) > 0) {
                       // output data of each row
                       while($row = mysqli_fetch_assoc($result)) {
                           $id_ka=$row["id_k"];
                       }
                   }

                   //klasa 0 ucznia
                   //to do zapytanie sql
                   $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Zez_Widoczny`, `Zez_Cover_Test`, `Zez_Odbicie_Swiatla_Na_Rogowkach`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data0', '$Zez_Widoczny', '$Zez_Cover_Test', '$Zez_Odbicie_Swiatla_Na_Rogowkach', '$Oko_Prawe', '$Oko_Lewe')";
                   if (mysqli_query($conn, $sql)) {
                       echo "New record created successfully";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   //klasa 3
                   $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Widzenie_Barw`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data3', '$Widzenie_Barw', '$Oko_Prawe', '$Oko_Lewe')";
                   if (mysqli_query($conn, $sql)) {
                       echo "New record created successfully";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   //klasa 5
                   $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Widzenie_Barw`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data5', '$Widzenie_Barw', '$Oko_Prawe', '$Oko_Lewe')";
                   if (mysqli_query($conn, $sql)) {
                       echo "New record created successfully";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   //klasa 7
                   $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`,`Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data5', '$Oko_Prawe', '$Oko_Lewe')";
                   if (mysqli_query($conn, $sql)) {
                       echo "New record created successfully";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   //klasa 1
                  $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`,`Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data11', '$Oko_Prawe', '$Oko_Lewe')";
                  if (mysqli_query($conn, $sql)) {
                      echo "New record created successfully";
                  } else {
                      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                  }

                }elseif($i>=71 && $i<=77){
                   //klasa 2
                   $data11="2021-01-10 10:30:18";
                   $data7="2019-01-10 10:30:18";
                   $data5="2017-01-10 10:30:18";
                   $data3="2015-01-08 10:30:18";
                   $data0="2012-01-10 10:30:18";

                   $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$i";
                   $result = mysqli_query($conn, $get_karta);
                   if (mysqli_num_rows($result) > 0) {
                       // output data of each row
                       while($row = mysqli_fetch_assoc($result)) {
                           $id_ka=$row["id_k"];
                       }
                   }

                   //klasa 0 ucznia
                   //to do zapytanie sql
                   $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Zez_Widoczny`, `Zez_Cover_Test`, `Zez_Odbicie_Swiatla_Na_Rogowkach`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data0', '$Zez_Widoczny', '$Zez_Cover_Test', '$Zez_Odbicie_Swiatla_Na_Rogowkach', '$Oko_Prawe', '$Oko_Lewe')";
                   if (mysqli_query($conn, $sql)) {
                       echo "New record created successfully";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   //klasa 3
                   $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Widzenie_Barw`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data3', '$Widzenie_Barw', '$Oko_Prawe', '$Oko_Lewe')";
                   if (mysqli_query($conn, $sql)) {
                       echo "New record created successfully";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   //klasa 5
                   $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Widzenie_Barw`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data5', '$Widzenie_Barw', '$Oko_Prawe', '$Oko_Lewe')";
                   if (mysqli_query($conn, $sql)) {
                       echo "New record created successfully";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   //klasa 7
                   $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`,`Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data5', '$Oko_Prawe', '$Oko_Lewe')";
                   if (mysqli_query($conn, $sql)) {
                       echo "New record created successfully";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   //klasa 1
                  $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`,`Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data11', '$Oko_Prawe', '$Oko_Lewe')";
                  if (mysqli_query($conn, $sql)) {
                      echo "New record created successfully";
                  } else {
                      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                  }

                }elseif($i>=78 && $i<=84){
                    //klasa 3
                   $data11="2020-01-10 10:30:18";
                   $data7="2018-01-10 10:30:18";
                   $data5="2016-01-10 10:30:18";
                   $data3="2014-01-08 10:30:18";
                   $data0="2011-01-10 10:30:18";

                   $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$i";
                   $result = mysqli_query($conn, $get_karta);
                   if (mysqli_num_rows($result) > 0) {
                       // output data of each row
                       while($row = mysqli_fetch_assoc($result)) {
                           $id_ka=$row["id_k"];
                       }
                   }

                   //klasa 0 ucznia
                   //to do zapytanie sql
                   $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Zez_Widoczny`, `Zez_Cover_Test`, `Zez_Odbicie_Swiatla_Na_Rogowkach`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data0', '$Zez_Widoczny', '$Zez_Cover_Test', '$Zez_Odbicie_Swiatla_Na_Rogowkach', '$Oko_Prawe', '$Oko_Lewe')";
                   if (mysqli_query($conn, $sql)) {
                       echo "New record created successfully";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   //klasa 3
                   $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Widzenie_Barw`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data3', '$Widzenie_Barw', '$Oko_Prawe', '$Oko_Lewe')";
                   if (mysqli_query($conn, $sql)) {
                       echo "New record created successfully";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   //klasa 5
                   $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Widzenie_Barw`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data5', '$Widzenie_Barw', '$Oko_Prawe', '$Oko_Lewe')";
                   if (mysqli_query($conn, $sql)) {
                       echo "New record created successfully";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   //klasa 7
                   $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`,`Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data5', '$Oko_Prawe', '$Oko_Lewe')";
                   if (mysqli_query($conn, $sql)) {
                       echo "New record created successfully";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   //klasa 1
                  $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`,`Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data11', '$Oko_Prawe', '$Oko_Lewe')";
                  if (mysqli_query($conn, $sql)) {
                      echo "New record created successfully";
                  } else {
                      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                  }

                }elseif($i>=85 && $i<=91){
                   //klasa 4 - wiek: 18
                   //klasa 1 - wiek: 15
                   //klasa 7 - wiek: 13
                   //klasa 5 - wiek: 11
                   //klasa 3 - wiek: 9
                   //klasa 0 - wiek: 6
                   $data14="2022-01-10 10:30:18";
                   $data11="2019-01-10 10:30:18";
                   $data7="2017-01-10 10:30:18";
                   $data5="2015-01-09 10:30:18";
                   $data3="2013-01-10 10:30:18";
                   $data0="2010-01-08 10:30:18";

                   $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$i";
                   $result = mysqli_query($conn, $get_karta);
                   if (mysqli_num_rows($result) > 0) {
                       // output data of each row
                       while($row = mysqli_fetch_assoc($result)) {
                           $id_ka=$row["id_k"];
                       }
                   }

                   //klasa 0 ucznia
                   //to do zapytanie sql
                   $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Zez_Widoczny`, `Zez_Cover_Test`, `Zez_Odbicie_Swiatla_Na_Rogowkach`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data0', '$Zez_Widoczny', '$Zez_Cover_Test', '$Zez_Odbicie_Swiatla_Na_Rogowkach', '$Oko_Prawe', '$Oko_Lewe')";
                   if (mysqli_query($conn, $sql)) {
                       echo "New record created successfully";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   //klasa 3
                   $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Widzenie_Barw`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data3', '$Widzenie_Barw', '$Oko_Prawe', '$Oko_Lewe')";
                   if (mysqli_query($conn, $sql)) {
                       echo "New record created successfully";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   //klasa 5
                   $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`, `Widzenie_Barw`, `Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data5', '$Widzenie_Barw', '$Oko_Prawe', '$Oko_Lewe')";
                   if (mysqli_query($conn, $sql)) {
                       echo "New record created successfully";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   //klasa 7
                   $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`,`Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data5', '$Oko_Prawe', '$Oko_Lewe')";
                   if (mysqli_query($conn, $sql)) {
                       echo "New record created successfully";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   //klasa 1
                  $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`,`Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data11', '$Oko_Prawe', '$Oko_Lewe')";
                  if (mysqli_query($conn, $sql)) {
                      echo "New record created successfully";
                  } else {
                      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                  }
                  //klasa 4
                    $sql="INSERT INTO `kzu_wzrok` (`Id_Karty`, `Data`,`Oko_Prawe`, `Oko_Lewe`) VALUES ('$id_ka', '$data14', '$Oko_Prawe', '$Oko_Lewe')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
            }
        }}*/


    //kzu_kwalifikacja_wf
        //jak się zmieni + przy pierwszym badaniu, czyli klasa 0
    /*for($i=1;$i<=91;$i++){
            if($i!=1 && $i!=17){

               if($i>=1 && $i<=7){
                    //klasa 0 - wiek: 6
                    $data="2022-01-10 13:48:11";
               }elseif($i>7 && $i<=14){
                    //klasa 1 - wiek: 7
                    $data="2021-01-10 13:48:11";
               }elseif($i>14 && $i<=21){
                    //klasa 2 - wiek: 8
                    $data="2020-01-10 13:48:11";
               }elseif($i>=22 && $i<=28){
                    //klasa 3 - wiek: 9
                    $data="2019-01-10 13:48:11";
               }elseif($i>=29 && $i<=35){
                    //klasa 4 - wiek: 10
                    $data="2018-01-10 13:48:11";
               }elseif($i>=36 && $i<=42){
                   //klasa 5 - wiek: 11
                   $data="2017-01-10 13:48:11";
               }elseif($i>=43 && $i<=49){
                    //klasa 6 - wiek: 12
                    $data="2016-01-10 13:48:11";
               }elseif($i>=50 && $i<=56){
                    //klasa 7 - wiek: 13
                    $data="2015-01-10 13:48:11";
               }elseif($i>=57 && $i<=63){
                    //klasa 8 - wiek: 14
                    $data="2014-01-10 13:48:11";
               }elseif($i>=64 && $i<=70){
                    //klasa 1 - wiek: 15
                    $data="2013-01-10 13:48:11";
               }elseif($i>=71 && $i<=77){
                    //klasa 2 - wiek: 16
                    $data="2012-01-10 13:48:11";
               }elseif($i>=78 && $i<=84){
                    //klasa 3 - wiek: 17
                    $data="2011-01-10 13:48:11";
               }elseif($i>=85 && $i<=91){
                    //klasa 4 - wiek: 18
                    $data="2010-01-10 13:48:11";
               }


               $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$i";

               $result = mysqli_query($conn, $get_karta);
               if (mysqli_num_rows($result) > 0) {
                   // output data of each row
                   while($row = mysqli_fetch_assoc($result)) {
                       $karta=$row["id_k"];
                   }
               }

                if($karta==61 || $karta==64 || $karta==7 || $karta==9 || $karta==14 || $karta==15){
                    $kw="B";
                }else{
                    $kw="A";
                }
                $sql="INSERT INTO `kzu_kwalifikacja_wf`(`Id_Karty`,`Data`, `Grupa`) VALUES ('$karta','$data','$kw')";
                if (mysqli_query($conn, $sql)) {
                    echo "Success";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
          }
    }*/

    //kzu_sluch
        // Klasy: 0, 7

        /*for($i=1;$i<=91;$i++){
            if($i!=1 && $i!=17){

                $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$i";

                $result = mysqli_query($conn, $get_karta);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                       $karta=$row["id_k"];
                    }
                }

                $ucho_p='-';
                $ucho_l="-";

               if($i>=1 && $i<=7){
                    //klasa 0 - wiek: 6
                    $data0="2022-01-10 13:48:11";
                    $sql="INSERT INTO `kzu_sluch`(`Id_Karty`, `Data_Badania`, `Ucho_Prawe`, `Ucho_Lewe`) VALUES ('$karta','$data0','$ucho_p', '$ucho_l')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>7 && $i<=14){
                    //klasa 1 - wiek: 7
                    $data0="2021-01-10 13:48:11";
                    $sql="INSERT INTO `kzu_sluch`(`Id_Karty`, `Data_Badania`, `Ucho_Prawe`, `Ucho_Lewe`) VALUES ('$karta','$data0','$ucho_p', '$ucho_l')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>14 && $i<=21){
                    //klasa 2 - wiek: 8
                    $data0="2020-01-10 13:48:11";
                    $sql="INSERT INTO `kzu_sluch`(`Id_Karty`, `Data_Badania`, `Ucho_Prawe`, `Ucho_Lewe`) VALUES ('$karta','$data0','$ucho_p', '$ucho_l')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>=22 && $i<=28){
                    //klasa 3 - wiek: 9
                    $data0="2019-01-10 13:48:11";
                    $sql="INSERT INTO `kzu_sluch`(`Id_Karty`, `Data_Badania`, `Ucho_Prawe`, `Ucho_Lewe`) VALUES ('$karta','$data0','$ucho_p', '$ucho_l')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>=29 && $i<=35){
                    //klasa 4 - wiek: 10
                    $data0="2018-01-10 13:48:11";
                    $sql="INSERT INTO `kzu_sluch`(`Id_Karty`, `Data_Badania`, `Ucho_Prawe`, `Ucho_Lewe`) VALUES ('$karta','$data0','$ucho_p', '$ucho_l')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>=36 && $i<=42){
                   //klasa 5 - wiek: 11
                   $data0="2017-01-10 13:48:11";
                   $sql="INSERT INTO `kzu_sluch`(`Id_Karty`, `Data_Badania`, `Ucho_Prawe`, `Ucho_Lewe`) VALUES ('$karta','$data0','$ucho_p', '$ucho_l')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>=43 && $i<=49){
                    //klasa 6 - wiek: 12
                    $data0="2016-01-10 13:48:11";
                    $sql="INSERT INTO `kzu_sluch`(`Id_Karty`, `Data_Badania`, `Ucho_Prawe`, `Ucho_Lewe`) VALUES ('$karta','$data0','$ucho_p', '$ucho_l')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>=50 && $i<=56){
                    //klasa 7 - wiek: 13
                    $data0="2015-01-10 13:48:11";
                    $data7="2022-01-10 13:48:11";
                    $sql="INSERT INTO `kzu_sluch`(`Id_Karty`, `Data_Badania`, `Ucho_Prawe`, `Ucho_Lewe`) VALUES ('$karta','$data0','$ucho_p', '$ucho_l')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_sluch`(`Id_Karty`, `Data_Badania`, `Ucho_Prawe`, `Ucho_Lewe`) VALUES ('$karta','$data7','$ucho_p', '$ucho_l')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>=57 && $i<=63){
                    //klasa 8 - wiek: 14
                    $data0="2014-01-10 13:48:11";
                    $data7="2021-01-10 13:48:11";
                    $sql="INSERT INTO `kzu_sluch`(`Id_Karty`, `Data_Badania`, `Ucho_Prawe`, `Ucho_Lewe`) VALUES ('$karta','$data0','$ucho_p', '$ucho_l')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_sluch`(`Id_Karty`, `Data_Badania`, `Ucho_Prawe`, `Ucho_Lewe`) VALUES ('$karta','$data7','$ucho_p', '$ucho_l')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>=64 && $i<=70){
                    //klasa 1 - wiek: 15
                    $data0="2013-01-10 13:48:11";
                    $data7="2020-01-10 13:48:11";
                    $sql="INSERT INTO `kzu_sluch`(`Id_Karty`, `Data_Badania`, `Ucho_Prawe`, `Ucho_Lewe`) VALUES ('$karta','$data0','$ucho_p', '$ucho_l')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_sluch`(`Id_Karty`, `Data_Badania`, `Ucho_Prawe`, `Ucho_Lewe`) VALUES ('$karta','$data7','$ucho_p', '$ucho_l')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>=71 && $i<=77){
                    //klasa 2 - wiek: 16
                    $data0="2012-01-10 13:48:11";
                    $data7="2019-01-10 13:48:11";
                    $sql="INSERT INTO `kzu_sluch`(`Id_Karty`, `Data_Badania`, `Ucho_Prawe`, `Ucho_Lewe`) VALUES ('$karta','$data0','$ucho_p', '$ucho_l')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_sluch`(`Id_Karty`, `Data_Badania`, `Ucho_Prawe`, `Ucho_Lewe`) VALUES ('$karta','$data7','$ucho_p', '$ucho_l')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>=78 && $i<=84){
                    //klasa 3 - wiek: 17
                    $data0="2011-01-10 13:48:11";
                    $data7="2018-01-10 13:48:11";
                    $sql="INSERT INTO `kzu_sluch`(`Id_Karty`, `Data_Badania`, `Ucho_Prawe`, `Ucho_Lewe`) VALUES ('$karta','$data0','$ucho_p', '$ucho_l')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_sluch`(`Id_Karty`, `Data_Badania`, `Ucho_Prawe`, `Ucho_Lewe`) VALUES ('$karta','$data7','$ucho_p', '$ucho_l')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>=85 && $i<=91){
                    //klasa 4 - wiek: 18
                    $data0="2010-01-10 13:48:11";
                    $data2="2017-01-10 13:48:11";
                    $sql="INSERT INTO `kzu_sluch`(`Id_Karty`, `Data_Badania`, `Ucho_Prawe`, `Ucho_Lewe`) VALUES ('$karta','$data0','$ucho_p', '$ucho_l')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_sluch`(`Id_Karty`, `Data_Badania`, `Ucho_Prawe`, `Ucho_Lewe`) VALUES ('$karta','$data7','$ucho_p', '$ucho_l')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }
          }
    }*/


    //kzu_testy_do_wykrycia
        // Tutaj badania dla jednego ucznia się będą powtarzać:
        // Skolioza: 0, 3, 5, 7, 1sr
        // Klifoza_Piersiowa: 7, 1sr
        // Koslawosc_Kolan: 0
        // Stopy_Plaskokoslawe: 0

        // Klasa 0: Skolioza, Koslawosc_Kolan, Stopy_Plaskokoslawe
        // Klasa 3: Skolioza
        // Klasa 5: Skolioza
        // Klasa 7: Skolioza, Klifoza_Piersiowa
        // Klasa 1sr: Skolioza, Klifoza_Piersiowa

        /*$skolioza='-';
        $kosl_kolan='-';
        $st_plaskie='-';
        $klifoza='-';


        for($i=1;$i<=91;$i++){
            if($i!=1 && $i!=17){

                $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$i";

                $result = mysqli_query($conn, $get_karta);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $karta=$row["id_k"];
                    }
                }

               if($i>=1 && $i<=7){
                    //klasa 0 - wiek: 6
                    // Klasa 0: Skolioza, Koslawosc_Kolan, Stopy_Plaskokoslawe
                    $data0="2022-01-10 13:48:11";
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`, `Koslawosc_Kolan`, `Stopy_Plaskokoslawe`) VALUES ('$karta','$data0','$skolioza', '$kosl_kolan', '$st_plaskie')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

               }elseif($i>7 && $i<=14){
                    //klasa 1 - wiek: 7
                    $data0="2021-01-10 13:42:34";
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`, `Koslawosc_Kolan`, `Stopy_Plaskokoslawe`) VALUES ('$karta','$data0','$skolioza', '$kosl_kolan', '$st_plaskie')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

               }elseif($i>14 && $i<=21){
                    //klasa 2 - wiek: 8
                    $data0="2020-01-10 13:48:11";
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`, `Koslawosc_Kolan`, `Stopy_Plaskokoslawe`) VALUES ('$karta','$data0','$skolioza', '$kosl_kolan', '$st_plaskie')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>=22 && $i<=28){
                    //klasa 3 - wiek: 9
                    $data0="2019-01-10 13:48:11";
                    $data3="2022-01-10 14:12:17";
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`, `Koslawosc_Kolan`, `Stopy_Plaskokoslawe`) VALUES ('$karta','$data0','$skolioza', '$kosl_kolan', '$st_plaskie')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`) VALUES ('$karta','$data3','$skolioza')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>=29 && $i<=35){
                    //klasa 4 - wiek: 10
                    $data0="2018-01-10 13:48:11";
                    $data3="2021-01-10 14:12:17";
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`, `Koslawosc_Kolan`, `Stopy_Plaskokoslawe`) VALUES ('$karta','$data0','$skolioza', '$kosl_kolan', '$st_plaskie')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`) VALUES ('$karta','$data3','$skolioza')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>=36 && $i<=42){
                   //klasa 5 - wiek: 11
                   $data5="2022-01-10 14:12:17";
                   $data3="2020-01-10 14:12:17";
                   $data0="2017-01-10 13:48:11";
                   
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`, `Koslawosc_Kolan`, `Stopy_Plaskokoslawe`) VALUES ('$karta','$data0','$skolioza', '$kosl_kolan', '$st_plaskie')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`) VALUES ('$karta','$data3','$skolioza'), ('$karta','$data5','$skolioza')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>=43 && $i<=49){
                    //klasa 6 - wiek: 12
                    $data5="2021-01-10 14:12:17";
                    $data3="2019-01-10 14:12:17";
                    $data0="2016-01-10 13:48:11";

                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`, `Koslawosc_Kolan`, `Stopy_Plaskokoslawe`) VALUES ('$karta','$data0','$skolioza', '$kosl_kolan', '$st_plaskie')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`) VALUES ('$karta','$data3','$skolioza'), ('$karta','$data5','$skolioza')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

               }elseif($i>=50 && $i<=56){
                    //klasa 7 - wiek: 13
                    $data7="2022-01-10 13:48:11";
                    $data5="2020-01-10 14:12:17";
                    $data3="2018-01-10 14:12:17";
                    $data0="2015-01-10 13:48:11";

                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`, `Koslawosc_Kolan`, `Stopy_Plaskokoslawe`) VALUES ('$karta','$data0','$skolioza', '$kosl_kolan', '$st_plaskie')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`) VALUES ('$karta','$data3','$skolioza'), ('$karta','$data5','$skolioza')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`, `Klifoza_Piersiowa`) VALUES ('$karta','$data7','$skolioza', '$klifoza')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    
               }elseif($i>=57 && $i<=63){
                    //klasa 8 - wiek: 14
                    $data7="2021-01-10 13:48:11";
                    $data5="2019-01-10 14:12:17";
                    $data3="2017-01-10 14:12:17";
                    $data0="2014-01-10 13:48:11";

                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`, `Koslawosc_Kolan`, `Stopy_Plaskokoslawe`) VALUES ('$karta','$data0','$skolioza', '$kosl_kolan', '$st_plaskie')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`) VALUES ('$karta','$data3','$skolioza'), ('$karta','$data5','$skolioza')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`, `Klifoza_Piersiowa`) VALUES ('$karta','$data7','$skolioza', '$klifoza')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>=64 && $i<=70){
                    //klasa 1 - wiek: 15
                    $data11="2022-01-10 11:48:11";
                    $data7="2020-01-10 13:48:11";
                    $data5="2018-01-10 14:12:17";
                    $data3="2016-01-10 14:12:17";
                    $data0="2013-01-10 13:48:11";

                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`, `Koslawosc_Kolan`, `Stopy_Plaskokoslawe`) VALUES ('$karta','$data0','$skolioza', '$kosl_kolan', '$st_plaskie')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`) VALUES ('$karta','$data3','$skolioza'), ('$karta','$data5','$skolioza')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`, `Klifoza_Piersiowa`) VALUES ('$karta','$data7','$skolioza', '$klifoza'), ('$karta','$data11','$skolioza', '$klifoza')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>=71 && $i<=77){
                    //klasa 2 - wiek: 16
                    $data11="2021-01-10 11:48:11";
                    $data7="2019-01-10 13:48:11";
                    $data5="2017-01-10 14:12:17";
                    $data3="2015-01-10 14:12:17";
                    $data0="2012-01-10 13:48:11";

                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`, `Koslawosc_Kolan`, `Stopy_Plaskokoslawe`) VALUES ('$karta','$data0','$skolioza', '$kosl_kolan', '$st_plaskie')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`) VALUES ('$karta','$data3','$skolioza'), ('$karta','$data5','$skolioza')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`, `Klifoza_Piersiowa`) VALUES ('$karta','$data7','$skolioza', '$klifoza'), ('$karta','$data11','$skolioza', '$klifoza')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>=78 && $i<=84){
                    //klasa 3 - wiek: 17
                    $data11="2020-01-10 11:48:11";
                    $data7="2018-01-10 13:48:11";
                    $data5="2016-01-10 14:12:17";
                    $data3="2014-01-10 14:12:17";
                    $data0="2011-01-10 13:48:11";

                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`, `Koslawosc_Kolan`, `Stopy_Plaskokoslawe`) VALUES ('$karta','$data0','$skolioza', '$kosl_kolan', '$st_plaskie')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`) VALUES ('$karta','$data3','$skolioza'), ('$karta','$data5','$skolioza')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`, `Klifoza_Piersiowa`) VALUES ('$karta','$data7','$skolioza', '$klifoza'), ('$karta','$data11','$skolioza', '$klifoza')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }elseif($i>=85 && $i<=91){
                    //klasa 4 - wiek: 18
                    $data11="2019-01-10 11:48:11";
                    $data7="2017-01-10 13:48:11";
                    $data5="2015-01-10 14:12:17";
                    $data3="2013-01-10 14:12:17";
                    $data0="2010-01-10 13:48:11";

                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`, `Koslawosc_Kolan`, `Stopy_Plaskokoslawe`) VALUES ('$karta','$data0','$skolioza', '$kosl_kolan', '$st_plaskie')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`) VALUES ('$karta','$data3','$skolioza'), ('$karta','$data5','$skolioza')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $sql="INSERT INTO `kzu_testy_do_wykrycia`(`Id_Karty`, `Data_Badania`, `Skolioza`, `Klifoza_Piersiowa`) VALUES ('$karta','$data7','$skolioza', '$klifoza'), ('$karta','$data11','$skolioza', '$klifoza')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }
          }
    }*/


    //kzu_testy_przesiewowe
        // Tutaj badania dla jednego ucznia się będą powtarzać:
        // Data: zawsze
        // Wiek: zawsze
        // Wysokosc_Ciala_Cm, Wysokosc_Ciala_Centyl: zawsze
        // Masa_Ciala_Kg, Masa_Ciala_Centyl: zawsze
        // Masa_Ciala_Bmi: zawsze

        $wysokosc=150;
        $wysokosc_centyl=0;
        $masa=40;
        $masa_centyl=0;
        $bmi=0;

        function bmi(&$wysokosc,&$masa){
            echo "$masa"." $wysokosc/100 ";
            $bmi=$masa/(pow(($wysokosc/100),2));
            echo "$bmi \n";
        }
        bmi($wysokosc,$masa);

        /*function klasa0(&$wysokosc, &$wysokosc_centyl, &$masa, &$masa_centyl, &$bmi){
            $wysokosc=(mt_rand(109,129).'.'.(mt_rand(0,9)));
            $masa=(mt_rand(16,29).'.'.(mt_rand(0,9)));

            //wzrost
            if($wysokosc>=109 && $wysokosc<= 112){
                $wysokosc_centyl=rand(3,10);
            }elseif($wysokosc>112 && $wysokosc<=115){
                $wysokosc_centyl=rand(10,25);
            }elseif($wysokosc>115 && $wysokosc<=118){
                $wysokosc_centyl=rand(25,50);
            }elseif($wysokosc>118 && $wysokosc<=122){
                $wysokosc_centyl=rand(50,75);
            }elseif($wysokosc>122 && $wysokosc<=125){
                $wysokosc_centyl=rand(75,90);
            }elseif($wysokosc>125 && $wysokosc<=130){
                $wysokosc_centyl=rand(90,97);
            }

            //masa
            if($masa>=16 && $masa<=18){
                $masa_centyl=rand(3,10);
            }elseif($masa>18 && $masa<=20){
                $masa_centyl=rand(10,25);
            }elseif($masa>20 && $masa<=22){
                $masa_centyl=rand(25,50);
            }elseif($masa>22 && $masa<=24){
                $masa_centyl=rand(50,75);
            }elseif($masa>24 && $masa<=27){
                $masa_centyl=rand(75,90);
            }elseif($masa>27 && $masa<=30){
                $masa_centyl=rand(90,97);
            }
            echo "$masa"." $wysokosc/100 ";
            $bmi=$masa/(pow(($wysokosc/100),2));
            echo "$bmi \n";
        }

        function klasa3(&$wysokosc, &$wysokosc_centyl, &$masa, &$masa_centyl, &$bmi){
            $wysokosc=rand(124,147).'.'.mt_rand(0,9);
            $masa=rand(22,48).'.'.mt_rand(0,9);

            //wzrost
            if($wysokosc>=124 && $wysokosc<= 128){
                $wysokosc_centyl=rand(3,10);
            }elseif($wysokosc>128 && $wysokosc<=132){
                $wysokosc_centyl=rand(10,25);
            }elseif($wysokosc>132 && $wysokosc<=136){
                $wysokosc_centyl=rand(25,50);
            }elseif($wysokosc>136 && $wysokosc<=140){
                $wysokosc_centyl=rand(50,75);
            }elseif($wysokosc>140 && $wysokosc<=144){
                $wysokosc_centyl=rand(75,90);
            }elseif($wysokosc>144 && $wysokosc<=148){
                $wysokosc_centyl=rand(90,97);
            }

            //masa
            if($masa>=22 && $masa<=24){
                $masa_centyl=rand(3,10);
            }elseif($masa>24 && $masa<=28){
                $masa_centyl=rand(10,25);
            }elseif($masa>28 && $masa<=31){
                $masa_centyl=rand(25,50);
            }elseif($masa>31 && $masa<=35){
                $masa_centyl=rand(50,75);
            }elseif($masa>35 && $masa<=41){
                $masa_centyl=rand(75,90);
            }elseif($masa>41 && $masa<=49){
                $masa_centyl=rand(90,97);
            }
            echo "$masa"." $wysokosc/100 ";
            $bmi=$masa/(pow(($wysokosc/100),2));
            echo "$bmi \n";
        }

        function klasa5(&$wysokosc, &$wysokosc_centyl, &$masa, &$masa_centyl, &$bmi){
            $wysokosc=rand(135,160).'.'.mt_rand(0,9);
            $masa=rand(27,59).'.'.mt_rand(0,9);

            //wzrost
            if($wysokosc>=135 && $wysokosc<= 138){
                $wysokosc_centyl=rand(3,10);
            }elseif($wysokosc>138 && $wysokosc<=142){
                $wysokosc_centyl=rand(10,25);
            }elseif($wysokosc>142 && $wysokosc<=147){
                $wysokosc_centyl=rand(25,50);
            }elseif($wysokosc>147 && $wysokosc<=151){
                $wysokosc_centyl=rand(50,75);
            }elseif($wysokosc>151 && $wysokosc<=155){
                $wysokosc_centyl=rand(75,90);
            }elseif($wysokosc>155 && $wysokosc<=161){
                $wysokosc_centyl=rand(90,97);
            }

            //masa
            if($masa>=27 && $masa<=30){
                $masa_centyl=rand(3,10);
            }elseif($masa>30 && $masa<=33){
                $masa_centyl=rand(10,25);
            }elseif($masa>33 && $masa<=38){
                $masa_centyl=rand(25,50);
            }elseif($masa>38 && $masa<=44){
                $masa_centyl=rand(50,75);
            }elseif($masa>44 && $masa<=52){
                $masa_centyl=rand(75,90);
            }elseif($masa>52 && $masa<=60){
                $masa_centyl=rand(90,97);
            }
            echo "$masa"." $wysokosc/100 ";
            $bmi=$masa/(pow(($wysokosc/100),2));
            echo "$bmi \n";
        }
        
        function klasa7(&$wysokosc, &$wysokosc_centyl, &$masa, &$masa_centyl, &$bmi){
            $wysokosc=rand(145,175).'.'.mt_rand(0,9);
            $masa=rand(33,75).'.'.mt_rand(0,9);

            //wzrost
            if($wysokosc>=145 && $wysokosc<= 150){
                $wysokosc_centyl=rand(3,10);
            }elseif($wysokosc>150 && $wysokosc<=155){
                $wysokosc_centyl=rand(10,25);
            }elseif($wysokosc>155 && $wysokosc<=160){
                $wysokosc_centyl=rand(25,50);
            }elseif($wysokosc>160 && $wysokosc<=165){
                $wysokosc_centyl=rand(50,75);
            }elseif($wysokosc>165 && $wysokosc<=170){
                $wysokosc_centyl=rand(75,90);
            }elseif($wysokosc>170 && $wysokosc<=176){
                $wysokosc_centyl=rand(90,97);
            }

            //masa
            if($masa>=33 && $masa<=37){
                $masa_centyl=rand(3,10);
            }elseif($masa>37 && $masa<=42){
                $masa_centyl=rand(10,25);
            }elseif($masa>42 && $masa<=48){
                $masa_centyl=rand(25,50);
            }elseif($masa>48 && $masa<=56){
                $masa_centyl=rand(50,75);
            }elseif($masa>56 && $masa<=65){
                $masa_centyl=rand(75,90);
            }elseif($masa>65 && $masa<=76){
                $masa_centyl=rand(90,97);
            }
            echo "$masa"." $wysokosc/100 ";
            $bmi=$masa/(pow(($wysokosc/100),2));
            echo "$bmi \n";
        }

        function klasa11(&$wysokosc, &$wysokosc_centyl, &$masa, &$masa_centyl, &$bmi){
            $wysokosc=rand(152,186).'.'.mt_rand(0,9);
            $masa=rand(45,80).'.'.mt_rand(0,9);

            //wzrost
            if($wysokosc>=152 && $wysokosc<= 160){
                $wysokosc_centyl=rand(3,10);
            }elseif($wysokosc>160 && $wysokosc<=167){
                $wysokosc_centyl=rand(10,25);
            }elseif($wysokosc>167 && $wysokosc<=173){
                $wysokosc_centyl=rand(25,50);
            }elseif($wysokosc>173 && $wysokosc<=178){
                $wysokosc_centyl=rand(50,75);
            }elseif($wysokosc>178 && $wysokosc<=182){
                $wysokosc_centyl=rand(75,90);
            }elseif($wysokosc>182 && $wysokosc<=187){
                $wysokosc_centyl=rand(90,97);
            }

            //masa
            if($masa>=45 && $masa<=47){
                $masa_centyl=rand(3,10);
            }elseif($masa>47 && $masa<=52){
                $masa_centyl=rand(10,25);
            }elseif($masa>52 && $masa<=59){
                $masa_centyl=rand(25,50);
            }elseif($masa>59 && $masa<=67){
                $masa_centyl=rand(50,75);
            }elseif($masa>67 && $masa<=76){
                $masa_centyl=rand(75,90);
            }elseif($masa>76 && $masa<=81){
                $masa_centyl=rand(90,97);
            }

            echo "$masa"." $wysokosc/100 ";
            $bmi=$masa/(pow(($wysokosc/100),2));
            echo "$bmi \n";
        }

        function klasa14(&$wysokosc, &$wysokosc_centyl, &$masa, &$masa_centyl, &$bmi){
            $wysokosc=rand(155,190).'.'.mt_rand(0,9);
            $masa=rand(53,88).'.'.mt_rand(0,9);

            //wzrost
            if($wysokosc>=155 && $wysokosc<= 167){
                $wysokosc_centyl=rand(3,10);
            }elseif($wysokosc>167 && $wysokosc<=173){
                $wysokosc_centyl=rand(10,25);
            }elseif($wysokosc>173 && $wysokosc<=179){
                $wysokosc_centyl=rand(25,50);
            }elseif($wysokosc>179 && $wysokosc<=184){
                $wysokosc_centyl=rand(50,75);
            }elseif($wysokosc>184 && $wysokosc<=17){
                $wysokosc_centyl=rand(75,90);
            }elseif($wysokosc>187 && $wysokosc<=191){
                $wysokosc_centyl=rand(90,97);
            }

            //masa
            if($masa>=53 && $masa<=58){
                $masa_centyl=rand(3,10);
            }elseif($masa>58 && $masa<=63){
                $masa_centyl=rand(10,25);
            }elseif($masa>63 && $masa<=70){
                $masa_centyl=rand(25,50);
            }elseif($masa>70 && $masa<=75){
                $masa_centyl=rand(50,75);
            }elseif($masa>75 && $masa<=83){
                $masa_centyl=rand(75,90);
            }elseif($masa>83 && $masa<=89){
                $masa_centyl=rand(90,97);
            }

            echo "$masa"." $wysokosc/100 ";
            $bmi=$masa/(pow(($wysokosc/100),2));
            echo "$bmi \n";
        }

        $wiek0=6;
        $wiek3=9;
        $wiek5=11;
        $wiek7=13;
        $wiek11=15;
        $wiek14=18;*/

        /*for($i=1;$i<=91;$i++){
            if($i!=1 && $i!=17){

                $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$i";
                $result = mysqli_query($conn, $get_karta);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $karta=$row["id_k"];
                    }
                }

               if($i>=1 && $i<=7){
                    //klasa 0 - wiek: 6
                    $data0="2022-01-10 13:48:11";

                    klasa0($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                    $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data0','$wiek0', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    

               }elseif($i>7 && $i<=14){
                    //klasa 1 - wiek: 7
                    $data0="2021-01-10 13:48:11";
                    

                    klasa0($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                    $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data0','$wiek0', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

               }elseif($i>14 && $i<=21){
                    //klasa 2 - wiek: 8
                    $data0="2020-01-10 13:48:11";
                    

                    klasa0($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                    $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data0','$wiek0', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

               }elseif($i>=22 && $i<=28){
                    //klasa 3 - wiek: 9
                    $data3="2022-01-10 13:48:11";
                    $data0="2019-01-10 13:48:11";

                    klasa0($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                    $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data0','$wiek0', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    klasa3($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                    $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data3','$wiek3', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

               }elseif($i>=29 && $i<=35){
                    //klasa 4 - wiek: 10
                    $data3="2021-01-10 13:48:11";
                    $data0="2018-01-10 13:48:11";

                    klasa0($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                    $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data0','$wiek0', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    klasa3($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                    $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data3','$wiek3', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Success";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

               }elseif($i>=36 && $i<=42){
                   //klasa 5 - wiek: 11
                   $data5="2022-01-10 13:48:11";
                   $data3="2020-01-10 13:48:11";
                   $data0="2017-01-10 13:48:11";
                   
                   klasa0($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data0','$wiek0', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa3($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data3','$wiek3', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa5($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data5','$wiek5', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }

               }elseif($i>=43 && $i<=49){
                    //klasa 6 - wiek: 12
                    $data5="2021-01-10 13:48:11";
                    $data3="2019-01-10 13:48:11";
                    $data0="2016-01-10 13:48:11";

                    klasa0($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data0','$wiek0', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa3($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data3','$wiek3', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa5($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data5','$wiek5', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }

               }elseif($i>=50 && $i<=56){
                    //klasa 7 - wiek: 13
                    $data7="2022-01-10 13:48:11";
                    $data5="2020-01-10 13:48:11";
                    $data3="2018-01-10 13:48:11";
                    $data0="2015-01-10 13:48:11";

                    klasa0($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data0','$wiek0', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa3($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data3','$wiek3', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa5($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data5','$wiek5', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa7($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data7','$wiek7', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }

               }elseif($i>=57 && $i<=63){
                    //klasa 8 - wiek: 14
                    $data7="2021-01-10 13:48:11";
                    $data5="2019-01-10 13:48:11";
                    $data3="2017-01-10 13:48:11";
                    $data0="2014-01-10 13:48:11";

                    klasa0($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data0','$wiek0', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa3($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data3','$wiek3', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa5($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data5','$wiek5', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa7($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data7','$wiek7', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }

               }elseif($i>=64 && $i<=70){
                    //klasa 1 - wiek: 15
                    $data11="2022-01-10 13:48:11";
                    $data7="2020-01-10 13:48:11";
                    $data5="2018-01-10 13:48:11";
                    $data3="2016-01-10 13:48:11";
                    $data0="2013-01-10 13:48:11";

                    klasa0($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data0','$wiek0', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa3($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data3','$wiek3', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa5($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data5','$wiek5', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa7($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data7','$wiek7', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa11($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data11','$wiek11', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }

               }elseif($i>=71 && $i<=77){
                    //klasa 2 - wiek: 16
                    $data11="2021-01-10 13:48:11";
                    $data7="2019-01-10 13:48:11";
                    $data5="2017-01-10 13:48:11";
                    $data3="2015-01-10 13:48:11";
                    $data0="2012-01-10 13:48:11";

                    klasa0($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data0','$wiek0', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa3($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data3','$wiek3', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa5($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data5','$wiek5', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa7($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data7','$wiek7', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa11($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data11','$wiek11', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }

               }elseif($i>=78 && $i<=84){
                    //klasa 3 - wiek: 17
                    $data11="2020-01-10 13:48:11";
                    $data7="2018-01-10 13:48:11";
                    $data5="2016-01-10 13:48:11";
                    $data3="2014-01-10 13:48:11";
                    $data0="2011-01-10 13:48:11";

                    klasa0($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data0','$wiek0', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa3($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data3','$wiek3', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa5($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data5','$wiek5', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa7($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data7','$wiek7', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa11($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data11','$wiek11', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }

               }elseif($i>=85 && $i<=91){
                    //klasa 4 - wiek: 18
                    $data14="2022-01-10 13:48:11";
                    $data11="2019-01-10 13:48:11";
                    $data7="2017-01-10 13:48:11";
                    $data5="2015-01-10 13:48:11";
                    $data3="2013-01-10 13:48:11";
                    $data0="2010-01-10 13:48:11";

                    klasa0($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data0','$wiek0', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa3($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data3','$wiek3', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa5($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data5','$wiek5', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa7($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data7','$wiek7', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa11($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data11','$wiek11', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
                   klasa14($wysokosc, $wysokosc_centyl, $masa, $masa_centyl, $bmi);
                   $sql="INSERT INTO `kzu_testy_przesiewowe`(`Id_Karty`, `Data`, `Wiek`, `Wysokosc_Ciala_Cm`, `Wysokosc_Ciala_Centyl`, `Masa_Ciala_Kg`, `Masa_Ciala_Centyl`, `Masa_Ciala_Bmi`) VALUES ('$karta','$data14','$wiek14', '$wysokosc', '$wysokosc_centyl', '$masa', '$masa_centyl', '$bmi')";
                   if (mysqli_query($conn, $sql)) {
                       echo "Success";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   }
               }

          }
    }*/


    //kzu_inne
        //Miesiączka pierwsza - dodać

        /*$id_ucznia=array();
        $birth=array();

        mysqli_close($conn);
        $conn2 = mysqli_connect($servername, $username, $password, $dbname_dziennik);
        $data="2022-01-13 10:39:14";

        $get_k="SELECT `Id`, YEAR(`Birth_Date`) AS 'by' FROM `student` WHERE `Sex`='K' AND (2022-YEAR(`Birth_Date`))>=11;";
        $result = mysqli_query($conn2, $get_k);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                array_push( $id_ucznia, $row["Id"]);
                array_push( $birth, $row["by"]);
            }
        }

        mysqli_close($conn2);
        $conn = mysqli_connect($servername, $username, $password, $dbname_nurse);
        for($i=0;$i<count($id_ucznia); $i++){

            $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$id_ucznia[$i]";
            $re = mysqli_query($conn, $get_karta);
            if (mysqli_num_rows($re) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($re)) {
                    $id_ka=$row["id_k"];
                }
            }
            if((2022-$birth[$i])>=16){
                $wiek=rand(11, 16);
            }else{
                $wiek=rand(11, (2022-$birth[$i]));
            }
            
            //echo "$birth[$i]"." $wiek \n";
            $sql="INSERT INTO `kzu_inne`(`Id_Karty`, `Data`, `Typ_Badania`, `Opis`) VALUES ('$id_ka','$data','Pierwsza miesiączka','Wiek: $wiek')";
            if (mysqli_query($conn, $sql)) {
                echo "Dodano miesiaczke";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

        }*/

        
mysqli_close($conn);
?>