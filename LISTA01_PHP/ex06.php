<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>EXERCÍCIO 06</title>
</head>
<body>
    <form method="POST">
        <label>Digite o lado do quadrado:</label><br>
        <input type="number" name="lado" required/><br>
        <input type="submit" value="Calcular"><br>
     </form> 
  <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $num1 = $_POST["lado"];
        $p = 4 * $num1;
        echo "<h3>Resultado</h3>";
        echo "O perímetro do quadrado é igual a $p.<br>";
     }
  ?>
  <a href="index.php" target="_self">Voltar</a><br>
</body>

</html>