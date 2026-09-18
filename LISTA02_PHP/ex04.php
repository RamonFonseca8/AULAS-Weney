<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST">
        <label>Digite o nome do funcionário:</label><br>
        <input type="text" name="nome" required/><br>
        <label>Digite o salário do funcionário:</label><br>
        <input type="number" name="num" required/><br>
        <label>Digite a quantidade de depedentes do funcionário:</label><br>
        <input type="number" name="num2" required/><br>
        <input type="submit" value="Enviar"><br>
     </form> 
  <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome= $_POST["nome"];
        $num= $_POST["num"];
        $num2= $_POST["num2"];
        $adic = $num * 0.15 * $num2;
        $sal = $num + $adic;
            echo "O salário do $nome é $sal<br>";
    }  
    ?>
<a href="index.php" target="_self">Voltar</a><br>
</body>
</html>