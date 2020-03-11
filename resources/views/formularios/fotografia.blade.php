@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Fotografia</h2>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-8">
         <form method="POST" action ="{{route('fotografia')}}">
          @csrf
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Descripción</label>
              <div class="col-sm-8">
               <textarea type="text" class="form-control form-control-sm" name="descripcion" ></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Codigo Fotografico</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="codigo_fotografico" value="{{Session::get('img_src')}}" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Registro Fotografico</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="registro_fotografico" >
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