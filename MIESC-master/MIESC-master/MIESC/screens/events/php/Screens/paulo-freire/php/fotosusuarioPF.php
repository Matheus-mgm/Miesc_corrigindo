<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	include_once('uploadPF.php');
    $uploadDir = "/TCC/Tudo pronto/USBWebserver v8.6/root/Site mercury home e about/events/php/sarau e paulo freire/Paulo Freire/postagens/";
    $uploadFile = $uploadDir . basename($_FILES["file"]["name"]);

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadFile)) {
        // Conectar ao banco de dados e inserir informações sobre a foto
        $conn = new mysqli("localhost", "root", "usbw", "textos");
       
        $nomeArquivo = basename($_FILES["file"]["name"]);
        $sql = "INSERT INTO fotospf (nome_arquivo) VALUES ('$nomeArquivo')";

        if ($conn->query($sql) === TRUE) {
            echo "Arquivo enviado com sucesso.";
        } 
    } 
}
$conn = new mysqli("localhost", "root", "usbw", "textos");

$sql = "SELECT * FROM fotospf";
$result = $conn->query($sql);

$fotos = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $fotos[] = $row;
    }
}


// Não especificar o Content-Type aqui para que o tipo de conteúdo padrão (HTML) seja usado

// Código HTML para exibir as imagens (substitua por sua lógica)

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="icon" type="image/x-icon" href="../sarau/img/apresentaçoes sarau.png">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<link rel="icon" type="image/x-icon" href="img/icone miesc.png">

    <title>Postagens</title>
</head>


    <body>
   


    <header>
        <nav class="miesc">
            <div class="logo">
                <img src="../Paulo Freire/img/miesc.png" widht="30px" height="60px">       
            </div>
            <div class="nav-list">
            <ul>
              <li class="nav-item"><a href="../../../../Site mercury home e about/htmls/home.html" class="nav-link">Home</a></li>  
                <li class="nav-item"><a href="../../../../Site mercury home e about/htmls/index.html" class="nav-link">About</a></li> 
                <li class="nav-item"><a href="../../../../feed/feedUser.php" class="nav-link">Feed</a></li>
                <li class="nav-item"><a href="" class="nav-link">Events</a>
              <ul>
             <li class="updraft"><a href="../../../html/interclasse.html" class="nav-link">Interclasse</a></li>
                <li class="updraft"><a href="../../../../html/pauloFreire.html" class="nav-link">Paulo Freire</a></li>
                <li class="updraft"><a href="../../../../html/sarau.html" class="nav-link">Sarau</a></li>
             </ul>
             </li>
			</ul>
          </div>
    
          <div class="mobile-menu-icon">
            <button onclick="menuShow()"><img class="icon" src="../sarau/img/menu.svg" alt=""></button>
        </div>
        </nav>
        <div class="mobile-menu">
          <ul>
            <li class="nav-item"><a href="Site mercury home e about/htmls/home.html" class="nav-link">Home</a></li>  
            <li class="nav-item"><a href="Site mercury home e about/htmls/index.html" class="nav-link">About</a></li> 
            <li class="nav-item"><a href="" class="nav-link">Feed</a></li>
            <li class="nav-item"><a href="" class="nav-link">Events</a></li>
        </ul>
      </div>
    </header>
    <hr>
    <!--fim cabeçalho-->




    
    <div class="background"></div>

 
    
    
    <div class="fotos" id="fotos">
        <!-- Aqui serão exibidas as fotos -->
    </div>

   
    <div class="carousel-container">
    <div class="slider">
    <div class="slider center-slide">
    
        <?php foreach ($fotos as $foto) {
            $nomeArquivo = $foto['nome_arquivo'];
            echo '<div><img src="postagens/' . $nomeArquivo . '" alt="' . $nomeArquivo . '"></div>';
        } ?>
        </div>
   </div>
