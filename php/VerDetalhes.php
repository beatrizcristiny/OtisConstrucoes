<?php

require_once 'conexao.php';

$id = $_GET['id'] ?? 0;

$sql = "SELECT equipamento.*, categoria.nome AS nome_categoria
        FROM equipamento
        INNER JOIN categoria
        ON equipamento.id_categoria = categoria.id_categoria
        WHERE equipamento.id_equipamento = $id";

$resultado = mysqli_query($conexao, $sql);

$equipamento = mysqli_fetch_assoc($resultado);


// Define o texto e as cores do status

if ($equipamento['status_q'] == 'EM_MANUTENCAO') {

    $texto_status = 'Em manutenção';

    $cor_texto = '#7a5a00';

    $cor_fundo = '#FFE69C';

    $largura_status = '110px';

} elseif ($equipamento['status_q'] == 'INDISPONIVEL') {

    $texto_status = 'Indisponível';

    $cor_texto = '#8a0000';

    $cor_fundo = '#FFB3B3';

    $largura_status = '100px';

} else {

    $texto_status = 'Disponível';

    $cor_texto = 'rgb(10, 75, 27)';

    $cor_fundo = '#8FEFB4';

    $largura_status = '90px';

}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/VerDetalhes.css">

    <title><?php echo $equipamento['nome']; ?> - Otis Construções</title>

</head>

<body>

    <header>

        <img class="otis" src="../img/logootis1.png" alt="Logo Otis Construções">

        <nav>

            <a href="../html/HomePage.html">Início</a>

            <a href="../php/Equipamentos.php">Equipamentos</a>

            <a href="../php/Categorias.php">Categorias</a>

            <a href="../html/SobreNos.html">Sobre Nós</a>

            <a href="../html/Contato.html">Contato</a>

            <a href="../php/Login.php">Entrar</a>

        </nav>

    </header>


    <main>

        <div class="detalhes">

            <?php

            if ($equipamento['nome'] == 'Betoneira 400L') {

                $imagem = 'betoneira.jpg';

            } elseif ($equipamento['nome'] == 'Compactador de Solo') {

                $imagem = 'compactador.jpg';

            } elseif ($equipamento['nome'] == 'Andaime Metálico') {

                $imagem = 'andaime.jpg';

            } elseif ($equipamento['nome'] == 'Gerador de Energia') {

                $imagem = 'gerador.jpg';

            } elseif ($equipamento['nome'] == 'Martelete Elétrico') {

                $imagem = 'martelete.jpg';

            } elseif ($equipamento['nome'] == 'Placa Vibratória') {

                $imagem = 'placa.png';

            }

            ?>


            <img class="betoneira-card"
                 src="../img/<?php echo $imagem; ?>"
                 alt="<?php echo $equipamento['nome']; ?>">


            <div class="informacoes">

                <h1>

                    <?php echo $equipamento['nome']; ?>

                </h1>


                <h2 class="categoria">

                    Categoria:
                    <?php echo $equipamento['nome_categoria']; ?>

                </h2>


                <h4 style="
                    color: <?php echo $cor_texto; ?>;
                    background-color: <?php echo $cor_fundo; ?>;
                    margin: 10px 10px 10px 0px;
                    font-size: 12px;
                    width: <?php echo $largura_status; ?>;
                    height: 22px;
                    text-align: center;
                    border-radius: 30px;
                    padding-top: 3.5px;
                ">

                    <?php echo $texto_status; ?>

                </h4>


                <p class="betoneira">

                    <?php echo $equipamento['descricao']; ?>

                </p>


                <div class="info-equipamento">

                    <h2>

                        Informações do equipamento

                    </h2>


                    <p>

                        <strong>Código:</strong>

                        EQ<?php echo str_pad($equipamento['id_equipamento'], 3, '0', STR_PAD_LEFT); ?>

                    </p>


                    <p>

                        <strong>Categoria:</strong>

                        <?php echo $equipamento['nome_categoria']; ?>

                    </p>


                    <p>

                        <strong>Status:</strong>

                        <?php echo $texto_status; ?>

                    </p>

                </div>


                <button class="solicitar" onclick="abrirFormulario()">

                    Solicitar Equipamento

                </button>


                <div id="formularioSolicitacao" class="formulario-container">

                    <div class="formulario-solicitacao">

                        <input type="text" placeholder="Nome">

                        <input type="date" placeholder="Data de retirada">

                        <input type="date" placeholder="Data de devolução">

                        <input type="text" placeholder="Finalidade da utilização">

                        <textarea placeholder="Observações"></textarea>


                        <button class="enviar-solicitacao" onclick="enviarSolicitacao()">

                            Enviar solicitação

                        </button>

                    </div>

                </div>


                <a class="voltar" href="Equipamentos.php">

                    Voltar para equipamentos

                </a>

            </div>

        </div>


        <script>

            function abrirFormulario() {

                document.getElementById("formularioSolicitacao").style.display = "block";

            }


            function enviarSolicitacao() {

                document.getElementById("formularioSolicitacao").style.display = "none";

                alert("Solicitação enviada com sucesso!");

            }

        </script>

    </main>


    <footer>

        <h2>OTIS CONSTRUÇÕES</h2>

        <div class="links">

            <a href="../html/HomePage.html">Início</a>

            <a href="../html/Equipamentos.html">Equipamentos</a>

            <a href="../html/Categorias.html">Categorias</a>

            <a href="../html/SobreNos.html">Sobre Nós</a>

            <a href="../html/Contato.html">Contato</a>

        </div>

        <hr>

        <p>

            © 2026 Otis Construções. Todos os direitos reservados.

        </p>

    </footer>

</body>

</html>