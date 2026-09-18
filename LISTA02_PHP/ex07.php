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
        <input type="number" name="num" /><br>
        <label>Digite o segundo número:</label><br>
        <input type="number" name="num2" /><br>
        <label>Digite o terceiro número:</label><br>
        <input type="number" name="num3" /><br>
        <input type="submit" value="Enviar" /><br>
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $num = $_POST["num"];
            $num2 = $_POST["num2"];
            $num3 = $_POST["num3"];
            if ($num > $num2 && $num > $num3){
                echo "$num é o maior número<br>";
            }
            else{
                if($num2 > $num && $num2 > $num3){
                    echo "$num2 é o maior número<br>";
                }
                else{
                    echo "$num3 é o maior número<br>";
                }
            }
        }
    ?>
<a href="index.php" target="_self">Voltar</a><br>
</body>
</html>