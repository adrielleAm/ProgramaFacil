<!DOCTYPE html>
<?php 
session_start();
require ("Classes/ClienteCRUD.php");
$cliente = new ClienteCRUD();
$projetos = $cliente->carregarProjeto($_SESSION['id']);
?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/theme.css" type="text/css">
  <link rel="icon" href="imagem/icon.png">
  <title>Cliente</title>
</head>

<body>
  <div class="py-2 bg-dark">

    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <a class="navbar-brand ml-auto text-light" href="#">
            <i class="fa d-inline fa-lg fa-file-code-o p-2"></i>Programa Fácil</a>
          </div>
          <div class="col-md-6">
            <h4 class="text-center text-light">Bem Vindo <?php echo $_SESSION['nome'] ?></h4>
          </div>
          <div class="col-md-4">
            <a class="ml-3 btn navbar-btn btn-primary" href="index.html" >Sair</a>
            <a class="ml-3 btn navbar-btn btn-primary" href="atualizaCliente.php">Editar Cadastro</a>
          </div>
        </div>
      </div>
    </div>

    <div class="p-5 bg-light">
     <div class="container">
       <div class="row">

         <?php echo $projetos;?>

       </div>
     </div>
   </div>
     <div class="container" >
       <div class="row">
        <div class="col-md-12">
          <a class="ml-6 btn navbar-btn btn-lg  btn-primary" href="cadastroProjeto.php" >ABRIR NOVA SOLICITAÇÂO DE PROJETO!</a>
        </div>
      </div>
    </div>
  
 <div class="bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center align-self-center p-4">
          <p class="mb-5">Centro Universitário Una - Campos Barro Preto
            <br>Belo Horizonte - MG</p>
        </div>
      </div>
    </div>
  </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/funcoes.js" type="application/javascript"></script>
    <script src="js/jquery-3.3.1.js" type="application/javascript"></script>

  </body>

  </html>