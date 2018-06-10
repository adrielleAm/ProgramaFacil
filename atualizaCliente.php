<?php
require ("Classes/ClienteCRUD.php");
$cliente = new ClienteCRUD();
$cliente->setIdCliente(isset($_GET['id'])?$_GET['id']:null);
$resultado = $cliente->devolverCliente();
$telaAdm = isset($_GET['adm'])?$_GET['adm']:null;
$readOnly = $telaAdm?'readonly':null;
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--   <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css"> -->
	<link rel="stylesheet" href="css/theme.css" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="icon" href="imagem/icon.png">
	<title>Dados Cliente</title>
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
		
		</div>
	</div>
</nav>
<div class="py-5 bg-info" style="background-size:cover;background-repeat:no-repeat;" >
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center display-4 bg-primary text-light">Dados do Cliente</h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<form method="POST" id="formCliente" action="coletor.php" class="form-group w-100 bg-light border border-primary p-2 m-3">
		<?php foreach ($resultado as $rs){ ?>
		<div class="form-group w-100"> <b>Nome da empresa:</b>
				<input value="<?php echo $rs['pf_empresa']; ?>"<? echo $readOnly ?>  id="nomeEmpresa" name="nomeEmpresa" type="text" size="60" class="form-control"> </div>
		<div class="form-group"> Nome do responsavel:
			<input value="<?php echo $rs['cp_nomeResponsavel']; ?>"<? echo $readOnly ?> name="nomeResponsavel" id="nomeResponsavel" type="text" size="60" class="form-control"> </div>
		<div class="form-group"> Site da empresa:
			<input value="<?php echo $rs['pf_siteEmpresa']; ?>"<? echo $readOnly ?> name="site" type="text" size="60" class="form-control"> </div>
		<hr>

		<h6><b>Endereço da empresa</b></h6>

		<div class="row">
			<div class=" col-4">
				<div class="form-group"> Cep:
					<input value="<?php echo $rs['ed_cep']; ?>"<? echo $readOnly ?> name="cep" type="text" id="cep" size="10" maxlength="9" class="form-control"> </div>
			</div>
			<div class=" col-4">
				<div class="form-group"> Cidade:
					<input value="<?php echo $rs['ed_cidade'];?>"<? echo $readOnly ?> type="text" name="cidade" id="cidade" size="40" class="form-control"> </div>
			</div>
			<div class=" col-4">
				<div class="form-group"> Estado:
					<input value="<?php echo $rs['ed_ur']; ?>"<? echo $readOnly ?> name="uf" type="text" id="uf" size="40" class="form-control"> </div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-5">
				<div class="form-group"> Rua: <input <? echo $readOnly ?> value="<?php echo $rs['ed_rua']; ?>" type="text" name="rua" size="40" id="rua" class="form-control"> </div>
			</div>
			<div class="col-2">
				<div class="form-group"> Nº: <input <? echo $readOnly ?> value="<?php echo $rs['ed_numero']; ?>" type="text" name="numero" size="3" id="numero" class="form-control"></div>
			</div>
			<div class="col-5">
				<div class="form-group"> Bairro: <input <? echo $readOnly ?> value="<?php echo $rs['ed_bairro']; ?>" type="text" name="bairro" size="40" id="bairro" class="form-control"></div>
			</div>
		</div>

		<div class="form-group"> E-mail:
			<input type="email" value="<?php echo $rs['cp_emailContato']; ?>"<? echo $readOnly ?> name="emailContato" id="emailContato" size="60" class="form-control"> </div>
			
		<?php } ?>
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
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=crossorigin="anonymous"></script>
<script src="js/validaCadastroCliente.js"></script>
<script src="js/validaCEP.js"></script>

</body>
</html>