<?php
global $conexao;
include_once('../../conexao.php');

// Consulta para exibir os dados dos jogos
$sql_query = "SELECT * FROM textos";
$con = mysqli_query($conexao, $sql_query);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Futsal</title>
    <?php include('../../../../../../Components/links_header.php'); ?>
    <link rel="icon" type="image/x-icon" href="../../../../../../imagens/img%20e/icone miesc.png">
    <style>
        /* Reset e Definições Globais */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        /* Definição de Cores */
        :root {
            --color-neutral-0: #0E3659;
            --color-neutral-10: #018DB5;
            --color-neutral-30: #0E3659;
            --color-neutral-40: #D99923;
        }

        /* Fundo */
        .fundo {
            position: relative;
            bottom: -88px; /* Ajuste da margem inferior */
            min-height: 105vh;
            background-image: url("../../../../../../imagens/img_events/Ondas/onda futsal.png");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        /* Seção de Texto */
        .textos {
            margin: 5%;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .textos h1 {
            font-size: 60px;
            margin-bottom: 20px;
        }

        .botao3 button {
            background-color: var(--color-neutral-0);
            color: var(--color-neutral-40);
            border: none;
            padding: 10px 20px;
            font-size: 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .botao3 button:hover {
            background-color: var(--color-neutral-40);
            color: var(--color-neutral-0);
        }

        /* Seção de Jogos */
        .jogos {
            text-align: center;
            margin: 80px 0;
        }

        .jogos h1 {
            font-size: 75px;
            margin-bottom: 40px;
        }

        .times {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin-bottom: 30px;
        }

        .times img {
            width: 200px;
            height: 200px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .times h3 {
            font-size: 40px;
            margin: auto 0;
        }

        .turmas {
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        .turma, .turma2 {
            font-size: 20px;
            font-weight: bold;
        }

        /* Horário dos Jogos */
        .horario {
            font-size: 18px;
            color: gray;
            margin-top: 20px;
        }

        /* Formatação de Imagens */
        .fototime {
            width: 100%;
            height: 100%;
        }

    </style>
</head>
<body>
  <!-- Inclui o header reutilizável -->
  <?php include('../../../../../../Components/header.php'); ?>

<div class="fundo"></div>

<div style="text-align: center;">
    <div class="textos">
        <h1>Se cadastre como jogador</h1>
        <div class="botao3">
            <a href="cadastro de jogadores/cadastrodejogadores.php">
                <button>Se cadastre</button>
            </a>
        </div>
    </div>
</div>

<div class="jogos">
    <h1>Jogos</h1>
    <?php while ($dado = mysqli_fetch_array($con)) { ?>
        <table>
            <div class="times">
                <div class="fototime">
                    <img height="500" width="200" src="<?php echo $dado['path']; ?>" alt="">
                </div>
                <div>
                    <h3>X</h3>
                </div>
                <div>
                    <img class="fototime" height="500" width="200" src="<?php echo $dado['path2']; ?>" alt="">
                </div>
            </div>

            <div class="turmas">
                <td><div class="turma"><?php echo $dado["turma"]; ?></div></td>
                <td><div class="turma2"><?php echo $dado["turma2"]; ?></div></td>
            </div>

            <div style="text-align: center;">
                <h2 class="horario"><?php echo $dado["jogos"]; ?></h2>
            </div>
        </table>
    <?php } ?>
</div>

<!-- Inclui o footer reutilizável -->
<?php include('../../../../../../Components/footer.php'); ?>
</body>
</html>
