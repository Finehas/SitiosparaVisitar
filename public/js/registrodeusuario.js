var ruta= document.querySelector("[name=route]").value;
var urlUsuario=ruta + '/usuarioscontrol';

new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},
el:"#usuario",
data:{
	nombre_usuario:'',
	apellido_usuario:'',
	password:'',
	confirmpassword:'',
	email:''
},
methods:
{
	agregarUsuario:function(){
		console.log(ruta);
	// 	if (this.nombre_usuario==""||this.apellido_usuario==""||this.password==""||this.confirmpassword==""||this.email=="") 
	// 	{
	// 		toastr.info("Asegurate de llenar todos los campos");
	// 	}else{
	// 		if (this.password!=this.confirmpassword) {
	// 			toastr.info("Las contraseñas no coinciden")
	// 		}else{

	// 		var usuario={
	// 		nombre_usuario:this.nombre_usuario,
	// 		apellido_usuario:this.apellido_usuario,
	// 		password:this.password,
	// 		email:this.email
	// 	};

		
	// 	this.$http.post(urlUsuario,usuario)
	// 	.then(function(response){
	// 		var nueva= window.open("/","_self");
	// 	}
	// 	)
	// }
	// }
	},
}
})