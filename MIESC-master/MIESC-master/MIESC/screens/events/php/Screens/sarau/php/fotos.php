<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	include_once('upload.php');
    $uploadDir = "imagens/";
    $uploadFile = $uploadDir . basename($_FILES["file"]["name"]);

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadFile)) {
        // Conectar ao banco de dados e inserir informações sobre a foto
        $conn = new mysqli("sql305.infinityfree.com", "if0_36233083", "miesc79", "if0_36233083_textos");
       
        $nomeArquivo = basename($_FILES["file"]["name"]);
        $sql = "INSERT INTO fotos (nome_arquivo) VALUES ('$nomeArquivo')";

        if ($conn->query($sql) === TRUE) {
            $mensagem = "Arquivo enviado com sucesso.";
echo "<script>alert('$mensagem');</script>";
        } 
    } 
}
$conn = new mysqli("sql305.infinityfree.com", "if0_36233083", "miesc79", "if0_36233083_textos");

$sql = "SELECT * FROM fotos";
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
	<link rel="icon" type="image/x-icon" href="../../../Site mercury home e about/img/icone miesc.png">

    <title>Postagens Adm</title>
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

 
    <h1>Adicione uma foto</h1>
    
    
    <form action="fotos.php" method="post" enctype="multipart/form-data">
    <div class="botao4">
        <input type="file" name="file" id="file">
        </div>
        <br></br>
        <div class="botao5">
      <input type="submit" value="Enviar" name="submit" id="submit">
       </div>
    </form>
    
   
    
    
    <div class="fotos" id="fotos">
        <!-- Aqui serão exibidas as fotos -->
    </div>

   
    <div class="carousel-container">
    <div class="slider">
    <div class="slider center-slide">
		
    <?php foreach ($fotos as $foto) {
    $nomeArquivo = $foto['nome_arquivo'];
    $id = $foto['id']; // Adicione esta linha para obter o ID da foto
    echo '<div class="foto-container">';
    echo '<img src="imagens/' . $nomeArquivo . '" alt="' . $nomeArquivo . '">';
	echo ' <div class="bootstrap-buttons">';
    echo '<a class="btn btn-sm btn-danger delete-btn" name="delete" href="deletefoto.php?id=' . $id . '">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
              </svg>
            </a>';
    echo '</div>';
	    echo '</div>';

} ?>

        </div>
   </div>
</div>
 








    <script src="javascript/scripts.js"></script>




    
     <!--início rodapé-->
   
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


.bootstrap-buttons .btn-danger {
	margin-top: 10px;
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
}
.button-container h1{
    color: #D99923;
}

.button-container {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column; /* Stack elements vertically */
  margin-top: 20px; /* Add margin to separate from other elements if needed */
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5); /* Add a shadow effect */
  padding: 20px; /* Add padding inside the box */
  border-radius: 10px; /* Round the corners of the box */
  background-color: white; /* Set the background color */
  width: fit-content; /* Make the box width fit its content */
}

.botao4 input[type="file"],
.botao5 input[type="submit"] {
   
  padding: 10px;
  background-color: #0E3659;
  color: #D99923;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 14px;
  margin: 5px;
  display: inline-block; /* Ensure the elements are displayed inline */
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
.background {
    min-height: 90vh;
    background-image: url(../sarau/img/postagenssarau.png);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    margin-bottom: 40px; /* Adicione a unidade de medida (por exemplo, px) */
    padding-bottom: 50px; /* Adicione a unidade de medida (por exemplo, px) */
}

body{
    background-color: white;
}

header {
    min-height: 10;
    background-color: #0E3659;
    padding: 12px 80px;
    width: 100%;
    overflow: visible; 
    z-index: 10;
    position: relative;
}

/* início upload de imagens */
.botao4 {
    margin: 10px; /* Adicione margens para separar os botões */
}

input[type="file"], input[type="submit"] {
    padding: 10px;
    background-color: #0E3659;
    color: #D99923;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}



.botao5 #submit{
    background-color: #0E3659;
    color: #D99923;
    border: none;
    padding: 8px 10px;
    font-size: 20px;
    border-radius: 5px;
    margin: 10px;
    
}




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

.nav-list{
    display: flex;
}
.nav-list ul{
    display: flex;
    align-items: center;
    list-style: none;
}
.nav-item{
    margin: 0 10px;
}
.nav-link {
    color: #D99923;
    text-decoration: none;
    font-size: 18px;
    font-weight: bold;
    padding: 10px;
    border-radius: 5px;
    transition: 0.4s ease;
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
