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
        <input type="number" name="num1" /><br>
        <label>Digite o segundo número:</label><br>
        <input type="number" name="num2" /><br>
        <input type="submit" value="Enviar" /><br>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        if ($num1 == $num2){
            echo "$num1 é igual a $num2 <br>";
        }
        else{
            if ($num1 < $num2){
                echo "$num1 é menor do que $num2 <br>";
            }
            else{
                echo "$num1 é maior do que $num2 <br>";
            }
        }
    }
    ?>
<a href="index.php" target="_self">Voltar</a><br>
</body>
</html>