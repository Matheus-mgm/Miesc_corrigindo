  <?php  

include_once('conexaobasquete.php');
$path1 = ""; // Defina as variáveis antes do bloco if
$path2 = "";

if(isset($_POST['submit']))
{
    $jogos = $_POST['jogos'];
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
            $conexao->query("INSERT INTO basquete (jogos, turma, turma2, nome, path, path2) 
            VALUES ('$jogos', '$turma', '$turma2', '$nomeDoArquivo1', '$path1', '$path2')") or die($conexao->error);
            
              echo '<script>alert("Arquivos enviados com sucesso!");</script>';

        } else {
 echo '<script>alert("Falha ao enviar arquivo");</script>';
        }
    }
}

// Restante do código aqui

$consulta = "SELECT * FROM basquete";
$con = mysqli_query($conexao, $consulta);

$sql_query_path1 = $conexao->query("SELECT * FROM basquete WHERE path = '$path1'");
$sql_query_path2 = $conexao->query("SELECT * FROM basquete WHERE path2 = '$path2'");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Basquete Adm</title>
	<link rel="stylesheet" href="../../css/basquete.css">
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
    background-image:url( "../../img e/Ondas/basquete.png");
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
           <li class="nav-item"><a href="../../../Site mercury home e about/htmls/home adm.html" class="nav-link">Home</a></li>  
            <li class="nav-item"><a href="../../../Site mercury home e about/htmls/index adm.html" class="nav-link">About</a></li> 
            <li class="nav-item"><a href="../../../feed/feed.php" class="nav-link">Feed</a></li>
			<li class="nav-item"><a href="" class="nav-link">Resources</a>
              <ul>
                <li class="updraft"><a href="../camisas basquete/camisasBasquete.php" class="nav-link">Camisas</a></li>
                <li class="updraft"><a href="../campeoes basquete/campeoesbasquete.php" class="nav-link">Campeões</a></li>
                <li class="updraft"><a href="../resultados basquete/resultado.php" class="nav-link">Resultados</a></li>
                <li class="updraft"><a href="../classificacao basquete/classificacaoBasquete.php" class="nav-link">Classificação</a></li>
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
	
<div class="textos">
  <h1>Veja os jogadores cadastrados</h1>
  <br>
  <div class="botao3">
  	<a href="../futsal/cadastro de jogadores/exibirjogadoresbasquete.php">
		<button>Acesse aqui</button>
	</a>
  </div>
  </div>


    <div class= "jogos">

        <h1> Jogos </h1>

 

    <div class= "times">

        <div>

        <img src="../../img e/icone miesc.png" alt="">

        <h2>3 DS A</h2>

        </div>

        <div>

        <h3>X</h3>

        </div>

        <div>

        <img src="../../img e/icone.png" alt="">

        <h2>3 DS B</h2>

      </div>

    </div>

    <div class="horario1">

        <h2>01/01 Sexta-feira 10hrs</h2>

    </div>

</div>
<div class="container">
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
  .container {
            width: 700px; /* Defina a largura desejada para a caixa */
            height: 200px;
            padding: 20px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 2px solid #000000;
            border-radius: 15px;
            box-shadow: 5px 5px 5px gray;
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
        top: -19.0rem;
        }
        .box2 {
            left: 38%;
            top: -25.97rem;
            color: #D99923;
            width: 7%;
        }

        .box3 {
            left: 62%;
            top: -31.0rem;
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
            left: 37%;
            
        }
        .box5 {
            left: 55%;
           
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
	.resultado{

        top: -20rem; /* Move "jogos" 20 pixels para cima */
        left: 0px; /* Centraliza horizontalmente */
        flex-grow: 1; /* Faz o elemento expandir para preencher o espaço restante */
      
    }
     .resultado{
        margin-bottom: 170px; /* Adapte o espaçamento vertical inferior conforme necessário */
        color: grid;
    }
    .fototime{
        display: block;
    }
    .fototime img{
        margin-bottom: 200  px;
        color: grid;    
        top: -17rem; /* Move "jogos" 20 pixels para cima */

    }

    .turmas .turma, .turma2 {
		position: relative;
		font-size: 30px;   
        display: inline-block; /* Mantém "turma" e "turma2" em linha */
        color: #0E3659;
        margin: 0 188px; /* Espaçamento horizontal */
		 top: -24vh;
		left: 53vh;
	
}
	.editar{
		position: relative;
		top: -23rem;
		left: 35rem;
		
			@media screen and (max-width: 1366px) {
    left: 5%;
  }
	}
    .enviarbd{
    position: relative;
    top: -24rem;
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
    .nav-list li  ul{
    position:absolute;
    top:35px;
    left:-35px;
    display:none;
    text-align: center;
	
    
}
</style>

   <form action="basquete.php" method="post" enctype="multipart/form-data">
    <div class="geral">
    <div class="box4">
            <div class="inputBox">
                <input type="file" name="arquivo1" id="id" class="picture" required>

            </div>
        </div>  
        <div class="box5">
            <div class="inputBox">
                <input type="file" name="arquivo2" id="id" class="picture" required>
            </div>
        </div>
        <div class="box">
            <div class="inputBox">
                <input type="text" name="jogos" id="id" class="inputUser" required>
                <label for="jogos" class="caixa">Digite o horário</label>
            </div>
        </div>
        <br><br>
        <div class="box2">
            <div class="inputBox">
                <input type="text" name="turma" id="id" class="inputUser" required>
                <label for="turma" class="caixa">Turma 1</label>
            </div>
        </div>

        <div class="box3">
            <div class="inputBox">
                <input type="text" name="turma2" id="id" class="inputUser" required>
                <label for="turma2" class="caixa">Turma 2</label>
            </div>
        </div>



        <div class="enviarbd">
            <input type="submit" name="submit" id="submit">
        </div>
    </div>
</form>
       
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
    <h3>X</h3>
    </div>

    <div>

        <img class="fototime" height="500" width="200" src="<?php echo $dado['path2']; ?>" alt="">
  
		
		<tr class="turmas">

        <div class= "times">
      

        <center>
			
            <h2 class="horario"><?php echo $dado["jogos"]; ?></h2>
        
     </center>

         <td><div class="turma"><?php echo $dado["turma"]; ?></div></td>
    
        <td><div class="turma2"><?php echo $dado["turma2"]; ?></div></td>
        </div>
  <!-- Começo editar e excluir -->

			 <td class="editar"><a class='btn btn-sm btn-primary' href='editbasquete.php?id=<?php echo $dado["id"]; ?>'> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
				 </a>
			  <a class='btn btn-sm btn-danger' href='deletebasquete.php?id=<?php echo $dado["id"]; ?>'>
				<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
  				<path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
</svg>
				
                </a>
</svg>
				 </td>
			</tr>
			 </table>
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
                <a href="../../../feed/feed.php" class="footer-link">Feed</a>
            </li>
            <li>
                <a href="" class="footer-link">Events</a>
            </li>
            <li>
                <a href="../../../Site mercury home e about/htmls/index adm.html" class="footer-link">About</a>
            </li>
        </ul>

        <ul class="footer-list">
            <li>
                <h3>Events</h3>
            </li>
            <li>
                <a href="../../html/interclasse adm.html" class="footer-link">Interclasse</a>
            </li>
             <li>
                <a href="../sarau/homeadm.html" class="footer-link">Sarau</a>
            </li>
             <li>
                <a href="../sarau e paulo freire/Paulo Freire/pauloFreire adm.html" class="footer-link">Paulo Freire</a>
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