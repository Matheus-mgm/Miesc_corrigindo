
 

<?php  

if(isset($_POST['submit']))
{


    include_once('conexaovolei.php');

        $jogos =  $_POST['jogos'];
        $turma = $_POST['turma'];
        $turma2 = $_POST['turma2'];
        $posicaoX = 100;
        $posicaoY = 200;

    $result = mysqli_query($conexao, "INSERT INTO volei(jogos, turma, turma2)
    VALUES ('$jogos','$turma', '$turma2')");


}
include_once('conexaovolei.php');
$consulta = "SELECT * FROM volei";
$con = mysqli_query($conexao, $consulta);


$arquivo = null;
$time = null;
$sql_query_time1 = null;
$sql_query_time2 = null;



$arquivos = array();

if (isset($_FILES['arquivo1'])) {
    array_push($arquivos, array("arquivo" => $_FILES["arquivo1"], "time" => 1));
} 

if (isset($_FILES['arquivo2'])) {
    array_push($arquivos, array("arquivo" => $_FILES["arquivo2"], "time" => 2));
} 


foreach ($arquivos as $arquivo) {
    if ($arquivo != null) { // Verifique se $arquivo não é nulo antes de usá-lo
        if ($arquivo['arquivo']['error']) {
            die("Falha ao enviar arquivo");
        }

        if ($arquivo['arquivo']['size'] > 5242880) {
            die("Arquivo muito grande! Max: 2MB");
        }

        $pasta = "arquivos/";
        $nomeDoArquivo = $arquivo['arquivo']['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        if ($extensao != "jpg" && $extensao != 'png') {
            die("Tipo de arquivo não aceito");
        }
        
        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;


        $deu_certo = move_uploaded_file($arquivo['arquivo']["tmp_name"], $path);
        if ($deu_certo) {
            $time = $arquivo['time'];
            $conexao->query("INSERT INTO textos (nome, path, time) VALUES('$nomeDoArquivo', '$path', $time)") or die($conexao->error);
            echo "<p>Arquivo enviado com sucesso para o Time $time!</p>";
        } else {
            echo "<p>Falha ao enviar arquivo</p>";
        }
    }
}

$sql_query_time1 = $conexao->query("SELECT * FROM volei WHERE time = 1");
$sql_query_time2 = $conexao->query("SELECT * FROM volei WHERE time = 2");
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Volei</title>

<link rel="stylesheet" href="../../css/voleiusu3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="icon" type="image/x-icon" href="../../img e/icone miesc.png">
</head>

<body>
	<header>
    <nav class="miesc">
        <div class="logo">
            <img src="../../../Site mercury home e about/img/miesc.png" widht="30px" height="60px">       
        </div>
        <div class="nav-list">
        	<ul>
            <li class="nav-item"><a href="../../../Site mercury home e about/htmls/home.html" class="nav-link">Home</a></li>  
            <li class="nav-item"><a href="../../../Site mercury home e about/htmls/index.html" class="nav-link">About</a></li> 
            <li class="nav-item"><a href="../../../feed/feedUser.php" class="nav-link">Feed</a></li>
			<li class="nav-item"><a href="" class="nav-link">Resources</a>
              <ul>
                <li class="updraft"><a href="../camisas volei/camisasusuarioVolei.php" class="nav-link">Camisas</a></li>
                <li class="updraft"><a href="../campeoes volei/campeoesuservolei.php" class="nav-link">Campeões</a></li>
                <li class="updraft"><a href="../resultados volei/resultadoUser.php" class="nav-link">Resultados</a></li>
                <li class="updraft"><a href="../classificacao volei/classificacaovoleiUsuario.php" class="nav-link">Classificação</a></li>
             </ul>
             </li>
			</ul>
	  </div>
      <div class="mobile-menu-icon">
        <button onclick="menuShow()"><img class="icon" src="../img/menu.svg" alt=""></button>
    </div>
    </nav>
    <div class="mobile-menu">
      <ul>
        <li class="nav-item"><a href="../../Site mercury home e about/Site mercury home e about/htmls/home.html" class="nav-link">Home</a></li>  
        <li class="nav-item"><a href="../../Site mercury home e about/Site mercury home e about/htmls/index.html" class="nav-link">About</a></li> 
        <li class="nav-item"><a href="" class="nav-link">Feed</a></li>
        <li class="nav-item"><a href="" class="nav-link">Events</a></li>
    </ul>
  </div>
</header>
	
	 <div class="fundo">
      
	</div>
	  <center> 
<div class="textos">
  <h1>Se cadastre como jogador</h1>
  <br>
  <div class="botao3">
  	<a href="../futsal/cadastro de jogadores/CJ.volei.cadastro.php">
		<button>Se cadastre</button>
	</a>
  </div>
	  </center>

    <!-- imagens -->
    <div class= "jogos">
        <h1> Jogos </h1>

        <?php while($dado = $con->fetch_array()){ ?>
		 <table>
         <div class= "times">
         <div class="fototime">

<img height="500" width="200" src="<?php echo $dado['path']; ?>" alt="">
</div>

<div>
<h3>X</h3>
</div>

<div>

<img class="fototime" height="500" width="200" src="<?php echo $dado['path2']; ?>" alt="">
		
		<tr class="turmas">

        <div class= "times">
      

        

         <td><div class="turma"><?php echo $dado["turma"]; ?></div></td>
    
        <td><div class="turma2"><?php echo $dado["turma2"]; ?></div></td>
        </div>

				 
        <center>
			
            <h2 class="horario"><?php echo $dado["jogos"]; ?></h2>
        
     </center>
			 </table>
     <?php } ?> 	
    
 
<!-- Fim imagens -->
<!-- Começo textos -->

		<style>
   
    .horario {
	  position: relative;
        top: -250px; /* Move "jogos" 20 pixels para cima */
        left: 0px; /* Centraliza horizontalmente */
        flex-grow: 1; /* Faz o elemento expandir para preencher o espaço restante */
        text-align: center; /* Centraliza o texto horizontalmente */
    }
     .horario {
        margin-bottom: 170px; /* Adapte o espaçamento vertical inferior conforme necessário */
        color: grid;
        top: -20vh;
    }

    .turmas .turma, .turma2 {
		position: relative;
		font-size: 30px;   
        display: inline-block; /* Mantém "turma" e "turma2" em linha */
        color: #0E3659;
        margin: 0 195px; /* Espaçamento horizontal */
		 top: -45vh;
		left: 52vh;
	
}	
		
</style>

	 
		
		<!-- Fim textos -->
	<!-- Começo Rodapé -->
                <footer>
    <div id="footer_content">
        <div id="footer_contacts">
           <img src="../../../Site mercury home e about/img/mercury.png" widht="20" height="60">
    <br>
            <font color="0E3659">
    <p>Organização, comunicação e <br> união, na palma da sua mão. </p>
    </font>

            <div id="footer_social_media">
                <a href="https://www.instagram.com/mercury_techwave?igsh=MXBjMm9henVsZXlwdA==" class="footer-link" id="instagram">
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
                <a href="../../../feed/feedUser.php" class="footer-link">Feed</a>
            </li>
            <li>
                <a href="" class="footer-link">Events</a>
            </li>
            <li>
                <a href="../../../Site mercury home e about/htmls/index.html" class="footer-link">About</a>
            </li>
        </ul>

        <ul class="footer-list">
            <li>
                <h3>Events</h3>
            </li>
            <li>
                <a href="../../html/interclasse.html" class="footer-link">Interclasse</a>
            </li>
             <li>
                <a href="../sarau/home.html" class="footer-link">Sarau</a>
            </li>
             <li>
                <a href="../sarau e paulo freire/Paulo Freire/pauloFreire.html" class="footer-link">Paulo Freire</a>
            </li>
            
        </ul>

        <div id="footer_subscribe">
            <h3>Utilize o MIESC</h3>
    <div class="botao2">
        <a href="../../../Cadastro/cadastro.php">
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
</body>
</html>
