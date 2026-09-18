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
        <label>Digite um número:</label><br>
        <input type="number" name="num" /><br>
        <input type="submit" value="Enviar" /><br>
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $num = $_POST["num"];
            if ($num % 2 == 0){
                echo "$num é par!<br>";
            }else{
                echo "$num é impar!<br>";
            }
        }
    ?>
<a href="index.php" target="_self">Voltar</a><br>
</body>
</html>