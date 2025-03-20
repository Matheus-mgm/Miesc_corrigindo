<?php

include_once('conexao.volei.php');
if (isset($_POST['nome']) && isset($_POST['turma']) && isset($_POST['posicao'])) {

    $nome = $_POST['nome'];
    $turma = $_POST['turma'];
    $posicao = $_POST['posicao'];

    $result = mysqli_query($conexao, "INSERT INTO jogadoresvolei (nome, turma, posicao) VALUES ('$nome', '$turma', '$posicao')");
}

?>

<!DOCTYPE html>
<html lang="pt- br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Jogadores</title>
    <style>
        body{
         font-family: Arial, Helvetica, sans-serif;
         background-image: linear-gradient(to right, #018DB5, #0E3659);
        }
     .box{
        color:white ;
        position: absolute;
        top: 50%;
        left: 25%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.4);
        padding: 15px;
        border-radius: 15px;
        width: 29%;
     }
     fieldset{
        border: 3px solid #D99923;
     }
     legend{
        border: 1px solid #D99923;
        padding: 10px;
        text-align: center;
        background-color: #D99923;
        border-radius: 8px;
         
    }
    .inputBox{
        position: relative;

    }
    .inputUser{
      background: none;
      border: none;
      border-bottom: 1px solid white ;
      outline: none;
      color: white;
      font-size: 10px;
      width: 100%;
      letter-spacing: 1px;
    }
    .caixa{
        position: absolute;
        top: 0%;
        left: 0%;
        pointer-events: none;
        transition: .5s;
    }
    .inputUser:focus ~ .caixa,
    .inputUser:valid ~ .caixa {
        top: -20px;
        font-size: 12px;
        color: #D99923;
    }
    #submit{
        background-image: linear-gradient(to right,#664300, #FFD700);  
        width: 100%;
        border: none;
        padding: 15px;
        color: white;
        font-size: 15px;
        cursor: pointer;
        border-radius: 10px;
    }
    #submit:hover{
        background-image: linear-gradient(to right, #018DB5, #6b3fa0);
    }
    </style>
</head>
<body>


    <div class="box">
        <form action="" method="POST">
        <fieldset>
            <legend><b>Cadastro de Jogadores</b></legend>
            <div class="inputBox">
                </select>
              <br<>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="nome" id="nome" class="inputUser" required>
                <label for="nome" class="caixa"> Nome Completo</label>
                <br>
              </div>
            <p>Selecione a sua Turma:</p>
            <select name="turma" id="turma" class="select2">
             <option value="">Selecione</option>
             <option value="1 DS A">1 DS A</option>
             <option value="1 DS B">1 DS B</option>
             <option value="2 DS A">2 DS A</option>
             <option value="2 DS B">2 DS B</option>
             <option value="3 DS A">3 DS A</option>
             <option value="3 DS B">3 DS B</option>
             <option value="1 ADM A">1 ADM A</option>
             <option value="1 ADM B">1 ADM B</option>
             <option value="2 ADM A">2 ADM A</option>
             <option value="2 ADM B">2 ADM B</option>
             <option value="3 ADM A">3 ADM A</option>
             <option value="3 ADM B">3 ADM B</option>
             </select>
 
             <p>Escolha a sua posição:</p>

              <select name= "posicao" id="posicao" class="select2">
               <option value="">Selecione</option>
               <option value="Levantador">Levantador</option>
               <option value="Oposto">Oposto</option>
               <option value="Ponteiro">Ponteiro</option>
               <option value="Central">Central</option>
               <option value="Líbero">Líbero</option>
               </select>
               <br><br>
            <input type="submit" name="submit" id="submit">
            </fieldset>
           
        </form>
    </div>


</body>
</html>




<!-- Início da seção da imagem fora da tela de cadastro -->
<div class="imagem-externa" style="margin-top: 38px;">  
    <img src="../../futsal/img/Group 8.png" height="65%" width="680px" style="float: left; margin-right: 120px;">
</div>
<!-- Fim da seção da imagem fora da tela de cadastro -->

<style>
    /* Estilos CSS para a imagem externa */
    .imagem-externa {
        float: right; /* Alinhar a imagem à direita */
        margin: 20px; /* Margem para separar a imagem das bordas da tela */
        padding-top: 90px;
        
    }
</style>