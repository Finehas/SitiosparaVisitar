var ruta= document.querySelector("[name=route]").value;
var urlTipo_Usuarios=ruta + '/tipousuarioscontrol';


new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},
el:"#tipo_usuario",
created:function(){
	this.getTipo_Usuario();
},
data:{
	tipos:[],
	id_tipo:'',
	nombre_tipo:'',
	editando:false,
	auxTipo:'',
	buscar:''
},
methods:
{
	getTipo_Usuario:function()
	{
		this.$http.get(urlTipo_Usuarios).then(
			function(response)
			{
				this.tipos=response.data;
			}).catch(function(response){
			console.log(response);
		});
	},
	
	showModal:function(){
		$('#add_tipo').modal('show');
	},
	agregarTipo:function(){
		if (this.nombre_tipo=="") {
			toastr.info("Rellena los Campos Obligatorios")
		}else{
		var tipo={
			nombre_tipo:this.nombre_tipo
		};
		this.$http.post(urlTipo_Usuarios,tipo)
		.then(function(response){
			this.getTipo_Usuario();
			this.salir();
			toastr.success("Tipo de Usuario Agregado");
			
		}
		)
		}
	},
	eliminarTipo:function(id){
		this.$http.delete(urlTipo_Usuarios + '/' + id)
		.then(function(json) {
			this.salir();
			this.getTipo_Usuario();
			toastr.error("Tipo de Usuario eliminado");
			this.editando=false;
			this.auxTipo="";
		});
	},
	editarTipo:function(id){
		//objeto json para enviar datos a la api
		if (this.nombre_tipo=="") {
			toastr.info("Rellena los Campos Obligatorios");
		}else{
		var tipo={
			nombre_tipo:this.nombre_tipo
		};
			this.$http.put(urlTipo_Usuarios +'/'+ this.auxTipo,tipo)
		.then(function(response){
			this.getTipo_Usuario();
			toastr.info("Tipo de Usuario editado");
			this.salir();
		});
		}
		
	},
	salir:function(){
			this.id_tipo='';
			this.nombre_tipo='';
			this.auxTipo='';
			this.editando=false;
			$('#add_tipo').modal('hide');
	},
	obligar:function(){
		toastr.warning("Campo Obligatorio")
	},

	editTipo:function(id){
		this.editando=true;
		$('#add_tipo').modal('show');
		this.$http.get(urlTipo_Usuarios + '/' + id)
		.then(function(response){
			this.id_tipo=response.data.id_tipo;
			this.nombre_tipo=response.data.nombre_tipo;
			this.auxTipo=response.data.id_tipo;
		});
	}
},
computed:{
		filtroTipo_usuario:function(){
			
			
				
			return this.tipos.filter((mn)=>{
				
				return mn.nombre_tipo.toLowerCase().match(this.buscar.trim().toLowerCase());
			
				// return this.monedas.nombre_moneda_en.toLowerCase().match(this.buscar.trim().toLowerCase()) ||
				// 	   this.monedas.nombre_moneda_es.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
			
		}
	}
})
