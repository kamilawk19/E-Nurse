<?php
session_start();
//po wejściu na stronę index.php, jeśli jesteśmy zalogowani, przekieruje nas do maina (str głównej)
if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true))
{
    header('Location: main.php');
    exit(); // zakończ wykonywanie skryptu - opuszczamy plik index.php
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

        <div class="col-md-10 offset-md-1 background__container">

            <form class="col-md-4 offset-md-1 form" action="../logowanie.php" method="post">
                <h1>Witaj ponownie!</h1>
                <h3>Zaloguj się do systemu </h3>
                <br><input type="text" name="login" placeholder="Login"><br>
                <br><input type="password" name="haslo" placeholder="Hasło"><br><br>
                <a href="reset_password.html">Zapomniałeś hasła?</a>
                <input class="btn-peach--filled" type="submit" value="Zaloguj się">
            </form>

            <div class="col-md-6 offset-md-1 update">
                <?php
                if(isset($_SESSION['blad']))
                {
                    echo $_SESSION['blad'];
                }
                ?>
                <h3>Nowa aktualizacja już dostępna</h3>
                <h4>Dodaliśmy nowe super bajery</h4>
                <a href="#" class="btn-blue">Dowiedz się więcej</a>   <!--przycisk - gdzieś go przekieruje na stonę o opisie i tyle -->
                <img class="col-md-10 img-fluid" src="images/login-image.svg" alt="login image">
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    </body>
</html>