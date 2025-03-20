<?php  
include_once('conexaoCamisasfut.php');
if (isset($_POST['color'])) {
if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Código de colocar cores
   
	$cores = $_POST['color'];
    $sala = $_POST['sala'];
    include_once('conexaoCamisasfut.php');
    // Inserir a cor escolhida no banco de dados
    $sql = "INSERT INTO camisas (cores, sala) VALUES ('$cores', '$sala')";
    if ($conexao->query($sql) === TRUE) {
        echo "<script>alert('Cor escolhida e armazenada com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao armazenar a cor: " . $conexao->error . "');</script>";
    }
 }
}
$sql = "SELECT * FROM camisas";  // Código de exibir as cores
$con2 = mysqli_query($conexao, $sql);
$result = $conexao->query($sql);
$colors = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $colors[] = [
            'cores' => $row['cores'], 
            'sala' => $row['sala']
        ]; // Use 'cor' ou o nome correto da coluna no seu banco de dados
    }
}
if(isset($_POST['enviarlinks']))
{
  

    include_once('conexaoCamisasfut.php');

          $urls = $_POST['urls'];
		$tituloslinks = $_POST['tituloslinks'];

      $result = mysqli_query($conexao, "INSERT INTO camisaslinks(urls, tituloslinks)
     VALUES ('$urls','$tituloslinks')");

}
$consulta = "SELECT * FROM camisaslinks";
$con = mysqli_query($conexao, $consulta);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Camisas Adm</title>
	<link rel="stylesheet" href="../../css/camisas.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="icon" type="image/x-icon" href="../../../Site mercury home e about/img/icone miesc.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
  <h1>Veja os jogadores cadastrados</h1>
  <br>
  <div class="botao3">
  	<a href="../futsal/cadastro de jogadores/exibirjogadoresfutsal.php">
		<button>Acesse aqui</button>
	</a>
  </div>
	  </center>
      <title>Escolha de Cor</title>
      <style>
        .admin-section {
            width: 300px;
            padding: 20px;
            border: 2px solid #000000;
            border-radius: 10px;
            box-shadow: 5px 5px 5px gray;
            margin-left: 100px;
           
        }
        .coresescolhidas{
            margin-left: 100px;
        }
       
        .color-picker-container {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #ffffff; /* Defina uma cor de fundo padrão aqui */
            cursor: pointer;
            border: 2px solid #000000;
            box-shadow: 3px 3px 3px gray;
            display: flex;
            justify-content: center;
            align-items: center;
          
        }

        .color-picker {
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }

        input[type="color"] {
            display: none; /* Oculta o seletor de cores padrão */
        }

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

        .color-info {
            font-size: 20px;
            color: #0E3659;
        }
        .color-label {
    position: absolute;
    left: 10px;
    top: 20px;
    transition: top 0.2s, font-size 0.2s;
    pointer-events: none;
    padding: 4px; /* Aumente o padding para espaçamento entre o texto e a borda colorida */
    color: #ffffff; /* Defina a cor do texto como branca */
}

/* Define uma cor de fundo escura para o rótulo quando a cor selecionada for clara */
.color-label.dark-bg {
    background-color: #000000;
}
        .form-group {
    position: relative;
    margin-bottom: 20px;
    top: 0.5rem;
}

.form-group	label {
    position: absolute;
    left: 10px;
    top: 20px;
    transition: top 0.2s, font-size 0.2s;
    pointer-events: none;
}

.form-group label.active {
    top: 1px;
    font-size: 12px;
}

.form-group input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
    transition: color 0.2s; /* Adicione uma transição para suavizar a mudança de cor */
}

.form-group input[type="text"]:focus {
    border-color: #0E3659; /* Cor da borda quando em foco */
    /* Defina a cor do texto para a mesma cor de fundo do seletor de cores */
    color: #ffffff;
}

.enviar2 button{

background-color: #0E3659;
color: #D99923;
border: none;
padding: 8px 10px;
font-size: 12px;
border-radius: 5px;
}
.links-section{
    position: absolute;
    	top: 1418px;
       
        margin-left: 95rem;
    width: 300px;
    padding: 20px;
    border: 2px solid #000000;
    border-radius: 10px;
    box-shadow: 5px 5px 5px gray;	
	text-align: center;
  
}
		 .grupolinks {
    margin-bottom: 20px;
    top: 0.5rem;
    
}

.grupolinks	label {
   
    left: 10px;
    top: 20px;
    transition: top 0.2s, font-size 0.2s;
    pointer-events: none;
}

.grupolinks label.active3 {
    top: 1px;
    font-size: 12px;
}

.grupolinks input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
   margin: 0 auto; /* Centraliza horizontalmente */
}


	 .grupolinks {
  
    margin-bottom: 20px;
    top: 0.5rem;
}

.grupolinks	label {
    position: absolute;
    left: 10px;
    top: 20px;
    transition: top 0.2s, font-size 0.2s;
    pointer-events: none;
}

.grupolinks label.active2 {
    top: 1px;
    font-size: 12px;
}

.grupolinks input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
 	margin: 0 auto; /* Centraliza horizontalmente */
}

		.grupolinks input[type="url"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
	margin: 0 auto; /* Centraliza horizontalmente */
}


.grupolinks{
		
        position: relative;

       
        display: flex;
        flex-direction: column;
        align-items: flex-end; /* Alinhe os links à direita */	
}

