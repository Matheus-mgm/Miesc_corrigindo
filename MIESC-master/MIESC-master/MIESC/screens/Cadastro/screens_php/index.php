<?php
global $conexao;
require_once 'password.php';
session_start();

include('../conexao.php');

$loginError = "";
$email = "";

if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    $email = $conexao->real_escape_string($_POST['usuario']);
    $senha = $conexao->real_escape_string($_POST['senha']);

    $sql_code = "SELECT * FROM administrador WHERE email = '$email' LIMIT 1";
    $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL:" . $conexao->error);

    if ($sql_query->num_rows == 1) {
        $administrador = $sql_query->fetch_assoc();
        $senha_hash = $administrador['senha'];
        $status_pedido = $administrador['status_pedido'];

       if (password_verify($senha, $senha_hash)) {
    if ($status_pedido == 'pendente') {
        $loginError = "Seu pedido de cadastro está pendente. Aguarde aprovação.";
    } elseif ($status_pedido == 'negado') {
        $loginError = "Seu pedido de cadastro foi negado.";
    } elseif ($status_pedido == 'aprovado') {
        $_SESSION['idadministrador'] = $administrador['idadministrador'];
        $_SESSION['nome'] = $administrador['nome'];
        $_SESSION['is_admin_central'] = $administrador['is_admin_central'];

        // Certifique-se de que is_admin_central é numérico no banco de dados
        if ($_SESSION['is_admin_central'] == 1) {
            header("Location: gerenciar_pedidos.php");
            exit;
        } else {
            header("Location: ../Site mercury home e about/htmls/home adm.html");
            exit;
        }
    }
        } else {
            $loginError = "Senha incorreta";
        }
        } else {
            // Se não for um administrador, verifique se é um usuário
            $sql_code_usuario = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
            $sql_query_usuario = $conexao->query($sql_code_usuario) or die("Falha na execução do código SQL:" . $conexao->error);

            if ($sql_query_usuario->num_rows == 1) {
                $usuario = $sql_query_usuario->fetch_assoc();
                $senha_hash_usuario = $usuario['senha'];

                if (password_verify($senha, $senha_hash_usuario)) {
                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['nome'] = $usuario['nome'];
                    header("Location: ../landing page/htmls/sarau.html");
                    exit; // Encerre o script após o redirecionamento
                } else {
                    $loginError = "Senha incorreta";
                }
            } else {
                $loginError = "E-mail não encontrado";
            }
        }
    }

?>



<!-- Adicione aqui o restante do seu formulário de login HTML, bem como a exibição de mensagens de erro, etc. -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../../imagens/img_gerais/icone_miesc.png">
    <title>Entre</title>
    <style>
          body{
        margin: 0%;
        font-family: Arial, Helvetica, sans-serif;
       } 
       .main-login{
        width: 100vw;
        height: 100vh; 
        background-color:#0E3659;
        display:flex;
        justify-content: center;
        align-items: center;
       }
       .left-login{
        width:50vw;
        height: 100vh;
        display:flex;
        justify-content: center;
        align-items: center;
        flex-direction:column;
       }
       .left-login > h1{
        color: #D99923;
       }
       .right-login{
        width:50vw;
        height: 100vh;
        display:flex;
        justify-content: center;
        align-items: center;
       }
       .card-login{
        width: 35%;
        display:flex;
        justify-content: center;
        align-items: center;
        flex-direction:column;
        padding: 30px, 35px;
        background:#018DB5 ;
        border-radius: 20px;
        box-shadow: 50px 50px 50px #00000056;
       }
       .card-login > h1{
        color: rgb(7, 19, 68);
        font-weight:800;
        margin: 0;
       }
       .textfield{
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        margin:10px 0px;
       }
       .textfield > input{
        margin-left: 0; 
        width:120%;
        border: none;
        border-radius: 40px;
        padding: 20px;
        background:#43b1cf;
        color:#f0ffffde;
        font-size:12pt;
        box-shadow: 0px, 10px, 40px #00000056;
        outline: none;
        box-sizing: border-box;
       }
       .textfield > label{
        font-size: 20px;
        color:#f0ffffde;
        margin-bottom: 10px;
       }
       .textfield > input::placeholder{
          color: rgb(39, 53, 180);
       }

       .password-container {
        position: relative;
        width:100%;
        
       }

        #passwordInput {
         width:120%;
         border: none;
         border-radius: 40px;
         padding: 20px;
         background:#43b1cf;
         color:#f0ffffde;
         font-size:12pt;
         box-shadow: 0px, 10px, 40px #00000056;
         outline: none;
        box-sizing: border-box;
        position: relative;
       }

        #showHideButton {
         position: absolute;
         right: -40px;
         top: 80%;
         transform: translateY(-50%);
         background-color: transparent;
         border: none;
         border-radius: 40px;
         
       }

       #submit{
        background-image: linear-gradient(to right, #076079, #6b3fa0);  
        width: 120%;
        border: none;
        padding: 15px;
        color: white;
        font-size: 15px;
        cursor: pointer;
        border-radius: 25px; 
        letter-spacing: 2px;
        font-weight: 800;
    }
    #submit:hover{
        background-image: linear-gradient(to right,#664300, #FFD700);
    }

        /* Outros estilos CSS como antes */

        .error-message {
            color: #FF0000; /* Cor vermelha para mensagens de erro */
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="main-login">
    <?php include('../../../Components/links_header.php'); ?>
    <div class="left-login">
        <h1>Venha para o nosso time<br><br>ENTRE</h1>
        <img src="../../../imagens/img_cadastro/miesc_site-removebg-preview.png">
    </div>
    <div class="card-login">
    <h1>ENTRE</h1>
   <form action="" method="POST">
                <!-- Se houver uma mensagem de erro, exiba-a aqui -->
                <?php if (!empty($loginError)) : ?>
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i> <!-- Ícone de alerta -->
                        <?php echo $loginError; ?>
            </div>
                <?php endif; ?>
                <div class="textfield">
                    <label for="usuario">Usuário</label>
                    <input type="text" name="usuario" placeholder="Usuário">
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <div class="password-container">
                        <input type="password" name="senha" id="passwordInput" placeholder="Senha">
                        <button id="showHideButton" type="button" onclick="togglePasswordVisibility()">Mostrar Senha</button>
                    </div>
                </div>
                <p>Ainda não tem uma conta?<a href="cadastro.php">Criar conta</a></p>
                <a href="esqueceu_sua_senha/esqueceu_senha.php">Esqueceu sua senha?</a>
                <br><br>
                <input type="submit" name="submit" id="submit" value="Enviar">
                <br>
                <input type="hidden" name="tipoUsuario" id="tipoUsuario" value="">
            </form>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById("passwordInput");
        const showHideButton = document.getElementById("showHideButton");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            showHideButton.textContent = "Esconder Senha";
        } else {
            passwordInput.type = "password";
            showHideButton.textContent = "Mostrar Senha";
        }
    }
</script>
</body>
</html>
