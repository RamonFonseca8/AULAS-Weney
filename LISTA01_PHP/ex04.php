<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>EXERCÍCIO 04</title>
</head>
<body>
    <form method="POST">
        <label>Digite o raio do círculo:</label><br>
        <input type="number" name="raio" required/><br>
        <input type="submit" value="Calcular"><br>
     </form> 
  <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $num1 = $_POST["raio"];
        $area = 3.14 * ($num1 * $num1);
        echo "<h3>Resultado</h3>";
        echo "A área do círculo é $area.<br>";
     }
  ?>
  <a href="index.php" target="_self">Voltar</a><br>
</body>

</html>