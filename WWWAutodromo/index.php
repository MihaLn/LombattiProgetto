<?php
//inizializzazioni sessioni
session_start();
//verifica se primo accesso alla pagina con tecnica postback
if(!isset($_POST['email']))
{
?>

<html>
<head>
<link href="index.css" rel="stylesheet" type="text/css">
<title> Autodromo Varano de' Melegari </title>
</head>
<body>
<!-- <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
	Prego, effettuare l'accesso! <br>
	Email:<input type="text" name="email"> <br>
	Password:<input type="password" name="password"> <br>
	<input type="submit" value="Invia"/> 
	<input type="reset" value="Cancella"/>
</form>
Nuovo partecipante? <a href="registrazione.html"> Registrati. </a>
-->
<div class="container">  
  <form id="contact" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <h3>Benvenuto nell'autodromo di Varano de' Melegari</h3>
    <h4>Effettua l'accesso!</h4>
    <fieldset>
      <input placeholder="Email" type="email" name="email" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Password" type="password" name="password"tabindex="2" required>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" value="Invia">Accedi</button>
    </fieldset>
	<fieldset>
      Nuovo partecipante? <a href="registrazione.html"> Registrati. </a>
    </fieldset>
  </form>
</div>

</body>
</html>

<?php
}
else
{
	include("connetti.php");
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$query = "SELECT CF,Email, Nome, Cognome, Telefono, Citta, Via, PatenteLicenza, DocumentoRiconoscimento, Password, Autorizzazione, DomandaSegreta, RispostaSegreta
			  FROM partecipanti
			  WHERE Email = '$email'";
	
	$risultato = mysqli_query($conn,$query) or die("Errore nell'esecuzione della query.");
	
	if(mysqli_num_rows($risultato)==1)
	{
		$riga = mysqli_fetch_assoc($risultato);
		
		if ($riga["Password"] == $password)
		{
			//password riconosciuta 
			$_SESSION['Nome']=$riga['Nome'];
			$_SESSION['Cognome']=$riga['Cognome'];
			$_SESSION['Email']=$riga['Email'];
			$_SESSION['CF']=$riga['CF'];
			echo($_SESSION['Nome']);
			echo($_SESSION['Cognome']);

			if($riga['Autorizzazione']=='Amministratore')
				header ("Location: amministratoreAutorizzato.php");
			if($riga['Autorizzazione']=='Visitatore')
				header ("Location: visitatoreAutorizzato.php");
		}
		else
		{
			//password non riconosciuta 
			unset($_POST['email']);
			unset($_POST['password']);
			
			echo("Password non riconosciuta. <br> Reindirizzamento alla pagina di login.");
			header("refresh:4;url=index.php");
			
		}
	}
	else
	{
		//nome utente non riconosciuto 
		unset($_POST['login']);
		unset($_POST['password']);
		
		echo("Nome utente non riconosciuto. <br> Reindirizzamento alla pagina di login.");
		header("refresh:4;url=index.php");
	}
}
?>
