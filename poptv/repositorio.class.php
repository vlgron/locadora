<?php

require 'conexao.class.php';
include 'filme.class.php';

// criação das interfaces.
interface IRepositorioFilmes{
	public function cadastrarFilme($filme);
	public function removerFilme($filme);
	public function atualizarFilme($filme);
	public function buscarFilme($filme);
	public function getListarFilme();
}

/**
 * Classe Repositorio filmes SQL (CRUD)
 */
class RepositorioFilmesSQL implements IRepositorioFilmes
{
	private $conexao;

	public function __construct()
	{
		$this->conexao = new Conexao("localhost", "locadora", "alunolab","popcorntv");
		if ($this->conexao->conectar() == false) {
			echo "Erro" . mysqli_error();
		}
	}

	public function cadastrarFilme($filme)
	{
		$titulo = $filme->getTitulo();
		$sinopse = substr($filme->getSinopse(), 0, 500);
		$quantidade = $filme->getQuantidade();
		$trailer = $filme->getTrailer();

		$sql = "INSERT INTO filme(
		titulo,
		codigo,
		sinopse,
		quantidade,
		trailer)

		VALUES(
		'$titulo',
		NULL,
		'$sinopse',
		'$quantidade',
		'$trailer')";

		$this->conexao->executarQuery($sql);
	}

	public function removerFilme($codigo)
	{
		$sql = "DELETE FROM filme WHERE codigo = '$codigo'";
		$this->conexao->executarQuery($sql);
	}

	public function atualizarFilme($filme)
	{
		$titulo = $filme->getTitulo();
		$codigo = $filme->getCodigo();
		$sinopse = substr($filme->getSinopse(), 0, 500);
		$quantidade = $filme->getQuantidade();
		$trailer = $filme->getTrailer();

		$sql = "UPDATE filme SET
		titulo = '$titulo',
		sinopse = '$sinopse',
		quantidade = '$quantidade',
		trailer = '$trailer'
		WHERE codigo = '$codigo'";

		$this->conexao->executarQuery($sql);
	}

	public function buscarFilme($codigo)
	{
		$linha = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM filme WHERE codigo = '$codigo'");
		$filme = new Filme(
			$linha['titulo'],
			$linha['codigo'],
			$linha['sinopse'],
			$linha['quantidade'],
			$linha['trailer']);
		return $filme;
	}

	public function getListarFilme()
	{
		$listagem = $this->conexao->executarQuery("SELECT * FROM filme");

		$arrayFilmes = array();

		while($linha = mysqli_fetch_array($listagem)){
			$filme = new Filme(
				$linha['titulo'],
				$linha['codigo'],
				$linha['sinopse'],
				$linha['quantidade'],
				$linha['trailer']);

			array_push($arrayFilmes, $filme);
		}

		return $arrayFilmes;
	}
}

$repositorio = new RepositorioFilmesSQL();

?>