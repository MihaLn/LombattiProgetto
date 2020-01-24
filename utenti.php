<?php
		$database = "noleggi";
		$conn = mysqli_connect("localhost","root","",$database) or die ("Errore di connessione".mysqli_error()")
		
		$query = "SELECT *
					FROM utente"
		
		$risultato = mysqli_query($conn, $query) or die ("errore di esecuzione query");
		
		




>