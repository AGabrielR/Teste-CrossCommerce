<?php
    $a = 9991;

    $final = array();

    do {
        $url = "http://challenge.dienekes.com.br/api/numbers?page=".$a;

        $numbers = json_decode(file_get_contents($url));

        if(!empty($numbers)){
            $aux1 = $numbers->numbers;

            $aux2 = $final;

            print_r($aux1);

            echo("<br><br>");

            $final = array_merge($aux1, $aux2);
            
            $a++;

        }
    }while (!empty($aux1));
    echo("<br><br>");
    print_r($final);

?>