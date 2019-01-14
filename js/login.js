var usuario,clave;
window.onload = function(){
	console.log('load correcta...')

	document.getElementById("btnAceptar").addEventListener("click", function(){
		validarLogin();
	}) 
	/*document.getElementById("btgetData").addEventListener("click", function(){
		getDataInforme01();
		console.log('Click button...')
	})*/
}

function validarLogin(){
	usuario=document.getElementById("usuario").value;
	clave=document.getElementById("clave").value;
	if (usuario.length===0 || clave.length===0){		
		swal({
			position: 'center',
		  	type: 'warning',
		  	title: 'Usuario y Password son requeridos',
		  	showConfirmButton: true,		  	
		})
	}else{
		login()
	}	
}

function login(){
	let data={
		usuario,
		clave
	}
	$.ajax({
		url: 'http://localhost:8080/ventas/index.php/Login/login_users',
		beforeSend: function(){
			//document.getElementById('loading').style.display = 'block';
		},
		data: data,
		type: 'POST',
		success: function(resp) {			
			console.log(JSON.parse(resp))
			if (resp!=0){
				window.location.href = "http://localhost:8080/ventas/index.php/main_Controller/index";				
				/*swal({
					position: 'center',
				  	type: 'success',
				  	title: 'Usuario y Password correctos',
				  	showConfirmButton: true,		  	
				})*/			
			}else{
				swal({
					position: 'center',
				  	type: 'warning',
				  	title: 'Validar información',
				  	showConfirmButton: true,		  	
				})
			}							
		},
		complete: function(xhr,status){
			
		},
		error: function(err) {
	    	swal({
				position: 'center',
			  	type: 'error',
			  	title: 'Se ha producido un error '+err,
			  	showConfirmButton: true,		  	
			})
	  }
	});
}
