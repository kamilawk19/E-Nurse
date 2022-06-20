<?php
session_start();

if(!isset($_SESSION['zalogowany']))
{
    header('Location: index.php');
    exit();
}

$nurse_id = $_SESSION['nurseid']; // pobierz ID pielęgniarki która się zalogowała ✓
// wybierz tylko tę szkoły, do których należy pielęgniarka
//echo "<br> nurse_id = $nurse_id <br>";

require_once "../connect.php";

$conn = @new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_errno != 0) {
    echo "[ Błąd połączenia ] (" . $conn->connect_errno . "), Opis: " . $conn->connect_error;
} else {
    $sql = "SELECT School_Id FROM nurse_school WHERE Nurse_Id=$nurse_id";
    //$sql = "SELECT School_Id FROM nurse_school";

    $result = $conn->query($sql);

    if ($result) {
        $number_of_rows = $result->num_rows;
        if ($number_of_rows > 0) {//$row = $result->fetch_assoc();
            while ($row = $result->fetch_assoc()) {//echo '<a href="main.php?school_id='.$row['Id'].' ">';//echo $row["Name"];//echo '</a><br><br>';//echo $row["School_Id"];
                $school_id = $row['School_Id'];
            }
        } else   echo "<br>brak danych do wyświetlenia<br>";
    }
    $conn->close();
}


?>

<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Witaj na E-Nurse</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>


<body>
    <div class="container">


        <div class="col-md-4 navbar__heading">
            <img src="images/logo.svg" alt="E-Nurse logo" />        <!-- "../images//logo.svg" -->
            <div class="subtitle">
                <h3>System zarządzania</h3>
                <h3>medycyną szkolną</h3>
            </div>

        </div>

        <img class="img-fluid peach_vector" src="images/peach_vector.svg">
        <img class="img-fluid blue_vector" src="images/blue_vector.svg">

        <div class="col-md-6 offset-md-3 background__container">
            <div class="col-md-10 offset-md-1 choose_school_container">
                <h2>Wybierz placówkę szkolną</h2>
                <ul class="schools__list">
                    <?php
                    require_once "../connect_edziennik.php";
                    $conn = @new mysqli($servername, $username, $password, $dbname);
                    if($conn->connect_errno!=0)  echo "Błąd połączenia".$conn->connect_errno()."\n";
                    else {
                        $sql = "SELECT Id, Name FROM school WHERE Id=$school_id";
                        $result = $conn->query($sql);
                        if($result) {
                            $number_of_rows = $result->num_rows;
                            if($number_of_rows>0) {//$row = $result->fetch_assoc();
                                while($row = $result->fetch_assoc()) {
                                    echo '<a href="main.php?school_id='.$row['Id'].' ">';
                                    echo '<li>'.$row["Name"].'</li>';
                                    echo '</a><br><br>';
                                    //$id = $row['Id'];
                                    $_SESSION['school_id'] = $row['Id'];
                                }
                            } else  echo "<br>brak danych do wyświetlenia<br>";
                        }
                        $conn->close();
                    }
                    ?>
                </ul>
                <!--<input class="btn-peach--filled" type="submit" value="Wybierz"> -->
            </div>

        </div>


    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>