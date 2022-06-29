<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Lista de Eventos</title>
</head>

<body>

    <Nav>
        <div class="logo">Eventos &#9734</div>

        <div class="links">
            <a href="cadastro.php">Cadastrar Evento</a>&nbsp; &nbsp; &nbsp; &nbsp;

            <a href="listaEventos.php">Lista de Eventos</a>&nbsp; &nbsp; &nbsp; &nbsp;
        </div>
    </Nav>

    <div class="content">
        <div class="card"> 
            

    <h1>Detalhes do Evento</h1> <br>
    <div class="list">
    <?php
    session_start();
    if(isset($_SESSION['mensagem'])){
        echo $_SESSION['mensagem'];
        unset($_SESSION['mensagem']);
    }
    include("connect.inc.php");

    function data($data){
        return date("d/m/Y", strtotime($data));
    }

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

    if(!empty($id)){
        $query_evento = "SELECT id, nome, descricao, dataInicio, dataFim, tipoEvento, banner, wifi, estacionamento, bebida FROM evento WHERE id=$id LIMIT 1";
        $result_evento = $conn->query($query_evento);
        // $result_evento->bind_param(':id', $id);
        // $result_evento->execute();

        $row_evento = $result_evento->fetch_assoc();
        // var_dump($row_evento);
        extract($row_evento);

        echo "<img src='fotos/$banner' alt='foto do banner'/> <br>";
        echo "<h2> $nome </h2>";
        echo "<p>$descricao</p>";
        echo "<b>Data do Evento:</b> ";
        echo  data($dataInicio);
        echo "<br>";
        echo "<b>Data do Término:</b> ";
        echo  data($dataFim);
        echo "<br>";
        echo "<b>Tipo Evento:</b> $tipoEvento <br>";

        // echo "<img src='fotos/$banner' alt='foto do banner'/> <br>";
        // echo "<h2> $nome </h2>";
        // echo "<p>$descricao</p>";
        // echo "<b>Data do Evento:</b> ";
        // echo  data($dataInicio);
        // echo "<br>";
        // echo "<br><button><img src='./img/add.png'><a href='detalhes.php?id=$id'>&nbspsaiba mais</a></button>";
        // echo "<hr>";
        // echo "<br>";


        if($wifi == 1){
            echo "<b>Wifi:</b> Sim <br>";
        }else{
            echo "<b>Wifi:</b> Não <br>";
        }

        if($estacionamento == 1){
            echo "<b>Estacionamento:</b> Sim <br>";
        }else{
            echo "<b>Estacionamento:</b> Não <br>";
        }

        if($bebida == 1){
            echo "<b>Bebida Grátis:</b> Sim <br>";
        }else{
            echo "<b>Bebida Grátis:</b> Não <br>";
        }

    }else{
        echo("<h1 style='color:#f00;>Pagina não encontrada</h1>");
        header("Location: listaEventos.php");

    }
    ?>
    </div>
    <div class="botao">
    <button>
        <img src="./img/back.png">
        <a href="listaEventos.php"> Lista de Eventos </a>
    </button>
    </div>
        </div>
    </div>
</body>

</html>