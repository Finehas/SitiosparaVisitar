@extends('master.index')
@section('titulo','Rutas')
@section('contenido')
<div id='ruta'>
	<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-2 small" placeholder="Buscar por Nombre" aria-label="Search" aria-describedby="basic-addon2" v-model="buscar">
              
            </div>
          </form>
          <br>
          <br>
	<button class="btn btn-success" v-on:click="showModal()"><i class="fas fa-fw fa-plus-circle"></i>Agregar</button>
	<br><br>
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<th>Nombre de la Ruta en Español</th>
			<th>Nombre de la Ruta en Ingles</th>
			<th>Kilometros de la Ruta</th>
			<th>Millas de la Ruta</th>
			<th>Ubicación</th>
			
		</thead>
		<tbody>
			<tr v-for="ruta in filtroRutas">
				<td>@{{ruta.nombre_es}}</td>
				<td>@{{ruta.nombre_en}}</td>
				<td>@{{ruta.longitud_km}}</td>
				<td>@{{ruta.longitud_milla}}</td>
				<td>@{{ruta.ubicacion}}</td>
				<td>
					<span class="btn btn-primary btn-xs" v-on:click="editRuta(ruta.id_ruta)"><i class="fas fa-fw fa-pen"></i></span>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="modal fade" tabindex="-1" role="dialog" id="add_ruta">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">

					
					<h6 class="m-0 font-weight-bold text-primary" v-if="!editando">Ruta Nueva</h6>
					<h6 class="m-0 font-weight-bold text-primary" v-if="editando">Editar Ruta</h6>
					<a href="#" class="btn btn-warning btn-icon-split" data-dismiss="modal" v-on:click="salir">
                    <span class="icon text-white-50">
                      <i class="fas fa-fw fa-times-circle"></i>
                    </span>
                    <span class="text">Cancelar</span>
                  	</a>
				</div>
				<div class="modal-body">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre Español" v-model="nombre_es" v-on:click="obligar">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre Inglés" v-model="nombre_en" v-on:click="obligar">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">

                    <input type="number" class="form-control form-control-user"  placeholder="Distancia Kilometros" v-model="longitud_km" v-on:click="obligar">
                  </div>
                  <div class="col-sm-6">
                    <input type="number" class="form-control form-control-user" placeholder="Distancia Millas" v-model="longitud_milla" v-on:click="obligar">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" placeholder="Ubicación" v-model="ubicacion" v-on:click="obligar">
                </div>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-success btn-circle btn-lg" v-on:click="agregarRuta()" v-if="!editando">
                    <i class="fas fa-check"></i>
                  	</a>
					<a href="#" class="btn btn-success btn-circle btn-lg" v-on:click="editarRuta(auxRuta)"
					v-if="editando">
                    <i class="fas fa-check"></i>
                  	</a>
					<a href="#" class="btn btn-danger btn-circle btn-lg" v-if="editando" v-on:click="eliminarRuta(id_ruta)">
                    <i class="fas fa-trash"></i>
              		</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@push('scripts')
<script type="text/javascript" src="js/rutas.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">