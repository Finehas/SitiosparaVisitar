@extends('master.index')
@section('titulo','Paises')
@section('contenido')
<div id='pais'>
  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-2 small" placeholder="Buscar por Nombre" aria-label="Search" aria-describedby="basic-addon2" v-model="buscar">
              
            </div>
          </form>
          <br>
          <br>
	<button class="btn btn-success" v-on:click="showModal()"><i class="fas fa-fw fa-plus-circle"></i>Agregar</button>
	<br><br>
  <div class="table-responsive">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<th>Nombre del País en Español</th>
			<th>Nombre del País en Ingles</th>
			<th>Nombre largo del País en Español</th>
			<th>Nombre largo del País en Ingles</th>
			<th>Contienente en Español</th>
			<th>Contienente en Inglés</th>
			<th>Capital del País en Español</th>
			<th>Capital del País en Ingles</th>
			<th>Idioma Oficial(Español)</th>
			<th>Idioma Oficial(Inglés)</th>
			<th>Segundo Idioma Oficial(Español)</th>
			<th>Segundo Idioma Oficial(Inglés)</th>
			<th>Moneda del Pais</th>
		</thead>
		<tbody>
			<tr v-for="pais in filtroPaises">
				<td>@{{pais.nombre_es}}</td>
				<td>@{{pais.nombre_en}}</td>
				<td>@{{pais.nombre_largo_es}}</td>
				<td>@{{pais.nombre_largo_en}}</td>
				<td>@{{pais.continente_es}}</td>
				<td>@{{pais.continente_en}}</td>
				<td>@{{pais.capital_pais_es}}</td>
				<td>@{{pais.capital_pais_en}}</td>
				<td>@{{pais.idioma1_es}}</td>
				<td>@{{pais.idioma1_en}}</td>
				<td>@{{pais.idioma2_es}}</td>
				<td>@{{pais.idioma2_en}}</td>
				<td>@{{pais.moneda.nombre_moneda_es}}</td>
				<td>
					<span class="btn btn-primary btn-xs" v-on:click="editPais(pais.id_pais)"><i class="fas fa-fw fa-pen"></i></span>
				</td>
			</tr>
		</tbody>
	</table>
  </div>
	<div class="modal fade" tabindex="-1" role="dialog" id="add_pais">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="m-0 font-weight-bold text-primary" v-if="!editando">Pais Nuevo</h6>
					<h6 class="m-0 font-weight-bold text-primary" v-if="editando">Editar Pais</h6>
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
                    <input type="text" class="form-control form-control-user" placeholder="Nombre Largo Español" v-model="nombre_largo_es" v-on:click="obligar">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre Largo Inglés" v-model="nombre_largo_en" v-on:click="obligar">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre Contienente Español" v-model="continente_es" v-on:click="obligar">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre Continente Inglés" v-model="continente_en" v-on:click="obligar">
                  </div>
                </div>
                <div class="form-group row" v-if="!agregar1">
                  <div class="col-sm-3">
                  </div>
                  <div class="col-sm-6">
                  <center><a href="#" class="btn btn-primary btn-icon-split btn-sm" v-on:click="mas1()">
                    <span class="text"><i class="fas fa-plus"></i> Agregar Capital</span>
                  </a></center>
                  </div>
                  <div class="col-sm-3"></div>
                </div>

                <div class="form-group row" v-if="agregar1">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre Capital Español" v-model="capital_pais_es">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre Capital Inglés" v-model="capital_pais_en">
                  </div>
                </div>
                <div class="form-group row" v-if="agregar1">
                  <div class="col-sm-3">
                  </div>
                  <div class="col-sm-6">
                  <center><a href="#" class="btn btn-danger btn-icon-split btn-sm" v-on:click="mas1()">
                    <span class="text"><i class="fas fa-minus"></i> Quitar Capital</span>
                  </a></center>
                  </div>
                  <div class="col-sm-3"></div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre Idioma Oficial Español" v-model="idioma1_es" v-on:click="obligar">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre Idioma Oficial Inglés"v-model="idioma1_en" v-on:click="obligar">
                  </div>
                </div>
                
                <div class="form-group row" v-if="!agregar2">
                  <div class="col-sm-3">
                  </div>
                  <div class="col-sm-6">
                  <center><a href="#" class="btn btn-primary btn-icon-split btn-sm" v-on:click="mas2()">
                    <span class="text"><i class="fas fa-plus"></i> Agregar Segundo Idioma</span>
                  </a></center>
                  </div>
                  <div class="col-sm-3"></div>
                </div>

                <div class="form-group row" v-if="agregar2">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre Segundo Idioma Español" v-model="idioma2_es">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" placeholder="Nombre Segundo Idioma Inglés"v-model="idioma2_en">
                  </div>
                </div>

                <div class="form-group row" v-if="agregar2">
                  <div class="col-sm-3">
                  </div>
                  <div class="col-sm-6">
                  <center><a href="#" class="btn btn-danger btn-icon-split btn-sm" v-on:click="mas2()">
                    <span class="text"><i class="fas fa-minus"></i> Quitar Segundo Idioma</span>
                  </a></center>
                  </div>
                  <div class="col-sm-3"></div>
                </div>

                <div class="form-group">
                 	<select class="form-control" v-model="id_moneda">
							<option disabled value="">Elija la Moneda del País</option>
							<option v-for="moneda in monedas" v-bind:value="moneda.id_moneda">@{{moneda.nombre_moneda_es}}</option>
					</select>
                </div>      
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-success btn-circle btn-lg" v-on:click="agregarPais()" v-if="!editando">
                    <i class="fas fa-check"></i>
                  	</a>
					<a href="#" class="btn btn-success btn-circle btn-lg" v-on:click="editarPais(auxPais)"
					v-if="editando">
                    <i class="fas fa-check"></i>
                  	</a>
					<a href="#" class="btn btn-danger btn-circle btn-lg" v-if="editando" v-on:click="eliminarPais(auxPais)">
                    <i class="fas fa-trash"></i>
              		</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@push('scripts')
<script type="text/javascript" src="js/paises.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">