<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Mydło i Powidło</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>

<div id="headerPan">
      <img src = "logo.jpg" height = "400"  alt = "logo" class="center"/>
</div>
    
<div id="bodyPan">
  <div id="rejestrujPanel">
    <h2>Zarejestruj się i korzystaj w pełni</h2>
    <form name="login" id="rejestracja_formularz" action="#" method="post" onsubmit="return checkForm(this);"> 
        <label>Login</label>
        <input class="inputs" type="text" name="login" required=required value="<?php if(isset($_POST['utworz_konto_bt'])){echo $_POST['login'];}?>"/>
        <label>Adres email</label>
        <input class="inputs" type="email" placeholder="nazwa@domena.com" name="email" required=required 
               value="<?php if(isset($_POST['utworz_konto_bt'])){echo $_POST['email'];}?>"/>
        <label>Hasło (min 6 znaków, w tym cyfra)</label>
        <input class="inputs" type="password" name="haslo" required=required />
        <label>Potwierdź hasło</label>
        <input class="inputs" type="password" name="pwd2"required=required />
       
        
    <div id="regulamin">
        <input type="checkbox"  required=required name="reg" value="Yes">Przeczytałem/am i akceptuję</input>
        <a href="regulamin.html">regulamin</a>
    </div> 
        <input id="utworz_konto_btn" type="submit" value="Utwórz konto" name="utworz_konto_bt"/>
   </form>
    
   <div id="powroty">
      <img id="strzalka" src = "strzalka.jpg" height="30" width="40" alt = "strzalka"/> 
      <a id="powrot" href="index.html">Powrót</a> 
    </div>
</div>
     
</div>
<footer id="footerPan">
    <p>Copyright © 2015 MIPO. © MIPO. All right reserved</p>
  </footer>
</body>
    
    <script type="text/javascript">

  function checkForm(form)
  {

    re = /^\w+$/;
    if(!re.test(form.login.value)) {
      alert("Błąd: Login może zawierać jedynie litery i liczby!");
      form.login.focus();
      return false;
    }

    if(form.haslo.value === form.pwd2.value) {
      if(form.haslo.value.length < 6) {
        alert("Błąd: Hasło musi składać się co najmniej 6 znaków!");
        form.haslo.focus();
        return false;
      }
      if(form.haslo.value === form.login.value) {
        alert("Błąd: Hasło musi być różne od loginu!");
        form.haslo.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.haslo.value)) {
        alert("Błąd: hasło musi zawierać co najmniej jedną cyfrę!");
        form.haslo.focus();
        return false;
      }

        }
        else {
      alert("Błąd: Hasła są różne!");
      form.haslo.focus();
      return false;
    }
    form.submit();
    return true;
  }

</script>
<?php
     $servername = "127.0.0.1";
     $username = "root";
     $password = "";
     $dbname = "app";
      mysql_connect($servername, $username, $password);
      mysql_select_db($dbname);


 if(isset($_POST['utworz_konto_bt']))
 {
     $login = $_POST['login'];
     $haslo = $_POST['haslo'];
     $email = $_POST['email'];

 $query = mysql_query("SELECT login FROM Users WHERE login='".$login."'");
 $query2 = mysql_query("SELECT email FROM Users WHERE email='".$email."'");
         if (mysql_num_rows($query) != 0)
  { print '<script type="text/javascript">';
      print 'alert("Email '. $_POST['email'].' już istnieje w bazie danych. Spróbuj jeszcze raz")';
      print '</script>'; 
      
              }

  else if (mysql_num_rows($query2) != 0)
  {
      print '<script type="text/javascript">';
      print 'alert("Email '. $_POST['email'].' już istnieje w bazie danych. Spróbuj jeszcze raz")';
      print '</script>';   
  }
        else{
$sql = "INSERT INTO users (login, password, email)
VALUES ('$login', '$haslo', '$email')";

if (mysql_query($sql)) 
{
    header("Location: index.html");
exit;
    //echo "Dodano nowy rekord!";
} 
else 
{
    echo "Błąd!: " . $sql . "<br>";
}
        }

     }
        
?>

    
</html>