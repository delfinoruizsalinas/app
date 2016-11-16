<?php 
//error_reporting(0);
require_once('./db.class.php');
// Hacemos la conexión
$db = DataBase::connect();

$data = json_decode(file_get_contents("php://input"));

// $n = $data->newNom;
// $tel = $data->newTel;
// $id_dom = $data->id_domicilio;

$db->setQuery('insert into equipos values(null, '.$data->id_cliente.','.$data->id_propietario.','.$data->id_domicilio.',"'.$data->equipo.'","'.$data->ip1.'","'.$data->ip2.'","'.$data->mac.'","'.$data->marca.'","'.$data->ssid.'","'.$data->key.'","'.$data->remot.'","'.$data->iprem.'",1);');

//echo 'insert into equipos values(null, '.$data->id_cliente.','.$data->id_propietario.','.$data->id_domicilio.',"'.$data->equipo.'","'.$data->ip1.'","'.$data->ip2.'","'.$data->mac.'","'.$data->marca.'","'.$data->ssid.'","'.$data->key.'","'.$data->remot.'","'.$data->iprem.'",1);';
// con los campos especificados en la consulta como propiedades.

if($db->alter()){
	$db->setQuery('SELECT clientes.nombre as cliente, equipos.* FROM equipos INNER JOIN clientes ON
equipos.id_cliente = clientes.id_cliente;');

	$cl = $db->loadObject();
 	echo json_encode(array('id_equipo'=>$cl->id_equipo, 'cliente' => $cl->cliente, 'propietario' => $cl->id_propietario, 'domicilio' => $cl->id_domicilio,'equipo' => $cl->equipo,'ip1' => $cl->ip1,'ip2' => $cl->ip2,'mac' => $cl->mac,'marca' => $cl->marca,'ssid' => $cl->ssid,'key' => $cl->key,'remot' => $cl->remot,'iprem' => $cl->iprem,'estatus' => $cl->estatus));
}
else{
    echo 'Error: '.$db->getError();
}

?>