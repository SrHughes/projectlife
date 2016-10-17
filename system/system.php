<?php
	
	Init();

	// Valida Form de Login
	function ValidateFormLogin(){
		if (!!GetPost('send')) {
			$message = null;

			$username = GetPost('username');
			$password = GetPost('password');
			if(empty($username))
				$message = 'Informe seu Nome de Usuário!';
			else if(empty($password))
				$message = 'Informe sua Senha!';
			else{

				if(!UserVerify($username, $password))
					$message = 'Nome de Usuário ou Senha Incorretos!';
				else if(!UserVerify($username, $password, true))
					$message = 'Esta Conta foi Desativada!';
				else
					CreateSession($username, $password);
			}

			echo ($message != null) ? $message.'<hr>' : null;
		}
	}


	// Valida Form de Cadastro
	function ValidateFormRegister(){
		if (!!GetPost('send')) {
			$message = null;

			$name = GetPost('name');
			$mail = GetPost('mail');
			$username = GetPost("username"); 
			$password = GetPost('password');
			$confirm = GetPost('confirm');

			if (empty($name)) 
				$message = 'Informe seu Nome!';
			elseif (empty($mail)) 
				$message = 'Informe seu E-Mail!';
			elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) 
				$message = 'Informe Um E-Mail Válido!';
			elseif (empty($username))
				$message = 'Informe seu Nome de Usuário!';
			elseif (empty($password))
				$message = 'Informe sua Senha';
			elseif (empty($confirm))
				$message = 'Confirme sua Senha!';
			elseif ($password != $confirm) {
				$message = 'As Senhas Não Correspodem!';
			}
			else{

				if (!MailExists($mail)) {
					$message = 'Este E-Mail já foi Cadastrado!';
				}
				elseif (!UserNameExists($username)) 
					$message = 'Este Nome de Usuário já foi Cadastrado!';
				else{
					$register = Register($name, $mail, $username, $password);

					if (!$register)
						$message = 'Desculpe, Ocorreu um erro...';
					else
						CreateSession($username, $password);
				}

			}

			echo ($message != null) ? $message.'<hr>' : null;
			
		}
	}

	// INICIA O SISTEMA
	function Init(){
		session_start();

		// Chama Config
		$configFile = $_SERVER['DOCUMENT_ROOT'].'/painel/system/config.php';
		if (!file_exists($configFile)) 
			die('ERROR 404<br><br> Arquivo config.php Não Existe!');
		else
			require_once $configFile;

		//Chama Helpers
		if (!file_exists(FILE_HELPERS)) 
			die('ERROR 404<br><br> Arquivo helpers.php Não Existe!');
		else
			require_once FILE_HELPERS;

		// Chama DataBase
		if (!file_exists(FILE_DATABASE)) 
			die('ERROR 404<br><br> Arquivo database.php Não Existe!');
		else
			require_once FILE_DATABASE;

		Connect();
		DoLogout();
	}
	?>