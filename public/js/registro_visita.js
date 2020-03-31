var ruta= document.querySelector("[name=route]").value;
var urlRegion=ruta + '/getEstados';
var urlPais=ruta + '/paisescontrol';
var urlCiudad=ruta + '/getMunicipios';
var urlMunicipio=ruta+ '/municipioscontrol';
var urlSitio=ruta+ '/getSitios';
var urlVisita=ruta+'/registroVisita'
function init(){
new Vue({
	el:'#cascada',
data:{
		paises:[],
		id_pais:'',
		estados:[],
		id_provincia:'',
		municipios:[],
		id_localidad:'',
		sitios:[],
		cantidades:[1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1],
		valoracion:[],
	},

	created:function(){
		this.getPaises();
	},

	methods:{
		getPaises:function(){
			this.$http.get(urlPais)
			.then(function(json){
				this.paises = json.data;
			})
		},
		
		getRegion(event){
			var id=event.target.value;
			console.log(id);
			this.$http.get(urlRegion +'/'+ id)
			.then(function(response){
				console.log(response);
				this.estados = response.data;
			});
		},
		getMunicipio(event){
			var idm=event.target.value;
			console.log(idm);
			this.$http.get(urlCiudad +'/'+ idm)
			.then(function(response){
				console.log(response);
				this.municipios = response.data;
			});
		},
		getSitios(event){
			var ids=event.target.value;
			console.log(ids);
			this.$http.get(urlSitio +'/'+ ids)
			.then(function(response){
				console.log(response);
				this.sitios = response.data;
			});
		},
		visitar:function(){
			var detallesVisita=[];
			for (var i =0; i <this.sitios.length; i++) {
				detallesVisita.push({
					id_sitio:this.sitios[i].id_sitio,
					cantidad_visitantes:this.cantidades[i],
					valoracion:this.valoracion[i]
				})
			}
			console.log(detallesVisita);
			var unaVisita = {
			id_usuario:1,
			visitas:detallesVisita
		}
		this.$http.post(urlVisita,unaVisita)
		.then(function(json){
			console.log(json.data);
			toastr.success("Visita Guardada con Exito");
			this.getPaises();
		})
	},
	eliminarSitio:function(id){
			this.sitios.splice(id,1);
		},
		
	}
	
});
}
window.onload=init;