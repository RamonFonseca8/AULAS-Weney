<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>EXERCÍCIO 03</title>
</head>
<body>
    <form method="POST">
        <label>Digite a base do triângulo:</label><br>
        <input type="number" name="base" required/><br>
        <label>Digite a altura do triângulo:</label><br>
        <input type="number" name="altura" required/><br>
        <input type="submit" value="Calcular"><br>
     </form> 
  <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $num1 = $_POST["base"];
        $num2 = $_POST["altura"];
        $area = ($num1 * $num2)/2;
        echo "<h3>Resultado</h3>";
        echo "A área do triângulo é $area.<br>";
     }
  ?>
  <a href="index.php" target="_self">Voltar</a><br>
</body>

</html>