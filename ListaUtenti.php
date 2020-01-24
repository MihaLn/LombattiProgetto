<?php
	$database = "noleggi";
	$conn = mysqli_connect("localhost","root","",$database) or die ("Errore di connessione".mysqli_error());
	
	$query = "SELECT *
			  FROM utente"
	
	$risultato = mysqli_query($conn, $query) or die("errore di esecuzione query");
	
	if(mysqli_num_rows($risultato) > 0)
	{
		$jason_file = array();
		
		while($row = mysqli_fetch_assoc($risultato))
		{
			jason_file[] = $row;
		}
		
		echo json_encode(jason_file);
	}

	$query = "SELECT * 
			FROM utente
				WHERE IdUtente = []"



	function ricerca($nome,$cognome,$email)
	{
		$query = "SELECT * FROM utenti WHERE ";
		$counter=0;
		if( isset($nome))
		{
			$query += " Nome=".$nome." ";
			$counter=$counter+1;
		}
		if(isset($cognome))
		{
			if($counter>0)
			{
				$query+="AND";
			}
			$query+=" Cognome=".$cognome." ";
			$counter=$counter+1;
		}
		if(isset($email))
		{
			if($counter>0)
			{
				$query+="AND";
			}
			$query+=" Mail=".$email." ";
		}
		echo $query;
				
	}







