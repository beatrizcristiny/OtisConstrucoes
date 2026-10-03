<?php
require_once 'conexao.php';

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuario WHERE email = ? AND senha = ?";

    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, "ss", $email, $senha);

    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) > 0) {

        header("Location: ../html/HomePage.html");
        exit;

    } else {

        $mensagem = "E-mail ou senha incorretos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Login.css">
    <title>Login</title>
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

        <div class="card-login">

            <img src="../img/make-logo-black.png" alt="">

            <h2><span>——</span>Área do cliente</h2>

            <h3 class="entrar">Entrar</h3>

            <p>Acesse seu espaço para acompanhar solicitações e locações</p>

            <form method="POST">

                <div class="campo">

                    <h3>E-mail</h3>

                    <input
                        type="email"
                        name="email"
                        placeholder="Seu email"
                        required
                    >

                </div>

                <div class="campo">

                    <h3>Senha</h3>

                    <input
                        type="password"
                        name="senha"
                        placeholder="Sua senha"
                        required
                    >

                    <label>
                        <input type="checkbox" name="remember" checked>
                        Lembrar-me
                    </label>

                    <p>Esqueci minha senha</p>

                    <?php if ($mensagem != "") { ?>

                        <div class="mensagem-erro">
                            <?php echo $mensagem; ?>
                        </div>

                    <?php } ?>

                    <button class="botao" type="submit">
                        Entrar
                    </button>

                    <h4>
                        Ainda não tem uma conta?
                        <a class="conta" href="#">Criar uma conta</a>
                    </h4>

                </div>

            </form>

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