<?php  
date_default_timezone_set('America/Sao_Paulo');
include_once('conexaoPF.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM paulofreire WHERE id=$id";
    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($dado = mysqli_fetch_assoc($result)) {
            $data = date("Y-m-d\TH:i", strtotime($dado['horarios']));
            $sala = $dado['Sala'];
        }
    } else {
        header('Location: horariosPF.php');
    }
}

if (isset($_POST['atualizar'])) {
    $id = $_POST['id'];
    $data = $_POST['data'];
    $sala = $_POST['Sala'];

    // Atualize os registros no banco de dados
    $sqlUpdate = "UPDATE paulofreire SET horarios='$data', sala='$sala' WHERE id='$id'";
    $result = $conexao->query($sqlUpdate);

    header('Location: sarauadm.php');
}
$consulta = "SELECT * FROM paulofreire";
$con = $conexao->query($consulta);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-Eventsadm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	<link rel="icon" type="image/x-icon" href="../img/icone%20miesc.png">
    <title>Apresentações Adm</title>
</head>
<body>
    <header>
        <nav class="miesc">
            <div class="logo">
                <img src="../img/miesc.png" widht="30px" height="60px">
            </div>
            <div class="nav-list">
        	<ul>
            <li class="nav-item"><a href="../../../../Site mercury home e about/htmls/home adm.html" class="nav-link">Home</a></li>  
            <li class="nav-item"><a href="../../../../Site mercury home e about/htmls/index adm.html" class="nav-link">About</a></li> 
            <li class="nav-item"><a href="../../../../feed/feed.php" class="nav-link">Feed</a></li>
            <li class="nav-item"><a href="" class="nav-link">Events</a>
              <ul>
              <li class="updraft"><a href="../../../html/interclasse adm.html" class="nav-link">Interclasse</a></li>
                <li class="updraft"><a href="../../../../html/pauloFreire%20adm.html" class="nav-link">Paulo Freire</a></li>
                <li class="updraft"><a href="../../../../html/sarauadm.html" class="nav-link">Sarau</a></li>
             </ul>
             </li>
			</ul>
	  </div>
          <div class="mobile-menu-icon">
            <button onclick="menuShow()"><img class="icon" src="../../../../../../imagens/img_events/img_PauloFreire/menu.svg" alt=""></button>
        </div>
        </nav>
        <div class="mobile-menu">
          <ul>
            <li class="nav-item"><a href="home.html" class="nav-link">Home</a></li>  
            <li class="nav-item"><a href="index.html" class="nav-link">About</a></li> 
            <li class="nav-item"><a href="" class="nav-link">Feed</a></li>
            <li class="nav-item"><a href="" class="nav-link">Events</a></li>
        </ul>
      </div>
    </header>

    </section>
    
    <section class="apresentacao">
    <img src="../img/Ondas/ondaApresentacao.png" alt="Apresentação">
    <center>
     <div class="apresentacao-text">
                <div class="apresentacao-titulo">
                    <h1>Editar apresentação</h1>
                </div>
                <br>
                <form action="saveEditPF.php" method="post">
                    <div class="inputBox">
                        <label for="data">Digite a data</label>
                        <input type="datetime-local" id="data" name="data" required value="<?php echo $data; ?>">
                    </div>

                    <div class="inputBox">
                        <label for="sala">Turma</label>
                        <input type="text" id="sala" name="sala" required value="<?php echo $sala; ?>">
                    </div>

                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" value="Atualizar" id="submit" class="atualizar" name="atualizar">
                </form>
            </div>
</center> 
</section>
<div class="container">
<div class= "sal1">

<h1>Turma</h1>

</div>

<div class= "hor1">

<h1>Horários</h1>

</div>
</div>
       <?php 
// Defina o fuso horário para Brasília
date_default_timezone_set('America/Sao_Paulo');
$titulo_exibido = true; // Variável para controlar se o título já foi exibido

while ($apresentacao = mysqli_fetch_assoc($con)) {
    ?>  
    <div class="conteudo">
        <div class="sal" style="display: inline-block;  margin-right: 125px; margin-top: 50px;">
            <?php 
            echo $apresentacao['Sala'];
            ?>
        </div>
        <div class="hor" style="display: inline-block; ">
            <?php echo date("d/m/Y H:i", strtotime($apresentacao['horarios'])); // Exibe a data e o horário no formato dd/mm/yyyy HH:mm ?>
        </div>

        <!-- Adicione os links de editar e excluir aqui -->

    </div>
    <br> <!-- Adicione uma quebra de linha se você desejar que cada par esteja em uma linha diferente -->
<?php 
}
?>
<style>
		.atualizar{
			  
background-color: #0E3659;
color: #D99923;
border: none;
padding: 8px 10px;
font-size: 16px;
border-radius: 5px;
		}
     .container {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
        }

        .conteudo {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
    }

    .hor {
        font-size: 35px;
        color: #0E3659;
        margin-left: 40px;
    }

    .sal {
        font-size: 35px;
        color: #D99923;
        margin-right: 20px;
        margin-left: 35%;
    }

    /* Adicione um espaçamento à direita dos horários */
    .hor {
        margin-right: 20px; /* Ajuste o valor conforme necessário */
    }
    .hor1 {
        margin-right: 100%; /* Ajuste o valor conforme necessário */
    }
        .hor1 h1 {
            font-size: 60px;
        color: #0E3659;
        margin-left: 340%;
        }

        .sal1 h1 {
            font-size: 60px;
        color: #D99923;
        margin-right: 20px;
        margin-left: 330%;
        }
    </style>
    <!–Inicio rodape->
         <footer>
    <div id="footer_content">
        <div id="footer_contacts">
           <img src="../../../../Site mercury home e about/img/mercury.png" widht="20" height="60">
    <br>
            <font color="0E3659">
    <p>Organização, comunicação e <br> união, na palma da sua mão. </p>
    </font>

            <div id="footer_social_media">
                <a href="https://instagram.com/mercury_.br?igshid=ZDdkNTZiNTM=" class="footer-link" id="instagram">
                  <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="#" class="footer-link" id="whatsapp">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>
            </div>
        </div>
        
        <ul class="footer-list">
            <li>
                <h3>Home</h3>
            </li>
            <li>
                <a href="../../../../feed/feed.php" class="footer-link">Feed</a>
            </li>
            <li>
                <a href="" class="footer-link">Events</a>
            </li>
            <li>
                <a href="../../../../Site mercury home e about/htmls/index adm.html" class="footer-link">About</a>
            </li>
        </ul>

        <ul class="footer-list">
            <li>
                <h3>Events</h3>
            </li>
            <li>
                <a href="../../../html/interclasse adm.html" class="footer-link">Interclasse</a>
            </li>
             <li>
                <a href="../../../../html/sarauadm.html" class="footer-link">Sarau</a>
            </li>
             <li>
                <a href="../../../../html/pauloFreire%20adm.html" class="footer-link">Paulo Freire</a>
            </li>
            
        </ul>

        <div id="footer_subscribe">
            <h3>Utilize o MIESC</h3>
    <div class="botao2">
        <a href="../../../../Cadastro/cadastro.php">
            <button>Se cadastre</button>
        </a>
    </div>
        </div>
    </div>

    <div id="footer_copyright">
        &#169
        2023 Mercury
    </div>
</footer> 
</section>
       
<!–Fim rodape->
  <script src="../Jscript/script.js"></script>
</body>
</html>