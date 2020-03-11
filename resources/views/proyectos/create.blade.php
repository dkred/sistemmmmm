@extends('layouts.app')

@section('content')
<div class="container">
	<h2>Crear proyecto</h2>
                <div class="card-body">
                    @if( Session::get('color') != 'verde' and Session::get('color') != 'amarillo' and Session::get('color') != 'blanco' )
                    <a href="{{route('verde')}}"><button type="button" class="btn btn-primary">Plano Verde</button></a>
                    @endif
                    
                    <a href="{{route('amarillo')}}"><button type="button" class="btn btn-secondary">Plano Subproyecto</button></a>
                    
                    <a href="{{route('blanco')}}"><button type="button" class="btn btn-success">Plano Asociado</button></a>
                    @if(!empty(Session::get('color')))
                     <a href="{{route('salir')}}"><button type="button" class="btn btn-danger">Finalizar</button></a>
                     @endif
                </div>

</div>
@endsection