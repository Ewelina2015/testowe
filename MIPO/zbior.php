<?php
	class Zbior
	{
		function connect()
		{
				$adres_ip_serwera_mysql = '127.0.0.1';
				$nazwa_bazy_danych = 'app';
				$login_bazy_danych = 'root';
				$haslo_bazy_danych = '';

				if (!mysql_connect($adres_ip_serwera_mysql, $login_bazy_danych,$haslo_bazy_danych)) 
					{
					  echo 'Nie moge polaczyc sie z baza';
					  exit (0);
					}					
		 
				if (!mysql_select_db($nazwa_bazy_danych)) 
					{
						echo 'Blad otwarcia bazy danych';
						exit (0);
					}

		}


		function zapomnialem()
		{

				if(isset($_POST['submit']))
				{
					 
					$login = $_POST['login'];
					$email  = $_POST['email'];
					
					$danekonta = mysql_query("SELECT password, email, login FROM users WHERE login= '$login' AND email='$email'") or die(mysql_error());
					$pdanekonta = mysql_fetch_array($danekonta);

					if (strlen($_POST['email']) < 1) 
					{
						echo 'Nie wpisałeś adresu e-mail!<br>';
						exit(0);
					}

					if (strlen($_POST['login']) < 1) 
					{
						echo 'Nie wpisałeś loginu!<br>';
						exit(0);
					}

					if ($pdanekonta['login'] == NULL) 
					{
						echo 'Nie ma takiego konta!<br>';
						exit(0);
					}

					if ($pdanekonta['email'] != $email) 
					{
						echo 'Zły adres e-mail!<br>';
						exit(0);
					}

					    
					$haslo = rand(1000,9999);
					$haslomd5 = md5($haslo);
					mysql_query("UPDATE Users SET password = '$haslomd5' WHERE login= '$login'") or die(mysql_error());

						$to      = $email;
						$subject = 'New password';
						$message = "Hi, your new password is: $haslomd5 ";
						mail($to, $subject, $message);

					    echo "<p> Hasło zostało wysłane na e-mail: $email</p>";        
					  
				}       
		}
		
	}			
	?>
					