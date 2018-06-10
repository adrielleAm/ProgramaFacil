<?php
require ("Classes/ClienteCRUD.php");
$cliente = new ClienteCRUD();
//var_dump($_GET); exit;
$cliente->setIdProjeto(isset($_GET['id'])?$_GET['id']:null);
$resultado = $cliente->devolverProjeto();
$telaAdm = isset($_GET['adm'])?$_GET['adm']:null;
$readOnly = $telaAdm?'readonly':null;
?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<!--  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">-->
  <link rel="stylesheet" href="css/theme.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <title>Cadastro Projeto</title>
  <link rel="icon" href="imagem/icon.png"> </head>

<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand ml-auto" href="#">
        <i class="fa d-inline fa-lg fa-file-code-o p-2"></i>Programa Fácil</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-center" id="navbar3SupportedContent">
        <a class="ml-3 btn navbar-btn btn-primary" href="telaCliente.php">VOLTAR</a>
      </div>
    </div>
  </nav>
  <div class="py-5 bg-light" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center display-4 text-light bg-primary">Novo Projeto</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form method="POST" id="formCliente" action="coletor.php" class="form-group w-100 m-1 p-2 bg-light border border-primary" draggable="true">
            <?php foreach ($resultado as $rs){ ?>
			  <div class="form-group w-100"> <h6><b>Nome do projeto:</b></h6>
             <input type="text" id="nomeProjeto" size="60" class="form-control" value="<?php echo $rs['pj_projetoNome'] ?>"<? echo $readOnly ?> name="nomeProjeto" > 
			  <input type="hidden" value="<?php echo $rs['pj_projetoNome'] ?>" <? echo $readOnly ?> name="nomeProjetoHidden">
			  <input type="hidden" value="<?php echo $rs['pj_id_projeto'] ?>" <? echo $readOnly ?> name="idProjetoHidden">
			</div>
            <hr>
           <h6><b>Descrição do projetos:</b></h6>
            <p><b>Faça uma pequena descrição do projeto.</b></p>
            <textarea <? echo $readOnly ?> name="descProjeto" id="descProjeto" cols="15" rows="5" class="form-control-lg w-100"><?php echo $rs['pj_descricao'] ?></textarea>
			  <input type="hidden" value="<?php echo $rs['pj_descricao'] ?>" name='descProjetoHidden'>
            <hr>
             <h6><b>Plataforma:</b></h6>
           <input type="checkbox" id="web" name="web" value="web"> <b>Web (navegador)</b>
            <br>
            <input type="checkbox" name="mobile" id="mobile" value="mobile"> <b>Aplicativo Mobile</b>
            <br>
            <input type="checkbox" id="desktop" name="desktop" value="desktop"> <b>Aplicativo Desktop</b>
            <br>
            <h6><b>Outras...</b></h6>
            <textarea <? echo $readOnly ?> name="outrosProjetos"  name="outrosProjetos" id="outrosProjetos" cols="7" rows="3" class="form-control-lg w-100"><?php echo $rs['pj_plataforma'] ?></textarea>
			  <input type="hidden" value="<?php echo $rs['pj_plataforma'] ?>"<? echo $readOnly ?> name='outrosProjetosHidden'>
            
            <hr>
            <h6><b>Tipo de projeto:</b></h6>
            <input type="checkbox" name="estoque" id="estoque" value="estoque"> <b>Estoque</b>
            <br>
            <input type="checkbox" name="ecomerce" id="ecomerce" value="ecomerce"> <b>E-comerce</b>
            <br>
            <input type="checkbox" name="blog" id="blog" value="blog"> <b>Blog</b>
            <h6><b>Outras...</b></h6>
            <textarea <? echo $readOnly ?> name="outrosPlataformas"  id="outrosPlataformas" name="outrosPlataformas" cols="7" rows="3" class="form-control-lg w-100"><?php echo $rs['pj_tipoProjeto'] ?></textarea>
  			<input type="hidden" value="<?php echo $rs['pj_tipoProjeto'] ?>"<? echo $readOnly ?> name='outrosPlataformasHidden'>
            <hr>
            <button type="submit" class="btn btn-primary" onclick="validarProjeto()">Salvar solicitação de projeto</button>
            <input type="hidden" value="cliente" name="tipo">
            <input type="hidden" value="atualizarProjeto" name="acao">
			<?php } ?>
          </form>
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
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="js/funcoes.js" type="application/javascript"></script>
  <script src="js/validaCadastroProjeto.js"></script>
  <script src="js/funcoes.js" type="application/javascript"></script>
</body>
</html>
