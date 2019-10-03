<?php 

if ($_POST['name']=="") {
	echo "Preencha o campo nome.";
}
else if($_POST['email']==""){
	echo "Preencha o campo email.";
}
else{


	$emailsender = "webmaster@" . $_SERVER[HTTP_HOST];

	 
	/* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. Não alterar */
	if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
	elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
	else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
	 

	/* Verifica tipo de mensagem */
	if($_POST['typeForm']=="1via"){

		// Passando os dados obtidos pelo formulário para as variáveis abaixo
		$nomeremetente     = $_POST['name'];
		$emailremetente    = trim($_POST['email']);
		// $emaildestinatario = "comembu@jtptransportes.com.br";	
		$emaildestinatario = "gabriel@pamajhon.com.br";
		$assunto           = "Contato enviado pelo site por: " . $_POST['name'] . " " . $_POST['typeForm'];		
		$mensagemHTML      =  "Nome: " .$_POST['name']. $quebra_linha. " Email: " .$_POST['email']. $quebra_linha. "Celular: " .$_POST['cellphone']. $quebra_linha. "RG: " .$_POST['rg']. $quebra_linha. "CPF: " . $_POST['cpf']. $quebra_linha. "CEP: " . $_POST['cep']. $quebra_linha. "Endereço: " . $_POST['endereco']. $quebra_linha. "Número: " . $_POST['numero']. $quebra_linha. "Bairro: " . $_POST['bairro']. $quebra_linha. "Cartão: " . $_POST['typeCartao']. $quebra_linha. "Mensagem: " . $_POST['message']  ;
		
		/* Montando o cabeçalho da mensagem */
		$headers = "MIME-Version: 1.1".$quebra_linha;
		$headers .= "Content-type: text/html; charset=iso-8859-1".$quebra_linha;
		// Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
		$headers .= "From: ".$emailsender.$quebra_linha;
		$headers .= "Return-Path: " . $emailsender . $quebra_linha;
		

		$headers .= "Reply-To: ".$emailremetente.$quebra_linha;
		// Note que o e-mail do remetente será usado no campo Reply-To (Responder Para)
		
		/* Enviando a mensagem */
		mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender);
		echo "Mensagem enviada com sucesso (1via)";




	}
	else if($_POST['typeForm']=="2via"){

		// Passando os dados obtidos pelo formulário para as variáveis abaixo
		$nomeremetente     = $_POST['name'];
		$emailremetente    = trim($_POST['email']);
		// $emaildestinatario = "comembu@jtptransportes.com.br";	
		$emaildestinatario = "gabriel@pamajhon.com.br";
		$assunto           = "Contato enviado pelo site por: " . $_POST['name'] . " " . $_POST['typeForm'];
		$mensagemHTML      =  "Nome: " .$_POST['name']. $quebra_linha. " Email: " .$_POST['email']. $quebra_linha. "Celular: " .$_POST['cellphone']. $quebra_linha. "RG: " .$_POST['rg']. $quebra_linha. "CPF: " . $_POST['cpf']. $quebra_linha.  "Cartão: " . $_POST['typeCartao']. $quebra_linha.  "Ocorrência: " . $_POST['typeOrder']. $quebra_linha. "Mensagem: " . $_POST['message']  ;
		
		/* Montando o cabeçalho da mensagem */
		$headers = "MIME-Version: 1.1".$quebra_linha;
		$headers .= "Content-type: text/html; charset=iso-8859-1".$quebra_linha;
		// Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
		$headers .= "From: ".$emailsender.$quebra_linha;
		$headers .= "Return-Path: " . $emailsender . $quebra_linha;
		

		$headers .= "Reply-To: ".$emailremetente.$quebra_linha;
		// Note que o e-mail do remetente será usado no campo Reply-To (Responder Para)
		
		/* Enviando a mensagem */
		mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender);
		echo "Mensagem enviada com sucesso (2via)";



		
	}
	else if($_POST['typeForm']=="contato"){


		// Passando os dados obtidos pelo formulário para as variáveis abaixo
		$nomeremetente     = $_POST['name'];
		$emailremetente    = trim($_POST['email']);
		// $emaildestinatario = "comembu@jtptransportes.com.br";	
		$emaildestinatario = "gabriel@pamajhon.com.br";	
		$assunto           = "Contato enviado pelo site por: " . $_POST['name'] . " " . $_POST['typeForm'];
		$mensagemHTML      =  "Nome: " .$_POST['name']. $quebra_linha. " Email: " .$_POST['email']. $quebra_linha. "Celular: " .$_POST['cellphone']. $quebra_linha. "Telefone: " .$_POST['phone'].  $quebra_linha.  "Tipo: " . $_POST['typeContact']. $quebra_linha. "Mensagem: " . $_POST['message']  ;
		
		/* Montando o cabeçalho da mensagem */
		$headers = "MIME-Version: 1.1".$quebra_linha;
		$headers .= "Content-type: text/html; charset=iso-8859-1".$quebra_linha;
		// Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
		$headers .= "From: ".$emailsender.$quebra_linha;
		$headers .= "Return-Path: " . $emailsender . $quebra_linha;
		

		$headers .= "Reply-To: ".$emailremetente.$quebra_linha;
		// Note que o e-mail do remetente será usado no campo Reply-To (Responder Para)
		
		/* Enviando a mensagem */
		mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender);
		echo "Mensagem enviada com sucesso (Contato)";

		
	} else {
		echo "Tipo de mensagem não encontrado";
	}

	
	
}

?>