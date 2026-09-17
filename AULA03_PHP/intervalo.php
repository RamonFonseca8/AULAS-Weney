<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Par ou Impar</title>
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
            if ($num <= 20 && $num >= 10){
                echo "Está no intervalo entre 10 e 20";
            }else{
                echo "Não está no intervalo entre 10 e 20";
            }
        }
    ?>
    </body>
</html>