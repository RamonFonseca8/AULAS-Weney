<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label>Digite o primeiro número:</label><br>
        <input type="number" name="num1" required/><br>
        <label>Digite o segundo número:</label><br>
        <input type="number" name="num2" required/><br>
        <input type="submit" value="Calcular"><br>
     </form> 
  <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $soma = $num1 + $num2;
        $sub = $num1 - $num2;
        $mult = $num1 * $num2;
        $div = $num1 / $num2;
        echo "<h3>Resultado</h3>";
        echo "A soma de $num1 mais $num2 é igual a $soma.<br>"; 
        echo "A subtração de $num1 menos $num2 é igual a $sub.<br>";
        echo "A multiplicação de $num1 vezes $num2 é igual a $mult.<br>";
        echo "A divisão de $num1 dividido por $num2 é igual a $div.<br>";
     }
  ?>
  <a href="index.php" target="_self">Voltar</a><br>
</body>

</html>