<?php
	require_once 'system/system.php';
	AccessPublic();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tela_Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<form action="" method="post">
	<?php
		ValidateFormLogin();
	?>
	<div id="login-box">
		<div id="login-box-interno">
			<div id="login-box-label">Login</div>
			<div class="input-div" id="input-usuario">
				<input type="text" name="username" placeholder="Usuário" value="<?php echo GetPost('username'); ?>">
			</div>
			<div class="input-div" id="input-senha">
				<input type="password" name="password" placeholder="Senha" value="<?php echo GetPost('password'); ?>">
			</div>
			<div id="botoes">
				<div >
					<input type="submit" id="botao" name="send">
				</div>
				<a href="<?php echo URL_REGISTER; ?>" title="Cadastre-Se">Cadastre-Se</a>
			</div>
		</div>
	</div>
</form>
</body>
</html>