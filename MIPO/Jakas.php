<?php
    class Jakas{
    static $suma=0;
    function filldiv() {
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "app";
        $connection = @mysql_connect($servername, $username, $password)
                or die('Brak po��czenia z serwerem MySQL');
        $db = @mysql_select_db($dbname, $connection)
                or die('Nie mog� po��czy� si� z baz� danych');

        $loopResult = '';
        $wynik = mysql_query("SELECT name,price,quantity,priority FROM items")
                or die('B��d zapytania');

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
                        <tr/ class="column2">
                            <td>' . $r['quantity'] . '</td>
                        </tr>
                        <tr class="column3">
                            <td>' . $r['price'] . '</td>
                        </tr>
                        <tr class="column4">
                            <td>' . $r['priority'] . '</td>
                        </tr>
                    ';
                $suma+=$r['price'];
            }
             echo $loopResult;
             echo '</table>';
        }
    }
    function wypiszSume(){
        echo '<h2 class="s2">' .$suma. '</h2>';
    }
    }
    ?>