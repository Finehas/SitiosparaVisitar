@extends('master.index')
@section('titulo','Monedas')
@section('contenido')
<div id='moneda'>
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
			<th>Nombre de la Moneda en Español</th>
			<th>Nombre de la Moneda en Ingles</th>
			<th>Cambio a Dolar</th>
			<th>Cambio a Euro</th>
		</thead>
		<tbody>
			<tr v-for="moneda in filtroMonedas">
				<td>@{{moneda.nombre_moneda_es}}</td>
				<td>@{{moneda.nombre_moneda_en}}</td>
				<td>@{{moneda.cambio_dolar}}</td>
				<td>@{{moneda.cambio_euro}}</td>
				<td>
					<span class="btn btn-primary btn-xs" v-on:click="editMoneda(moneda.id_moneda)"><i class="fas fa-fw fa-pen"></i></span>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="modal fade" tabindex="-1" role="dialog" id="add_moneda">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="m-0 font-weight-bold text-primary" v-if="!editando">Moneda Nueva</h6>
					<h6 class="m-0 font-weight-bold text-primary" v-if="editando">Editar Moneda</h6>
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
                    <input type="text" class="form-control form-control-user" placeholder="Nombre Español" v-model="nombre_moneda_es" v-on:click="obligar">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre Inglés" v-model="nombre_moneda_en" v-on:click="obligar">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="number" class="form-control form-control-user"  placeholder="Dolar" v-model="cambio_dolar" v-on:click="obligar">
                  </div>
                  <div class="col-sm-6">
                    <input type="number" class="form-control form-control-user" placeholder="Euro" v-model="cambio_euro" v-on:click="obligar">
                  </div>
                </div>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-success btn-circle btn-lg" v-on:click="agregarMoneda()" v-if="!editando">
                    <i class="fas fa-check"></i>
                  	</a>
					<a href="#" class="btn btn-success btn-circle btn-lg" v-on:click="editarMoneda(auxMoneda)"
					v-if="editando">
                    <i class="fas fa-check"></i>
                  	</a>
					<a href="#" class="btn btn-danger btn-circle btn-lg" v-if="editando" v-on:click="eliminarMoneda(id_moneda)">
                    <i class="fas fa-trash"></i>
              		</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@push('scripts')
<script type="text/javascript" src="js/monedas.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">