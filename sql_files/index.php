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
    /*for($i=1;$i<=91;$i++){
        if($i!=1 && $i!=17){
            if($i>=1 && $i<=7){
                //klasa 0 - wiek:6
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

            }elseif($i>=22 && $i<=28){
                //klasa 3 - wiek: 9
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

            }elseif($i>=36 && $i<=42){
                //klasa 5 - wiek: 11
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

            }elseif($i>=50 && $i<=56){
                //klasa 7 - wiek: 13
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

            }elseif($i>=64 && $i<=70){
                //klasa 1 - wiek: 15
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

            }elseif($i>=85 && $i<=91){
                //klasa 4 - wiek: 18
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

            }else{
                $rozkurczowe=0;
            }
            if($rozkurczowe!=0){
                $wynik=$skurczowe."/".$rozkurczowe;
                $data="2022-01-10 10:12:04";
                $get_karta = "SELECT `Id_Karty` AS 'id_k' FROM `kzu` WHERE `Id_Ucznia`=$i";
                $result = mysqli_query($conn, $get_karta);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $id_ka=$row["id_k"];
                    }
                }
                $sql="INSERT INTO `kzu_cisnienie_tetnicze_krwi`(`Id_Karty`, `Data_Badania`, `Wynik`, `Centyl`) VALUES ('$id_ka', '$data', '$wynik', '$centyl')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }
    }*/

    //kzu_inne
    //kzu_kwalifikacja_wf
    //kzu_problemy
    //kzu_skierowania
    //kzu_sluch
    //kzu_testy_do_wykrycia
    //kzu_testy_przesiewowe
    //kzu_wywiady_srodowiskowe
    //kzu_wzrok

mysqli_close($conn);
?>