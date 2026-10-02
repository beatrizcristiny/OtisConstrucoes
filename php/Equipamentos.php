<?php
require_once 'conexao.php';

$sql = "SELECT * FROM equipamento";
$resultado = mysqli_query($conexao, $sql);
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Equipamentos.css">
    <title>Nossos Esquipamentos</title>
</head>
<body>
    <header>
        <img class="otis" src="../img/logootis1.png" alt="">

        <nav>
            <a href="../html/HomePage.html">Início</a>
            <a href="../html/Equipamentos.html">Equipamentos</a>
            <a href="../html/Categorias.html">Categorias</a>
            <a href="../html/SobreNos.html">Sobre Nós</a>
            <a href="../html/Contato.html">Contato</a>
            <a href="../html/Login.html">Entrar</a>
        </nav>

        <h2>Nossos Equipamentos</h2>
        <p>
            Encontre os equipamentos ideais para sua obra.
        </p>
        
       
        
        <input type="text" placeholder="Pesquisar equipamento...">
        <button class="pesquisar">Pesquisar</button>
        
        
        
        <div class="filtros">
     <button class="filtrosb">Todos</button>
    <span>|</span>
    <button class="filtrosb">Construção</button>
    <span>|</span>
    <button class="filtrosb">Concretagem</button>
    <span>|</span>
    <button class="filtrosb">Terraplenagem</button>
    <span>|</span>
    <button class="filtrosb">Ferramentas</button>
        </div>
    </header>

<main>
   <div class="equipamentos">

<?php while ($equipamento = mysqli_fetch_assoc($resultado)) { ?>

    <div class="card-equipamento">

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

        <img src="../img/<?php echo $imagem; ?>" alt="">

        <h2><?php echo $equipamento['nome']; ?></h2>

        <?php
        $id_categoria = $equipamento['id_categoria'];

        $sql_categoria = "SELECT nome FROM categoria WHERE id_categoria = $id_categoria";
        $resultado_categoria = mysqli_query($conexao, $sql_categoria);
        $categoria = mysqli_fetch_assoc($resultado_categoria);
        ?>

        <h3>Categoria: <?php echo $categoria['nome']; ?></h3>

        <p><?php echo $equipamento['descricao']; ?></p>

        <h4><?php echo $equipamento['status_q']; ?></h4>

        <a class="details" href="../html/VerDetalhes.html">Ver detalhes</a>

    </div>

<?php } ?>

</div>
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