<?php

	header('Acess-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	
	require_once '../../config/Conexao.php';
	require_once '../../models/Post.php';

	$db = new Conexao();
	$con = $db->getConexao();

    $post = new Post($con);

//SE NAO FOI ENVIADO ID POR GET,  read()
    $resultado = $post->read();
//SE FOI ENVIADO ID DE POST POR GET, read($id)

//SE FOI ENVIADO ID DE CATEGORIA POR GET, readByCat($idcat)    
    $qtde_cats = sizeof($resultado);

    if($qtde_cats>0){
        // $arr_categorias = array();
        // $arr_categorias['data'] = array();

        echo json_encode($resultado);
    }else{
        echo json_encode(array('mensagem' => 'nenhum post encontrada'));
    }