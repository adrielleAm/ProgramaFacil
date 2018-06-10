<!DOCTYPE html>
<?php 
session_start();
require ("Classes/AdministradorCRUD.php");
$cliente = new AdministradorCRUD();
$comboBoxClientes = $cliente->carregarComboBoxCliente();
$comboBoxProgramador = $cliente->carregarComboBoxProgramador();
?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">-->
  <link rel="stylesheet" href="css/theme.css" type="text/css">
  <link rel="icon" href="imagem/icon.png">
  <title>Administrar</title>
</head>

<body>
  <div class="py-1 bg-dark">

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <a class="navbar-brand ml-auto text-light" href="#">
            <i class="fa d-inline fa-lg fa-file-code-o p-2"></i>Programa Fácil</a>
        </div>
        <div class="col-md-4">
           <h1 class="text-center bg-dark text-light">Bem Vindo <?php echo $_SESSION['nome'] ?></h1>
        </div>
        <div class="col-md-4">
          <a class="ml-3 btn navbar-btn btn-primary" href="index.html" >Sair</a>
        </div>
      </div>
    </div>
   
		  <div class="p-5 bg-light">
			<div class="container">
			  <div class="row">

			  </div>
			</div>
			<div class="container">
              <div class="row">
        <div class="col-md-6">
          <a class="ml-3 btn navbar-btn btn-lg btn-block btn-light" >CLIENTES</a></div>
          <div class="col-md-6">
          <a class="ml-3 btn navbar-btn btn-lg btn-block btn-light" >PROJETO</a></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-5">   <?php echo $comboBoxClientes;?> </div>
            <div class="col-2"></div>
           <div class="col-5"> <div id="ProjetosClasse"></div></div>
          </div>
          <hr>
			  <div class="row">
          <div class="col-12">
            <a class="ml-3 btn navbar-btn btn-lg btn-block btn-light" >PROGRAMADORES</a>
          </div>
				</div>
        <hr>
        <div class="row">
          <div class="col-4">  <?php echo $comboBoxProgramador;?> </div>
          <div class="col-4"> <?php echo $comboBoxProgramador;?> </div>
          <div class="col-4"> <?php echo $comboBoxProgramador;?> </div>
        </div>
        <hr>  
        <div class="row">
            <div class="col-8">
         
          <p>Atenção! Ao clicar em salvar você estara linkando o programador ao projeto. Deseja fazer isto ?</p>
        </div>
        <div class="col-4">
         <button type="submit" class="btn btn-primary" onclick="clienteProgramadorProjeto()">Salvar</button></div>

        </div>
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