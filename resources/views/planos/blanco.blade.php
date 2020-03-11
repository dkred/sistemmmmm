@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Analisis Plano Asociado al proyecto</h2>
 <div class="card-body">
                    <form method="POST" action ="{{route('postplano')}}"  enctype="multipart/form-data">
                        @csrf
                         <div class="form-group">
	                        <input type="hidden" name="color" value="blanco">
	                        <input type="file" class="form-control-file" name="img_src">
	                    </div>
	                     <div class="form-group">
	                        <button class="btn btn-primary">Analizar y llenar</button> 
	                     </div> 
                    </form>
                </div>
</div>
@endsection