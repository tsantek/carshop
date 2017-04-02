<?php
    // konekcija s bazom podataka
	$link = mysqli_connect("localhost" , "santek" , "12345" , "carcms");
	// ukoliko baza ne radi salje error
	if ( mysqli_connect_error()){
		die ("Connection error");
	}

?>
