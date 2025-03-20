<?php

$path = "";
$path2 = "";

include_once('conexaoresult.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM resultadosvolei WHERE id=$id";
    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($dado = mysqli_fetch_assoc($result)) {
            $resultado = $dado['resultado'];
            $turma = $dado['turma'];
            $turma2 = $dado['turma2'];
            $path = $dado['path']; // Adicione os campos de imagem ao carregar os dados
            $path2 = $dado['path2'];
        }
    } else {
        header('Location: resultado.php');
    }
}

if (isset($_POST['atualizar'])) {
    $id = $_POST['id'];
    $jogos = $_POST['jogos'];
    $turma = $_POST['turma'];
    $turma2 = $_POST['turma2'];

    $arquivo1 = $_FILES['arquivo1'];
    $arquivo2 = $_FILES['arquivo2'];

    if ($arquivo1['error'] == 0 && $arquivo2['error'] == 0) {
        // Verifica se ambos os arquivos foram enviados com sucesso
        $path = uploadFile($arquivo1, $path);
        $path2 = uploadFile($arquivo2, $path2);
    } else {
        echo "Erro no upload de arquivo.";
    }

    // Atualize os registros no banco de dados
    $sqlUpdate = "UPDATE resultadosvolei SET resultadosvolei='$resultado', turma='$turma', turma2='$turma2', path='$path', path2='$path2' WHERE id='$id'";
    $result = $conexao->query($sqlUpdate);

    header('Location: resultado.php');
}

function uploadFile($arquivo, $path)
{
    $pasta = "arquivos/";
    $nomeDoArquivo = $arquivo['name'];
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if ($extensao == 'jpg' || $extensao == 'png') {
        $novoNomeDoArquivo = uniqid();
        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

        if (move_uploaded_file($arquivo["tmp_name"], $path)) {
            return $path;
        } else {
            echo "Erro no upload de arquivo.";
            return $path; // Retorna o caminho existente em caso de erro
        }
    } else {
        echo "Tipo de arquivo não aceito.";
        return $path; // Retorna o caminho existente em caso de erro
    }
}
$consulta = "SELECT * FROM resultados";
$con = mysqli_query($conexao, $consulta);
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Edit resultados</title>
	<link rel="stylesheet" href="../../css/resultado.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="icon" type="image/x-icon" href="../../img e/icone miesc.png">
</head>

