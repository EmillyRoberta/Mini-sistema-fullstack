<?php
session_start();
ob_start();

include('connect.inc.php');


$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$dataInicio = $_POST['dataInicio'];
$dataFim = $_POST['dataFim'];
$tipoEvento = $_POST['tipoEvento'];


function verificaConexao($conn, $insere)
{
    if ($conn->query($insere) === TRUE) {
        $_SESSION['mensagem'] =  "<p style='color:green;'>Novo evento criado com sucesso!</p>";
        header("Location: listaEventos.php ");
    } else {
        echo "Error: " . $insere . "<br>" . $conn->error;
    }
}

if (isset($_FILES['banner'])) {
    $banner = $_FILES['banner'];
}


if (isset($_POST['wifi']) || isset($_POST['estacionamento']) || isset($_POST['bebida'])) {


    if (!isset($_POST['wifi'])) {
        $wifi = 2;
    } else {
        $wifi = $_POST['wifi'];
    }

    if (!isset($_POST['estacionamento'])) {
        $estacionamento = 2;
    } else {
        $estacionamento = $_POST['estacionamento'];
    }

    if (!isset($_POST['bebida'])) {
        $bebida = 2;
    } else {
        $bebida = $_POST['bebida'];
    }
} else {
    $wifi = 2;
    $estacionamento = 2;
    $bebida = 2;
}


if (
    $nome != null && $descricao != null && $dataInicio != null && $dataFim != null
    && $tipoEvento != null
) {

    if (!empty($banner['name'])) {
        $largura = 150;
        $altura = 180;
        $tamanho = 1000;

        $error = array();



        $dimensoes = getimagesize($banner["tmp_name"]);

        try {
            if (is_bool($dimensoes)) {
                throw new Exception('');
            } else {
                if ($dimensoes[0] > $largura) {
                    $_SESSION['mensagem'] =  "<p style='color:red;'>Falha ao tentar inserir a imagem, A largura da imagem não deve ultrapassar  . $largura .  pixels </p>";
                    header("Location: listaEventos.php ");
                    $error[2] = "A largura da imagem não deve ultrapassar " . $largura . " pixels";
                }
                // Verifica se a altura da imagem é maior que a altura permitida
                if ($dimensoes[1] > $altura) {
                    $_SESSION['mensagem'] =  "<p style='color:red;'>Falha ao tentar inserir a imagem, A largura da imagem não deve ultrapassar  . $altura .  pixels </p>";
                    header("Location: listaEventos.php ");
                    $error[3] = "Altura da imagem não deve ultrapassar " . $altura . " pixels";
                }

                // Verifica se o tamanho da imagem é maior que o tamanho permitido
                if ($imagem["size"] > $tamanho) {
                    $_SESSION['mensagem'] =  "<p style='color:red;'>Falha ao tentar inserir a imagem, A imagem deve ter nno máximo $tamanho bytes. </p>";
                    header("Location: listaEventos.php ");
                    $error[4] = "A imagem deve ter no máximo " . $tamanho . " bytes";
                }
            }
        } catch (Exception $ex) {
            $error[1] = "Isso não é uma imagem.";
            //faz alguma coisa útil
        }



        if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $banner["type"])) {
            $_SESSION['mensagem'] =  "<p style='color:red;'>Falha ao tentar inserir a imagem, insira uma imagem .png, .jpeg!</p>";
            header("Location: listaEventos.php ");
        } else {
            // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $banner["name"], $ext);
            // Gera um nome único para a imagem
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
            // Caminho de onde ficará a imagem
            $caminho_imagem = "fotos/" . $nome_imagem;
            // Faz o upload da imagem para seu respectivo caminho
            move_uploaded_file($banner["tmp_name"], $caminho_imagem);
            $insereEvento = "INSERT INTO evento (nome, descricao, dataInicio, dataFim, tipoEvento, banner, wifi, estacionamento, bebida)
                         VALUES ('$nome', '$descricao', '$dataInicio', '$dataFim', '$tipoEvento', '$nome_imagem', '$wifi', '$estacionamento', '$bebida')";


            verificaConexao($conn, $insereEvento);
        }
    }
} else {
    echo ("dados não inseridos corretamente");
}
