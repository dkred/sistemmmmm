@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Regimen de Propiedad</h2>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-8">
         <form method="POST" action ="{{route('postregimen_propiedad')}}">
          @csrf
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Regimen</label>
              <div class="col-sm-8">
                <select class="selectpicker form-control form-control-sm" name="regimen">
                  <option value="publico">Publico</option>
                  <option value="privado">Privado</option>
                </select>
               
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Nombre del Propietario</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="nombre_propietario" required="" value="Universidad Catolica de Santa Maria" readonly>
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