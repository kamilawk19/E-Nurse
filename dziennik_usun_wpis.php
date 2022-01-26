<?php

session_start();

	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: /front/index.php');
		exit();
	}

	$id=$_GET['rd'];
    //substr($id,1);

    require_once "connect.php";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql="DELETE FROM `dziennik` WHERE `Id_Wpisu`='".substr($id,1)."' ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        mysqli_close($conn);
        header("Location: ./dziennik.php?err=0");
        exit();
    }else{
        mysqli_close($conn);
        header("Location: ./dziennik.php?err=1");
        exit();
    }

?>