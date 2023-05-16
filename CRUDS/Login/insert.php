<?php
        //pegar os dados do formulário
        $nome = $_POST['nome'];
        $data = $_POST['data'];
        $valor_fotos = $_POST['valor_fotos'];

        //criar o objeto $p1
        include './Eventos.php';
        $p1 = new Evento();
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

            $stmt = $conexao->prepare("INSERT INTO Eventos (nome, data, valor_fotos) VALUES (?, ?, ?)");

            if ($stmt->execute(array($p1->getNome(), $p1->getData(),$p1->getValorFotos()))) {
                echo 
' <!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fotografia Esportiva</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>

    <!-- Cards -->

    <div class="container text-center event-grid ">
      <div class="row g-0">
        <div class="col d-flex justify-content-center col-md-4">
          <div class="card" style="width: 18rem;">
            <img src="\imagens\bg2.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Misiones 2022</h5>
              <p class="card-text">12/10/2022</p>
              <a href="#" class="btn btn-primary stretched-link">Ver Evento</a>
            </div>
          </div>
        </div>
        <div class="col d-flex justify-content-center col-md-4">
          <div class="card" style="width: 18rem;">
            <img src="\imagens\bg6.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Misiones 2022</h5>
              <p class="card-text">12/10/2022</p>
              <a href="#" class="btn btn-primary stretched-link">Ver Evento</a>
            </div>
          </div>
        </div>
        <div class="col d-flex justify-content-center col-md-4">
          <div class="card" style="width: 18rem;">
            <img src="\imagens\bg9.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Misiones 2022</h5>
              <p class="card-text">12/10/2022</p>
              <a href="#" class="btn btn-primary stretched-link">Ver Evento</a>
            </div>
          </div>
        </div>
        <div class="col d-flex justify-content-center col-md-4">
          <div class="card" style="width: 18rem;">
            <img src="\imagens\bg2.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Misiones 2022</h5>
              <p class="card-text">12/10/2022</p>
              <a href="#" class="btn btn-primary stretched-link">Ver Evento</a>
            </div>
          </div>
        </div>
        <div class="col d-flex justify-content-center col-md-4">
          <div class="card" style="width: 18rem;">
            <img src="\imagens\bg6.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Misiones 2022</h5>
              <p class="card-text">12/10/2022</p>
              <a href="#" class="btn btn-primary stretched-link">Ver Evento</a>
            </div>
          </div>
        </div>
        <div class="col d-flex justify-content-center col-md-4">
          <div class="card" style="width: 18rem;">
            <img src="\imagens\bg9.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Misiones 2022</h5>
              <p class="card-text">12/10/2022</p>
              <a href="#" class="btn btn-primary stretched-link">Ver Evento</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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