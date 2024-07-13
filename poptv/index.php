
<!DOCTYPE html>
<html lang="pt-br">
<meta charset="utf-8">
<head>
	<title>Popcorn TV</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Catálogo de filmes em DVD.</h1>

	<form action="<?=$destino;?>" method="POST">
		<?=@$oculto;?>
		<div class="mb-3">
			<label>Filme:</label>
			<input type="text" name="titulo"  value="<?php echo isset($filme) ? $filme->getTitulo() : "" ?>" class="form-control">
		</div>
		<div class="mb-3">
			<label>Sinopse:</label>
			<textarea name="sinopse" class="form-control"><?php echo isset($filme) ? $filme->getSinopse() : "" ?></textarea>
		</div>
		<div class="mb-3">
			<label>Quantidade:</label>
			<input type="text" name="quantidade" value="<?php echo isset($filme) ? $filme->getQuantidade() : "" ?>" class="form-control">
		</div>
		<div class="mb-3">
			<label>Trailer:</label>
			<input type="text" name="trailer" value="<?php echo isset($filme) ? $filme->getTrailer() : "" ?>" class="form-control">
		</div>
		<div class="mb-3">
			<input type="submit" class="btn btn-primary">
		</div>
	</form>

	<?php
	echo "<table class='table table-hover table-striped-columns'>
			<tr>
				<th>Código</th>
				<th>Filme</th>
				<th>Ações</th>
			</tr>";

	if (isset($filme) && is_array($filme)) {
		while ($filmeTemporario = array_shift($filme)) {
			echo "<tr>
					<td>".$filmeTemporario->getCodigo()."</td>
					<td>".$filmeTemporario->getTitulo()."</td>
					<td>
						<button class='btn btn-success' onclick=\"window.location.href = '?codigo=".$filmeTemporario->getCodigo()."'\">Editar</button>
						<button onclick=\" if(confirm('Tem certeza que deseja excluir filme?')){location.href='excluir_filme.php?codigo=".$filmeTemporario->getCodigo()."';}else{return false;} \" class='btn btn-danger'>Excluir</button>
					</td>
				</tr>";
		}
	}

	echo "</table>";
	?>
</body>
<script src="js/bootstrap.bundle.min.js"></script>
</html>
