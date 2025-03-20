<?php
include_once('conexaofeed.php');
if(!empty($_GET['id']))
{
  include_once('conexaofeed.php');
	
	$id = $_GET['id'];
	
	$sqlSelect = "SELECT * FROM feed WHERE id=$id";
	
	$result = $conexao->query($sqlSelect);
	
	
	if($result->num_rows > 0){
	while($dado = mysqli_fetch_assoc($result)){
   $comentario = $dado['comentario'];
	 }
	}
	else{
		header('Location: feed.php');
	}	
 
}
   
$consulta = "SELECT * FROM feed";
$resultado = mysqli_query($conexao, $consulta);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed de Comentários</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="icon" type="image/x-icon" href="../Site mercury home e about/img/icone miesc.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
		 :root {
        --color-neutral-0: #0E3659;
        --color-neutral-10: #018DB5;
        --color-neutral-30: #0E3659;
        --color-neutral-40: #D99923;
    
}
		*{
    margin:0px;
    padding:0px;
    box-sizing: border-box;
    
}
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
		box-sizing: border-box;
        background-color: #f0f2f5;
    }
		
/*Começo cabeçalho*/ 
header {
    background-color: #0E3659;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);

    padding: 12px 80px;
    width: 100%;
    overflow: visible; 
    z-index: 10;
}
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

	/*Fim cabeçalho*/ 
	/*Começo feed*/ 	
 .comment-feed {
    max-width: 800px;
    margin: 40px auto 0;
    padding: 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    color: #DAA520;
    margin-bottom: 40px;
}

.facebook-comment-box {
    display: flex;
    padding: 10px;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
}

.facebook-comment-box label {
    font-size: 14px;
    margin-bottom: 5px;
}

.user-input {
    display: flex;
    align-items: center;
    width: 100%;
}

.user-input input[type="text"] {
    background: none;
    border: none;
    border-bottom: 1px solid #0E3659;
    outline: none;
    color: black;
    font-size: 10px;
    width: 30%;
    letter-spacing: 1px;
}

.user-input input[type="text"]:focus {
    height: 40px;
}

.facebook-comment-box textarea {
    width: 97%;
    padding: 10px;
    border: 0.5px solid #ccc;
    border-radius: 4px;
    outline: none;
    font-size: 14px;
    margin-bottom: 10px;
	resize: none; /* Impede o redimensionamento */
}
		
