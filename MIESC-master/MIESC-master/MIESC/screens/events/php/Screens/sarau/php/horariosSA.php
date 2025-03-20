<?php  

if(isset($_POST['submit'])){
  
    include_once('conexaoSA.php');

          $data =  $_POST['data'];
          $sala = $_POST['sala'];

      $result = mysqli_query($conexao, "INSERT INTO sarau(horarios,Sala)
     VALUES ('$data','$sala')");
}
include_once('conexaoSA.php');
$consulta = "SELECT * FROM sarau";
$con = $conexao->query($consulta);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../sarau/css/sarauadm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
		<link rel="icon" type="image/x-icon" href="../../../Site mercury home e about/img/icone miesc.png">
	
    <title>Apresentações Adm</title>
</head>
<body>

    <header>
        <nav class="miesc">
            <div class="logo">
                <img src="../sarau/img/miesc.png" widht="30px" height="60px">       
            </div>
          <div class="nav-list">
            <ul>
                <li class="nav-item"><a href="../../../Site mercury home e about/htmls/home adm.html" class="nav-link">Home</a></li>  
                <li class="nav-item"><a href="../../../Site mercury home e about/htmls/index adm.html" class="nav-link">About</a></li> 
                <li class="nav-item"><a href="../../../feed/feed.php" class="nav-link">Feed</a></li>
                <li class="nav-item"><a href="" class="nav-link">Events</a>
                    <ul>
                      <li class="updraft"><a href="../../../events/html/interclasse adm.html" class="nav-link">Interclasse</a></li>
                      <li class="updraft"><a href="../../../html/sarauadm.html" class="nav-link">Sarau</a></li>
                    
                      <li class="updraft"><a href="../sarau e paulo freire/Paulo Freire/pauloFreire adm.html" class="nav-link">Paulo Freire</a></li>
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
            <li class="nav-item"><a href="../../../feed/feed.php" class="nav-link">Feed</a></li>
            <li class="nav-item"><a href="" class="nav-link">Events</a></li>
        </ul>
      </div>
    </header>

    </section>

    <section class="background">
    <img src="../sarau/img/fotossarau.png" alt="Apresentação">

    <center>
    <div class="apresentacao-text">
        <div class="apresentacao-titulo">
        <h1>Adicionar nova apresentação</h1>
        </div>
        <br>
            <form action="horariosSA.php" method="post">
                <div class="inputBox">
                    <label for="data">Digite a data</label>
                    <input type="datetime-local" id="data" name="data" required>
                </div>

                <div class="inputBox">
                     <label for="sala">Turma</label>
                    <input type="text" id="sala" name="sala" required>
                </div>
        <input type="submit" value="Enviar"id="submit"class="envia"name="submit">
    </form>

    </div> 
</center> 


</section>
<div class="container">
<div class= "sal">

<h1>Turma</h1>

</div>

<div class= "hor">

<h1>Horários</h1>



</div>

       <?php 
// Defina o fuso horário para Brasília
date_default_timezone_set('America/Sao_Paulo');
$titulo_exibido = true; // Variável para controlar se o título já foi exibido

while ($apresentacao = mysqli_fetch_assoc($con)) {
    ?>  
    <div class="conteudo">
        <div class="sal" style="display: inline-block;  margin-right: 125px; margin-top: 50px;">
            <?php 
            echo $apresentacao['Sala'];
            ?>
        </div>
        <div class="hor" style="display: inline-block; ">
            <?php echo date("d/m/Y H:i", strtotime($apresentacao['horarios'])); // Exibe a data e o horário no formato dd/mm/yyyy HH:mm ?>
        </div>

        <!-- Adicione os links de editar e excluir aqui -->
    <div class="editar" style="display: inline-block;">
    <div class="bootstrap-buttons">
        <a class='btn btn-sm btn-primary' href='editSaraiadm.php?id=<?php echo $apresentacao["id"]; ?>'>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
            </svg>
        </a>
        <a class='btn btn-sm btn-danger' href='deleteSarau.php?id=<?php echo $apresentacao["id"]; ?>'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
               <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
            </svg>
        </a>
    </div>
</div>
    </div>
    <br> <!-- Adicione uma quebra de linha se você desejar que cada par esteja em uma linha diferente -->
<?php 
}
?>

<style>
	.editar{
	   display: inline-block;
    margin-left: 30px;   /* Ajuste a margem esquerda conforme necessário */
	}
.bootstrap-buttons .btn {
    display: inline-block;
    font-weight: bold;
    text-align: center;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.bootstrap-buttons .btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}

.bootstrap-buttons .btn-danger {
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
}

.apresentacao-text {
    margin-top: 5rem; /* Adicione a margem desejada para mover a caixa para baixo */
}
   
   .background{
    bottom: -100rem;
    min-height: 80vh;
    background-image: url(../sarau/img/fotossarau.png);
    background-repeat: no-repeat;
    background-position: center;
   }

     .hor{
         
         font-size: 35px;
         color: #0E3659;
         display: inline-block;  
         margin-left: 3rem; 
         
        
     }   
     .sal{
        margin-top: 16rem;
         font-size: 35px;
         color: #D99923;
         display: inline-block;  
         margin-left: 37rem; 
      
     }   

     

    </style>
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
                <a href="../../../html/sarauadm.html" class="footer-link">Sarau</a>
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
</section>
       
<!–Fim rodape->
  <script src="../Jscript/script.js"></script>
</body>
</html>