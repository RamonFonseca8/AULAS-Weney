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
        <label>Digite o seu nome:</label><br>
        <input type="text" name="nome" required/><br>
        <label>Digite sua idade:</label><br>
        <input type="number" name="num" required/><br>
        <input type="submit" value="Enviar"><br>
     </form> 
  <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome= $_POST["nome"];
        $num= $_POST["num"]; 
        
        if($num >= 18){
            echo "O $nome pode dirigir e votar<br>";
                        
        }else{
            echo "O $nome não pode dirigir e não pode votar<br>";
        }
    }  
    ?>
<a href="index.php" target="_self">Voltar</a><br>
</body>
</html>