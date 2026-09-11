<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>EXERCÍCIO 05</title>
</head>
<body>
    <form method="POST">
        <label>Digite o primeiro número:</label><br>
        <input type="number" name="num1" required/><br>
        <label>Digite o segundo número:</label><br>
        <input type="number" name="num2" required/><br>
        <label>Digite o terceiro número:</label><br>
        <input type="number" name="num3" required/><br>
        <label>Digite o quarto número:</label><br>
        <input type="number" name="num4" required/><br>
        <label>Digite o quinto número:</label><br>
        <input type="number" name="num5" required/><br>
        <input type="submit" value="Calcular"><br>
     </form> 
  <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $num3 = $_POST["num3"];
        $num4 = $_POST["num4"];
        $num5 = $_POST["num5"];
        $media = ($num1 + $num2 + $num3 + $num4 + $num5) / 5;
        echo "<h3>Resultado</h3>";
        echo "A média dos números $num1, $num2, $num3, $num4 e $num5 é $media.<br>";
     }
  ?>
  <a href="index.php" target="_self">Voltar</a><br>
</body>

</html>