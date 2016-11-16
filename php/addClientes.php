<?php 
//error_reporting(0);
require_once('./db.class.php');
// Hacemos la conexión
$db = DataBase::connect();

$data = json_decode(file_get_contents("php://input"));

$n = $data->newNom;
$tel = $data->newTel;
$id_dom = $data->id_domicilio;


$db->setQuery('insert into clientes values(null,"'.$n.'","'.$tel.'",'.$id_dom.',1);');
// con los campos especificados en la consulta como propiedades.

if($db->alter()){
	$db->setQuery('SELECT clientes.*, domicilios.nombre as domicilio FROM clientes INNER JOIN domicilios
on clientes.id_domicilio = domicilios.id_domicilio where id_cliente in (SELECT MAX(id_cliente) AS id FROM clientes);');
	
	$cl = $db->loadObject();
 	echo json_encode(array('id_cliente' => $cl->id_cliente, 'nombre' => $cl->nombre, 'telefono' => $cl->telefono,'domicilio' => $cl->domicilio,'estatus' => $cl->estatus));
}
else{
    echo 'Error: '.$db->getError();
}

?>