<?php
require ("Classes/ProgramadorCRUD.php");
$programador = new ProgramadorCRUD();
$programador->setIdProgramador(isset($_GET['id'])?$_GET['id']:null);
$telaAdm = isset($_GET['adm'])?$_GET['adm']:null;
$readOnly = $telaAdm?'readonly':null;
$resultado = $programador->devolverProgramador();
//var_dump($resultado); exit;
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">-->
  <link rel="stylesheet" href="css/theme.css" type="text/css">
  <link rel="icon" href="imagem/icon.png">
  <title>Dados Programador</title>
</head>

<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand ml-auto" href="#">
        <i class="fa d-inline fa-lg fa-file-code-o p-2"></i>Programa Fácil</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-center" id="navbar3SupportedContent">
        <a class="ml-3 btn navbar-btn btn-primary" href="telaProgramador.php">VOLTAR</a>
      </div>
    </div>
  </nav>
 <div  class="py-5 bg-info" style="background-size:cover;background-repeat:no-repeat;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center display-4 bg-primary text-light text-uppercase">Dados Programador</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <form enctype="multipart/form-data" method="POST" id="formProgramador" action="coletor.php" class="text-justify border bg-light border-primary m-3 p-1">
		<?php foreach ($resultado as $rs){ ?>
      <div class=" row"> 
          <div class="col-8"> 
		<div class="form-group"> <b>Nome:</b>
        <input type="text" value="<?php echo $rs['pg_nomeResponsavel']; ?>"<? echo $readOnly ?>  name="nome" id="nome" size="40" class="form-control"> </div>
        <div class="col-4">
      <div class="form-group"> <b>Telefone de contato:</b>
        <input type="text" value="<?php echo $rs['pg_telefone']; ?>"<? echo $readOnly ?>  name="telefone" id="telefone" size="15" class="form-control"> </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
      <div class="form-group"> <b>Linkedin:</b>
        <input type="email" value="<?php echo $rs['pg_linkedin']; ?>"<? echo $readOnly ?>  name="linkedin" id="linkedin" size="60" class="form-control"> </div>
        </div>
        </div>
      <div class="form-group"> <b> Currículo:</b>
        <input type="file" name="curriculo" id="curriculo"> </div>
      <hr>
      <h3> <b>Conhecimentos:</b></h3>
      <div class="col-6">
      <input type="checkbox" name="java" id="java" value="Java"> <b>Java</b>
      <br>
      <input type="checkbox" name="web" id="web" value="Web"> <b>HTML, CSS, JavaScript</b>
      <br>
      <input type="checkbox" name="php" id="php" value="PHP"> <b>PHP</b>
      <br>
      <input type="checkbox" name="android" name="android" value="Android"> <b>Desenvolvimento Android</b>
      <br><br>
      <h3><b>Outros:</b></h3>
      <textarea <? echo $readOnly ?> name="outros"  id="outros" cols="15" rows="1" class="form-control-lg w-100"><?php echo $rs['pg_outros']; ?></textarea>
      </div>
      
      <hr>
      <h3><b>Projetos:</b></h3>
      <p><b>Informe abaixo os projetos que ja realizou como programador.</b></p>
      <textarea <? echo $readOnly ?> name="projeto" id="projeto" cols="15" rows="5" class="form-control-lg w-100"><?php echo $rs['pg_projetosTrabalhados']; ?></textarea>
      <hr>
      <div class="form-group"> <b><b>E-mail para contato:</b></b>
        <input type="email" value="<?php echo $rs['pg_emailContato']; ?>"<? echo $readOnly ?>  name="emailContato" id="emailContato" size="60" class="form-control"> 
	  </div>
	<?php } ?>
</div>
</div>
    </form>
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
  <script src="js/validaCadastroProgramador.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
  <script src="js/validaCadastroProgramador.js"></script>

</body>

</html>