<?php

	session_start();
	
	session_unset(); // chcemy się wylogować - a więc niszczymy' całą sesję i jej wszystkie zmienne sesyjne ....
	
	header('Location: index.php');
	
?>