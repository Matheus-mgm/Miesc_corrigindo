
<?php  
include_once('conexaofutsal.php');
if(isset($_POST['enviar']))
{
  

    
          
    $posicao =  $_POST['posicao'];
    $sala = $_POST['sala'];
    $pontos = $_POST['pontos'];
    $quantidadejogos = $_POST['quantidadejogos'];


      $result = mysqli_query($conexao, "INSERT INTO futsal (posicao, sala, pontos, quantidadejogos)
     VALUES ('$posicao','$sala', '$pontos', '$quantidadejogos')");


}
   
$consulta = "SELECT * FROM futsal";
$con = mysqli_query($conexao, $consulta);


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Classificação Adm</title>
	<link rel="stylesheet" href="../../css/classificacao.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
           <li class="nav-item"><a href="../../../Site mercury home e about/htmls/home adm.html" class="nav-link">Home</a></li>  
            <li class="nav-item"><a href="../../../Site mercury home e about/htmls/index adm.html" class="nav-link">About</a></li> 
            <li class="nav-item"><a href="../../../feed/feed.php" class="nav-link">Feed</a></li>
			<li class="nav-item"><a href="" class="nav-link">Resources</a>
              <ul>
              <li class="updraft"><a href="../camisas/camisas.php" class="nav-link">Camisas</a></li>
                <li class="updraft"><a href="../campeoes/campeoes.php" class="nav-link">Campeões</a></li>
                <li class="updraft"><a href="../resultados futsal/resultado.php" class="nav-link">Resultados</a></li>
                <li class="updraft"><a href="../classificacao/classificacao.php" class="nav-link">Classificação</a></li>
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
	  .acoes h2{
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
     .inputBox{
    position: relative;
}

     .inputUser{
  background: none;
  border: none;
  outline: none;
  color: black;
  font-size: 20px;
}
.caixa{
    top: 0%;
    left: 0%;

}
     .enviarbd{
    position: relative;
    }
    .enviarbd #enviar{

    background-color: #0E3659;
    color: #D99923;
    border: none;
    padding: 10px 20px;
    font-size: 18px;
    border-radius: 5px;
    }
    .branco td{
    border: none;
    }
    table {
    flex-wrap: wrap;
    flex-direction: column;
    height: calc(1.2em * 4);
}
.nav-list li  ul{
    position:absolute;
    top:35px;
    left:-35px;
    display:none;
    text-align: center;
	
    
}
	</style>
    <center>
    <br>
    <div class="textos">
  <h1>Adicionar linha</h1>
  <br>
  <form action="classificacao.php" method="post">
  <div class="enviarbd">
            <input type="submit" name="enviar" id="enviar"> 
          
            </div>
    </div>
   
	<table border="2" bordercolor="#0E3659">
		<tr>
			
			<td><div class= "pos"><h2>Posição</h2></div></td>
			<td><div class= "sa"><h2>Sala</h2></div></td>
			<td><div class= "pon"><h2>Pontos</h2></div></td>
			<td><div class= "jog"><h2>Jogos</h2></div></td>
			<td><div class= "acoes"><h2>...</h2></div></td>
		</tr>
    

   
          <br><br>
          
      <div class= "geral">
     
      <tr>    
        <td>
       <div class="box">
       <div class="inputBox">
        <input type="text" name="posicao" id="posicao" class="inputUser" required placeholder="Digite a posição..." >
              <label for="posicao" class="caixa"> </label>
              </div>
              </div>
            </td>
       
          <td>
          <div class="box">
         <div class="inputBox">
              <input type="text" name="sala" id="sala" class="inputUser" required placeholder="Digite a turma...">
              <label for="sala" class="caixa"></label>
            </div>
            </div>
        </td>
        <td>
            <div class="box3">
            <div class="inputBox">
              <input type="text" name="pontos" id="pontos" class="inputUser" required placeholder="Digite a pontuação...">
              <label for="pontos" class="caixa"></label>
            </div>
        </td>
        <td>
            <div class="box4">
            <div class="inputBox">
              <input type="text" name="quantidadejogos" id="quantidadejogos" class="inputUser" required placeholder="Digite o número de jogos...">
              <label for="quantidadejogos" class="caixa"></label>
            </div>
          </div>
        </td>
         <td></td>
      </div>

    </tr>
    <tr class="branco">
    
      <td><Br></td>
      <td><Br></td>
      <td><Br></td>
      <td><Br></td>
    
  </tr>
    
     <?php while($dado = $con->fetch_array()){ ?>
	<tr>
			<td><div class="posicao"><?php echo $dado["posicao"]; ?></h2></td>
			<td><div class="sala"><?php echo $dado["sala"]; ?></div></td>
           <td><div class="pontos"><?php echo $dado["pontos"]; ?></div></td>
           <td><div class="quantidadejogos"><?php echo $dado["quantidadejogos"]; ?></div></td>
          <td>
			 <a class='btn btn-sm btn-primary' href='edit.php?id=<?php echo $dado["id"]; ?>'> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg>
				 </a>
			  <a class='btn btn-sm btn-danger' href='delete.php?id=<?php echo $dado["id"]; ?>'>
				<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
  				<path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
</svg>
				</a>
			</td>

	 </tr>
		<?php } ?> 	
	</table>
	</center>
	<br><br>	
  
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
                <a href="#" class="footer-link">Events</a>
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