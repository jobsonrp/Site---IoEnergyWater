<?php
require_once 'classes.php';

$usuario = new Usuario();

echo $usuario->nome;
echo "<br>";
echo $usuario->cpf;
echo "<br>";
echo $usuario->endereco;

?>
