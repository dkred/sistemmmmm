@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Información Técnica 3</h2>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-8">
         <form method="POST" action ="{{route('postinformacion_tecnica_3')}}">
          @csrf
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Dimensiones Alto:</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="alto" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Dimensiones Ancho</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="ancho" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Escalas</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="escalas" >
              </div>
            </div>
             <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Estado de Conservación</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="ancho" >
              </div>
            </div>
             <div class="form-group row">
              <label  class="col-sm-4 col-form-label"> Ubicación Física Planoteca</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="planoteca" >
              </div>
            </div>
             <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Tubo</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="tubo" >
              </div>
            </div>
             <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Descripción del plano</label>
              <div class="col-sm-8">
               <textarea type="text" class="form-control form-control-sm" name="descripcion_plano" ></textarea>
              </div>
            </div>

            <div class="form-group row">
             
              <div class="col-sm-8">
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