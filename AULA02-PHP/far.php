<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label>Digite a temperatura:</label><br>
        <input type="number" name="cel" required/><br>
       
     </form> 
  <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $cel = $_POST["cel"];
        $far = ($cel*1.8) + 32 ;
        echo "<h3>Resultado</h3>";
        echo "A temperatura em fahrenheit é $far.";
     }
  ?>
</body>

</html>