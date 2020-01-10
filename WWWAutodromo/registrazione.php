<?php
	//stampa gli errori ma non gli avvisi
	error_reporting(E_ALL ^ E_NOTICE);
	if($_POST["nome"]=="" || $_POST["cognome"]=="" || $_POST["email"]=="" || $_POST["password1"]=="" || $_POST["password2"]=="")
		die("Campi obbligatori! <a href='registrazione.html'> Registrati. </a>");
	
	if($_POST["password1"]!=$_POST["password2"])
		die("La password deve essere ripetuta! <a href='registrazione.html'> Registrati. </a>");
?>
<html>
<head>
<title> Autodromo Varano de' Melegari  </title>
</head>
<body>
<?php
	include("connetti.php");
	$CF = $_POST["CF"];
	$Nome = $_POST["nome"];
	$Cognome = $_POST["cognome"];
	$DataNascita = $_POST["dataNascita"];
	$Email = $_POST["email"];
	$Password = $_POST["password1"];
	$Via = $_POST["via"];
	$Citta = $_POST["citta"];
	$Telefono = $_POST["telefono"];
	$PatenteLicenza = $_POST["patenteLicenza"];
	$DocumentoRiconoscimento = $_POST["patente_CI"];
	$DomandaSegreta = $_POST["domandaSegreta"];
	$RispostaSegreta = $_POST["rispostaSegreta"];
	$Privacy = $_POST["Privacy"];
	
	$message="Devi spuntare la Privacy";
	function sms($msg, $redirect)
        {
            echo '<script type="text/javascript">
            alert("'.$msg.'")
            window.location.href = "'.$redirect.'"
            </script>';
        }
/*
	function alert1($msg) 
	{
    echo "<script type='text/javascript'>alert('$msg');</script>";
	}
	*/
	if($Privacy =='Privacy')
		 {$query = "INSERT INTO Partecipanti (CF,Cognome,Nome,Via,Citta,DataNascita,Telefono,Email,PatenteLicenza,DocumentoRiconoscimento,Password,Autorizzazione,DomandaSegreta,RispostaSegreta,Privacy)
			  VALUES ('$CF','$Cognome','$Nome','$Via','$Citta','$DataNascita','$Telefono','$Email','$PatenteLicenza','$DocumentoRiconoscimento','$Password','Visitatore','$DomandaSegreta','$RispostaSegreta','1')";
	
	  $risultato = mysqli_query($conn,$query) or die("Errore nell'esecuzione della query.");
	  
	  echo ("record inserito correttamente");
	  
	  header("Location: index.php");
	 }
		
	else
	{//header("refresh:1;url=index.php");
		
		sms($message,"index.php");
		//echo "<script type='text/javascript'>alert1('$msg');</script>";
       //echo ("Devi spuntare la Privacy");
	}
	
	

?>
</body>
</html>