var ruta= document.querySelector("[name=route]").value;
var urlMoneda=ruta + '/monedascontrol';

function init(){
new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},
el:"#moneda",
created:function(){
	this.getMoneda();
},

data:{
	monedas:[],
	id_moneda:'',
	nombre_moneda_es:'',
	nombre_moneda_en:'',
	cambio_dolar:'',
	cambio_euro:'',
	editando:false,
	auxMoneda:'',
	buscar:''
},
methods:
{
	getMoneda:function()
	{
		this.$http.get(urlMoneda).then(
			function(response)
			{
				this.monedas=response.data;

			}).catch(function(response){
			toastr.info(response.data);
		});
	},
	
	showModal:function(){
		$('#add_moneda').modal('show');
	},
	obligar:function(){
		toastr.warning("Campo Obligatorio")
	},
	agregarMoneda:function(){
		
		
		if (this.nombre_moneda_es==""||this.nombre_moneda_en==""||this.cambio_dolar==""||this.cambio_euro=="") 
		{
			toastr.info("Asegurate de llenar todos los campos");
		}else{
			var moneda={
			nombre_moneda_es:this.nombre_moneda_es,
			nombre_moneda_en:this.nombre_moneda_en,
			cambio_dolar:this.cambio_dolar,
			cambio_euro:this.cambio_euro
		};
		this.$http.post(urlMoneda,moneda)
		.then(function(response){
			this.getMoneda();
			this.salir();
			toastr.success("Moneda Agregada");
			
		}
		)
	}
	},
	eliminarMoneda:function(id){
		this.$http.delete(urlMoneda + '/' + id)
		.then(function(json) {
			this.salir();
			this.getMoneda();
			toastr.error("Moneda eliminada");
			this.editando=false;
			this.auxMoneda="";
		});
	},
	editarMoneda:function(id){
		//objeto json para enviar datos a la api
		
		if (this.nombre_moneda_es==""||this.nombre_moneda_en==""||this.cambio_dolar==""||this.cambio_euro=="") 
		{
			toastr.info("Asegurate de que los campos esten llenos");
		}else{
			var moneda={
			nombre_moneda_es:this.nombre_moneda_es,
			nombre_moneda_en:this.nombre_moneda_en,
			cambio_dolar:this.cambio_dolar,
			cambio_euro:this.cambio_euro
		};
			this.$http.put(urlMoneda +'/'+ this.auxMoneda,moneda)
		.then(function(response){
			this.getMoneda();
			toastr.info("Moneda editada");
			this.salir();
		});
		}
		//para poder entrar al método store nescesitamos de un post y se envia el json
		
	},
	salir:function(){
			this.id_moneda="";
			this.nombre_moneda_es="";
			this.nombre_moneda_en="";
			this.cambio_dolar="";
			this.cambio_euro="";
			this.auxMoneda="";
			this.editando=false;
			$('#add_moneda').modal('hide');
	},

	editMoneda:function(id){
		this.editando=true;
		$('#add_moneda').modal('show');
		this.$http.get(urlMoneda + '/' + id)
		.then(function(response){
			this.id_moneda= response.data.id_moneda;
			this.nombre_moneda_es=response.data.nombre_moneda_es;
			this.nombre_moneda_en=response.data.nombre_moneda_en;
			this.cambio_dolar=response.data.cambio_dolar;
			this.cambio_euro=response.data.cambio_euro;
			this.auxMoneda= response.data.id_moneda;
		});
	}
},
computed:{
		filtroMonedas:function(){
			
			
				
			return this.monedas.filter((mn)=>{
				
				return mn.nombre_moneda_es.toLowerCase().match(this.buscar.trim().toLowerCase()) ||
					   mn.nombre_moneda_en.toLowerCase().match(this.buscar.trim().toLowerCase());
			
				// return this.monedas.nombre_moneda_en.toLowerCase().match(this.buscar.trim().toLowerCase()) ||
				// 	   this.monedas.nombre_moneda_es.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
			
		}
	}
})
}
window.onload=init;