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
            

    <h1>Lista De Eventos</h1> <br>
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

    $pagina_atual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
    
    $pagina = (!empty( $pagina_atual)) ? $pagina_atual : 1;

    $limite_resultado = 2;

    $inicio = ($limite_resultado * $pagina) - $limite_resultado;


    $query_eventos = "SELECT id, nome, descricao, dataInicio, dataFim, tipoEvento, banner, wifi, estacionamento, bebida FROM evento LIMIT $inicio, $limite_resultado";
    $result_eventos = $conn->query($query_eventos);

    if(($result_eventos) AND ($result_eventos->num_rows != 0)){
        while($evento = $result_eventos->fetch_assoc()){
            extract($evento);

            echo "<img src='fotos/$banner' alt='foto do banner'/> <br>";
            echo "<h2> $nome </h2>";
            echo "<p>$descricao</p>";
            echo "<b>Data do Evento:</b> ";
            echo  data($dataInicio);
            echo "<br>";
            echo "<br><button><img src='./img/add.png'><a href='detalhes.php?id=$id'>&nbspsaiba mais</a></button>";
            echo "<hr>";
            echo "<br>";

        }
        //quantidade de registros no bd
        $quantidade_reg = "SELECT COUNT(id) AS num_result FROM evento";
        $result_quantidade_reg = $conn->query($quantidade_reg);
        $row_quantidade_reg = $result_quantidade_reg->fetch_assoc();

        //quantidade de pagina
        $quantidade_pag = ceil($row_quantidade_reg['num_result'] / $limite_resultado);

        $total = 2; //maximo link

        echo "<div style='text-align: center;'><a href='listaEventos.php?page=1' style='text-decoration:none;color:#F05537;background-color:#ebebeb'>Primeira</a> ";

        for($pagina_anterior =  $pagina - $total; $pagina_anterior<= $pagina -1; $pagina_anterior++){
            if($pagina_anterior >= 1){
                echo "<a href='listaEventos.php?page=$pagina_anterior' style='text-decoration:none;color:#F05537;background-color:#ebebeb'>$pagina_anterior&nbsp&nbsp </a> ";
        }
    }
        echo "<a href='#' style='text-decoration:none;color:#F05537;background-color:#ebebeb'>$pagina</a>";

        for($proxima_pagina = $pagina + 1; $proxima_pagina <= $pagina + $total; $proxima_pagina++){
            if($proxima_pagina <= $quantidade_pag){
                echo "<a href='listaEventos.php?page=$proxima_pagina' style='text-decoration:none;color:#F05537;background-color:#ebebeb'>&nbsp$proxima_pagina&nbsp</a> ";
            }
           
        }

        echo "<a href='listaEventos.php?page=$quantidade_pag' style='text-decoration:none;color:#F05537;background-color:#ebebeb'> Última</a> </div>";

    }else{
        echo("nenhum evento cadastrado");
    }
    
    ?>
    </div>
        </div>
    </div>
</body>

</html>