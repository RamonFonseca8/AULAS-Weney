<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>EXERCÍCIO 07</title>
</head>
<body>
    <form method="POST">
        <label>Digite a temperatura em Celcius:</label><br>
        <input type="number" name="celsius" required/><br>
        <input type="submit" value="Calcular"><br>
     </form> 
  <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $cel = $_POST ["celsius"];
        $far = ($cel*1.8) + 32;

        echo "RESULTADO<br>";
        echo "A temperatura em °F é $far.<br>";

     }
  ?>
  <a href="index.php" target="_self">Voltar</a><br>
</body>

</html>