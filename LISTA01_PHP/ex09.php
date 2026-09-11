<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>EXERCÍCIO 09</title>
</head>
<body>
    <form method="POST">
        <label>Digite o salário do funcionário:</label><br>
        <input type="number" name="sal" required/><br>
        <input type="submit" value="Calcular"><br>
     </form> 
  <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $sal = $_POST["sal"];
        $reaj = $sal * 0.3;
        $bruto = $sal + $reaj;
        echo "<h3>Resultado</h3>";
        echo "O salário bruto com reajuste é $bruto.<br>";
     }
  ?>
  <a href="index.php" target="_self">Voltar</a><br>
</body>

</html>