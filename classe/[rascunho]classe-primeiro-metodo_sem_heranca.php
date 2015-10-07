<?php

/**
 * Description of Primeiro_metodo
 *
 * @author Peter Clayder
 */
class Primeiro_metodo {
    
    /*
     * @name $matriz
     * Recebe a matriz com os grafos e os custos 
     * exemplo: 
     * M[0][1] = 5 ; O custo do caminho de 0 até 1 é 5
    */
    private $matriz;
    
    /*
     * @name $arrayGrafo
     * é um array onde cada índice desse array, identifica o "nome" do grafo
     * Inicialmente cada posição do array possui valor 0.
     * Valor 0: Significa que o grafo ainda não foi utilizado
     * Valor 1: Significa que foi utilizado
    */
    private $arrayGrafo;
    
    /*
     * @name $qtdGrafo
     * Recebe a quantidade de grafos
    */
    private $qtdGrafo;
    
    /*
     * @name $arrayCaminho
     * ex:
     *  [0] => 0
        [1] => 2
        [2] => 3
        [3] => 1
     *  [4] => 0
     * 
     * O caminho foi : 0 -> 2 -> 3 -> 1 -> 0
     */
    private $arrayCaminho;
    
    private $custo;
            
    function __construct($matriz, $qtdGrafo) {
        $this->matriz = $matriz;
        $this->qtdGrafo = $qtdGrafo;
        $this->criaArrayGrafos();
        $this->custo = 0; // Inicializa o custo
    }

    /*
     * Gera um array, onde cada índice do array, identifica o "nome" do grafo
     * Inicialmente cada posição do array possui valor 0.
     * Valor 0: Significa que o grafo ainda não foi utilizado
     * Valor 1: Significa que foi utilizado
     * $tam recebe a quantidade de grafos
     * 
     */
    private function criaArrayGrafos() {
        for ($i = 0; $i < $this->qtdGrafo; $i++) {
            $this->arrayGrafo[$i] = 0;
        }
    }

    /*
     * Verifica se todos os grafos foram percorridos
    */
    private function verificaGrafo() {
        for ($i = 0; $i < count($this->arrayGrafo); $i++) {
            if ($this->arrayGrafo[$i] == 0) {
                return false;
            }
        }
        return true;
    }

    /*
     * Retorna qual é o grafo mais próximo
     * funcao max: retorna o maior valor de um array
     * @param int $posicao recebe o número da linha da matriz
    */
    private function menorCaminho($posicao) {
        /*
         * @name $array 
         * Recebe a linha ($posicao) da matriz
        */
        $array = $this->matriz[$posicao];
        $menor = 9999999;
        $proximoGrafo = NULL;
        
        for($i=0; $i<count($array); $i++){
            /*
             * Se aquela posição for menor do que $menor e se esse grafo ainda não foi percorrido
            */
            if($array[$i] < $menor && $this->arrayGrafo[$i] != 1){
                $menor = $array[$i];
                $proximoGrafo = $i;
            }
        }
        return $proximoGrafo;
    }
    
    function getCusto() {
        return $this->custo;
    }

    public function caminho($posicao = NULL) {
        // Se todos os grafos foram percorridos
        if ($this->verificaGrafo()) {
          
            /*
             * funcao end retorna o valor do último elemento de um array
            */
            $valorUltimoCaminho = end($this->arrayCaminho);
            
            /*
             * O vetor arrayCaminho recebe na sua última posição o valor zero (grafo inicial) 
            */
            $this->arrayCaminho[] = 0;
            
            /*
             * Soma o custo da última posição até a posição inicial
            */
            $this->custo = $this->custo + $this->matriz[$valorUltimoCaminho][0];
            
            return $this->arrayCaminho;
        } else {
            // Se a posição 0 for igual a 0, significa que nada foi percorrido
            if ($this->arrayGrafo[0] == 0) {
                /*
                 * O grafo inicial(0) foi percorrido, então recebe o valor 1
                */
                $this->arrayGrafo[0] = 1;
                /*
                 * É inserido o caminho inicial
                 */
                $this->arrayCaminho[] = 0;
                $posicao = 0;
                $proximoCaminho = $this->menorCaminho($posicao);
                /*
                 * Soma o custo da primeira posição(0), até a proxima posição
                */
                $this->custo = $this->custo + $this->matriz[0][$proximoCaminho];
                /*
                 * A próxima posição que será utilizada recebe o valor 1.
                */
                $this->arrayGrafo[$proximoCaminho] = 1;
                /*
                 * É inserido mais um caminho
                 */
                $this->arrayCaminho[] = $proximoCaminho;
                return $this->caminho($proximoCaminho);
            } else {                
                $proximoCaminho = $this->menorCaminho($posicao);
                $this->arrayGrafo[$proximoCaminho] = 1;
                $this->arrayCaminho[] = $proximoCaminho;
                $this->custo = $this->custo + $this->matriz[$posicao][$proximoCaminho];               
                return $this->caminho($proximoCaminho);
            }
        }

    }

}
