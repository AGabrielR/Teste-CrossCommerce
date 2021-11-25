<?php
    $a = 1;

    $final = array();

    do {
        $url = "http://challenge.dienekes.com.br/api/numbers?page=".$a;

        $numbers = json_decode(file_get_contents($url));

        if(!empty($numbers)){
            $aux1 = $numbers->numbers;

            $i=0;
            foreach ($aux1 as $num) {
                if($num < 0.00009){
                    $aux1[$i] = number_format($num, 21);   
                }
                $i++;
            }

            $aux2 = $final;

            $final = array_merge($aux2, $aux1);
            
            $a++;

        }
    }while (!empty($aux1));

    //print_r($final);

    $tamanho = count($final);

    for ($i=0; $i < $tamanho ; $i++) { 
        for ($x=0; $x < $tamanho; $x++) { 
            if($final[$i] < $final[$x]){
                $aux = $final[$x];
                $final[$x] = $final[$i];
                $final[$i] = $aux;
            }
        }
    }

    
    //print_r($final)

?>