var ruta= document.querySelector("[name=route]").value;
var urlRuta=ruta + '/rutascontrol';


new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},
el:"#ruta",
created:function(){
	this.getRuta();
},
data:{
	rutas:[],
	id_ruta:'',
	nombre_es:'',
	nombre_en:'',
	longitud_km:'',
	longitud_milla:'',
	ubicacion:'',
	editando:false,
	auxRuta:'',
	buscar:''
},
methods:
{
	getRuta:function()
	{
		this.$http.get(urlRuta).then(
			function(response)
			{
				this.rutas=response.data;
			}).catch(function(response){
			console.log(response);
		});
	},
	
	showModal:function(){
		$('#add_ruta').modal('show');
	},
	agregarRuta:function(){
		
		if (this.ubicacion==""||this.nombre_en==""||this.nombre_es==""||this.longitud_km==""||this.longitud_milla=="") 
		{
			toastr.info("Asegurate de llenar los campos obligatorios");
		}else{

		var ruta={
			nombre_es:this.nombre_es,
			nombre_en:this.nombre_en,
			longitud_km:this.longitud_km,
			longitud_milla:this.longitud_milla,
			ubicacion:this.ubicacion
		};
		this.$http.post(urlRuta,ruta)
		.then(function(response){
			this.getRuta();
			this.salir();
			toastr.success("Ruta Agregada");
			
		}
		)
	}
	},
	eliminarRuta:function(id){
		this.$http.delete(urlRuta + '/' + id)
		.then(function(json) {
			this.salir();
			this.getRuta();
			toastr.error("Ruta eliminada");
			this.editando=false;
			this.auxRuta="";
		}).catch(function(response){
			toastr.error("Elimina la relación de esta ruta con las localidades");
		});
	},
	obligar:function(){
		toastr.warning("Campo Obligatorio")
	},
	editarRuta:function(id){
		//objeto json para enviar datos a la api
		
		if (this.ubicacion==""||this.nombre_en==""||this.nombre_es==""||this.longitud_km==""||this.longitud_milla=="") 
		{
			toastr.info("Asegurate de que ella te ame");
		}else{
			var ruta={
			nombre_es:this.nombre_es,
			nombre_en:this.nombre_en,
			longitud_km:this.longitud_km,
			longitud_milla:this.longitud_milla,
			ubicacion:this.ubicacion
		};
			this.$http.put(urlRuta +'/'+ this.auxRuta,ruta)
		.then(function(response){
			this.getRuta();
			toastr.info("Ruta editada");
			this.salir();
		});
		}
		//para poder entrar al método store nescesitamos de un post y se envia el json
		
	},
	salir:function(){
			this.id_ruta= "";
			this.nombre_es="";
			this.nombre_en="";
			this.longitud_km="";
			this.longitud_milla="";
			this.ubicacion="";
			this.auxRuta= "";
			this.editando=false;
			$('#add_ruta').modal('hide');
	},

	editRuta:function(id){
		this.editando=true;
		$('#add_ruta').modal('show');
		this.$http.get(urlRuta + '/' + id)
		.then(function(response){
			this.id_ruta= response.data.id_ruta;
			this.nombre_es=response.data.nombre_es;
			this.nombre_en=response.data.nombre_en;
			this.longitud_km=response.data.longitud_km;
			this.longitud_milla=response.data.longitud_milla;
			this.ubicacion=response.data.ubicacion;
			this.auxRuta= response.data.id_ruta;
		});
	}
},
computed:{
		filtroRutas:function(){
			
			
				
			return this.rutas.filter((mn)=>{
				
				return mn.nombre_en.toLowerCase().match(this.buscar.trim().toLowerCase())||
				mn.nombre_es.toLowerCase().match(this.buscar.trim().toLowerCase());
			
				// return this.monedas.nombre_moneda_en.toLowerCase().match(this.buscar.trim().toLowerCase()) ||
				// 	   this.monedas.nombre_moneda_es.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
			
		}
	}
})