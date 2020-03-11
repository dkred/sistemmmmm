@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Observaciones</h2>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-8">
         <form method="POST" action ="{{route('postobservaciones')}}">
          @csrf
            <label  class=" col-form-label">Caracteristicas del proyecto:</label>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Area del predio</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="area_predio" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">A. Frente</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="frente" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">A. Fondo</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="fondo" >
              </div>
            </div>
             <div class="form-group row">
              <label  class="col-sm-4 col-form-label">A. Ocupada</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="ocupada" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">A. Libre</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="libre" >
              </div>
            </div>

            <label  class=" col-form-label">Caracteristicas de la construcción:</label>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Número de pisos o niveles</label>
              <div class="col-sm-8">
               <input type="number" class="form-control form-control-sm" name="numero_pisos" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Area construida por piso:</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="area_construida_por_piso" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Area total construida</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="area_total_construida" >
              </div>
            </div>
             <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Uso actual</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="uso_actual" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Observaciones</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="observaciones" >
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