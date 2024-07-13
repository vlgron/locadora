<?php
require 'repositorio.class.php';

$filmeRecebido = new Filme($_REQUEST['titulo'], $_REQUEST['codigo'], $_REQUEST['sinopse'], $_REQUEST['quantidade'], $_REQUEST['trailer']);

$repositorio->atualizarFilme($filmeRecebido);

echo "<script> alert('Alterado com sucesso!'); </script>";
echo "<script> location.href='index.php'; </script>";

?>