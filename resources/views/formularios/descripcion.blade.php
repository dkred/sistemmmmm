@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Descripción</h2>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-8">
         <form method="POST" action ="{{route('postdescripcion')}}">
          @csrf
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Alto</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="alto" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Ancho</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="ancho" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Formato A-0</label>
              <div class="col-sm-4">
                 <select class=" form-control form-control-sm" name="formato">
                  <option value="Formato A0">Formato A-0</option>
                  <option value="Formato A1">Formato A-1</option>
                  <option value="Formato A2">Formato A-2</option>
                  <option value="Formato A3">Formato A-3</option>
                  <option value="otro">otro</option>
                </select>
              </div>
              <div class="col-sm-4">
               <input type="text" class="form-control form-control-sm" name="otro-formato" placeholder="otros" >
              </div>
            </div>
             
            
             <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Descripción</label>
              <div class="col-sm-8">
               <textarea type="text" class="form-control form-control-sm" name="descripcion" ></textarea>
              </div>
            </div>
             <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Material de Soporte</label>
              <div class="col-sm-8">
                <select class="selectpicker form-control form-control-sm" name="material_soporte">
                  <option value="papel bond">Papel Bond</option>
                  <option value="papel vegetal">Papel vegetal</option>
                  <option value="soporte digital">Soporte digital</option>
                  <option value="copia osalid">Copia osalid</option>
                  <option value="papel mantequilla">Papel mantequilla</option>
                  <option value="cartulina">Cartulina</option>
                </select>
              </div>
            </div>
             <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Técnica</label>
              <div class="col-sm-5">
                  <input type="checkbox" name="tecnica1" value="tinta" >Tinta<br>
                  <input type="checkbox" name="tecnica2" value="grafito" >Grafito<br>
                  <input type="checkbox" name="tecnica3" value="lapiz de color" >Lapiz de color<br>
                  <input type="text" class="form-control form-control-sm" name="otro-tecnica" placeholder="otros" >
              </div>
             
            </div>
             <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Rotulo</label>
              <div class="col-sm-8">
                <input type="radio" id="si" name="rotulo" value="si">
                <label for="si">Si</label><br>
                <input type="radio" id="no" name="rotulo" value="no">
                <label for="no">NO</label><br>
              
              </div>
            </div>
             <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Firma</label>
              <div class="col-sm-8">
               <input type="radio" id="si" name="firma" value="si">
                <label for="si">Si</label><br>
                <input type="radio" id="no" name="firma" value="no">
                <label for="no">NO</label><br>
              </div>
            </div>
             <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Año</label>
              <div class="col-sm-8">
               <input type="number" class="form-control form-control-sm" name="year" >
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