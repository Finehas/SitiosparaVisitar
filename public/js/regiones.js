var ruta= document.querySelector("[name=route]").value;
var urlRegion=ruta + '/regionescontrol';
var urlPais=ruta + '/paisescontrol';


new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},
el:"#region",
created:function(){
	this.getPais();
	this.getRegion();
},
data:{
	paises:[],
	regiones:[],
	ubicacion:'',
	id_provincia:'',
	id_pais:'',
	nombre_es:'',
    nombre_en:'',
    nombre_largo_es:'',
   	nombre_largo_en:'',
    capital_es:'',
    capital_en:'',
	editando:false,
	auxRegion:'',
	agregar1:false,
	agregar2:false,
	buscar:''
},
methods:
{
	getPais:function()
	{
		this.$http.get(urlPais).then(
			function(response)
			{
				this.paises=response.data;
			}).catch(function(response){
			console.log(response);
		});
	},
	getRegion:function()
	{
		this.$http.get(urlRegion).then(
			function(response)
			{
				this.regiones=response.data;
			}).catch(function(response){
			console.log(response);
		});
	},
	
	showModal:function(){
		$('#add_region').modal('show');
	},
	mas1:function(){
		if (this.agregar1==false) {
			this.agregar1=true;
		}else{
			this.agregar1=false;
			this.nombre_largo_es="";
			this.nombre_largo_en="";
		}
		
	},
	mas2:function(){
		if (this.agregar2==false) {
			this.agregar2=true;
		}else{
			this.agregar2=false;
			this.capital_es="";
			this.capital_en="";
		}
		
	},
	agregarRegion:function(){
		if (this.nombre_es==""||this.nombre_en==""|| this.id_pais==""||this.ubicacion=="") {
			toastr.info("Rellena los Campos Obligatorios");
		}else{
		var region={
			nombre_es:this.nombre_es,
			nombre_en:this.nombre_en,
			nombre_largo_es:this.nombre_largo_es,
			nombre_largo_en:this.nombre_largo_en,
			capital_es:this.capital_es,
			capital_en:this.capital_en,
			ubicacion:this.ubicacion,
			id_pais:this.id_pais
		};
		this.$http.post(urlRegion,region)
		.then(function(response){
			this.getRegion();
			this.salir();
			toastr.success("Region Agregada");
			
		}
		)
		}
	},
	eliminarRegion:function(id){
		this.$http.delete(urlRegion + '/' + id)
		.then(function(json) {
			this.salir();
			this.getRegion();
			toastr.error("Region eliminada");
		});
	},
	editarRegion:function(id){
		if (this.nombre_es==""||this.nombre_en==""|| this.id_pais==""||this.ubicacion=="") {
			toastr.info("Rellena los Campos Obligatorios");
		}else{
		var region={
			nombre_es:this.nombre_es,
			nombre_en:this.nombre_en,
			nombre_largo_es:this.nombre_largo_es,
			nombre_largo_en:this.nombre_largo_en,
			capital_es:this.capital_es,
			capital_en:this.capital_en,
			ubicacion:this.ubicacion,
			id_pais:this.id_pais
		};
			this.$http.put(urlRegion +'/'+ this.auxRegion,region)
		.then(function(response){
			this.getRegion();
			toastr.info("Region editada");
			this.salir();
		});
		}	
	},
	salir:function(){
			$('#add_region').modal('hide');
			this.id_pais='';
			this.nombre_es='';
			this.nombre_en='';
			this.nombre_largo_es='';
			this.nombre_largo_en='';
			this.capital_es='';
			this.capital_en='';
			this.id_provincia
			this.auxRegion='';
			this.ubicacion='';
			this.editando=false;
			this.agregar1=false;
			this.agregar2=false;
			},
	obligar:function(){
		toastr.warning("Campo Obligatorio")
	},

	editRegion:function(id){
		this.editando=true;
		$('#add_region').modal('show');
		this.$http.get(urlRegion + '/' + id)
		.then(function(response){
			this.id_pais=response.data.id_pais;
			this.id_provincia=response.data.id_provincia;
			this.nombre_es=response.data.nombre_es;
			this.nombre_en=response.data.nombre_en;
			this.nombre_largo_es=response.data.nombre_largo_es;
			this.nombre_largo_en=response.data.nombre_largo_en;
			this.capital_es=response.data.capital_es;
			this.capital_en=response.data.capital_en;
			this.ubicacion=response.data.ubicacion;
			this.auxRegion=response.data.id_provincia;
			if (response.data.nombre_largo_en!=null || response.data.nombre_largo_es!=null) 
			{
				this.agregar1=true;
				if (response.data.capital_es!=null || response.data.capital_en!=null) 
				{
				this.agregar2=true;
				this.showModal();
				}else{
				this.agregar2=false;
				this.showModal();
				}
			}else{
				this.agregar1=false;
				if (response.data.capital_es!=null || response.data.capital_en!=null) 
				{
				this.agregar2=true;
				this.showModal();
				}else{
				this.agregar2=false;
				this.showModal();
				}
			}
		});
	},
	
},
computed:{
		filtroRegiones:function(){
			return this.regiones.filter((mn)=>{
				
				return mn.nombre_en.toLowerCase().match(this.buscar.trim().toLowerCase())||
				mn.nombre_es.toLowerCase().match(this.buscar.trim().toLowerCase());
				});
			
		}
	}
	})