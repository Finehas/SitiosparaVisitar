@extends('master.index')
@section('titulo','Paises')
@section('contenido')
<div id="cascada">
	<center><h1>Selección de tus visitas</h1></center>
		<div class="row">
			<div class="col-md-6">
				<br>
				<label>Paises</label>
				<select class="form-control" v-model="id_pais" @change="getRegion">
					<option placeholder="Elija un País" disabled="">Elija un País</option>
					<option v-for='p in paises' v-bind:value="p.id_pais">@{{p.nombre_es}}</option>
				</select>

				<label>Regiones</label>
				<select class="form-control" v-model="id_provincia" @change="getMunicipio">
					<option disabled="">Elije una Region</option>
					<option v-for="r in estados" v-bind:value="r.id_provincia">@{{r.nombre_es}}</option>
				</select>
				<label>Municipios</label>
				<select class="form-control" v-model="id_localidad" @change="getSitios">
					<option disabled="">Elija un Municipio</option>
					<option v-for="m in municipios" v-bind:value="m.id_localidad">@{{m.nombre_es}}</option>
				</select>
			
			</div>
		</div>
		<br>
		<a class="btn btn-success btn-icon-split" v-on:click="visitar()">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Registrar Visita</span>
        </a>
		<br>
		<table class="table table-bordered table-hover table-striped">
		<thead>
			<th>Nombre del Sitio Español</th>
			<th>Nombre del Sitio en Ingles</th>
			<th>Valorar</th>
			<th>Personas que visitaron el sitio</th>
      		<th>Eliminar</th>
		</thead>
		<tbody>
			<tr v-for="(s,index) in sitios">
				<td>@{{s.nombre_es}}</td>
				<td>@{{s.nombre_en}}</td>
				<td>
					<select class="form-control" v-model="valoracion[index]">
					<option disabled="">Elige un puntaje</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
					</select>
				</td>
				<td>
					<input type="number" class="form-control" min="1" v-model.number="cantidades[index]">
				</td>
				<td>
					<center><span class="btn btn-danger btn-circle" v-on:click="eliminarSitio(index)"><i class="fas fa-trash"></i></span></center>
				</td>
			</tr>
		</tbody>
	</table>
	</div>
@endsection
@push('scripts')
<script type="text/javascript" src="js/registro_visita.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/vue.js"></script>
<script type="text/javascript" src="js/vue-resource.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">