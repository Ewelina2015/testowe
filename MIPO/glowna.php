<?php
include('zbior.php');
    $zbior = new Zbior();
    $zbior->wyloguj();
if(!isset($_SESSION['zalogowany'])){
  $_SESSION['komunikat'] = "Nie jestes zalogowany!";
  include('zbior.php');
  exit();
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta charset="utf-8">
            <title>Dokument bez tytułu</title>
            <link href="style2.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="topPan"><a href="#"><img src="images/logo.gif" title="Green Solutions" alt="Green Solutions" /></a>
            <div id="topPanMenu">
                <img src="images/photo.gif"/>
                <div class="konto">
                 <form method="post">
                    <a class="link2" href="zarzadzanieKontem.php">Moje konto</a>  
                    <input class="link2" id="wyloguj_btn" type="submit"  value="Wyloguj" name="wyloguj"/>
                    
                </form>
                </div>
                <ul>
                    <li><a class="link1" href="glowna.php">Lista zakupów</a></li>
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
                    <h2> Lista zakupów</h2>
                    <div class="podziel">
                        <ol>
                            <li><a href="#">PODZIEL SI�? LISTĄ</a>
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
                        <h2><center>Zmień nazwę</center></h2>
                        <a href="#">&nbsp;</a> </div>
                    <div id="usun">
                        <h2><center>Usuń listę</center></h2>
                        <a href="#">&nbsp;</a> </div>
                    <div id="kopiuj">
                        <h2><center>Kopiuj listę</center></h2>
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
                            <h2 onClick=" location.href = 'nowyprodukt.php'"> Nowy produkt</h2>

                        </div>
                        
                    </h4>
                    <?php 
                    require("pomocnicza.php");
                    $j = new Jakas();
                    $j->filldiv() ?>
                    <div class="sum">
                        <h2 class="s1"> Suma: </h2>
                        <?php $j->wypiszSume() ?>
                    </div>
                </div>

            </div>
        </div>

    </body>
</html>
