<?php

$qtdGrafo = NULL;
if (isset($_POST['valida'])) {
    $qtdGrafo = $_POST['qtdGrafo'];
}

if ($qtdGrafo != NULL) {
    echo "</br>";
    $custoIgual = 0;
    echo "<form method='POST' action='caminho.php'>";
        echo "<input type='hidden' value='1' name='valida'>";
        echo "<input type='hidden' value='$qtdGrafo' name='qtdGrafos'>";
        for ($i = 0; $i < $qtdGrafo; $i++) {
            for ($j = $i; $j < $qtdGrafo; $j++) {
                if($i == $j){
                    echo "<input type='hidden' value='0' name='matriz[".$i."][".$j."]'>";
                }
                else if($j < $custoIgual){
                    echo "<input type='hidden' value='I' name='matriz[".$i."][".$j."]'>";
                }
                    
                else{
                    echo "</br>";
                    echo "Forneca o custo do grafo  " . $i . " para o grafo  " . $j. "  ";
                    echo "<input type='text' name='matriz[".$i."][".$j."]' placeholder='Custo ?'>";
                    echo "</br>";
                }
                
            }
        }  
        echo "</br>";
        echo "<input type='submit' name='inserir' value='Gerar Matriz'>";
    echo "</form>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php if($qtdGrafo == NULL): ?>
            <form method="POST" action="index.php">
                <input type="hidden" value="1" name="valida">
                <input type="text" name="qtdGrafo" placeholder="Quantos grafos ?">
                <input type="submit" name="inserir" value="Inserir">
            </form>
        <?php endif;?>
    </body>
</html>

