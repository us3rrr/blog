<?php

	header('Acess-Control-Allow-Origin: *');
	header('Content-Type: application/json; charset=utf-8');
	
	require_once '../../config/Conexao.php';
	require_once '../../models/Post.php';

	 if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    	$db = new Conexao();
    	$con = $db->getConexao();

        $post = new Post($con);
        $dados = json_decode(file_get_contents("php://input"));

        $post->id = $dados->id;

        if($post->delete()) {
        	$res = ['mensagem'=>'Post deletado'];
        } else {
        	$res = ['mensagem'=>'Erro na deleção da post'];
        }
    	echo json_encode($res);   
    }