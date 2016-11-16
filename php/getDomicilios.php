<?php 
//error_reporting(0);
require_once('./db.class.php');
// Hacemos la conexión
$db = DataBase::connect();
$db->setQuery('SELECT * FROM domicilios order by nombre asc');

// La ejecutamos y al mismo tiempo obtenemos un arreglo de objetos
// con los campos especificados en la consulta como propiedades.
$rows = $db->loadObjectList();


// Los imprimimos directamente en pantalla...
foreach($rows as $cl){
	$jsondata[] = array('id_domicilio' => $cl->id_domicilio, 'nombre' => $cl->nombre);
	//$jsondata['usuarios'] = $users; 
}
    echo json_encode($jsondata);

?>