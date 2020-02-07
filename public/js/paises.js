var ruta= document.querySelector("[name=route]").value;
var urlMoneda=ruta + '/monedascontrol';
var urlPais=ruta + '/paisescontrol';

new Vue({
http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},
el:"#pais",
created:function(){
	this.getPais();
	this.getMoneda();
},
data:{
	paises:[],
	monedas:[],
	id_moneda:'',
	id_pais:'',
	nombre_es:'',
    nombre_en:'',
    nombre_largo_es:'',
   	nombre_largo_en:'',
    continente_es:'',
    continente_en:'',
    capital_pais_es:'',
    capital_pais_en:'',
    idioma1_es:'',
    idioma1_en:'',
    idioma2_es:'',
    idioma2_en:'',
	editando:false,
	auxPais:'',
	agregar1:false,
	agregar2:false,
	buscar:''
},
methods:{
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
	getMoneda:function()
	{
		this.$http.get(urlMoneda).then(
			function(response)
			{
				this.monedas=response.data;
			}).catch(function(response){
			console.log(response);
		});
	},
	mas1:function(){
		if (this.agregar1==false) {
			this.agregar1=true;
		}else{
			this.agregar1=false;
			this.capital_pais_es="";
			this.capital_pais_en="";
		}
		
	},
	mas2:function(){
		if (this.agregar2==false) {
			this.agregar2=true;
		}else{
			this.agregar2=false;
			this.idioma2_es="";
			this.idioma2_en="";
		}
		
	},
	showModal:function(){
		$('#add_pais').modal('show');
	},
	agregarPais:function(){
		if (this.nombre_es=="" || this.nombre_en=="" ||this.nombre_largo_es=="" || this.nombre_largo_en==""|| this.continente_es==""||this.continente_en==""||this.idioma1_en==""||this.idioma1_es==""||this.id_moneda=="") {
			toastr.info("Rellena los Campos Obligatorios");
		}else{
		var pais={
			nombre_es:this.nombre_es,
			nombre_en:this.nombre_en,
			nombre_largo_es:this.nombre_largo_es,
			nombre_largo_en:this.nombre_largo_en,
			continente_es:this.continente_es,
			continente_en:this.continente_en,
			capital_pais_es:this.capital_pais_es,
			capital_pais_en:this.capital_pais_en,
			idioma1_es:this.idioma1_es,
			idioma1_en:this.idioma1_en,
			idioma2_es:this.idioma2_es,
			idioma2_en:this.idioma2_en,
			id_moneda:this.id_moneda
		};
		this.$http.post(urlPais,pais)
		.then(function(response){
			this.getPais();
			this.salir();
			toastr.success("Pais Agregado");
		})
		}
	},
	eliminarPais:function(id){
		this.$http.delete(urlPais + '/' + id)
		.then(function(json) {
			this.salir();
			this.getPais();
			toastr.error("Pais eliminado");
		});
	},
	obligar:function(){
		toastr.warning("Campo Obligatorio")
	},
	editarPais:function(id){
		if (this.nombre_es=="" || this.nombre_en=="" ||this.nombre_largo_es=="" || this.nombre_largo_en==""|| this.continente_es==""||this.continente_en==""||this.idioma1_en==""||this.idioma1_es==""||this.id_moneda=="") {
			toastr.info("Rellena los Campos Obligatorios");
		}else{
		var pais={
			nombre_es:this.nombre_es,
			nombre_en:this.nombre_en,
			nombre_largo_es:this.nombre_largo_es,
			nombre_largo_en:this.nombre_largo_en,
			continente_es:this.continente_es,
			continente_en:this.continente_en,
			capital_pais_es:this.capital_pais_es,
			capital_pais_en:this.capital_pais_en,
			idioma1_es:this.idioma1_es,
			idioma1_en:this.idioma1_en,
			idioma2_es:this.idioma2_es,
			idioma2_en:this.idioma2_en,
			id_moneda:this.id_moneda
		};
			this.$http.put(urlPais +'/'+ this.auxPais,pais)
		.then(function(response){
			this.getPais();
			toastr.info("Pais editado");
			this.salir();
		});
	}
	},
	salir:function(){
			$('#add_pais').modal('hide');
			this.id_pais='';
			this.nombre_es='';
			this.nombre_en='';
			this.nombre_largo_es='';
			this.nombre_largo_en='';
			this.continente_es='';
			this.continente_en='';
			this.capital_pais_es='';
			this.capital_pais_en='';
			this.idioma1_es='';
			this.idioma1_en='';
			this.idioma2_es='';
			this.idioma2_en='';
			this.id_moneda='';
			this.auxPais='';
			this.editando=false;
			this.agregar1=false;
			this.agregar2=false;
	},
	editPais:function(id){
		this.editando=true;
		this.$http.get(urlPais + '/' + id)
		.then(function(response){
			this.id_pais=response.data.id_pais;
			this.nombre_es=response.data.nombre_es;
			this.nombre_en=response.data.nombre_en;
			this.nombre_largo_es=response.data.nombre_largo_es;
			this.nombre_largo_en=response.data.nombre_largo_en;
			this.continente_es=response.data.continente_es;
			this.continente_en=response.data.continente_en;
			this.capital_pais_es=response.data.capital_pais_es;
			this.capital_pais_en=response.data.capital_pais_en;
			this.idioma1_es=response.data.idioma1_es;
			this.idioma1_en=response.data.idioma1_en;
			this.idioma2_es=response.data.idioma2_es;
			this.idioma2_en=response.data.idioma2_en;
			this.id_moneda=response.data.id_moneda;
			this.auxPais=response.data.id_pais;
			if (response.data.idioma2_es!=null || response.data.idioma2_en!=null) 
			{
				this.agregar2=true;
				if (response.data.capital_pais_es!=null || response.data.capital_pais_en!=null) {
					this.agregar1=true;
					this.showModal();
				}else{
					this.agregar1=false;
					this.showModal();
				}
			}else{
				this.agregar2=false;
				if (response.data.capital_pais_es!=null || response.data.capital_pais_en!=null) {
					this.agregar1=true;
					this.showModal();
				}else{
					this.agregar1=false;
					this.showModal();
				}
			}
		});
		
	}
},
computed:{
	filtroPaises:function(){
		console.log(this.paises);
			return this.paises.filter((mn)=>{
				return mn.nombre_es.toLowerCase().match(this.buscar.trim().toLowerCase()) ||
					   mn.nombre_en.toLowerCase().match(this.buscar.trim().toLowerCase());
			});			
		}
},
})
