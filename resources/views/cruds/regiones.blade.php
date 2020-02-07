@extends('master.index')
@section('titulo','Regiones')
@section('contenido')
<div id='region'>
  <!-- Topbar Search -->
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
			<th>Nombre de la Región en Español</th>
			<th>Nombre de la Región en Ingles</th>
			<th>Nombre largo de la Región en Español</th>
			<th>Nombre largo de la Región en Ingles</th>
			<th>Capital de la Región en Español</th>
			<th>Capital de la Región en Ingles</th>
      <th>Ubicación</th>
      <th>País</th>
		</thead>
		<tbody>
			<tr v-for="region in filtroRegiones">
				<td>@{{region.nombre_es}}</td>
				<td>@{{region.nombre_en}}</td>
				<td>@{{region.nombre_largo_es}}</td>
				<td>@{{region.nombre_largo_en}}</td>
				<td>@{{region.capital_es}}</td>
				<td>@{{region.capital_en}}</td>
				<td>@{{region.ubicacion}}</td>
				<td>@{{region.pais.nombre_es}}</td>
				<td>
					<span class="btn btn-primary btn-xs" v-on:click="editRegion(region.id_provincia)"><i class="fas fa-fw fa-pen"></i></span>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="modal fade" tabindex="-1" role="dialog" id="add_region">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="m-0 font-weight-bold text-primary" v-if="!editando">Region Nueva</h6>
					<h6 class="m-0 font-weight-bold text-primary" v-if="editando">Editar Region</h6>
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
                <div class="form-group row" v-if="!agregar1">
                  <div class="col-sm-3">
                    
                  </div>
                  <div class="col-sm-6">
                  <center><a href="#" class="btn btn-primary btn-icon-split btn-sm" v-on:click="mas1()">
                    <span class="text"><i class="fas fa-plus"></i> Agregar un Nombre Largo</span>
                  </a></center>
                  </div>
                  <div class="col-sm-3"></div>
                </div>
                <div class="form-group row" v-if="agregar1">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre Largo Español" v-model="nombre_largo_es">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre Largo Inglés" v-model="nombre_largo_en">
                  </div>
                </div>
                 <div class="form-group row" v-if="agregar1">
                  <div class="col-sm-3">
                    
                  </div>
                  <div class="col-sm-6">
                  <center><a href="#" class="btn btn-danger btn-icon-split btn-sm" v-on:click="mas1()">
                    <span class="text"><i class="fas fa-minus"></i> Quitar Nombre Largo</span>
                  </a></center>
                  </div>
                  <div class="col-sm-3"></div>
                </div>
                <div class="form-group row" v-if="!agregar2">
                  <div class="col-sm-3">
                    
                  </div>
                  <div class="col-sm-6">
                  <center><a href="#" class="btn btn-primary btn-icon-split btn-sm" v-on:click="mas2()">
                   <span class="text"><i class="fas fa-plus"></i> Agregar una Capital</span>
                  </a> </center>
                  </div>
                  <div class="col-sm-3"></div>
                </div>
                <div class="form-group row" v-if="agregar2">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre Capital Español" v-model="capital_es">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre Capital Inglés" v-model="capital_en">
                  </div>
                </div>
                <div class="form-group row" v-if="agregar2">
                  <div class="col-sm-3">
                    
                  </div>
                  <div class="col-sm-6">
                  <center><a href="#" class="btn btn-danger btn-icon-split btn-sm" v-on:click="mas2()">
                    <span class="text"><i class="fas fa-minus"></i> Quitar Capital</span>
                  </a></center>
                  </div>
                  <div class="col-sm-3"></div>
                </div>
                <div class="form-group">
                 	<select class="form-control" v-model="id_pais" v-on:click="obligar">
							       <option disabled value="">Elija el País al que Pertenece</option>
							       <option v-for="pais in paises" v-bind:value="pais.id_pais">@{{pais.nombre_es}}</option>
					       </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" placeholder="Ubicación" v-model="ubicacion" v-on:click="obligar">
                </div>      
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-success btn-circle btn-lg" v-on:click="agregarRegion()" v-if="!editando">
                    <i class="fas fa-check"></i>
                  	</a>
					<a href="#" class="btn btn-success btn-circle btn-lg" v-on:click="editarRegion(auxRegion)"
					v-if="editando">
                    <i class="fas fa-check"></i>
                  	</a>
					<a href="#" class="btn btn-danger btn-circle btn-lg" v-if="editando" v-on:click="eliminarRegion(auxRegion)">
                    <i class="fas fa-trash"></i>
              		</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@push('scripts')
<script type="text/javascript" src="js/regiones.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="js/vue-resource.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">