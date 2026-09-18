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
        if ($media >= 5){
            echo "Aluno Aprovado<br>";
        }else{
            
            echo "Aluno Reprovado<br>";
           
        }
    }
    ?>
<a href="index.php" target="_self">Voltar</a><br> 
</body>
</html>