<?php
require ("BancoDados.php");
class Programador extends BancoDados
{
	protected $nome;
	protected $telefone;
	
	protected $linkedin;
	protected $curriculoFile;
	
	protected $outros;
	protected $projetos;

	protected $email;
	protected $senha;
	protected $tipo;
	protected $acao;
	
	protected $idProgramador;
	
	public function setIdProgramador($idProgramador)
	{
		$this->idProgramador = $idProgramador;
	}

	public function setTelefone($telefone)
	{
		$this->telefone = $telefone;
	}
	
	public function setCurriculoFile($curriculoFile)
	{
//		$this->curriculoFile = $curriculoFile['tmp_name'];
	}
	
	public function setProjetos($projetos)
	{
		$this->projetos = $projetos;
	}
	
	public function setConhecimentosOutros($conhecimentos, $outros)
	{
		if($conhecimentos){
			$this->outros = 'Possui conhecimentos em: ';
			$umaVez = false;
			foreach ($conhecimentos as $itens){
				if(!$umaVez){
					$this->outros .= $itens;
					$umaVez = true;
				} else {
					$this->outros .= ', '.$itens;
				}
			}
			
			if($outros){
				$this->outros .= '<br>'.$outros;
			}
//			var_dump($this->outros); exit;
		}
	}
	
	public function setEmpresa($empresa)
	{
		$this->empresa = $empresa;
	}

	public function setLinkedin($linkedin)
	{
		$this->linkedin = $linkedin;
	}
	

	public function setAcao($acao)
	{
		$this->acao = $acao;
	}


	public function setTipo($tipo)
	{
		$this->tipo = $tipo;
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