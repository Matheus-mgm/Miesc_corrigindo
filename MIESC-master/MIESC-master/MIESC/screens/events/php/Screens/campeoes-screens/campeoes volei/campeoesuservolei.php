    <?php

include_once('conexaocamp.php');
$consulta = "SELECT * FROM vencedoresvolei";
$con = mysqli_query($mysqli, $consulta);

$ano = null;
$sql_query_time1 = null;
$sql_query_time2 = null;
$sql_query_time3 = null;
$path = ""; // Defina as variáveis antes do bloco if
$path2 = "";
$path3 = "";

$arquivos = array();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ano = $_POST['ano'];
}

if (isset($_FILES['lugar1'])  && isset($_FILES['lugar2'])  && isset($_FILES['lugar3']))  {
    $lugar1 = $_FILES['lugar1'];
    $lugar2 = $_FILES['lugar2'];
    $lugar3 = $_FILES['lugar3'];

    if ($lugar1['error'] || $lugar2['error'] || $lugar3['error'] ) {
        die("Falha ao enviar arquivo");
    }

    if ($lugar1['size'] > 5242880 || $lugar2['size'] > 5242880 || $lugar3['size'] > 5242880) {
        die("Arquivo muito grande! Max: 2MB");
    }


    $pasta = "arquivos/";
    $nomeDoArquivo1 = $lugar1['name'];
    $nomeDoArquivo2 = $lugar2['name'];
    $nomeDoArquivo3 = $lugar3['name'];
    $extensao1 = strtolower(pathinfo($nomeDoArquivo1, PATHINFO_EXTENSION));
    $extensao2 = strtolower(pathinfo($nomeDoArquivo2, PATHINFO_EXTENSION));
    $extensao3 = strtolower(pathinfo($nomeDoArquivo3, PATHINFO_EXTENSION));

    if (($extensao1 != "jpg" && $extensao1 != 'png') || ($extensao2 != "jpg" && $extensao2 != 'png')|| ($extensao3 != "jpg" && $extensao3 != 'png')) {
        die("Tipo de arquivo não aceito");
    }


        $novoNomeDoArquivo = uniqid();
   $path = $pasta . $novoNomeDoArquivo . "_path." . $extensao1;
   $path2 = $pasta . $novoNomeDoArquivo . "_path2." . $extensao2;
   $path3 = $pasta . $novoNomeDoArquivo . "_path3." . $extensao3;

   $deu_certo1 = move_uploaded_file($lugar1["tmp_name"], $path);
   $deu_certo2 = move_uploaded_file($lugar2["tmp_name"], $path2);
   $deu_certo3 = move_uploaded_file($lugar3["tmp_name"], $path3);

        
   if ($deu_certo1 && $deu_certo2 && $deu_certo3) {
           $mysqli->query("INSERT INTO vencedoresvolei (path, path2, path3, ano) VALUES('$path', '$path2', '$path3', $ano)") or die($mysqli->error);
           echo '<script>alert("Arquivos enviados com sucesso!");</script>';
       
        } else {
            echo '<script>alert("Falha ao enviar os arquivos!");</script>';
        }
    }
    $consulta = "SELECT * FROM vencedoresvolei";
    $con = mysqli_query($mysqli, $consulta);

$sql_query_time1 = $mysqli->query("SELECT * FROM vencedoresvolei WHERE path = '$path'") or die($mysqli->error);
$sql_query_time2 = $mysqli->query("SELECT * FROM vencedoresvolei WHERE path2 = '$path2'") or die($mysqli->error);
$sql_query_time3 = $mysqli->query("SELECT * FROM vencedoresvolei WHERE path3 = '$path3'") or die($mysqli->error);

$ano_query = $mysqli->query("SELECT DISTINCT ano FROM vencedoresvolei WHERE path = '$path'") or die($mysqli->error);
$ano = $ano_query->fetch_assoc()['ano'];

   
        ?>






    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>Campeoes</title>
        <link rel="stylesheet" href="../../css/campeoesvolei.css">
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
                <li class="nav-item"><a href="../../../Site mercury home e about/htmls/home.html" class="nav-link">Home</a></li>  
            <li class="nav-item"><a href="../../../Site mercury home e about/htmls/index.html" class="nav-link">About</a></li> 
                <li class="nav-item"><a href="../../../feed/feedUser.php" class="nav-link">Feed</a></li>
                <li class="nav-item"><a href="" class="nav-link">Resources</a>
                <ul>
                <li class="updraft"><a href="../camisas volei/camisasusuarioVolei.php" class="nav-link">Camisas</a></li>
                <li class="updraft"><a href="campeoesuservolei.php" class="nav-link">Campeões</a></li>
                <li class="updraft"><a href="../resultados volei/resultadoUser.php" class="nav-link">Resultados</a></li>
                <li class="updraft"><a href="../classificacao volei/classificacaovoleiUsuario.php" class="nav-link">Classificação</a></li>
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


          
    <?php while($dado = $con->fetch_array()){ ?>
        <table>
        <div class="podio">
            <img src="podio.png" width="700px" height="400px">
        </div>
        <div class="geral">
        <div class="box1">
    <div class="inputBox2">
            <img class="picturea" height="500" width="200" src="<?php echo $dado['path']; ?>" alt="">

    </div>
</div>

<div class="box2">
    <div class="inputBox2">
            <img class="picturea" height="500" width="200" src="<?php echo $dado['path2']; ?>" alt="">

    </div>
</div>

<div class="box3">
    <div class="inputBox2">
            <img class="picturea" height="500" width="200" src="<?php echo $dado['path3']; ?>" alt="">
    </div>
</div>
        </div>
        <h3 class="anophp"> <?php echo $dado['ano']; ?></h3>
         
			 </table>
     <?php } ?> 
    







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