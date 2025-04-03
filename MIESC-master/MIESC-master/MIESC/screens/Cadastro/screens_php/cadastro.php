<?php
global $conexao;
require_once 'password.php';
include_once('../conexao.php');

if (isset($_POST['submit'])) {
    $escolha = $_POST['escolha'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($conexao->real_escape_string($_POST['senha']), PASSWORD_DEFAULT);
    $sexo = $_POST['genero'];
    $turma = $_POST['turma'];
	$pergunta1 = $_POST['pergunta1'];
    $resposta1 = password_hash($conexao->real_escape_string($_POST['resposta1']), PASSWORD_DEFAULT);
	
    // Verificar se o e-mail é válido e pertence ao domínio correto
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="error-message"><i class="fas fa-exclamation-circle"></i> Por favor, use um e-mail válido</div>';
    } elseif (strpos($email, "@etec.sp.gov.br") === false) {
        echo '<div class="error-message"><i class="fas fa-exclamation-circle"></i> Por favor, use um e-mail que termine com @etec.sp.gov.br</div>';
    } else {
        // Verificar se o e-mail já está cadastrado
        $checkEmailQuery = "SELECT * FROM usuarios WHERE email = '$email'";
        $checkEmailResult = mysqli_query($conexao, $checkEmailQuery);

        if (mysqli_num_rows($checkEmailResult) > 0) {
            echo '<div class="error-message"><i class="fas fa-exclamation-circle"></i> Este e-mail já está cadastrado.</div>';
        } else {
            // Adicionar o usuário ao banco de dados
            if ($escolha == "Administrador") {
                // Adicionar colunas à tabela existente 'administrador' para armazenar pedidos
                $result = mysqli_query($conexao, "INSERT INTO administrador (escolha, nome, email, senha, sexo, turma, status_pedido,  pergunta1, resposta1)
                    VALUES ('$escolha', '$nome', '$email', '$senha', '$sexo', '$turma', 'pendente','$pergunta1', '$resposta1')");

                if ($result) {
                    header('Location: index.php');
                } else {
                    echo '<div class="error-message"><i class="fas fa-exclamation-circle"></i> Erro ao registrar o pedido de cadastro de administrador</div>';
                }
            } else {
                $table = 'usuarios';

                $pergunta1 = $_POST['pergunta1'];
                $resposta1 = password_hash($conexao->real_escape_string($_POST['resposta1']), PASSWORD_DEFAULT);

                $insertQuery = "INSERT INTO $table (escolha, nome, email, senha, sexo, turma, pergunta1, resposta1)
                    VALUES ('$escolha', '$nome', '$email', '$senha', '$sexo', '$turma', '$pergunta1', '$resposta1')";

                $result = mysqli_query($conexao, $insertQuery);
                if ($result) {
                    header('Location: index.php');
                } else {
                    echo '<div class="error-message"><i class="fas fa-exclamation-circle"></i> Erro ao cadastrar usuário</div>';
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include('../../../Components/links_header.php'); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../../imagens/img_gerais/icone_miesc.png">
    <title>Cadastro</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: linear-gradient(to right, #018DB5, #0E3659);
        }

        .box {
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.4);
            padding: 15px;
            border-radius: 15px;
            width: 33%;
        }

        fieldset {
            border: 3px solid #D99923;
        }

        legend {
            border: 1px solid #D99923;
            padding: 10px;
            text-align: center;
            background-color: #D99923;
            border-radius: 8px;
        }

        .inputBox {
            position: relative;
        }

        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 10px;
            width: 100%;
            letter-spacing: 1px;
        }

        .caixa {
            position: absolute;
            top: 0%;
            left: 0%;
            pointer-events: none;
            transition: .5s;
        }

        .inputUser:focus ~ .caixa,
        .inputUser:valid ~ .caixa {
            top: -20px;
            font-size: 12px;
            color: #D99923;
        }

        #pergunta1 {
            width: 58%;
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

        .error-message {
            color: red;
            margin-top: 10px;
            display: flex;
            align-items: center;
        }

        .error-message i {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="box">
        <form action="cadastro.php" method="post">
            <fieldset>
                <legend><b>Cadastro de Alunos</b></legend>
                <div class="inputBox">
                    <p>Escolha:</p>
                    <select id="escolha" class="select3" name="escolha">
                        <option value="">Selecione</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Usuário">Usuário</option>
                    </select>
                </div>
                <br>

                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="caixa"> Nome Completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="caixa">E-mail Institucional</label>
                </div>
                <br>
                <br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="caixa">Senha</label>
                    <p>Sexo:</p>
                    <input type="radio" id="feminino" name="genero" value="feminino" required>
                    <label for="feminino">Feminino</label>
                    <br><br>
                    <input type="radio" id="masculino" name="genero" value="masculino" required>
                    <label for="masculino">Masculino</label>
                    <br><br>
                    <input type="radio" id="outros" name="genero" value="outros" required>
                    <label for="outros">Outro</label>
                     <br><br>

                    <div class="inputBox">
                        <select id="pergunta1" name="pergunta1" class="select3" required>
                            <option value="" disabled selected>Escolha uma pergunta de segurança</option>
                            <option value="Qual é o nome do seu animal de estimação de infância?">Qual é o nome do seu animal de estimação de infância?</option>
                            <option value="Qual é o seu lugar favorito para viajar?">Qual é o seu lugar favorito para viajar?</option>
                            <option value="Qual é o seu prato favorito?">Qual é o seu prato favorito?</option>
                            <option value="Qual é o seu filme favorito?">Qual é o seu filme favorito?</option>
                        </select>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="resposta1" id="resposta1" class="inputUser" required>
                        <label for="resposta1" class="caixa">Resposta</label>
                    </div>

                    <p>Selecione a sua Turma:</p>
                    <select id="turmas" class="select2" name="turma">
                        <option value="">Selecione</option>
                        <option value="1 DS A">1 DS A</option>
                        <option value="1 DS B">1 DS B</option>
                        <option value="2 DS A">2 DS A</option>
                        <option value="2 DS B">2 DS B</option>
                        <option value="3 DS A">3 DS A</option>
                        <option value="3 DS B">3 DS B</option>
                        <option value="1 ADM A">1 ADM A</option>
                        <option value="1 ADM B">1 ADM B</option>
                        <option value="2 ADM A">2 ADM A</option>
                        <option value="2 ADM B">2 ADM B</option>
                        <option value="3 ADM A">3 ADM A</option>
                        <option value="3 ADM B">3 ADM B</option>
                        <option value="Sou Administrador">Sou Administrador</option>
                    </select>
                    <br><br>

                    <input type="submit" name="submit" id="submit">

                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>
