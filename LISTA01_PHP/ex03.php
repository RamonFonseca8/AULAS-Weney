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
        $soma = $num1 / $num2;
        echo "<h3>Resultado</h3>";
        echo "A soma de $num1 mais $num2 é igual a $soma.";
     }
  ?>
  <a href="index.php" target="_self">Voltar</a><br>
</body>

</html>