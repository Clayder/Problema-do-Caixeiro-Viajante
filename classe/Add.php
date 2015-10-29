<?php

class Add extends Problema {

    function __construct($matriz, $qtdGrafo) {
        parent::__construct($matriz, $qtdGrafo);
        $this->inicializaArrayGrafo();
        $this->inicializaArrayCaminho();
        $this->caminho();
    }

    /*
     * Escolhi 3 vértices (0, 1, 2)
     */

    private function inicializaArrayGrafo() {
        $this->arrayGrafo[0] = 1;
        $this->arrayGrafo[1] = 1;
        $this->arrayGrafo[2] = 1;
    }

    /*
     * Inicializa o primeiro caminho 
     */

    private function inicializaArrayCaminho() {
        $this->arrayCaminho[0] = 0;
        $this->arrayCaminho[1] = 1;
        $this->arrayCaminho[2] = 2;
        $this->arrayCaminho[3] = 0;
    }

    private function existirGrafoLivre() {
        for ($i = 0; $i < count($this->arrayGrafo); $i++) {
            if ($this->arrayGrafo[$i] == 0) {
                return true;
            }
        }
        return false;
    }

    /*
     * Método que verifica as possibilidades, dos caminhos
     * Nesse método iremos inserir os vértices, que estão fora do array possibCaminho
    */
    private function caminho() {
        $menorCusto = 999999;
        $vertice = NULL;
        $posicaoMenor = NULL;
        $custo = NULL;

        if(!$this->existirGrafoLivre()){
             $this->calcularCusto();
        }
        else{
            for ($i = 0; $i < count($this->arrayGrafo); $i++) {
                if ($this->arrayGrafo[$i] != 1) {
                    for ($j = 1; $j < count($this->arrayCaminho); $j++) {

                        /*
                         * Ex: 0->1, onde 0 está na posicao j e 1 está na posição j-1
                         * Armazena a distância de 0->1
                         */
                        $custoPosicao = $this->matriz[$this->arrayCaminho[$j]][$this->arrayCaminho[$j - 1]];
                        /*
                         * Ex: Insere o vértice $i e armazena em:
                         * $custoPossibUm o valor da distância do vértice $i até 0
                         * $custoPossibDois o valor da distãncia do vértice $i até 1
                         */
                        $custoPossibUm = $this->matriz[$this->arrayCaminho[$j]][$i];
                        $custoPossibDois = $this->matriz[$this->arrayCaminho[$j - 1]][$i];

                        $custo = $custoPosicao - ($custoPossibUm + $custoPossibDois);
                        $custo = abs($custo); // retorna o valor absoluto do número ex: -42 --> 42

                        if ($menorCusto >= $custo) {
                            $menorCusto = $custo;
                            $vertice = $i;
                            $posicaoMenor = $j;
                        }
                    }
                }
            }
            $this->arrayGrafo[$vertice] = 1;
            // Método que atualiza o arrayCaminho com o mais novo vértice
            $this->atualizaArrayCaminho($vertice, $posicaoMenor);
            // Fico chamando a função até que todos os vértices sejam percorridos
            $this->caminho();
        }
    }

    private function atualizaArrayCaminho($vertice, $posicao) {
        $k = 0;
        for ($i = 0; $i < count($this->arrayCaminho); $i++) {
            if ($i != $posicao) {
                $array[$k] = $this->arrayCaminho[$i];
            } else {
                $k++;
                $array[$posicao] = $vertice;
                $array[$k] = $this->arrayCaminho[$i];
            }
            $k++;
        }
        $this->arrayCaminho = $array;
        $array = NULL;
    }

    private function calcularCusto() {
        for ($i = 0; $i < count($this->arrayCaminho) - 1; $i++) {
            $this->custo = $this->custo + $this->matriz[$this->arrayCaminho[$i]][$this->arrayCaminho[$i + 1]];
        }
    }

}
