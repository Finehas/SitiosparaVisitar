@extends('master.index')
@section('titulo','Bienvenida')
@section('contenido')
<h1>Bienvenido</h1>
@endsection
@push('scripts')
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">