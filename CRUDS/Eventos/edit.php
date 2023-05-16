<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body> 
       
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form action="update.php" method="POST">

<?php
//pegar a chave primária via GET
$ID_Evento = $_GET['ID_Evento'];

//buscar as informações deste objeto no Sgbd(MySql)
//conectar com o banco de dados 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conexao = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conexao->prepare("SELECT * FROM Eventos where ID_Evento = ? ");
($stmt->execute(array($ID_Evento)));

        //criar o objeto $p1
        include './Evento.php';
        $p1 = new Evento();


while ($retorno_sql = $stmt->fetch(PDO::FETCH_OBJ)) {
        $p1->setIDEvento($retorno_sql->ID_Evento);   
        $p1->setNome($retorno_sql->nome);
        $p1->setData($retorno_sql->data);
        $p1->setValorFotos($retorno_sql->valor_fotos);    
}


?>
    
  <input type="hidden" name ="id_evento" id="id_evento"
         value="<?php echo $p1->getIDEvento()?>">  
  
  <div class="form-group">
    <label for="nome">Nome do Evento</label> 
    <input id="nome" name="nome" 
           value ="<?php echo $p1->getNome()?>"        
    type="text" required="required" class="form-control">
  </div>
  <div class="form-group">
    <label for="data">Data</label> 
    <input id="data" name="data" type="text" required="required" 
           value ="<?php echo $p1->getData()?>"
           class="form-control">
  </div>
  <div class="form-group">
    <label for="valor_fotos">Valor das Fotos</label> 
    <input id="valor_fotos" name="valor_fotos" type="text" required="required" 
           value ="<?php echo $p1->getValorFotos()?>"
           class="form-control">
  </div>
  <div class="form-group">
    <button name="submit" type="submit" class="btn btn-primary">Editar Evento</button>
   
  </div>
</form>
        
        
        

    </body>
</html>

