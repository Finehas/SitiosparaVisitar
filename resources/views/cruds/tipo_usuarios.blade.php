@extends('master.index')
@section('titulo','Regiones')
@section('contenido')
<div id='tipo_usuario'>
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
			<th>Nombre del Tipo de Usuario</th>
		</thead>
		<tbody>
			<tr v-for="tipo in filtroTipo_usuario">
				<td>@{{tipo.nombre_tipo}}</td>
				<td>
				<span class="btn btn-primary btn-xs" v-on:click="editTipo(tipo.id_tipo)"><i class="fas fa-fw fa-pen"></i></span>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="modal fade" tabindex="-1" role="dialog" id="add_tipo">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="m-0 font-weight-bold text-primary" v-if="!editando">Nuevo Tipo</h6>
					<h6 class="m-0 font-weight-bold text-primary" v-if="editando">Editar Tipo</h6>
					<a href="#" class="btn btn-warning btn-icon-split" data-dismiss="modal" v-on:click="salir">
                    <span class="icon text-white-50">
                      <i class="fas fa-fw fa-times-circle"></i>
                    </span>
                    <span class="text">Cancelar</span>
                  	</a>
				</div>
				<div class="modal-body">
					<div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre del Tipo" v-model="nombre_tipo" v-on:click="obligar">
                  </div>
                </div>    
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-success btn-circle btn-lg" v-on:click="agregarTipo()" v-if="!editando">
                    <i class="fas fa-check"></i>
                  	</a>
					<a href="#" class="btn btn-success btn-circle btn-lg" v-on:click="editarTipo(auxTipo)"
					v-if="editando">
                    <i class="fas fa-check"></i>
                  	</a>
					<a href="#" class="btn btn-danger btn-circle btn-lg" v-if="editando" v-on:click="eliminarTipo(auxTipo)">
                    <i class="fas fa-trash"></i>
              		</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@push('scripts')
<script type="text/javascript" src="js/tipo_usuario.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">