.post-comment {
	  background-color: #0E3659;
    color: #018DB5;
    border: none;
    padding: 8px 20px;
    font-size: 13px;
    border-radius: 5px;
    margin-left: auto; /* Move o botão para a direita */
}


    .comment-input button {
        padding: 10px 15px;
        background-color: #1877f2;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
    }

    .comment-input button:hover {
        background-color: #0e5cb5;
    }
    .comment-list {
        list-style: none;
        padding: 0;
    }

  .facebook-comment-box {
    display: flex;
    flex-direction: column;
    align-items: flex-start; /* Alinhar à esquerda */
    padding: 10px;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2); /* Adicione a sombra aqui */
}
		.comment-card {
    background-color: white;
    border: 1px solid #dbdbdb;
    border-radius: 8px;
    padding: 40px;
    margin-bottom: 20px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2); /* Adicione a sombra aqui */
    display: flex;
    flex-direction: column;
    position: relative;
}

    .comment-card p {
        font-size: 16px;
        color: #333;
        margin-bottom: 10px;
        word-wrap: break-word;
    }

    .comment-card .user-info {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .comment-card .user-info .user-name {
        font-weight: bold;
        font-size: 28px;
        margin-right: 5px;
        color: #0E3659;
    }
	.comment-card .user-data {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .comment-card .user-data .post-date{
        font-weight: bold;
        font-size: 14px;
        margin-right: 5px;
        color: #D99923;
    }
    .comment-card p {
        font-size: 25px;
        color: #0E3659;
        margin-bottom: 10px;
    }
	.comment-card .acoes {
    display: flex;
    justify-content: space-between; /* Colocar os links no início e no final */
    align-items: baseline;
}

.comment-card .acoes p {
    font-size: 18px;
    color: #0E3659;
}

.comment-card .acoes a {
    font-size: 15px;
    color: #D99923;
    text-decoration: none;
}

.comment-card .acoes a:hover {
    text-decoration: underline; /* Adicionar sublinhado ao passar o mouse sobre o link */
}

.comment-card .acoes .excluir a {
    font-size: 15px;
    color: #DD0003;
    margin-left: 10px; /* Margem à esquerda para separar do link anterior */
}

.comment-card p {
    font-size: 25px;
    color: #0E3659;
    margin-bottom: 10px;
}

.comment-card .curtir:hover {
    background-color: rgba(0, 149, 246, 0.1);
}

    .comment-card .curtir:hover {
        background-color: rgba(0, 149, 246, 0.1);
    }

    .comment-card .likes {
        font-weight: bold;
        font-size: 15px;
        transform: translateY(-50%);
        margin-left: 5px;
        color: #018DB5;
    }

    .like-container {
        display: flex;
        align-items: center;
    }

    .likes {
        font-weight: bold;
        color: #018DB5;
        font-size: 16px;
        margin-left: 5px;
        margin-top: 30px;
    }

    .curtir {
        background-color: transparent;
        border: none;
        cursor: pointer;
        font-weight: bold;
        color: #018DB5;
        margin-top: 15px;
    }

    .comment-card .actions {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .comment-card .actions button {
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 12px;
        transition: background-color 0.3s;
    }
		/*Fim feed*/ 
		/*Começo rodapé*/ 
	footer {
    width: 100%;
    color: var(--color-neutral-40);
    height: 48px;
    left: 0;
    bottom: 0;   
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
	
/*Fim rodapé*/ 

    </style>
</head>
<body>
	<header>
    <nav class="miesc">
        <div class="logo">
            <img src="../Site mercury home e about/img/miesc.png" widht="30px" height="60px">       
        </div>
        <div class="nav-list">
        	<ul>
            <li class="nav-item"><a href="home adm.html" class="nav-link">Home</a></li>  
            <li class="nav-item"><a href="index adm.html" class="nav-link">About</a></li> 
            <li class="nav-item"><a href="" class="nav-link">Feed</a></li>
			<li class="nav-item"><a href="" class="nav-link">Events</a>
              <ul>
                <li class="updraft"><a href="../../events/html/interclasse adm.html" class="nav-link">Interclasse</a></li>
                <li class="updraft"><a href="../../events/php/sarau/homeadm.html" class="nav-link">Sarau</a></li>
                <li class="updraft"><a href="../../events/php/sarau e paulo freire/Paulo Freire/pauloFreire adm.html" class="nav-link">Paulo Freire</a></li>
                
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
        <li class="nav-item"><a href="home.html" class="nav-link">Home</a></li>  
        <li class="nav-item"><a href="index.html" class="nav-link">About</a></li> 
        <li class="nav-item"><a href="" class="nav-link">Feed</a></li>
        <li class="nav-item"><a href="" class="nav-link">Events</a></li>
    </ul>
  </div>
</header>

	
 <form action="saveEditfeed.php" method="post">
    <div class="comment-feed">
        <p>Compartilhe novos comunicados</p>
    <div class="facebook-comment-box">
    <?php 
    if (isset($_SESSION['nome'])) {
        echo '<div class="user-name">' .  $_SESSION['nome']  . '</div>'; // Exibe o nome do usuário
    }
   ?>
   
    <br>
    <textarea id="comentario" name="comentario" placeholder="Escreva seu comunicado" rows="5" cols="80"><?php echo htmlspecialchars($comentario); ?></textarea>

     <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
        <button type="submit" name="update" id="update" class="post-comment">Postar</button>
   
</div>

        <!-- Lista de comentários -->
    <ul class="comment-list">
<?php
while ($row = mysqli_fetch_assoc($resultado)) {
    echo '<li>';
    echo '<div class="comment-card">';
    echo '<div class="user-info">';
    echo '<div class="user-name">' . htmlspecialchars($row['usuario']) . '</div>';
    echo '</div>';
    echo '<div class="user-data">';
    echo '<div class="post-date">' . $row['data_postagem'] . '</div>';
    echo '</div>';
    echo '<p>' . htmlspecialchars($row['comentario']) . '</p>';
    echo '<form action="feed.php" method="post" class="like-form">';
    echo '<input type="hidden" name="comment-id" value="' . $row['id'] . '">';
    echo '<div class="like-container">';
    echo '<button type="submit" name="like-comment" class="curtir"><i class="fas fa-heart"></i></button>';
    echo '<span class="likes">' . $row['curtidas'] . ' curtidas</span>';
    echo '</div>';
    echo '</form>';
    
    // Textos "Editar Comentário" e "Excluir"
   echo '<div class="acoes">';
    echo '<p><a href="editfeed.php?id=' . $row["id"] . '">Editar Comentário</a> <div class="excluir"> <a href="deletefeed.php?id=' . $row["id"] . '">Excluir</a></p></div>';
    echo '</div>';
    echo '</div>';
    echo '</li>';
}
?>
</ul>

    </div>
  
</form>

	<!-- Fim Corpo -->





	  <!-- Começo Rodapé -->
              <footer>
                  <div id="footer_content">
                      <div id="footer_contacts">
                         <img src="../Site mercury home e about/img/mercury.png" widht="20" height="60">
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
                            <a href="../Site mercury home e about/events/html/interclasse.html" class="footer-link">Interclasse</a>
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
                      <a href="../../Cadastro/cadastro.php">
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
