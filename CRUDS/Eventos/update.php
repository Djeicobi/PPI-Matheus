<?php
        //pegar os dados do formulário
        $ID_Evento = $_POST['ID_Evento'];
        $nome = $_POST['nome'];
        $data = $_POST['data'];
        $valor_fotos = $_POST['valor_fotos'];
        

        //criar o objeto $p1
        include './Eventos.php';
        $p1 = new Evento();
        $p1->setIDEvento($ID_Evento);
        $p1->setNome($nome);
        $p1->setData($data);
        $p1->setValorFotos($valor_fotos);

        //conectar com o banco de dados 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        try {
            $conexao = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conexao->prepare("update Eventos set nome = ?, "
                                        . "data = ? , "
                                        . "valor_fotos = ? where ID_Evento = ? ");

            if ($stmt->execute(array($p1->getIDEvento(),     //primeira ?
                                     $p1->getNome(),         //segunda  ?
                                     $p1->getData(),         //terceira ?
                                     $p1->getValorFotos()))) //quarta ? 
            {                   
                echo '<!doctype html>
<html lang="en">
  <head>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    Operação realizada com sucesso
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
';
            }  
        
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
//limpar a conexão
        $conn = null;
        ?>

   </body>
</html>