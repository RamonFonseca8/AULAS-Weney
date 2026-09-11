<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>EXERCÍCIO 08</title>
</head>
<body>
    <form method="POST">
        <label>Digite a distância:</label><br>
        <input type="number" name="dist" required/><br>
        <label>Digite o tempo:</label><br>
        <input type="number" name="temp" required/><br>
        <input type="submit" value="Calcular"><br>
     </form> 
  <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $dist = $_POST["dist"];
        $temp = $_POST["temp"];
        $vm = $dist / $temp;
        echo "<h3>Resultado</h3>";
        echo "A velocidade média é $vm.<br>";
     }
  ?>
  <a href="index.php" target="_self">Voltar</a><br>
</body>

</html>