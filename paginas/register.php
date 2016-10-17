<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/painel/system/system.php';
	AccessPublic();
	 ValidateFormRegister();
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
	<title>Cadastre-se</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body align="center">
	<div id="login-box">
	<div id="login-box-interno">
	<form action="" method="post">

	<div id="login-box-label">Cadastre-Se</div>
		<br>
		<input type="text" id="input-div" name="name" placeholder="Nome" style="width: 260px; height: 25px" value="<?php echo GetPost('name'); ?>"><br>
		<br>
		<input type="text" id="input-div" name="mail" placeholder="E-Mail" style="width: 260px; height: 25px" value="<?php echo GetPost('mail'); ?>"><br>
		<br>
		<input type="text" id="input-div" name="username" placeholder="Usuário" style="width: 260px; height: 25px" value="<?php echo GetPost('username'); ?>"><br>
		<br>
		<input type="password" id="input-div" name="password" placeholder="Senha" style="width: 260px; height: 25px" value="<?php echo GetPost('password'); ?>"><br>
		<br>
		<input type="password" id="input-div" name="confirm" placeholder="Confirme Sua Senha" style="width: 260px; height: 25px" value="<?php echo GetPost('confirm'); ?>">

		<br>
		<br>
		<div id="botoes">
		<input type="submit" name="send" value="Cadastrar" id="botao">
		</div>
		<br>
		<br>
		<a href="<?php echo URL_BASE; ?>" title="Fazer Login">Fazer Login</a>
		
	</form>
	</div>
	</div>
</body>
</html>