@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Información Técnica 1</h2>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-8">
         <form method="POST" action ="{{route('postinformacion_tecnica_1')}}">
          @csrf
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Categoria</label>
              <div class="col-sm-8">
                <select class="selectpicker form-control form-control-sm" name="categoria">
                  <option value="anteproyecto">Anteproyecto</option>
                  <option value="proyecto">Proyecto</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Título</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="titulo" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Autor del dibujo</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="autor_dibujo" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Proyectista</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="proyectista" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Firmado</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="firmado" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Número de CD</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="numero_cd" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Fecha del Dibujo</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="fecha_dibujo" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Num. Imagen. Jpg</label>
              <div class="col-sm-8">
               <input type="text" class="form-control form-control-sm" name="num_imagen" >
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-4 col-form-label">Fecha Digitalización</label>
              <div class="col-sm-8">
               <input type="date" class="form-control form-control-sm" name="fecha_digitalizacion" placeholder="dd/mm/aaaa" >
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