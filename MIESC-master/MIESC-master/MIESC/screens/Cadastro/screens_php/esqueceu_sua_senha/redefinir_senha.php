<?php
global $conexao, $conexao;
require_once '../password.php';

include_once('../../conexao.php');

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
$pergunta1 = isset($_GET['pergunta1']) ? utf8_encode(urldecode($_GET['pergunta1'])) : '';
$email = isset($_GET['email']) ? urldecode($_GET['email']) : '';

// Initialize $perguntaNoBanco to avoid "Undefined variable" notice
$perguntaNoBanco = '';

if ($tipo === "administrador") {
    $sql = "UPDATE administrador SET pergunta1 = '$pergunta1' WHERE email = '$email'";
} elseif ($tipo === "usuarios") {
    $sql = "UPDATE usuarios SET pergunta1 = '$pergunta1' WHERE email = '$email'";
}

// Consulta SQL para obter a pergunta de segurança associada ao usuário
$consultaPerguntaUsuarios = "SELECT pergunta1 FROM usuarios WHERE email = '$email'";
$consultaPerguntaAdmin = "SELECT pergunta1 FROM administrador WHERE email = '$email'";

$resultadoConsultaUsuarios = $conexao->query($consultaPerguntaUsuarios);
$resultadoConsultaAdmin = $conexao->query($consultaPerguntaAdmin);

if ($resultadoConsultaUsuarios && $resultadoConsultaUsuarios->num_rows > 0) {
    $linha = $resultadoConsultaUsuarios->fetch_assoc();
    $perguntaNoBanco = utf8_decode($linha['pergunta1']);
} elseif ($resultadoConsultaAdmin && $resultadoConsultaAdmin->num_rows > 0) {
    $linha = $resultadoConsultaAdmin->fetch_assoc();
    $perguntaNoBanco = utf8_decode($linha['pergunta1']);
}

if (strcasecmp($pergunta1, $perguntaNoBanco) == 0) {
    echo "Pergunta1: " . urldecode($perguntaNoBanco) . "<br>";
} else {
//echo '<div class="error-message"><i class="fas fa-exclamation-circle"></i> Pergunta de segurança incorreta.</div>';
}
?>

        <!DOCTYPE html>
        <html>
        <head>
        <meta charset="UTF-8">
            <link rel="icon" type="image/x-icon" href="../../Site mercury home e about/img/icone miesc.png">
            <title>Redefinir Sua Senha</title>
            <style>
                body {
                    font-family: Arial, Helvetica, sans-serif;
                    background-image: linear-gradient(to right, #018DB5, #0E3659);
                }

                .caixa {
                    color: white;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    background-color: rgba(0, 0, 0, 0.4);
                    padding: 15px;
                    border-radius: 15px;
                    width: 35%;
                }

                .caixa h1 {
                    margin: 0;
                    text-align: center;
                }

                .caixa input {
                    width: 70%;
                }

                #submit {
                    background-image: linear-gradient(to right, #664300, #FFD700);
                    width: 100%;
                    border: none;
                    padding: 15px;
                    color: white;
                    font-size: 15px;
                    cursor: pointer;
                    border-radius: 10px;
                }

                #submit:hover {
                    background-image: linear-gradient(to right, #018DB5, #6b3fa0);
                }

                /* Estilo para rótulos e campos de entrada */
                .label-input {
                    display: block;
                    margin: 10px 0;
                }
            </style>
        </head>
        <body>
            <div class="caixa">
                <h1>Redefinir Sua Senha</h1>
                <br>
                <?php
                
                //echo "Email: " . urldecode($email) . "<br>";
                echo "Pergunta de segurança: " . urldecode($perguntaNoBanco) . "<br>";
                ?>

                <form method="post" action="atualizar_senha.php">
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <input type="hidden" name="pergunta1" value="<?php echo $perguntaNoBanco; ?>">

                    <!-- Estilize os rótulos e campos de entrada com a classe label-input -->
                    <label for="resposta1" class="label-input">Resposta à Pergunta:</label>
                    <input type="text" name="resposta1" id="resposta1" required>

                    <label for="nova_senha" class="label-input">Nova Senha:</label>
                    <input type="password" name="nova_senha" id="nova_senha" required>

                    <label for="confirma_senha" class="label-input">Confirme a Nova Senha:</label>
                    <input type="password" name="confirma_senha" id="confirma_senha" required>
                    <br><br>

                    <input type="submit" name="submit" id="submit" value="Atualizar Senha">
                </form>
            </div>
        </body>
        </html>
