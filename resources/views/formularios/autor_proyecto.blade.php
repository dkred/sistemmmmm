@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Autor del Proyecto</h2>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-8">
         <form method="POST" action ="{{route('postautor_proyecto')}}">
          @csrf
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Arquitectura</label>
              <div class="col-sm-10">
               <input type="text" class="form-control form-control-sm" name="arquitectura" required="" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Estructuras</label>
              <div class="col-sm-10">
               <input type="text" class="form-control form-control-sm" name="estructuras" required="">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Instalaciones</label>
              <div class="col-sm-10">
               <input type="text" class="form-control form-control-sm" name="instalaciones" required="">
              </div>
            </div>
            <div class="form-group row">
             
              <div class="col-sm-10">
                <button class="btn btn-primary" type="submit">Grabar y Siguiente</button>
              
              </div>
            </div>
         </form>             
      </div>
      <div class="col-sm-4">
          <img src="{{asset('planos/'.Session::get('img_src'))}}" width="100%">
      </div>
    </div>    
  </div>
</div>
@endsection