<?php

	header('Acess-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	
	require_once '../../config/Conexao.php';
	require_once '../../models/Categoria.php';

	$db = new Conexao();
	$con = $db->getConexao();

    $categoria = new Categoria($con);


//SE NAO FOR ENVIADO UM ID POR GET, read()
    $resultado = $categoria->read();
//SE FOR ENVIADO UM ID POR GET, read($id)    

    $qtde_cats = sizeof($resultado);

    if($qtde_cats>0){
        // $arr_categorias = array();
        // $arr_categorias['data'] = array();

        echo json_encode($resultado);
    }else{
        echo json_encode(array('mensagem' => 'nenhuma categoria encontrada'));
    }