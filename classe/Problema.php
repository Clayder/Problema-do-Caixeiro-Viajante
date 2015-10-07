<?php

abstract class Problema {
    /*
     * @name $matriz
     * Recebe a matriz com os grafos e os custos 
     * exemplo: 
     * M[0][1] = 5 ; O custo do caminho de 0 até 1 é 5
     */

    protected $matriz;

    /*
     * @name $arrayGrafo
     * é um array onde cada índice desse array, identifica o "nome" do grafo
     * Inicialmente cada posição do array possui valor 0.
     * Valor 0: Significa que o grafo ainda não foi utilizado
     * Valor 1: Significa que foi utilizado
     */
    protected $arrayGrafo;

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
    protected $arrayCaminho;
    protected $custo;

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

    protected function criaArrayGrafos() {
        for ($i = 0; $i < $this->qtdGrafo; $i++) {
            $this->arrayGrafo[$i] = 0;
        }
    }

    /*
     * Verifica se todos os grafos foram percorridos
     */

    protected function verificaGrafo() {
        for ($i = 0; $i < count($this->arrayGrafo); $i++) {
            if ($this->arrayGrafo[$i] == 0) {
                return false;
            }
        }
        return true;
    }

    public function getCusto() {
        return $this->custo;
    }

    public function getArrayGrafo() {
        return $this->arrayGrafo;
    }

    public function getArrayCaminho() {
        return $this->arrayCaminho;
    }

}
