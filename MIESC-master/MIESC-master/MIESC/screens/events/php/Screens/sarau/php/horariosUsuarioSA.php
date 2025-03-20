<?php  

include_once('conexaoSA.php');
$consulta = "SELECT * FROM sarau";
$con = $conexao->query($consulta);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../sarau/css/sarau.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
		<link rel="icon" type="image/x-icon" href="../../../Site mercury home e about/img/icone miesc.png">
    <title>Apresentações</title>
</head>
<body>
  <header>
        <nav class="miesc">
            <div class="logo">
                <img src="../sarau/img/miesc.png" widht="30px" height="60px">       
            </div>
            <div class="nav-list">
            <ul>
                <li class="nav-item"><a href="../../../Site mercury home e about/htmls/home.html" class="nav-link">Home</a></li>  
                <li class="nav-item"><a href="../../../Site mercury home e about/htmls/index.html" class="nav-link">About</a></li> 
                <li class="nav-item"><a href="../../../feed/feedUser.php" class="nav-link">Feed</a></li>
                <li class="nav-item"><a href="" class="nav-link">Events</a>
                    <ul>
                      <li class="updraft"><a href="../../../events/html/interclasse.html" class="nav-link">Interclasse</a></li>
                      <li class="updraft"><a href="../../../html/sarau.html" class="nav-link">Sarau</a></li>
                      
                      <li class="updraft"><a href="../sarau e paulo freire/Paulo Freire/pauloFreire.html" class="nav-link">Paulo Freire</a></li>
                   </ul>
                   </li>
            </ul>
          </div>
    
          <div class="mobile-menu-icon">
            <button onclick="menuShow()"><img class="icon" src="../../../../../../imagens/img_gerais/menu.svg" alt=""></button>
        </div>
        </nav>
        <div class="mobile-menu">
          <ul>
            <li class="nav-item"><a href="../../../html/sarau.html" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="index.html" class="nav-link">About</a></li> 
            <li class="nav-item"><a href="" class="nav-link">Feed</a></li>
            <li class="nav-item"><a href="" class="nav-link">Events</a></li>
        </ul>
      </div>
    </header>

    <style>
    .fundo{
      width: 100%;
    }
    </style>

<style>
    .titulo1 h2{
      font size: 5000px;;
    }
    </style>
    
    <h1>Titulo1</h1>

    <img src="../sarau e paulo freire/Paulo Freire/img/Ondas/ondaApresentacao.png" alt="Apresentação">
        <div class="apresentacao-cont">

        <center>
            <div class="conteudo2">
            <h1Turmas><h1/Horarios>
        <div class= "sal">
            <br></br>


        <br></br>
<div class="container">
<h1>Turma</h1>
</div>

<style>
    .container h1{
        margin top: 50px;
        margin: right 50px;
    }
</style>

</div>

<div class= "hor">

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
        <div class="sal" style="display: inline-block;  margin-right: 120px; margin-bottom: 30px;">

        <?php 
        
        echo $apresentacao['Sala'];
        ?>
        </div>
        <div class="hor" style="display: inline-block;">
            <?php echo date("d/m/Y H:i", strtotime($apresentacao['horarios'])); // Exibe a data e o horário no formato dd/mm/yyyy HH:mm ?>
        </div>
    </div>
    <br> <!-- Adicione uma quebra de linha se você desejar que cada par esteja em uma linha diferente -->
<?php 
}
?>



</center>
<style>
    .conteudo2{

        display: inline-block;
    }
     .hor{
         position: relative;
         font-size: 35px;
         top: -20rem;
         color: #0E3659;
         display: inline-block;  margin-right: 120px; margin-bottom: 30px;
        
     }   
     .sal{
         position: relative;
         font-size: 35px;
         top: -20rem;
         color: #D99923;
         display: inline-block;  margin-right: 120px; margin-bottom: 30px;
      
     }   
    </style>
    </section>
     
    <!–Inicio rodape->
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
                <a href="../../../html/sarau.html" class="footer-link">Sarau</a>
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
       
<!–Fim rodape->
  <script src="../Jscript/script.js"></script>
</body>
</html>