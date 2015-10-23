<?php

$qtdGrafo = NULL;
if (isset($_POST['valida'])) {
    $qtdGrafo = $_POST['qtdGrafo'];
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Problema do Caixeiro Viajante</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="style/css/bootstrap.min.css" rel="stylesheet">
        <link href="style/css/style.css" rel="stylesheet">
    </head>
    <body>
    <center>
        <strong><h1 style="text-decoration: underline">Problema do caixeiro viajante</h1></strong>
        <?php if($qtdGrafo == NULL){ ?>
            <form method="POST" action="index.php">
                <input type="hidden" value="1" name="valida">
                <input type="number" name="qtdGrafo" placeholder="Quantos grafos ?">
                <input class="btn btn-success" type="submit" name="inserir" value="Inserir">
            </form>
        <?php }
        else {
            echo "</br>";
            $custoIgual = 0;
            echo "<form method='POST' action='caminho.php'>";
                echo "<input type='hidden' value='1' name='valida'>";
                echo "<input type='hidden' value='$qtdGrafo' name='qtdGrafos'>";
?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th>Ciclo</th>
                                  <th>Custo</th>
                                </tr>
                            </thead>
                            <tbody>                           
<?php  
                                for ($i = 0; $i < $qtdGrafo; $i++) {
                                    for ($j = $i; $j < $qtdGrafo; $j++) {
                                        
                                        if($i == $j){
                                            echo "<input type='hidden' value='0' name='matriz[".$i."][".$j."]'>";
                                        }
                                        else if($j < $custoIgual){
                                            echo "<input type='hidden' value='I' name='matriz[".$i."][".$j."]'>";
                                        }
                                            
                                        else{
                                            echo "<tr>";
                                            ?>
                                            <td>
                                                <div class="circulo">
                                                    <div class="circle">
                                                       <p class='caminho'> <?php echo $i;?><p>
                                                    </div>
                                                </div>
                                                <div class="divisor">
                                                    <span style="font-size: 30px" class="glyphicon glyphicon-arrow-right"></span>
                                                </div>
                                                <div class="circulo">
                                                    <div class="circle">
                                                       <p class='caminho'> <?php echo $j;?><p>
                                                    </div>
                                                </div>
                                            </td>
                                            <?php
                                              echo "<td>  <input type='number' name='matriz[".$i."][".$j."]'> </td>";
                                            echo "</tr>";
                                        }
                                    }
                                } 
                                ?> 
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
                <?php
                echo "</br>";
                echo "<input class='btn btn-success btn-lg btn-block' type='submit' name='inserir' value='Gerar Caminho'>";
            echo "</form>";
        }
            ?>
        </center>
    </body>
</html>


