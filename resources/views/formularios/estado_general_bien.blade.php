@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Estado General del bien</h2>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-8">
         <form method="POST" action ="{{route('postestado_general_bien')}}">
          @csrf
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Estado de conservación</label>
              <div class="col-sm-8">
               <select class="selectpicker form-control form-control-sm" name="estado_conservacion">
                  <option value="bueno">Bueno</option>
                  <option value="regular">Regular</option>
                  <option value="malo">Malo</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Indicadores de deterioro</label>
              <div class="col-sm-8">
                <div class="row">
                  <div class="col-sm-5"><label><input type="checkbox" name="indicadores_deterioro" value="huellas de humedad  ">  huellas de humedad </label> </div>
                  <div class="col-sm-4"><label><input type="checkbox" name="indicadores_deterioro1" value="grietas ">  grietas</label></div>
                  <div class="col-sm-3"><label><input type="checkbox" name="indicadores_deterioro2" value="manchas ">  manchas</label></div> 
                   <div class="col-sm-5"><label><input type="checkbox" name="indicadores_deterioro3" value="adhesion de hojas ">  adhesion de hojas</label> </div> 
                  <div class="col-sm-4"><label><input type="checkbox" name="indicadores_deterioro4" value="rasgaduras  ">  rasgaduras </label></div>

                  <div class="col-sm-3"><label><input type="checkbox" name="indicadores_deterioro5" value="polvo ">  polvo</label> </div>
                   <div class="col-sm-5"><label><input type="checkbox" name="indicadores_deterioro6" value="oxidacion de tintas">  oxidacion de tintas </label></div>
                  <div class="col-sm-4"><label><input type="checkbox" name="indicadores_deterioro7" value="marcas  ">  marcas  </label></div>
                  <div class="col-sm-3"><label><input type="checkbox" name="indicadores_deterioro8" value="dobleces  ">  dobleces </label></div>
                  <div class="col-sm-5"><label><input type="checkbox" name="indicadores_deterioro9" value="adhesion de cinta">  adhesion de cinta </label></div>
                  <div class="col-sm-4"><label><input type="checkbox" name="indicadores_deterioro10" value="quemaduras  ">  quemaduras </label></div> 
                  <div class="col-sm-3"><label><input type="checkbox" name="indicadores_deterioro11" value="insectos  ">  insectos </label></div>
                  <div class="col-sm-5"><label><input type="checkbox" name="indicadores_deterioro12" value="oxidacion ">  oxidacion </label></div>
                  <div class="col-sm-4"><label><input type="checkbox" name="indicadores_deterioro13" value="faltantes ">  faltantes </label></div>
                  <div class="col-sm-3"><label><input type="checkbox" name="indicadores_deterioro14" value="hongo ">  hongo </label></div>
                 
                 
                  <div class="col-sm-5"><label><input type="checkbox" name="indicadores_deterioro15" value="roedores">  roedores  </label></div>
                  <div class="col-sm-4"><label><input type="checkbox" name="indicadores_deterioro16" value="acidez">  acidez  </label></div>
                  <div class="col-sm-3"><label><input type="checkbox" name="indicadores_deterioro17" value="arrugas">  arrugas </label></div>
                  
                  
                </div>
                <input type="text" class="form-control form-control-sm" name="otros-indicadores_deterioro" placeholder="otros" >
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