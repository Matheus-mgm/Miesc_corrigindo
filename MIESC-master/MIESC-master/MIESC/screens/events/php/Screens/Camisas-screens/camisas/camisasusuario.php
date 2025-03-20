<?php  

require_once('conexaoCamisasfut.php');

// Consulta as cores armazenadas no banco de dados
$sql = "SELECT * FROM camisas   ";
$result = $conexao->query($sql);
$colors = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $colors[] = [
            'cores' => $row['cores'], 
            'sala' => $row['sala']
        ];
    }
}
$consulta = "SELECT * FROM camisasLinks";
$con = mysqli_query($conexao, $consulta);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Camisas</title>
	<link rel="stylesheet" href="../../css/camisas.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="icon" type="image/x-icon" href="../../../Site mercury home e about/img/icone miesc.png">
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
        <li class="nav-item"><a href="../../html/interclasse.html" class="nav-link">Events</a></li>
    </ul>
  </div>
</header>
	
	 <div class="fundo">
      
	</div>
	<style>
		.fundo{
	z-index: 4;
}
.textos h1{
	position: relative;
	z-index: 5;

}
	</style>
	  <center> 
<div class="textos">
  <h1>Se cadastre como jogador</h1>
  <br>
  <div class="botao3">
  	<a href="../futsal/cadastro de jogadores/cadastrodejogadores.php">
		<button>Se cadastre</button>
	</a>
  </div>
	  </center>
      <style>
      .container {
            display: block;
            flex-wrap: wrap;
            margin-left: 100px;
        }

        .color-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .circle {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 10px;
            border: 2px solid #000000;
            box-shadow: 3px 3px 3px gray;
        }
		 .coresescolhidas{
            margin-left: 100px;
        }
        .color-info {
            font-size: 20px;
            color: #0E3659;
        }
        .textolinks{
		
        position: relative;
    	top: -4.2rem;
        margin-left: 60rem;

}
.links {
      position: relative;
      top: -80px;
        margin-left: 60rem;
    }

    /* Estilos para os links */
    .links h2 {
        margin: 30px 0;
    }
    .nav-list li  ul{
    position:absolute;
    top:35px;
    left:-35px;
    display:none;
    text-align: center;
	
    
}
    </style>
</head>
<body>
	<div class="coresescolhidas">
    <h1>Cores Escolhidas</h1>
	</div>
	<br>
    <div class="container">
    <?php foreach ($colors as $color): ?>
        <div class="color-container">
        <div class="circle" style="background-color: <?php echo $color['cores'];?>;"></div>
        <div class="color-info">
        
        <p style="color: <?php echo $color['cores']; ?>">Sala: <?php echo $color['sala']; ?></p>
        </div>
        </div>
    <?php endforeach; ?>
    </div>
	
<div class="textolinks">
	<h1>Indicações</h1>
	</div>
	<div class="links">
		  <?php while($dado = $con->fetch_array()){ ?>			
			<h2><a href="<?php echo $dado['urls']; ?>"><?php echo $dado['tituloslinks']; ?></a></h2>
		     <?php } ?> 
    <h2><a href="https://www.instagram.com/titanium_fardamentos/">Titanium</a></h2>
    <h2><a href="https://oficinadoabada.com.br/criar-camiseta-de-time-personalizada/">Oficina do Abada</a></h2>
	</div>
		  <br>
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
                <a href="#" class="footer-link">Events</a>
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