<body>
<style>
.fundo{
	position:relative;
	bottom: -88px; /* Ajuste essa margem inferior para posicionar a onda corretamente */
    min-height: 105vh;
    background-image:url("../../img e/Ondas/resultado.png");
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
            <li class="nav-item"><a href="../../Site mercury home e about/Site mercury home e about/htmls/home.html" class="nav-link">Home</a></li>  
            <li class="nav-item"><a href="../../Site mercury home e about/Site mercury home e about/htmls/index.html" class="nav-link">About</a></li> 
            <li class="nav-item"><a href="../../../feed/feed.php" class="nav-link">Feed</a></li>
			<li class="nav-item"><a href="" class="nav-link">Resources</a>
              <ul>
                <li class="updraft"><a href="camisas.html" class="nav-link">Camisas</a></li>
                <li class="updraft"><a href="campeoes.html" class="nav-link">Campeões</a></li>
                <li class="updraft"><a href="classificacao.html" class="nav-link">Classificação</a></li>
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
        <li class="nav-item"><a href="../../../feed/feed.php" class="nav-link">Feed</a></li>
        <li class="nav-item"><a href="" class="nav-link">Events</a></li>
    </ul>
  </div>
</header>
	
<div class="fundo">
      
      </div>
  
  
      <div class= "jogos">
  
          <h1> Resultado dos jogos </h1>
  
   
  
      <div class= "times1">
  
          <div>
  
          <img src="../../img e/icone miesc.png" alt="">
  
          <h2>3 DS A</h2>
  
          </div>
  
          <div>
  
          <h3>3 x 0</h3>
  
          </div>
  
          <div>
  
          <img src="../../img e/icone.png" alt="">
  
          <h2>3 DS B</h2>
  
        </div>
  
      </div>
  
     
      <br><br><br><br><br><br><br><br><br><br>
  
  </div>
  <div class="container">
  </div>
  </div>
  </div>  
  
<style> 
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
.box{
    position: relative;
    left: 50%;
    top: -125px;
    border-style: solid;
    border-width: 0.5px;
    border-color: #0E3659;
    color:#018DB5 ;
    transform: translate(-50%, -50%);
    padding: 18px;
    border-radius: 15px;
    width: 10%;
 
		@media screen and (max-width: 1366px) {
  width: 15%;
  }
    
 }
 .box2{
    position: relative;
    left: 38%;
    top: -230px;
    color:#D99923 ;
    transform: translate(-50%, -50%);
    padding: 18px;
    border-radius: 15px;
    width: 7%;
    	@media screen and (max-width: 1366px) {
  width: 11.5%;
  left: 34%;
  }
    
 }
 .box3{
    position: relative;
    left: 62%;
    top: -280px;
    color:#D99923 ;
    transform: translate(-50%, -50%);
    padding: 18px;
    border-radius: 15px;
    width: 7%;
    @media screen and (max-width: 1366px) {
  width: 11.5%;
  left: 67%;
  }
 }
 .inputBox{
    position: relative;
}
.box4, .box5{
    position: relative;
    top: -200px;
    @media screen and (max-width: 1366px) {
  width: 11.5%;
  left: 67%;
  }
  }
.box4 {
    left: 220px;
    top: -100px;
}
.box5 {
    left: -225px;
}
.box6{
    position: relative;
    left: 62%;
    top: -280px;
    color:#D99923 ;
    transform: translate(-50%, -50%);
    padding: 18px;
    border-radius: 15px;
    width: 7%;
    @media screen and (max-width: 1366px) {
  width: 11.5%;
  left: 67%;
  }
 }
.inputUser{
  background: none;
  border: none;
  border-bottom: 1px solid #0E3659 ;
  outline: none;
  color: black;
  font-size: 10px;
  width: 100%;
  letter-spacing: 1px;
}
.caixa{
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

.horario {
	  position: relative;
        top: -20px; /* Move "jogos" 20 pixels para cima */
        left: 0px; /* Centraliza horizontalmente */
        flex-grow: 1; /* Faz o elemento expandir para preencher o espaço restante */
        text-align: center; /* Centraliza o texto horizontalmente */
    }
     .horario {
        margin-bottom: 100px; /* Adapte o espaçamento vertical inferior conforme necessário */
        color: grid;
    }

    .turmas .turma, .turma2 {
		position: relative;
		font-size: 30px;   
        display: inline-block; /* Mantém "turma" e "turma2" em linha */
        color: #0E3659;
        margin: 0 188px; /* Espaçamento horizontal */
		 top: -24vh;
         left: 48vh;
}
.editar{
		position: relative;
		top: -15rem;
		left: 30rem;
		
			@media screen and (max-width: 1366px) {
    left: 5%;
  }
}
    .enviarbd{
    position: relative;
    
    left: 60%;
	@media screen and (max-width: 1366px) {
    left: 66%;
      }
    }
    .enviarbd #submit{

    background-color: #0E3659;
    color: #D99923;
    border: none;
    padding: 10px 20px;
    font-size: 12px;
    top: 25px;
    border-radius: 5px;
    }
</style>
    
        <form action="saveEditResult.php" method="post" enctype="multipart/form-data">
        <div class= "times">

    <div class="geral">
    <div class="box4">
            <div class="inputBox">
                <input type="file" name="arquivo2" id="id" class="picture">

            </div>
        </div>
        <div class="box5">
            <div class="inputBox">
                <input type="file" name="arquivo1" id="id" class="picture">
            </div>
        </div>  
        </div>
        </div> 
        </div>
        <div class= "geral">
         <div class="box">
         <div class="inputBox">
                <input type="text" name="resultado" id="resultado" class="inputUser" required value="<?php echo $resultado ?>">
                <label for="resultado" class="caixa"> Digite o resultado</label>
                </div>
                </div>
            <br><br>
            <div class="box2">
           <div class="inputBox">
                <input type="text" name="turma" id="turma" class="inputUser" required value="<?php echo $turma ?>">
                <label for="turma" class="caixa">Turma 1</label>
              </div>
              </div>

              <div class="box3">
              <div class="inputBox">
                <input type="text" name="turma2" id="turma2" class="inputUser" required value="<?php echo $turma2 ?>">
                <label for="turma2" class="caixa">Turma 2</label>
              </div>    
            </div>
            <div class="box6">
            <div class="enviarbd">
            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
            <input type="submit" name="atualizar" id="atualizar"> 
            </div>
            </div>
        </div>
              
           

         
 
           
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
        
     </center>

         <td><div class="turma"><?php echo $dado["turma"]; ?></div></td>
    
        <td><div class="turma2"><?php echo $dado["turma2"]; ?></div></td>
        </div>
  <!-- Começo editar e excluir -->

			 <td class="editar"><a class='btn btn-sm btn-primary' href='editresult.php?id=<?php echo $dado["id"]; ?>'> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
				 </a>
			  <a class='btn btn-sm btn-danger' href='deleteresult.php?id=<?php echo $dado["id"]; ?>'>
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
                              <a href="#" class="footer-link">Feed</a>
                          </li>
                          <li>
                              <a href="#" class="footer-link">Events</a>
                          </li>
                          <li>
                              <a href="index.html" class="footer-link">About</a>
                          </li>
                      </ul>
          
                      <ul class="footer-list">
                          <li>
                              <h3>Events</h3>
                          </li>
                          <li>
                              <a href="#" class="footer-link">Evento 1</a>
                          </li>
                           <li>
                              <a href="#" class="footer-link">Evento 2</a>
                          </li>
                           <li>
                              <a href="#" class="footer-link">Evento 3</a>
                          </li>
                          
                      </ul>
          
                      <div id="footer_subscribe">
                          <h3>Utilize o MIESC</h3>
                  <div class="botao2">
                      <a href="../../Site mercury home e about/Cadastro/html (1).html">
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
