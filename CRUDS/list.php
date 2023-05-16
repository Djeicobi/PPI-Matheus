<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listar Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>




<?php
//conectar com o banco de dados 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conexao = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conexao->prepare("SELECT * FROM Eventos");
$stmt->execute();

echo '<table class=  "table table-bordered">';
$i=0;
while ($retorno_sql = $stmt->fetch(PDO::FETCH_OBJ)) {
            
    echo '<tr>';//abre a linha
          echo '<td> '.$retorno_sql->ID_Evento.'   </td>';  //primeira coluna
          echo '<td> '.$retorno_sql->nome.' </td>';         //segunda coluna
          echo '<td> '.$retorno_sql->data.' </td>';         //terceira coluna
          echo '<td> '.$retorno_sql->valor_fotos.' </td>';  //quarta coluna
          echo '<td> <a href="excluir.php?ID_Evento='.$retorno_sql->ID_Evento.'">Excluir</a> </td>';
          echo '<td> <a href="editar.php?ID_Evento='.$retorno_sql->ID_Evento.'">Editar  </td>';
          
    echo '</tr>';//fecha a linha
    

    //var_dump($listar);
}
echo '</table>';

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
