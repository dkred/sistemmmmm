@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Datos de control</h2>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-8">
         <form method="POST" action ="{{route('postdatos_control')}}">
          @csrf
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Entidad investigadora</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="entidad_investigadora" value="CEDIP-FAICA" readonly="">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Fecha de Catagolación</label>
              <div class="col-sm-8">
               <input type="date" class="form-control form-control-sm" name="fecha_catagolacion" placeholder="dd/mm/aa">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Revisado por:</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="revisado_por" >
              </div>
            </div>
             <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Aprobado por:</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="aprobado_por" >
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