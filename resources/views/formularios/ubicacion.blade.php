@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Ubicación</h2>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-8">
         <form method="POST" action ="{{route('postubicacion')}}">
          @csrf
            <div class="form-group row">
            <label  class="col-sm-4 col-form-label">Departamento</label>
            <div class="col-sm-8">
             <input type="text" class="form-control form-control-sm" name="departamento" >
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-4 col-form-label">Provincia</label>
            <div class="col-sm-8">
             <input type="text" class="form-control form-control-sm" name="provincia" >
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-4 col-form-label">Distrito</label>
            <div class="col-sm-8">
             <input type="text" class="form-control form-control-sm" name="distrito" >
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-4 col-form-label">Calle</label>
            <div class="col-sm-8">
             <input type="text" class="form-control form-control-sm" name="calle" >
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-4 col-form-label">Número</label>
            <div class="col-sm-8">
             <input type="number" class="form-control form-control-sm" name="numero" >
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