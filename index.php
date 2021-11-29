<?php
    function getNumbers(){
        $pagina = 1;

        $vetFinal = array();

        do {
            $url = "http://challenge.dienekes.com.br/api/numbers?page=".$pagina;
                $request = json_decode(@file_get_contents($url));

            if(!empty($request)){
                $vetNumeros = $request->numbers;

                $posicao=0;
                foreach ($vetNumeros as $num) {
                    $vetNumeros[$posicao] = number_format($num, 21);
                    $posicao++;
                }

                $mergeArray = $vetFinal;

                $vetFinal = array_merge($mergeArray, $vetNumeros);
                
                $pagina++;

            }
        }while (!empty($vetNumeros));
        return($vetFinal);
    }
    
    function transform($vetFinal){
        $tamanho = count($vetFinal);

        for ($i=0; $i < $tamanho ; $i++) { 
            for ($x=0; $x < $tamanho; $x++) { 
                if($vetFinal[$i] < $vetFinal[$x]){
                    $guardaNum = $vetFinal[$x];
                    $vetFinal[$x] = $vetFinal[$i];
                    $vetFinal[$i] = $guardaNum;
                }
            }
        }
        return($vetFinal);
    }

?>