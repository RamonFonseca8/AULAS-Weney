<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
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
        if ($num == 10){
            echo "$num é igual a 10";
        }
        else{
            if ($num < 10){
                echo "$num é menor do que 10";
            }
            else{
                echo "$num é maior do que 10";
            }
        }
    }
    ?>
</body>
</html>