@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Información Técnica 2</h2>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-8">
         <form method="POST" action ="{{route('postinformacion_tecnica_2')}}">
          @csrf

            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Plano de Localización</label>
              <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" name="plano_localizacion" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Topografia</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="topografia" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Planta(s)</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="planta" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Elevación(s)</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="elevacion" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Corte(s)</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="cortes" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Estructuras</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="estructuras" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Inst. Electricas</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="inst_electricas" >
              </div>
            </div>
             <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Inst. Sanitarias</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="inst_sanitarias" >
              </div>
            </div>
             <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Detalles</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="detalles" >
              </div>
            </div>
             <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Dib. Bocetos esq.</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="dib_bocetos" >
              </div>
            </div>
             <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Otros</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="otros" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Tradición documentaria</label>
              <div class="col-sm-8">
                <select class="selectpicker form-control form-control-sm" name="tradicion_documentaria">
                  <option value="original">Original</option>
                  <option value="copia">Copia</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Material de Soporte</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="material_soporte"  >
              </div>
            </div>
             <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Técnica</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="tecnica" >
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