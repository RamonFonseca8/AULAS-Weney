<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>EXERCÍCIO 02</title>
</head>
<body>
    <form method="POST">
        <label>Digite o primeiro número:</label><br>
        <input type="number" name="num1" required/><br>
        <input type="submit" value="Calcular"><br>
     </form> 
  <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $num1 = $_POST["num1"];
        $porcento = $num1 * 0.6;
        echo "<h3>Resultado</h3>";
        echo "Os 60% de $num1 é $porcento.";
     }
  ?>
  <a href="index.php" target="_self">Voltar</a><br>
</body>

</html>