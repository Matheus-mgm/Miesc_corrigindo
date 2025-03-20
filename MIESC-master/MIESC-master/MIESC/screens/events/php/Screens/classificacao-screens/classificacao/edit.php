
<?php  

if(!empty($_GET['id']))
{
  include_once('conexaofutsal.php');
	
	$id = $_GET['id'];
	
	$sqlSelect = "SELECT * FROM futsal WHERE id=$id";
	
	$result = $conexao->query($sqlSelect);
	
	
	if($result->num_rows > 0){
	while($dado = mysqli_fetch_assoc($result)){
    $posicao =  $dado['posicao'];
    $sala = $dado['sala'];
    $pontos = $dado['pontos'];
    $quantidadejogos = $dado['quantidadejogos'];
	 }
	}
	else{
		header('Location: classificacao.php');
	}	
 
}
   
$consulta = "SELECT * FROM futsal";
$con = mysqli_query($conexao, $consulta);


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar linha</title>
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
            <li class="nav-item"><a href="../../Site mercury home e about/Site mercury home e about/htmls/home.html" class="nav-link">Home</a></li>  
            <li class="nav-item"><a href="../../Site mercury home e about/Site mercury home e about/htmls/index.html" class="nav-link">About</a></li> 
            <li class="nav-item"><a href="" class="nav-link">Feed</a></li>
			<li class="nav-item"><a href="" class="nav-link">Resources</a>
              <ul>
                <li class="updraft"><a href="../html/camisas.html" class="nav-link">Camisas</a></li>
                <li class="updraft"><a href="../html/campeoes.html" class="nav-link">Campeões</a></li>
                <li class="updraft"><a href="../html/classificacao.html" class="nav-link">Classificação</a></li>
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
    .enviarbd #update{

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

	</style>
    <center>
    <br>
    <div class="textos">
  <h1>Editar linha</h1>
  <br>
  <form action="saveEdit.php" method="post">
	 
	  
  		<div class="enviarbd">
            <input type="submit" name="update" id="update"> 
          
            </div>
    </div>
   
	<table border="2" bordercolor="#0E3659">
		<tr>
			
			<td><div class= "pos"><h2>Posição</h2></div></td>
			<td><div class= "sa"><h2>Sala</h2></div></td>
			<td><div class= "pon"><h2>Pontos</h2></div></td>
			<td><div class= "jog"><h2>Jogos</h2></div></td>
			<td>...</td>
		</tr>
    

   
          <br><br>
          
      <div class= "geral">
     
      <tr>    
        <td>
       <div class="box">
       <div class="inputBox">
        <input type="text" name="posicao" id="posicao" class="inputUser" required placeholder="Digite a posição..." value="<?php echo $posicao ?>">
              <label for="posicao" class="caixa"> </label>
              </div>
              </div>
            </td>
       
          <td>
          <div class="box">
         <div class="inputBox">
              <input type="text" name="sala" id="sala" class="inputUser" required placeholder="Digite a turma..." value="<?php echo $sala ?>">
              <label for="sala" class="caixa"></label>
            </div>
            </div>
        </td>
        <td>
            <div class="box3">
            <div class="inputBox">
              <input type="text" name="pontos" id="pontos" class="inputUser" required placeholder="Digite a pontuação..."  value="<?php echo $pontos ?>">
              <label for="pontos" class="caixa"></label>
            </div>
        </td>
        <td>
            <div class="box4">
            <div class="inputBox">
              <input type="text" name="quantidadejogos" id="quantidadejogos" class="inputUser" required placeholder="Digite o número de jogos..."  value="<?php echo $quantidadejogos ?>">
              <label for="quantidadejogos" class="caixa"></label>
            </div>
          </div>
        </td>
      </div>
		    </tr>
		 <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
		</form>

		
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
         
		<?php } ?> 	
	</table>
	</center>

	<!-- Começo Rodapé -->
              <footer>
                  <div id="footer_content">
                      <div id="footer_contacts">
                         <img src="../../Site mercury home e about/Site mercury home e about/img/mercury.png" widht="20" height="60">
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
                              <a href="../html/index.html" class="footer-link">About</a>
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
