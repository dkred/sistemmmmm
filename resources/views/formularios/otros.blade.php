@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Otros</h2>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-8">
         <form method="POST" action ="{{route('postotros')}}">
          @csrf
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Intervenciones inadecuadas</label>
              <div class="col-sm-8">
               <select class="selectpicker form-control form-control-sm" name="intervenciones_inadecuadas">
                  <option value="si">Si</option>
                  <option value="no">No</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Elementos extraños</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="elementos_extranos" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Estado Integridad</label>
              <div class="col-sm-8">
               <select class="selectpicker form-control form-control-sm" name="estado_integridad">
                  <option value="completo">completo</option>
                  <option value="fragmentado">fragmentado</option>
                  <option value="incompleto">incompleto</option>
                  <option value="restaurado">restaurado</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Digitalizado</label>
              <div class="col-sm-8">
               <select class="selectpicker form-control form-control-sm" name="digitalizado">
                  <option value="si">Si</option>
                  <option value="no">No</option>
                </select>
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