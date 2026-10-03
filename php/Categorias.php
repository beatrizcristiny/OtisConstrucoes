<?php
require_once 'conexao.php';

$sql = "SELECT * FROM categoria";
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Categorias.css">
    <title>Categorias da OtisConstruções</title>
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
    <article>
        <h3>CATÁLOGO / CATEGORIAS</h3>
        
        <h1>Categorias</h1>
        <p>
            Encontre equipamentos de acordo com o tipo de serviço e avance
            com mais clareza na sua obra.
        </p>
    </article>

<main>
    <h3 class="h3">ENCONTRE PELO SERVIÇO</h3>
    
    <h2>Do preparo do terreno ao acabamento.</h2>
    
    <p class="p">Escolha uma categoria para ver os equipamentos disponíveis e encontrar a solução mais prática para o seu projeto.</p>
    
   <div class="categoria-card"> 

<?php while ($categoria = mysqli_fetch_assoc($resultado)) { ?>

    <div class="card-categoria"> 

        <?php
        if ($categoria['nome'] == 'Construção') {
            $imagem = '06-categoria-construcao.jpg';
        } elseif ($categoria['nome'] == 'Concretagem') {
            $imagem = '02-betoneira-e-concretagem.jpg';
        } elseif ($categoria['nome'] == 'Terraplenagem') {
            $imagem = '03-compactador-e-terraplenagem.jpg';
        } elseif ($categoria['nome'] == 'Ferramentas') {
            $imagem = '04-martelete-e-ferramentas.jpg';
        } elseif ($categoria['nome'] == 'Elétrica') {
            $imagem = '07-categoria-eletrica.jpg';
        }
        ?>

        <img src="../img/<?php echo $imagem; ?>" alt="">

        <h3><?php echo $categoria['nome']; ?></h3>

        <p><?php echo $categoria['descricao']; ?></p>

        <a href="../html/Equipamentos.html">Ver equipamentos</a>

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