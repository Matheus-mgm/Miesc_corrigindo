<?php  

include_once('conexaoresult.php');
$path1 = ""; // Defina as variáveis antes do bloco if
$path2 = "";

if(isset($_POST['submit']))
{
    $resultado = $_POST['resultado'];
    $turma = $_POST['turma'];
    $turma2 = $_POST['turma2'];
     
    $arquivos = array();

    if (isset($_FILES['arquivo1']) && isset($_FILES['arquivo2'])) {
        $arquivo1 = $_FILES['arquivo1'];
        $arquivo2 = $_FILES['arquivo2'];

        if ($arquivo1['error'] || $arquivo2['error']) {
            die("Falha ao enviar arquivo");
        }

        if ($arquivo1['size'] > 5242880 || $arquivo2['size'] > 5242880) {
            die("Arquivo muito grande! Max: 2MB");
        }

        $pasta = "arquivos/";
        $nomeDoArquivo1 = $arquivo1['name'];
        $nomeDoArquivo2 = $arquivo2['name'];
        $extensao1 = strtolower(pathinfo($nomeDoArquivo1, PATHINFO_EXTENSION));
        $extensao2 = strtolower(pathinfo($nomeDoArquivo2, PATHINFO_EXTENSION));

        if (($extensao1 != "jpg" && $extensao1 != 'png') || ($extensao2 != "jpg" && $extensao2 != 'png')) {
            die("Tipo de arquivo não aceito");
        }

        $novoNomeDoArquivo = uniqid();
        $path1 = $pasta . $novoNomeDoArquivo . "_path1." . $extensao1;
        $path2 = $pasta . $novoNomeDoArquivo . "_path2." . $extensao2;

        $deu_certo1 = move_uploaded_file($arquivo1["tmp_name"], $path1);
        $deu_certo2 = move_uploaded_file($arquivo2["tmp_name"], $path2);

        if ($deu_certo1 && $deu_certo2) {
            // Aqui você insere tanto os textos quanto os caminhos dos arquivos no banco de dados
            $conexao->query("INSERT INTO resultadosfutsal (resultado, turma, turma2, nome, path, path2) 
            VALUES ('$resultado' , '$turma', '$turma2', '$nomeDoArquivo1', '$path1', '$path2')") or die($conexao->error);
            
              echo '<script>alert("Arquivos enviados com sucesso!");</script>';

        } else {
 echo '<script>alert("Falha ao enviar arquivo");</script>';
        }
    }
}

// Restante do código aqui

$consulta = "SELECT * FROM resultadosfutsal";
$con = mysqli_query($conexao, $consulta);

$sql_query_path1 = $conexao->query("SELECT * FROM resultadosfutsal WHERE path = '$path1'");
$sql_query_path2 = $conexao->query("SELECT * FROM resultadosfutsal WHERE path2 = '$path2'");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Resultados Adm</title>
	<link rel="stylesheet" href="../../css/resultado.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="icon" type="image/x-icon" href="../../img e/icone miesc.png">
</head>

<body>
<style>
.fundo{
	position:relative;
	bottom: -80px; /* Ajuste essa margem inferior para posicionar a onda corretamente */
    min-height: 110vh;
    background-image:url( "../../img e/Ondas/resultado.png");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}</style>
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
                <li class="updraft"><a href="../camisas/camisasusuario.php" class="nav-link">Camisas</a></li>
                <li class="updraft"><a href="../campeoes/campeoesuser.php" class="nav-link">Campeões</a></li>
                <li class="updraft"><a href="../resultados futsal/resultadoUser.php" class="nav-link">Resultados</a></li>
                <li class="updraft"><a href="../classificacao/classificacaoUsuario.php" class="nav-link">Classificação</a></li>
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


    <div class= "jogos">

        <h1> Resultados dos jogos </h1>

 



</div>
</div>
</div>  

<style> 


.benviar{
    display: flex;
    position: absolute;
    margin-left: 100px;
    margin-top: -10px;
    font-size: 8px;
    background-color: #0E3659;
    color: #D99923;
    border: none;
    padding: 4px 6px;
    border-radius: 5px;
}


        .box, .box2, .box3, .box4, .box5 {
            position: relative;
            left: 50%;
            color: #018DB5;
            transform: translateX(-50%);
            padding: 18px;
            border-radius: 15px;
            width: 10%;
            top: -19.0rem;
        }
        .box {
        top: -20.0rem;
        font-size: 20 px
        }
        .box2 {
            left: 38.5%;
            top: -25.97rem;
            color: #D99923;
            width: 7%;
        }

        .box3 {
            left: 61%;
            top: -31.60rem;
            color: #D99923;
            width: 7%;
        }
        .box4, .box5 {
            width: 100px;
           height: 100px;
            display: inline-block;       
            top: -19.0rem; 
        }
        .box4 {
            left: 37.5%;
            
        }
        .box5 {
            left: 56%;
           
        }
        .inputBox {
            position: relative;
        }

        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid #0E3659;
            outline: none;
            color: black;
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
            top: -10px;
            font-size: 12px;
            color: #D99923;
        }  
        .times1{
        display: flex;
        justify-content: center;
        gap: 150px;
        height: 180px;
    }
    .times1 h2{
        padding-bottom: 100px;
        margin-top: 30px;

    }
    .times1 h3{
        padding-bottom: 100px;
        margin-top: 25px;
        font-size: 75px;  
    }
    .times1 img{
        width: 100px;
        height: 100px;
        border-radius: 50px;
    }
        .times{
        display: flex;
        justify-content: center;
        gap: 360px;
        height: 180px;
    }
        .times h2{
        padding-bottom: 100px;
        margin-top: -150px;
        color: #018DB5;
        font-size: 60px; 

    }
    .turmas .turma, .turma2 {
		position: relative;
		font-size: 30px;   
        display: inline-block; /* Mantém "turma" e "turma2" em linha */
        color: #0E3659;
        margin: 0 188px; /* Espaçamento horizontal */
		 top: -27vh;
         left: 48vh;
}
.editar{
		position: relative;
		top: -20rem;
		left: 30rem;
		
			@media screen and (max-width: 1366px) {
    left: 5%;
  }
}
.enviarbd{
    position: relative;
    top: -28rem;
    left: 60%;
	
    }
    .enviarbd #submit{

    background-color: #0E3659;
    color: #D99923;
    border: none;
    padding: 10px 20px;
    font-size: 12px;
    border-radius: 5px;
    }
</style>


       
    </div>
              <br>
              <br>
                 
 
           
              <?php while($dado = $con->fetch_array()){ ?>
		 <table>
         <div class= "times">
    <div class="fototime">

            <img height="500" width="200" src="<?php echo $dado['path']; ?>" alt="">
    </div>


    <div>

        <img class="fototime" height="500" width="200" src="<?php echo $dado['path2']; ?>" alt="">
  
		
		<tr class="turmas">

        <div class= "times">
      
        <center>
			
            <h2 class="resultado"><?php echo $dado["resultado"]; ?></h2>
        
         

            <td><div class="turma"><?php echo $dado["turma"]; ?></div></td>
    
            <td><div class="turma2"><?php echo $dado["turma2"]; ?></div></td>
        </div>

        </center>
  <!-- Começo editar e excluir -->

	
     <?php } ?> 
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