.textolinks{
		
    position: absolute;
    top: 1800px;
        margin-left: 99rem;
       
      
}
.links {
    position: absolute;
    top: 1850px;
        margin-left: 99rem;
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
<!-- Escolha de cor -->
<div class="admin-section">
   <center>
        <h2>Escolha uma cor</h2>

        <form method="POST" name="corsala" id="corsala">
            
            <div class="color-picker-container" id="color-picker-container" onclick="document.getElementById('cores').click();">
                <div class="color-picker" id="color-picker"></div>
            </div>
            <input type="color" id="cores" name="color" onchange="updateColor(this.value);" style="display: none;">
            <div class="form-group">
            <label for="sala" id="sala-label" class="active">Escolha a sala:</label>
            <input type="text" id="sala" name="sala" required oninput="checkInput()">
            </div>
            <div class="enviar2">
            <button type="submit">Salvar</button>
            </div>
        </form>
   </center>
    </div>
    <script>
		 // caixas de texto
       function checkInput() {
    var input1 = document.getElementById("sala");
    var label1 = document.getElementById("sala-label");

    if (input.value !== "") {
        label.classList.add("active");
    } else {
        label.classList.remove("active");
    }
  function checkInput2() {
    var input2 = document.getElementById("links");
    var label2 = document.getElementById("sala-label2");

    if (input.value !== "") {
        label.classList.add("active2");
    } else {
        label.classList.remove("active2");
    }
	   function checkInput3() {
    var input2 = document.getElementById("texto");
    var label2 = document.getElementById("sala-label2");

    if (input.value !== "") {
        label.classList.add("active3");
    } else {
        label.classList.remove("active3");
    }
    // Cor do texto igual da escolha
    var selectedColor = document.getElementById('cores').value;
    var luminance = getLuminance(selectedColor);

    // Adiciona ou remove a classe dark-bg com base na luminosidade
    if (luminance > 0.5) {
        label.classList.remove("dark-bg");
    } else {
        label.classList.add("dark-bg");
    }
}

// Função para calcular a luminosidade da cor (0 a 1)
function getLuminance(hex) {
    hex = hex.replace(/^#/, '');
    var r = parseInt(hex.slice(0, 2), 16) / 255;
    var g = parseInt(hex.slice(2, 4), 16) / 255;
    var b = parseInt(hex.slice(4, 6), 16) / 255;
    var luminance = 0.2126 * r + 0.7152 * g + 0.0722 * b;
    return luminance;
}
    </script>
    <script>
	    // Aplica a cor ao campo de texto da sala
      function updateColor(selectedColor) {
    document.getElementById('color-picker').style.backgroundColor = selectedColor;
    localStorage.setItem('selectedColor', selectedColor);

   
    document.getElementById('sala').style.color = selectedColor;
}
        const storedColor = localStorage.getItem('selectedColor');
        if (storedColor) {
            updateColor(storedColor);
        }
		
		 

    </script>
	<!-- Exibe as cores e as salas -->
  <div class="comEditar">
          <br><br><br><br>
      
          <br>
          <div class="comEditar">
    <div class="coresescolhidas">
        <h1>Exemplo</h1>
    </div>
    <br>
    <div class="container">
        <table>
            <!-- Primeira Cor Fixa -->
            <tr>
                <td style="display: inline-block;">
                    <div class="color-container">
                        <div class="circle" style="background-color: #0E3659;"></div>
                    </div>
                </td>
                <td style="display: inline-block;">
                    <div class="color-info">
                        <p style="color: #0E3659;">MERCURY</p>
                    </div>
                </td>
            </tr>
            <!-- Segunda Cor Fixa -->
            <tr>
                <td style="display: inline-block;">
                    <div class="color-container">
                        <div class="circle" style="background-color: #018DB5;"></div>
                    </div>
                </td>
                <td style="display: inline-block;">
                    <div class="color-info">
                        <p style="color: #018DB5;">MIESC</p>
                    </div>
                </td>
            </tr>
            <!-- Adicione mais linhas conforme necessário para mais cores fixas -->
        </table>
    </div>
</div>
<div class="coresescolhidas">
          <h1>Cores Escolhidas</h1>
          </div>
          <div class="container">
          <table>
    <?php foreach ($colors as $color): ?>
        <tr>
            <td style="display: inline-block;">
                <div class="color-container">
                    <div class="circle" style="background-color: <?php echo $color['cores'];?>;"></div>
                </div>
            </td>
            <td style="display: inline-block;">
                <div class="color-info">
                    <p style="color: <?php echo $color['cores']; ?>">Sala: <?php echo $color['sala']; ?></p>
                </div>
            </td>
            <?php if ($dado = $con2->fetch_array()): ?>
            <td>
            
                <a class='btn btn-sm btn-primary' href='editCamisas.php?id=<?php echo $dado["id"]; ?>'> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                </a>

                <a class='btn btn-sm btn-danger' href='deleteCamisas.php?id=<?php echo $dado["id"]; ?>'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                        <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                    </svg>
                </a>
            </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>
     
       
    </table>
  </div>
		  <br>
    <style>
    .comEditar{

    }
    </style>
	<!-- Adicionar links -->
    <div class="links-section">
	<center>
		 <h2>Adicione um link</h2>
		<br><br>
	<form action="camisas.php" method="post">
            <div class="grupolinks">
                <label for="links" id="sala-label2" class="active2">Link:</label>
                <input type="url" id="urls" name="urls" required>
            </div>
            <div class="grupolinks">
                <label for="texto" id="sala-label2" class="active3">Texto do Link:</label>
                <input type="text" id="tituloslinks" name="tituloslinks" required>
            </div>
            <div class="enviar2">
                <button type="submit" name="enviarlinks" id="enviarlinks">Adicionar Link</button>
            </div>
        </form>
    </div>
		</center>
</div>
	<!-- Exibir links -->
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