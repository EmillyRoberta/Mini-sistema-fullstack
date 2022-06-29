<script>
    function validaCadastro() {
        if (document.getElementById("nome").value === "" || document.getElementById("descricao").value === "" ||
            document.getElementById("dataInicio").value === "" || document.getElementById("dataFim").value === "" ||
            document.getElementById("tipoEvento").value === "" || document.getElementById("banner").value === "") {
            alert('Por favor, preencha todos os campos obrigatórios');
            return false
        }

    }
</script>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Cadastro</title>
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

            <h1>Cadastro</h1>

            <div class="formulario">
            <form name="cadEvento" method="POST" action="formdb.php" enctype="multipart/form-data" onsubmit="return validaCadastro(this)">

                <div class="input-size">
                    <label for="">Nome: </label> <br>
                    <input type="text" name="nome" id="nome"> <br><br>

                    <label for="">Data Inicio: </label><br>
                    <input type="date" name="dataInicio" id="dataInicio"> <br><br>

                    <label for="">Data de Encerramento: </label><br>
                    <input type="date" name="dataFim" id="dataFim"> <br><br>

                    <label for="">Tipo do Evento: </label><br>
                    <input type="text" name="tipoEvento" id="tipoEvento"> <br><br>

                    <label for="">Descrição: </label><br>
                    <textarea type="text" name="descricao" id="descricao" rows="5" cols="65"></textarea> <br><br>

                    <label for="">Banner: </label><br>
                    <!-- <input type="text" name="banner" id="banner"> <br><br> -->
                    <input name="banner" type="file" accept="image/*">


                </div>

                <label>Possui: </label><br>

                <input type="checkbox" name="wifi" value="1">
                <label for=""> WIFI </label><br>

                <input type="checkbox" name="estacionamento" value="1">
                <label for=""> Estacionamento </label><br>

                <input type="checkbox" name="bebida" value="1">
                <label for=""> Bebida Grátis</label><br><br>
                </div>
                <div class="button-enviar"><input type="submit" value="Cadastrar"></div>
                
        </div>
    </div>
    </form>

</body>



</html>