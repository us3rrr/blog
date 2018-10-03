<?php

header('Content-Type: application/json');
	//verifica se foram preenchidos os dados de autenticação
  if(!isset($_SERVER['PHP_AUTH_USER'])){
        //modifica o HEADER, informando o tipo de autenticação
        header('WWW-Authenticate: Basic realm="Página Restrita"');
        //modifica o HEADER, indicando o código de não autorizado;
        
        //exibe mensagem de erro em json
        echo json_encode(["mensagem" => "autenticação necessária"]);
        //para a execução do script
        exit;
    } elseif (!($_SERVER['PHP_AUTH_USER'] == 'admin'
        && $_SERVER['PHP_AUTH_PW'] == 'admin')){
        header('HTTP/1.0 401 Unauthorized');
        //exibe mensagem de erro em J's_son
        echo json_encode(["mensagem" => "Usuário inválido"]);
    } else { //NO else vai o código padrão da página 

	header('Acess-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	
	require_once '../../config/Conexao.php';
	require_once '../../models/Post.php';

	$db = new Conexao();
	$con = $db->getConexao();

	$post = new Post($con);

	$resultado = $post->read();

	$qtde_cats>0 = sizeof($resultado);

	if($)
}