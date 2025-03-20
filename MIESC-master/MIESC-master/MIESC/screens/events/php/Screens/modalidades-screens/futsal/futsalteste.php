<?php
global $conexao;
include_once('../../conexao.php');

$path1 = "";
$path2 = "";
$message = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Recebe e sanitiza os dados do formulário
    $jogos  = trim($_POST['jogos']);
    $turma  = trim($_POST['turma']);
    $turma2 = trim($_POST['turma2']);

    if (isset($_FILES['arquivo1']) && isset($_FILES['arquivo2'])) {
        $arquivo1 = $_FILES['arquivo1'];
        $arquivo2 = $_FILES['arquivo2'];

        // Verifica se ocorreu algum erro no upload
        if ($arquivo1['error'] !== 0 || $arquivo2['error'] !== 0) {
            $error = "Falha ao enviar arquivo.";
        } elseif ($arquivo1['size'] > 5242880 || $arquivo2['size'] > 5242880) { 
            // 5242880 bytes = 5MB
            $error = "Arquivo muito grande! Max: 5MB.";
        } else {
            $pasta = "arquivos/";
            if (!is_dir($pasta)) {
                mkdir($pasta, 0755, true);
            }
            $nomeDoArquivo1 = $arquivo1['name'];
            $nomeDoArquivo2 = $arquivo2['name'];
            $extensao1 = strtolower(pathinfo($nomeDoArquivo1, PATHINFO_EXTENSION));
            $extensao2 = strtolower(pathinfo($nomeDoArquivo2, PATHINFO_EXTENSION));

            if (($extensao1 != "jpg" && $extensao1 != "png") || ($extensao2 != "jpg" && $extensao2 != "png")) {
                $error = "Tipo de arquivo não aceito. Somente JPG e PNG são permitidos.";
            } else {
                $novoNome = uniqid();
                $path1 = $pasta . $novoNome . "_path1." . $extensao1;
                $path2 = $pasta . $novoNome . "_path2." . $extensao2;

                $deu_certo1 = move_uploaded_file($arquivo1["tmp_name"], $path1);
                $deu_certo2 = move_uploaded_file($arquivo2["tmp_name"], $path2);

                if ($deu_certo1 && $deu_certo2) {
                    // Inserindo os dados usando prepared statements para evitar SQL Injection
                    $stmt = $conexao->prepare("INSERT INTO textos (jogos, turma, turma2, nome, path, path2) VALUES (?, ?, ?, ?, ?, ?)");
                    if ($stmt) {
                        $stmt->bind_param("ssssss", $jogos, $turma, $turma2, $nomeDoArquivo1, $path1, $path2);
                        if ($stmt->execute()) {
                            $message = "Arquivos enviados com sucesso!";
                        } else {
                            $error = "Erro ao inserir registro: " . $stmt->error;
                        }
                        $stmt->close();
                    } else {
                        $error = "Erro na preparação da consulta: " . $conexao->error;
                    }
                } else {
                    $error = "Falha ao mover os arquivos para o diretório.";
                }
            }
        }
    } else {
        $error = "Envio de arquivos não detectado.";
    }
}

// Consulta para buscar os registros cadastrados
$result = $conexao->query("SELECT * FROM textos");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <title>Futsal Adm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../../../../../../imagens/img_gerais/icone_miesc.png">
  <?php include('../../../../../../Components/links_header.php'); ?>
  <style>
    *{
        margin:0;
        padding:0;
        box-sizing: border-box;
        font-family: "Roboto", sans-serif;
    }
        :root {
            --color-neutral-0: #0E3659;
            --color-neutral-10: #018DB5;
            --color-neutral-30: #0E3659;
            --color-neutral-40: #D99923;
    }

    .fundo {
        min-height: 105vh;
        background-image: url("../../../../../../imagens/img_events/Ondas/onda futsal.png");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }
  </style>
</head>
<body>
  <!-- Inclui o header reutilizável -->
  <?php include('../../../../../../Components/header.php'); ?>

  <div class="fundo">
    <div class="container">
      <!-- Exibição de mensagens -->
      <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
      <?php elseif (!empty($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
      <?php endif; ?>

      <h2 class="text-center">Envio de Arquivos e Cadastro</h2>
      <form action="futsalteste.php" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
          <label for="jogos" class="control-label col-sm-2">Horário:</label>
          <div class="col-sm-10">
            <input type="text" name="jogos" id="jogos" class="form-control" placeholder="Digite o horário" required>
          </div>
        </div>
        <div class="form-group">
          <label for="turma" class="control-label col-sm-2">Turma 1:</label>
          <div class="col-sm-10">
            <input type="text" name="turma" id="turma" class="form-control" placeholder="Digite Turma 1" required>
          </div>
        </div>
        <div class="form-group">
          <label for="turma2" class="control-label col-sm-2">Turma 2:</label>
          <div class="col-sm-10">
            <input type="text" name="turma2" id="turma2" class="form-control" placeholder="Digite Turma 2" required>
          </div>
        </div>
        <div class="form-group">
          <label for="arquivo1" class="control-label col-sm-2">Arquivo 1:</label>
          <div class="col-sm-10">
            <input type="file" name="arquivo1" id="arquivo1" class="form-control" accept=".jpg,.png" required>
          </div>
        </div>
        <div class="form-group">
          <label for="arquivo2" class="control-label col-sm-2">Arquivo 2:</label>
          <div class="col-sm-10">
            <input type="file" name="arquivo2" id="arquivo2" class="form-control" accept=".jpg,.png" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </form>
    </div>

    <!-- Exibição dos registros cadastrados -->
    <div class="container">
      <h2 class="text-center">Jogos Cadastrados</h2>
      <table class="table table-bordered table-responsive">
        <thead>
          <tr>
            <th>Horário</th>
            <th>Turma 1</th>
            <th>Turma 2</th>
            <th>Imagem 1</th>
            <th>Imagem 2</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($dado = $result->fetch_assoc()): ?>
            <tr>
              <td><?php echo htmlspecialchars($dado["jogos"]); ?></td>
              <td><?php echo htmlspecialchars($dado["turma"]); ?></td>
              <td><?php echo htmlspecialchars($dado["turma2"]); ?></td>
              <td><img src="<?php echo htmlspecialchars($dado['path']); ?>" alt="" style="height:100px;"></td>
              <td><img src="<?php echo htmlspecialchars($dado['path2']); ?>" alt="" style="height:100px;"></td>
              <td>
                <a class="btn btn-sm btn-primary" href="services/editFutsaladm.php?id=<?php echo $dado["id"]; ?>">
                  <i class="fa fa-pencil"></i>
                </a>
                <a class="btn btn-sm btn-danger" href="services/deleteFutsal.php?id=<?php echo $dado["id"]; ?>">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Inclui o footer reutilizável -->
  <?php include('../../../../../../Components/footer.php'); ?>
</body>
</html>