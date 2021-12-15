<?php

require_once __DIR__ . '/connect.php';

include 'connect.php';


/*$conn = @new mysqli(servername, $username, $password, $dbname);*/

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_errno!=0)
{
    /*echo "Błąd połączenia".@conn->connect_errno." = ".conn->connect_error;*/
    echo "Błąd połączenia".$conn->connect_errno()."\n";
}
else
{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8"); //zabezpieczenie przed wstrzykiwaniem sql
    $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");

    /*echo "login = $login";
    echo "haslo = $haslo";*/

    $sql = "SELECT * FROM user WHERE username=$login AND password=$haslo";

    echo "sql = ".$sql;

    $result = $conn->query($sql);

    //if($result = $conn->query($sql))
    if($result == 0) // ma być == 0
    {
        /*echo "tak";*/

        //$users_number = $result->num_rows;
        //$users_number = $result->num_rows;
        //$result->num_rows;

        /*echo "results - num rows =".$users_number;*/

        //if($users_number>0)
        /*if($result != false && $result->num_rows>0)
        {*/
            $row = $result->fetch_assoc();

            $username = $row['username'];
            $password = $row['password'];

            echo "username = $username";
            echo "password = $password";

            $result->free_result(); // close(); free(); ... free_result();*/
        //}
    }
    else
    {
        echo "Zły login lub hasło";
    }










}








?>