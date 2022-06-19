<?php 
session_start();
if(!isset($_SESSION['zalogowany']))
{
    header('Location: /front/index.php'); 
    exit();
}
// Load library 
include_once 'HtmlToDoc.class.php';

if(isset($_GET["t"]) && ( $_GET["t"]==1 || $_GET["t"]==2)){
    echo "Obsługujemy tylko cały okres na ten moment!";
    //header( "refresh:3;url='/dziennik.php'" );
}


//pobranie info z e-nurse
$school_id = $_SESSION['school_id'];
require_once "connect.php";

$numer=array();
$data=array();
$id_ucznia=array();
$id_klasy=array();
$klasa=array();
$uczen=array();
$opis=array();
$podano=array();
$id_autor=array();
$autor=array();

$conn = @new mysqli($servername, $username, $password, $dbname);	
if($conn->connect_errno!=0){
    echo "Błąd połączenia".$conn->connect_errno()."\n";
}else{	
    $sql = "SELECT * FROM dziennik WHERE Id_Szkoly ='".$school_id."'";		
    $result = $conn->query($sql);
    if($result) {
        $number_of_rows = $result->num_rows;
        if($number_of_rows>0){
            while($row = $result->fetch_assoc())
            {
                array_push($numer, $row["Id_Wpisu"]);
                array_push($data, $row["Data"]);
                if( empty($row["Id_Ucznia"]) || $row["Id_Ucznia"]==NULL){
                    array_push($id_ucznia, "NULL");
                }else{
                    array_push($id_ucznia, $row["Id_Ucznia"]);
                }
                if( empty($row["Id_Klasy"]) || $row["Id_Klasy"]==NULL ){
                    array_push($id_klasy, "NULL");
                }else{
                    array_push($id_klasy, $row["Id_Klasy"]);
                }
                array_push($opis, $row["Opis_Zdarzenia"]);
                array_push($podano, $row["Co_Podano"]);
                array_push($id_autor, $row['Nurse_Id']);									
            }									
        }else{ 
            echo "<h3>Brak wpisów</h3>";
        }
    }

    for($i=0; $i<count($id_autor);$i++){
        if($id_autor[$i]!="NULL"){
            $sql="SELECT `Imie`, `Nazwisko` FROM `nurse` WHERE `Id`='".$id_autor[$i]."'";
            $result = $conn->query($sql);
            if($result) {
                $number_of_rows = $result->num_rows;
                if($number_of_rows>0){
                    while($row = $result->fetch_assoc())
                    {
                        $au=$row['Imie']." ".$row['Nazwisko']."";
                        array_push($autor,$au);								
                    }									
                }
            }
        }
    }

    $conn->close();
}

require_once "connect_edziennik.php";
$conn = mysqli_connect($servername, $username, $password, $dbname);

for($i=0; $i<count($id_klasy);$i++){
    if($id_klasy[$i]!="NULL"){
        $sql="SELECT `Class` FROM `class` WHERE `Id`='".$id_klasy[$i]."' AND `Id_School`='".$_SESSION['school_id']."'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($klasa,$row["Class"]);
            }
        }
    }else{
        array_push($klasa,"-");
    }
}

for($i=0; $i<count($id_ucznia);$i++){
    if($id_ucznia[$i]!="NULL"){
        $sql="SELECT `First_Name`, `Second_Name`, `Last_Name` FROM `student` WHERE `Id`='".$id_ucznia[$i]."' AND `School_Id`='".$_SESSION['school_id']."'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result) < 2) {
            while($row = mysqli_fetch_assoc($result)) {
                $stu=$row['First_Name']." ".$row['Second_Name']." ".$row['Last_Name']."";
                array_push($uczen,$stu);
            }
        }
    }else{
        array_push($uczen,"-");
    }
}


if(isset($_GET["t"]) && $_GET["t"]==3 )
{
$htd = new HTML_TO_DOC(); 
$htmlContent= ' 
<h1 style="text-align: center;">Dziennik</h1>
<p>Ten dokument został wygenerowany przez E-Nurse.</p>
<p>Okres: cały okres</p>
';
$tab='<table style="border:1px solid black;border-collapse:collapse;">';
for($i=0;$i<count($numer);$i++){

    if($i==0){
        $tab.="<tr> <th style='border:1px solid black;'>Numer wpisu</th> <th style='border:1px solid black;'>Data</th> <th style='border:1px solid black;'>Klasa</th> <th style='border:1px solid black;'>Uczeń</th> <th style='border:1px solid black;'>Opis</th> <th style='border:1px solid black;'>Co podano</th> <th style='border:1px solid black;'>Pielęgniarka</th> </tr>";
    }

    $tab .= "<tr>";
    $tab .= "<td style='border:1px solid black;'>".($i+1)."</td>";
    $tab .= "<td style='border:1px solid black;'>".$data[$i]."</td>";
    $tab .= "<td style='border:1px solid black;'>".$klasa[$i]."</td>";
    $tab .= "<td style='border:1px solid black;'>".$uczen[$i]."</td>";
    $tab .= "<td style='border:1px solid black;'>".$opis[$i]."</td>";
    $tab .= "<td style='border:1px solid black;'>".$podano[$i]."</td>";
    $tab .= "<td style='border:1px solid black;'>".$autor[$i]."</td>";
    $tab .= "</tr>";

}
$tab.='</table>';
$htmlContent=$htmlContent.$tab;
$htd->createDoc($htmlContent, 'dziennik',1);
}else{

}
?>