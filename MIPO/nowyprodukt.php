<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta charset="utf-8">
            <title>Dokument bez tytuÅ‚u</title>
            <link href="style2.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="topPan"><a href="#"><img src="images/logo.gif" title="Green Solutions" alt="Green Solutions" /></a>
            <div id="topPanMenu">
                <img src="images/photo.gif"/>
                <p><a class="link2" href="#">Moje konto</a>    <a class="link2" href="#">Wyloguj</a></p>
                <ul>
                    <li><a class="link1" href="glowna.php">Lista zakupÃ³w</a></li>
                    <li><a class="link1" href="mojeGrupy.html">Moje grupy</a></li>
                </ul>
            </div>
        </div>
        <div id="headerPan">
            <div id="headerPanleft">
                <div id="ourblog">
                    <h2><center>Nowa lista</center></h2>
                    <a href="#">&nbsp;</a> </div>
                <div id="listy">
                    <h2><center>Moje listy</center></h2>
                    <a href="mojelisty.html">&nbsp;</a> </div>
            </div>
            <div id="bodyPan">
                <div id="leftPan">
                    <div id="leftmemberPan">

                    </div>
                    <h2> Lista zakupÃ³w</h2>
                    <div class="podziel">
                        <ol>
                            <li><a href="#">PODZIEL SIÄ? LISTÄ„</a>
                                <ul>
                                    <li><a href="#" name="info"> <img src="images/icon3.gif"/>Dom</a></li>
                                    <li><a href="#" name="info"> <img src="images/icon3.gif"/>Biuro</a></li>
                                    <li><a href="#"> <img src="images/icon4.gif"/>Gosia L</a></li>
                                    <li><a href="#"> <img src="images/icon4.gif"/>Ewelina B</a></li>
                                    <li><a href="#"> <img src="images/icon4.gif"/>Aleksander T</a></li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                    <div id="zmien">
                        <h2><center>ZmieÅ„ nazwÄ™</center></h2>
                        <a href="#">&nbsp;</a> </div>
                    <div id="usun">
                        <h2><center>UsuÅ„ listÄ™</center></h2>
                        <a href="#">&nbsp;</a> </div>
                    <div id="kopiuj">
                        <h2><center>Kopiuj listÄ™</center></h2>
                        <a href="#">&nbsp;</a> </div>
                    <div id="sortuj">
                        <h2><center>Sortuj</center></h2>
                        <a href="#">&nbsp;</a> </div>
                </div>
            </div>
            <div id="rightPan">
                <div id="rightbodyPan">
                    <h2><center><b>Nazwa listy</b></center></h2>
                    <h4>
                        <div class="b1">
                            <h2> Nowy produkt</h2
                            <a href="nowyprodukt.php">&nbsp;</a>
                        </div>
                        <div class="b2">
                            <h2>Zapisz</h2>
                        </div>
                    </h4>
                    <?php filldiv() ?>
                    <div class="sum">
                        <h2 class="s1"> Suma: </h2>
                        <h2 class="s2">2,89 zÅ‚</h2>
                    </div>
                </div>
                <div id="noweokno">
                    <form name="dodajProdukt" id="dodajProdukt" action="#" method="post">
                        <h2>Dodaj produkt: </h2>
                        <input class="inputs" type="text" placeholder="nazwa" name="nazwa" />
                        <input class="inputs" type="text" required=required placeholder="ilosc" name="ilosc"/>
                        <input class="inputs" type="text" required=required placeholder="cena" name="cena"/>
                        <input class="inputs" type="text" required=required placeholder="priorytet" name="priorytet"/>
                        <input id="notatka" type="text" required=required placeholder="notatka" name="notatka"/>
                        <button id="button" type="submit" name="dodaj">Dodaj</button>
                        <button id="zakoncz" type="submit" name="zakoncz" onClick="location.href='glowna.php'">Zakoñcz</button>
                    </form>
                </div>
            </div>
        </div>

    </body>
    <?php
    $name = $_POST['nazwa'];
    $price = $_POST['cena'];
    $quantity = $_POST['ilosc'];
    $note = $_POST['notatka'];
    $priority = $_POST['priorytet'];
    $dodaj = $_POST['dodaj'];
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "app";

    if (isset($dodaj)) {
        $connection = @mysql_connect($servername, $username, $password)
                or die('Brak po³¹czenia z serwerem MySQL');
        $db = @mysql_select_db($dbname, $connection)
                or die('Nie mogê po³¹czyæ siê z baz¹ danych');

        // dodajemy rekord do bazy 
        $ins = @mysql_query("INSERT INTO items SET name='$name', price='$price',quantity='$quantity',note='$note', priority='$priority'");

        if ($ins)
            header("Location: nowyprodukt.html");
        else
            echo "B³¹d nie uda³o siê dodaæ nowego rekordu";
        mysql_close($connection);
    }

    function filldiv() {
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "app";
        $connection = @mysql_connect($servername, $username, $password)
                or die('Brak po³¹czenia z serwerem MySQL');
        $db = @mysql_select_db($dbname, $connection)
                or die('Nie mogê po³¹czyæ siê z baz¹ danych');

        $loopResult = '';
        $wynik = mysql_query("SELECT name,price,quantity,priority FROM items")
                or die('B³¹d zapytania');

        if (mysql_num_rows($wynik) > 0) {
            echo '<table id="table">';
            echo '<tr>
                            <th class="th1">Nazwa</th>
                            <th class="th2">Ilosc</th> 
                            <th class="th3">Cena</th>
                            <th class="th4">Priorytet</th>
                        </tr>';
            
            while ($r = mysql_fetch_assoc($wynik)) {
                $loopResult .= ' 
                        <tr class="column1">
                            <td>' . $r['name'] . '</td>
                        </tr>
                        <tr class="column2">
                            <td>' . $r['quantity'] . '</td>
                        </tr>
                        <tr class="column3">
                            <td>' . $r['price'] . '</td>
                        </tr>
                        <tr class="column4">
                            <td>' . $r['priority'] . '</td>
                        </tr>
                        <tr class="column5">
                            <img class="img2" src="images/icon2.gif"/>
                        </tr>
                    ';
            }
             echo $loopResult;
             echo '</table>';
        }
       
    }
    ?>
</html>
