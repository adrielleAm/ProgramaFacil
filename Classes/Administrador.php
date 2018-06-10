<?php
require ("BancoDados.php");
class Administrador extends BancoDados
{
	protected $idCliente;

	protected $empresa;
	protected $nome;
	protected $site;
	
	protected $cep;
	protected $rua;
	protected $bairro;
	protected $cidade;
	protected $uf;
	
	protected $numero;
	protected $email;
	protected $senha;
	protected $tipo;
	protected $acao;
	
	protected $projeto;
	protected $descProjeto;
	protected $outrosProjetos;
	protected $outrosPlataformas;
	protected $idProjeto;


	public function setIdCliente($idCliente)
	{
		$this->idCliente = $idCliente;
	}
	
	public function setIdProjeto($idProjeto)
	{
		$this->idProjeto = $idProjeto;
	}

	public function setProjeto($projeto)
	{
		$this->projeto = $projeto;
	}

	public function setDescProjeto($descProjeto)
	{
		$this->descProjeto = $descProjeto;
	}

	public function setOutrosProjetos($conhecimentos, $outrosProjetos)
	{
		if($conhecimentos){
			$this->outrosProjetos= 'Possui conhecimentos em: ';
			$umaVez = false;
			foreach ($conhecimentos as $itens){
				if(!$umaVez){
					$this->outrosProjetos.= $itens;
					$umaVez = true;
				} else {
					$this->outrosProjetos.= ', '.$itens;
				}
			}

			if($outrosProjetos){
				$this->outrosProjetos.= '<br>'.$outrosProjetos;
			}
//			var_dump($this->outrosProjetos); exit;
		}
	}

	public function setOutrosPlataformas($plataformas, $outrosPlataformas)
	{
		if($plataformas){
			$this->outrosPlataformas= 'Possui conhecimentos em: ';
			$umaVez = false;
			foreach ($plataformas as $itens){
				if(!$umaVez){
					$this->outrosPlataformas.= $itens;
					$umaVez = true;
				} else {
					$this->outrosPlataformas.= ', '.$itens;
				}
			}

			if($outrosPlataformas){
				$this->outrosPlataformas.= '<br>'.$outrosPlataformas;
			}
//			var_dump($this->outrosPlataformas); exit;
		}
	}

	public function setOutrasPlataformas($outrasPlataformas)
	{
		$this->outrasPlataformas = $outrasPlataformas;
	}

	public function setEmpresa($empresa)
	{
		$this->empresa = $empresa;
	}

	public function setSite($site)
	{
		$this->site = $site;
	}
	

	public function setAcao($acao)
	{
		$this->acao = $acao;
	}


	public function setTipo($tipo)
	{
		$this->tipo = $tipo;
	}


	public function setCep($cep)
	{
		$this->cep = $cep;
	}


	public function setRua($rua)
	{
		$this->rua = $rua;
	}


	public function setNumero($numero)
	{
		$this->numero = $numero;
	}


	public function setBairro($bairro)
	{
		$this->bairro = $bairro;
	}


	public function setCidade($cidade) 
	{
		$this->cidade = $cidade;
	}


	public function setUf($uf) 
	{
		$this->uf = $uf;
	}


	public function setSenha($c1Senha, $c2Senha)
	{
		if(strlen( $c1Senha) < 6 || $c1Senha !== $c2Senha)
		{
			echo "Digitos inferiores a 6 ou as senhas diferem<br>";
			var_dump($c1Senha, $c2Senha);
			return false;
		}
		else
		{
			$this->senha = password_hash($c1Senha, PASSWORD_DEFAULT);
		}
	}


	public function setNome($nome)
	{
		$filtroNome = filter_var($nome, FILTER_SANITIZE_NUMBER_INT);
		if($filtroNome == null || $filtroNome == ''){
			$this->nome = $nome;
		} else {
			echo '<br>String inserida invalida';
			return false;
		}
	}


	public function setEmail($email)
	{
		if($email && (filter_var($email, FILTER_VALIDATE_EMAIL)))
		{
			$this->email = $email;
		}
		else
		{
			echo '<br>E-mail vazio ou formato invalido';
			return false;
		}
	}
	

}