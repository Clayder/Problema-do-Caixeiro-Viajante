<?php

include 'classe/Primeiro_metodo.php';
include 'classe/Add.php';

if (isset($_POST['valida'])) {
    $matriz = $_POST['matriz'];    
    $qtdGrafos = $_POST['qtdGrafos'];
    
    /*
     * Insere o custo do caminho do grafo i até j,no custo do caminho do grafo j até i
    */

    for ($i = 0; $i < $qtdGrafos; $i++) {
        for ($j = 0; $j < $qtdGrafos; $j++) {
            $matriz[$j][$i] = $matriz[$i][$j];
        }
    }

/*
    $qtdGrafos = 5;

    $matriz[0][0] = 0;
    $matriz[0][1] = 3;
    $matriz[0][2] = 2;
    $matriz[0][3] = 5;
    $matriz[0][4] = 1;
    
    $matriz[1][0] = 3;
    $matriz[1][1] = 0;
    $matriz[1][2] = 4;
    $matriz[1][3] = 6;
    $matriz[1][4] = 6;
    
    $matriz[2][2] = 0;
    $matriz[2][3] = 8;
    $matriz[2][4] = 7;
    $matriz[2][0] = 2;
    $matriz[2][1] = 4;
    
    $matriz[3][3] = 0;
    $matriz[3][4] = 3;
    $matriz[3][0] = 5;
    $matriz[3][1] = 6;
    $matriz[3][2] = 8;
    
    $matriz[4][4] = 0;
    $matriz[4][0] = 1;
    $matriz[4][2] = 7;
    $matriz[4][3] = 3;
    $matriz[4][1] = 6;
    */

    echo "************ Matriz ************";
    echo "</br>";
    echo "<pre>";
        print_r($matriz);
    echo "</pre>";
    echo "</br>";
    echo "********************************";
    
    echo "</br>";
    echo "************ Resultado Primeiro Método ************ ";
    echo "</br>";
    $metodo = new Primeiro_metodo($matriz, $qtdGrafos);
    // $caminho recebe o array com os caminhos
    $caminho = $metodo->caminho();
    // $tam recebe o tamanho do array $caminho
    $tam = count($caminho);
    echo "</br>";
    echo "Custo = " . $metodo->getCusto();
    echo "</br>";
    echo "Caminho = ";
    for($i = 0; $i < $tam; $i++){
        // Verifica se é o ultimo grafo
        if($i != $tam -1){
            echo $caminho[$i]."->";
        }
        else{
            echo $caminho[$i];
        }       
    }
    echo "</br>";
    echo "********************************";
    
    
    
    
    echo "</br>";
    echo "************ Resultado Método ADD************ ";
    echo "</br>";
    $add = new Add($matriz, $qtdGrafos);
    // $caminho recebe o array com os caminhos
    $caminhoAdd = $add->getArrayCaminho();
    // $tam recebe o tamanho do array $caminho
    $tamAdd = count($caminhoAdd);
    echo "</br>";
    echo "Custo = " . $add->getCusto();
    echo "</br>";
    echo "Caminho = ";
    for($i = 0; $i < $tamAdd; $i++){
        // Verifica se é o ultimo grafo
        if($i != $tamAdd -1){
            echo $caminhoAdd[$i]."->";
        }
        else{
            echo $caminhoAdd[$i];
        }       
    }
    echo "</br>";
    
}
else{
    header('location: index.php');   
}
  





