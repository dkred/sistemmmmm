@extends('layouts.app')

@section('content')
<div class="container">
	<h2>Lista de Usuarios	<a href="usuarios/create"><button type="buttton" class="btn btn-success float-right">Agregar Usuario</button></a></h2>
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
      <th scope="col">Email</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>
        
        <form action="{{route('usuarios.destroy',$user->id)}}" method="post">
          <a href="{{route('usuarios.show',$user->id)}}"><button class="btn btn-secondary" type="button">Ver</button></a>
          <a href="{{route('usuarios.edit',$user->id)}}"><button class="btn btn-primary" type="button">Editar</button></a>
          @csrf
          @method('DELETE')
            <button class="btn btn-danger" type="submit">Borrar</button>
        </form>
      </td>
    </tr>
   @endforeach
  </tbody>
</table>
    {{$users->links()}}
</div>
@endsection