</div>
 








    <script src="Jscript/scripts.js"></script>




    
     <!--início rodapé-->
         <footer>
    <div id="footer_content">
        <div id="footer_contacts">
           <img src="../../../../Site mercury home e about/img/mercury.png" widht="20" height="60">
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
                <a href="../../../../feed/feedUser.php" class="footer-link">Feed</a>
            </li>
            <li>
                <a href="" class="footer-link">Events</a>
            </li>
            <li>
                <a href="../../../../Site mercury home e about/htmls/index.html" class="footer-link">About</a>
            </li>
        </ul>

        <ul class="footer-list">
            <li>
                <h3>Events</h3>
            </li>
            <li>
                <a href="../../../html/interclasse.html" class="footer-link">Interclasse</a>
            </li>
             <li>
                <a href="../../../../html/sarau.html" class="footer-link">Sarau</a>
            </li>
             <li>
                <a href="../../../../html/pauloFreire.html" class="footer-link">Paulo Freire</a>
            </li>
            
        </ul>

        <div id="footer_subscribe">
            <h3>Utilize o MIESC</h3>
    <div class="botao2">
        <a href="../../../../Cadastro/cadastro.php">
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




	
      <!--inicio css-->
      <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600&display=swap');

*{
    margin:0px;
    padding:0px;
    box-sizing: border-box;
    font-family: "Roboto", sans-serif;
    border: none;
}

    /* padrao de cores*/ 

    :root {
        --color-neutral-0: #0E3659;
        --color-neutral-10: #018DB5;
        --color-neutral-30: #0E3659;
        --color-neutral-40: #D99923;
    
}

html::-webkit-scrollbar{
    width: Screm;
}

html::-webkit-scrollbar-track{
    background: transparent;
}

html::-webkit-scrollbar-thumb{
    background-color: white;
    border-radius: 5rem;
}

.center-slide {
  display: flex;
  justify-content: center;
  align-items: center;

}

.center-slide div {
  text-align: center;
}
.center-slide img {
  max-width: 100%; /* Ensure the image doesn't exceed its container */
  max-height: 100%; /* Ensure the image doesn't exceed its container */
  margin: 0 auto; /* Center horizontally */
}

.center-slide img {
  
max-width: 300%; 
max-height: 250%; 
width: 600px; 
  height: 500px; 
  margin: 0 auto; 

}

.background{
    min-height: 85vh; /* Reduzi a altura mínima */
    background-image: url("img/postagens.png");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover; /* Usar 'cover' para ajustar a imagem ao contêiner */
    margin-bottom: 0; /* Removi a margem inferior */
    padding-bottom: 50px; /* Adicionei um preenchimento inferior para espaçamento */
}


body{
    background-color: white;
}

header {
    background-color: #0E3659;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
    position: relative;
    padding: 12px 80px;
    width: 100%;
    z-index: 10;
	overflow: visible;
}

/* início upload de imagens */






/* final upload de imagem */ 

.miesc {
    justify-content: space-between;
    align-items: center;
    text-align: center;
    top: 0;
	transition: 0.5s;
    display: flex;
}
.nav-list{
padding-top:15px ;
list-style:none;
float:right;
}
.nav-list li{
    position:relative;
    float:right;
    margin: 0 10px;
	list-style-type: none;
}

.nav-list li a{
    color: #D99923;
    text-decoration:none;
    padding:5px 10px;
    display:block;
    font-size: 18px;
    font-weight: bold;
    border-radius: 5px;
    transition: 0.4s ease;
}

.nav-list li a:hover{
    background-color: #041f5a;
    color: #D99923;
}
.updraft{
    background-color: #007c9e;
    color: #D99923;
    border-radius: 5px;
	box-shadow: 2px 2px 2px 1.5px #0E3659;
}
.nav-list li  ul{
    position:absolute;
    top:35px;
    left:-75px;
    display:none;
    text-align: center;
	
    
}
.nav-list li:hover ul, .nav-list li.over ul{display:block;}
.nav-list li ul li{
    display:block;
    width:150px;
    }

.mobile-menu-icon {
    display: none;
}
.mobile-menu {
    display: none;
}
@media screen and (max-width: 730px) {
    .nav-bar {
        padding: 1.5rem 4rem;
    }
    .nav-item {
        display: none;
    }
    .login-button {
        display: none;
    }
    .mobile-menu-icon {
        display: block;
    }
    .mobile-menu-icon button {
        background-color: transparent;
        border: none;
        cursor: pointer;
    }
    .mobile-menu ul {
        display: flex;
        flex-direction: column;
        text-align: center;
        padding-bottom: 1rem;
    }
    .mobile-menu .nav-item {
        display: block;
        padding-top: 1.2rem;
    }
    .open {
        display: block;
    }
}









