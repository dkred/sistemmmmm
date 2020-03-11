@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Información técnica</h2>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-8">
         <form method="POST" action ="{{route('postinformacion_tecnica')}}">
          @csrf
            <label  class=" col-form-label">Tipo de bien :Planos</label>
            <label  class=" col-form-label">Subtipo:</label>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Proyecto arquitectura</label>
              <div class="col-sm-8">
               <input type="number" id ="inf-1" class="form-control form-control-sm" name="proyecto_arquitectura" value="0">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Proyecto estructuras</label>
              <div class="col-sm-8">
               <input type="number" id ="inf-2" class="form-control form-control-sm" name="proyecto_estructuras" value="0">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Proyecto Ins. Sanit.</label>
              <div class="col-sm-8">
               <input type="number" id ="inf-3" class="form-control form-control-sm" name="proyecto_ins_sanitarias" value="0">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Proyecto Ins. Elect.</label>
              <div class="col-sm-8">
               <input type="number" id ="inf-4" class="form-control form-control-sm" name="proyecto_ins_elect"  value="0">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Anteproyecto.</label>
              <div class="col-sm-8">
               <input type="number" id ="inf-5" class="form-control form-control-sm" name="anteproyecto" value="0">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Dib. Boc. Esq.</label>
              <div class="col-sm-8">
               <input type="number" id ="inf-6" class="form-control form-control-sm" name="dib_boc_esq" value="0" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Otros.</label>
              <div class="col-sm-8">
               <input type="number" id ="inf-7" class="form-control form-control-sm" name="otros"  value="0">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Total de planos.</label>
              <div class="col-sm-8">
               <input type="number" id="total" class="form-control form-control-sm" name="total" value="0" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Título del proyecto o denominación.</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="titulo_proyecto" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Otras denominaciones.</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="otras_denominaciones" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Propietario.</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="propietario" >
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
