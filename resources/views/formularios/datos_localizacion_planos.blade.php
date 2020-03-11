@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Datos de localización de los planos</h2>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-8">
         <form method="POST" action ="{{route('postdatos_localizacion_planos')}}">
          @csrf
            <div class="form-group row">
            <label  class="col-sm-4 col-form-label">Contenedor/Inmueble</label>
            <div class="col-sm-8">
             <input type="text" class="form-control form-control-sm" name="contenedor_inmueble" value="CEDIP-FAICA"  readonly >
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-4 col-form-label">Contenedor/Mueble</label>
            <div class="col-sm-8">
             <input type="text" class="form-control form-control-sm" name="contenedor_mueble" >
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-4 col-form-label">Ciudad</label>
            <div class="col-sm-8">
             <input type="text" class="form-control form-control-sm" name="ciudad" value="Arequipa"  readonly >
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-4 col-form-label">Cantidad de tubos</label>
            <div class="col-sm-8">
             <input type="number" max="99999" class="form-control form-control-sm" name="cantidad_tubos" >
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-4 col-form-label">Dirección</label>
            <div class="col-sm-8">
             <input type="text" class="form-control form-control-sm" name="direccion" >
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-4 col-form-label">Número</label>
            <div class="col-sm-8">
             <input type="number" max="999999999999" class="form-control form-control-sm" name="numero" >
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-4 col-form-label">Dirección Electronica</label>
            <div class="col-sm-8">
             <input type="text" class="form-control form-control-sm" name="direccion_electronica" >
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-4 col-form-label">Teléfono</label>
            <div class="col-sm-8">
             <input type="number" max="999999999999" class="form-control form-control-sm" name="telefono" >
            </div>
          </div>
          <div class="form-group row">
            <label  class="col-sm-4 col-form-label">Propietario Responsable</label>
            <div class="col-sm-8">
             <input type="text" class="form-control form-control-sm" name="propietario_responsable" >
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
