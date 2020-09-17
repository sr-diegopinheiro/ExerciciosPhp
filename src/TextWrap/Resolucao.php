<?php

/*
Chuva / Galoá Ciências
Desafio backend para vaga de estágio
Candidato: Diego Paixão Pinheiro

Código desenvolvido segundo as orientações contidas em:
<https://github.com/galoa/ExerciciosPhp/blob/master/src/TextWrap/TextWrapInterface.php>
*/

function textWrap(string $text, int $length): array{

  //variável contadora de palavras percorrida
  $i = 0; 
  //vetor $array que será retornado como resultado final
  $array = array(); 

  //Copia as palavras contidas na string $text para o vetor $words
  $words = explode(" ", $text);

  //ENQUANTO existir palavras não tratadas, pecorre $words evetuando as devidas operações
  while ($i < count($words)){

    // IF a palavra for maior do que o limete estabelecido
    // ELSE a palavra não for maior do que o limete estabelecido
    if(mb_strlen($words[$i], 'UTF-8') > $length){

      //Variável contadora do laço for
      $y = 0;
      //Marca o caracter que será usado para cortar a palavra
      $start = 0;

      //Quantas vezes é preciso cortar a palavra
      $times = floor(mb_strlen($words[$i], 'UTF-8') / $length);      
      //Qual o tamanho da última parte da palavra
      $length_substring_final = mb_strlen($words[$i], 'UTF-8') - ($length * $times);

      //Para cada parte da palavra
      for($y = 0; $y < $times; $y++){
        //Corta a palavra
        $line = mb_substr($words[$i], $start, $length); 
        //Armazena a linha no $array
        array_push($array, $line);  
        //Marca o índice do novo caracter que será usado como ponto de corte
        $start = $start + $length;  

      }

      //Corta o último pedaço e o armazena na linha
      $line = mb_substr($words[$i], $start, $length_substring_final);
      //Armazena a linha no $array
      array_push($array, $line); 

      //Contadora de palavras pecorridas é incremetada
      $i++;

    }else{

      //Variável booleana, marca se o limite da linha já foi alcançado
      $characterLimitReached = false;

      //Linha  armazena uma palavra e increnta a variável contadora de palavras pecorridas
      $line = $words[$i];     
      $i++;  

      //ENQUANTO o limite de palavras não tiver sido atingido
      //E ainda existe palavras não percorridas
      while (!($characterLimitReached) && $i < count($words)){

        //IF o tamanho máximo da linha não foi atingido, continua armazenado palavras na linha
        //ELSE passa para a  próxima linha       
        if(mb_strlen($line . " " . $words[$i], 'UTF-8') <= $length){
          $line = $line. " " . $words[$i];          
          $i++;
        
        }else{
           $characterLimitReached = true;
        }        
       }

       //Armazena a linha no $array
       array_push($array, $line);  

    }   

  }

  //retorna o array com o resultado
  return $array;
}
