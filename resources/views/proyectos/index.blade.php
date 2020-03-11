@extends('layouts.app')

@section('content')
<div class="container">
	<h2>Lista de Proyectos	<a href="proyectos/create"><button type="buttton" class="btn btn-success float-right">Agregar Proyecto</button></a></h2>
  <h6>
    @if($search)
    <div class="alert alert-primary" role="alert">
    Tu resultado de busqueda  {{$search}} es :
    </div>
    @endif
  </h6>
<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Plano Proyecto</th>
      <th scope="col">Plano subproyecto</th>
      <th scope="col">Plano asociado</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($proyectos as $proyecto)
    <tr>
      <th scope="row">{{$proyecto->id}}</th>
      <td>{{$proyecto->nombre_proyecto}}</td>
      <td>{{$proyecto->id_plano_verde}}</td>
      <td>{{$proyecto->id_plano_amarillo}}</td>
      <td>{{$proyecto->id_plano_blanco}}</td>
      <td>
        
        <form action="{{route('proyectos.destroy',$proyecto->id)}}" method="post">
          <a href="{{route('proyectos.show',$proyecto->id)}}"><button class="btn btn-secondary" type="button">Ver</button></a>
          <a href="{{route('proyectos.edit',$proyecto->id)}}"><button class="btn btn-primary" type="button">Editar</button></a>
          @csrf
          @method('DELETE')
            <button class="btn btn-danger" type="submit">Borrar</button>
        </form>
      </td>
    </tr>
   @endforeach
  </tbody>
</table>
    {{$proyectos->links()}}
</div>
@endsection