angular.module("Apequipos",[]).controller("recuperarUsuaruios",function($scope,$http){
		//variables
		$scope.cboClientes = [];//registros
		$scope.cboPropietarios = [];//registros
		$scope.cboDomicilios = [];	//domicilios
		$scope.arrEquipos = [];	//domicilios
		
		$scope.id_equip = "";


		// cargar lista de clientes 
		$http.get("./php/getClientes.php").success(function(data){
				$scope.cboClientes = data;
		}).error(function() {});

		// cargar lista de clientes 
		$http.get("./php/getPropietarios.php").success(function(data){
				$scope.cboPropietarios = data;
		}).error(function() {});	

		//cargar lista a combo
		$http.get("./php/getDomicilios.php").success(function(data){ 
			$scope.cboDomicilios = data;
		}).error(function() {});

		// cargar lista de equipos 
		$http.get("./php/getEquipos.php").success(function(data){
		
			if(data[0].id_equipo >=1){ //excepxcion cunado esta vacia la tabla
				$scope.arrEquipos = data;
			}
		}).error(function() {});

		// //Agregar o actualizar registro
		$scope.addEquipo = function(){	
			
			if ($scope.id_equip =="") {

				// estatus

				$http.post("./php/addEquipos.php",{'id_cliente': $scope.id_cliente, 'id_propietario':$scope.id_propietario, 'id_domicilio':$scope.id_domicilio, 'equipo':$scope.equipo, 'ip1': $scope.ip1, 'ip2':$scope.ip2, 'mac':$scope.mac, 'marca':$scope.marca, 'ssid': $scope.ssid, 'key': $scope.keyy, 'remot':$scope.remot, 'iprem':$scope.iprem})
				.success(function(data){ //agregar
					console.log(data);
									
					$scope.arrEquipos.push(data);
					// 		$scope.nombre = '';
					// 		$scope.telefono = '';
					// 		$scope.id_domicilio = '';
					// $("#sms").text("Registro agreado correctamente");		
				})	
			}else{
				// $http.post("./php/updClientes.php",{'newNom':$scope.newNom, 'newTel':$scope.newTel, 'id_domicilio': $("#id_domicilio").val(), 'id_reg': $scope.id_reg})
				// .success(function(data){ //actualizar
				// 	$scope.arrCientes = data;
				// 			$scope.newNom = '';
				// 			$scope.newTel = '';
				// 			$("#id_domicilio").val(0);
				// 			$scope.id_reg ='';
				// 	$("#sms").text("Registro actualizado correctamente");
				// })
			}
		}

		// $scope.edit = function(e){	//Obtener registro a editar
		// 	// var obj = $scope.arrCientes[e];
		// 	// //console.log(obj.domicilio);
		// 	// $scope.newNom = obj.nombre;
		// 	// $scope.newTel = obj.telefono;
		// 	// $scope.id_reg = obj.id_cliente;
		// 	// $http.post("./php/getDomicilioId.php",{nom_dom: obj.domicilio} ).success(function(data){ // get id domicilio
		// 	// 	$("#id_domicilio").val(data.id_domicilio);
		// 	// })
		// }

		// $scope.elim = function(e){	//Obtener registro a editar

		//     var r = confirm("Desea eliminar este registro!");
		//     if (r == true) {
	 //        	$http.post("./php/eliminarRegistro.php",{idEliminar: e} ).success(function(data){ // get id domicilio
		// 		$scope.arrClientes = [];
		// 		$scope.arrClientes = data;
		// 		$("#sms").text("Registro eliminado correctamente");				
		// 		})
		//     }else{
		//     	return false;
		//     }
		// }
	

});

