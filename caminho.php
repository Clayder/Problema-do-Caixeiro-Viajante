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
} else {
    header('location: index.php');
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


  echo "************ Matriz ************";
  echo "</br>";
  echo "<pre>";
  print_r($matriz);
  echo "</pre>";
  echo "</br>";
  echo "********************************";
 * 
 */
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Problema do Caixeiro Viajante</title>
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <center><strong><h1 style="text-decoration: underline">Problema do caixeiro viajante</h1></strong></center>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><center>Ciclo</center></th>
                    <th><center>Custo</center></th>
                    </tr>
                    </thead>
                    <tbody>      
<?php
for ($i = 0; $i < $qtdGrafos; $i++) {
    for ($j = $i; $j < $qtdGrafos; $j++) {
        if ($i != $j) {
            echo "<tr>";
            ?>
                                <th scope='row'>
                                <div class="circulo">
                                    <div class="circle">
                                        <p class='caminho'> <?php echo $i ?><p>
                                    </div>
                                </div>
                                <div class="divisor">
                                    <span style="font-size: 30px" class="glyphicon glyphicon-arrow-right"></span>
                                </div>
                                <div class="circulo">
                                    <div class="circle">
                                        <p class='caminho'> <?php echo $j ?><p>
                                    </div>
                                </div>
                                </th>
            <?php
            echo "<td>" . $matriz[$i][$j] . "</td>";
            echo "</tr>";
        }
    }
}
?> 
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <center><h3>Método do Vizinho Mais Próximo</h3></center>
<?php $metodo = new Primeiro_metodo($matriz, $qtdGrafos); ?>
                <?php // $caminho recebe o array com os caminhos  ?>
                <?php $caminho = $metodo->caminho(); ?>
                <?php // $tam recebe o tamanho do array $caminho ?>
                <?php $tam = count($caminho); ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><center>Caminho</center></th>
                    <th><center>Custo</center></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>                              
<?php
for ($i = 0; $i < $tam; $i++) {
    // Verifica se é o ultimo grafo
    if ($i != $tam - 1) {
        ?>
                                        <div class="circulo">
                                            <div class="circle">
                                                <p class='caminho'> <?php echo $caminho[$i] ?><p>
                                            </div>
                                        </div>
                                        <div class="divisor">
                                            <span style="font-size: 30px" class="glyphicon glyphicon-arrow-right"></span>
                                        </div>
        <?php
    } else {
        ?>
                                        <div class="circulo">
                                            <div class="circle">
                                                <p class='caminho' ><?php echo $caminho[$i]; ?></p>
                                            </div>
                                        </div>
        <?php
    }
}
?>
                            </td>
                            <td><center><?php echo $metodo->getCusto(); ?></center></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <center><h3>Método ADT</h3></center>
<?php $add = new Add($matriz, $qtdGrafos); ?>
<?php // $caminho recebe o array com os caminhos  ?>
                <?php $caminhoAdd = $add->getArrayCaminho(); ?>
                <?php // $tam recebe o tamanho do array $caminho ?>
                <?php $tamAdd = count($caminhoAdd); ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><center>Caminho</center></th>
                    <th><center>Custo</center></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>                              
<?php
for ($i = 0; $i < $tamAdd; $i++) {
    // Verifica se é o ultimo grafo
    if ($i != $tamAdd - 1) {
        ?>
                                        <div class="circulo">
                                            <div class="circle">
                                                <p class='caminho'> <?php echo $caminhoAdd[$i] ?><p>
                                            </div>
                                        </div>
                                        <div class="divisor">
                                            <span style="font-size: 30px" class="glyphicon glyphicon-arrow-right"></span>
                                        </div>
        <?php
    } else {
        ?>
                                        <div class="circulo">
                                            <div class="circle">
                                                <p class='caminho' ><?php echo $caminhoAdd[$i]; ?></p>
                                            </div>
                                        </div>
        <?php
    }
}
?>
                            </td>
                            <td><center><?php echo $add->getCusto() ?></center></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>


