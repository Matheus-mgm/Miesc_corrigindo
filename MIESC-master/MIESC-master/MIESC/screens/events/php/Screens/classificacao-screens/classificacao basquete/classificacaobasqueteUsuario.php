
<?php  
   include_once('conexaoBasquete.php');
   
$consulta = "SELECT * FROM classbasq";
$con = mysqli_query($conexao, $consulta) or die (mysqli_error);


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Classificação</title>
	<link rel="stylesheet" href="../../css/classificacaoBasquete.css">
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
              <li class="updraft"><a href="../camisas basquete/camisasusuarioBasquete.php" class="nav-link">Camisas</a></li>
                <li class="updraft"><a href="../campeoes basquete/campeoesuserbasquete.php" class="nav-link">Campeões</a></li>
                <li class="updraft"><a href="../resultados basquete/resultadoUser.php" class="nav-link">Resultados</a></li>
                <li class="updraft"><a href="classificacaobasqueteUsuario.php" class="nav-link">Classificação</a></li>
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
        <li class="nav-item"><a href="../../../feed/feedUser.php" class="nav-link">Feed</a></li>
        <li class="nav-item"><a href="" class="nav-link">Events</a></li>
    </ul>
  </div>
</header>
	
	 <div class="fundo">
      
        </div>


	 <style>
	   .pos h2{
		   font-size: 50px;
		   color: #D99923;
	   }  
	   .sa h2{
		   font-size: 50px;
		   color: #D99923;
	   }  
	   .pon h2{
		   font-size: 50px;
		   color: #D99923;
	   }  
	   .jog h2{
		   font-size: 50px;
		   color: #D99923;
	   }  
	   .posicao{
		   color:#0E3659;
	   }
	   .posicao, .sala, .pontos, .quantidadejogos{
		   font-size: 30px;
	   }
	   .sala, .pontos, .quantidadejogos{
		   color:#2E2E2E;
	   }
       .nav-list li  ul{
    position:absolute;
    top:35px;
    left:-35px;
    display:none;
    text-align: center;
	
    
}
	</style>
          <br><br>
	<center>
	<table border="2" bordercolor="#0E3659">
		<tr>
			
			<td><div class= "pos"><h2>Posição</h2></div></td>
			<td><div class= "sa"><h2>Sala</h2></div></td>
			<td><div class= "pon"><h2>Pontos</h2></div></td>
			<td><div class= "jog"><h2>Jogos</h2></div></td>
			
		</tr>
	
     <?php while($dado = $con->fetch_array()){ ?>
	<tr>
			<td><div class="posicao"><?php echo $dado["posicao"]; ?></h2></td>
			<td><div class="sala"><?php echo $dado["sala"]; ?></div></td>
           <td><div class="pontos"><?php echo $dado["pontos"]; ?></div></td>
           <td><div class="quantidadejogos"><?php echo $dado["quantidadejogos"]; ?></div></td>
	 </tr>
		<?php } ?> 	
	</table>
	</center>
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