footer {
    position: relative;
    width: 100%;
    color: var(--color-neutral-40);
    height: 48px;
    left: 0;
    bottom: 0;   
    margin-top: 150px;
    
}
.footer-link {
    text-decoration: none;
}
#footer_content {
    background-color: var(--color-neutral-10);
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    padding: 3rem 3.5rem;
}
#footer_contacts h1 {
    margin-bottom: 0.75rem;
}
#footer_social_media {
    display: flex;
    gap: 2rem;
    margin-top: 1.5rem;
} 
#footer_social_media .footer-link {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 2.5rem;
    width: 2.5rem;
    color: var(--color-neutral-0);
    border-radius: 50%;
    transition: all 0.4s;
}
#footer_social_media .footer-link i {
    font-size: 1.25rem;    
}
#footer_social_media .footer-link:hover {
    opacity: 0.8;
}
#instagram {
    background: linear-gradient(#7f37c9, #ff2992, #ff9807);
}
#whatsapp {
    background-color: #25d366;
}
.footer-list {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    list-style: none;
}
.footer-list .footer-link {
    color: var(--color-neutral-30);
    transition: all 0.4s;
}
.footer-list .footer-link:hover {
    color: #7f37c9;
}
#footer_subscribe {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}
#footer_subscribe p {
    color: var(--color-neutral-30);
}
.botao2 button{
	background-color: #0E3659;
    color: #D99923;
    border: none;
    padding: 10px 20px;
    font-size: 20px;
    border-radius: 5px;
}
#footer_copyright {
    display: flex;
    justify-content: center;
    background-color: var(--color-neutral-0);
    font-size: 0.9rem;
    padding: 1.5rem;
    font-weight: 100;
}
@media screen and (max-width: 768px) {
    #footer_content {
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }
}
@media screen and (max-width: 426px) {
    #footer_content {
        grid-template-columns: repeat(1, 1fr);
        padding: 3rem 2rem;
    }
}
.fundo{
    min-height: 100vh;
    background-image:url("../fotossarau.png");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}
.texto{
    position: absolute;
    top: 35%;
    Left: 70%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: #D99923;
}
.texto h1{
    font-size: 45px;
    margin: 0px;
}
.texto h2{
    font-size: 20px;
    margin: 0px;
    color: #D99923;
}
.textos{
    margin: 5%;
    
}
.textos h2{
    font-size: 20px;
}
.textos h3{
    font-size: 10px;
}
.botao3 button2{
	background-color: #d2d2d3;
    color: #0E3659;
    padding: 14px 23px;
    font-size: 20px;
    border-radius: 5px;
}
.botao3 button{
	background-color: #0E3659;
    color: #D99923;
    border: none;
    padding: 10px 20px;
    font-size: 20px;
    border-radius: 5px;
}
.botao3 a{
    text-decoration: none;
}
.card:hover{
    background-color: #ffffff;
   }
   .card:hover h3,
   .card:hover p{
    color: #018DB5;
   }
   .card:hover hr{
   background-color:#018DB5;
   }
   .card:hover h3{
   transform: translateY(-20px);
   }
   .card:hover p{
   font-size: 25px;
   }
   .card:hover h3,
   .card:hover p{
    transition: all 400ms ease-in-out;
   }
   .card-p4{
   width: 25%;
   transform: translateY(-20px);
   }
   .card {
    border: unset;
    box-shadow: rgba(9, 30, 66, 0.15) 0px 0.5rem 1rem 0px;
   }
   </style>
    <!--fim css-->


    <script>
    $(document).ready(function(){
        $('.slider').slick({
            infinite: true,
            slidesToShow: 1, // Adjust as needed
            slidesToScroll: 1, // Adjust as needed
            autoplay: true, // Set to true for automatic scrolling
            autoplaySpeed: 3000, // Adjust the speed (in milliseconds)
            arrows: true, // Show navigation arrows]
        });
    });
</script>



</body>
</html>