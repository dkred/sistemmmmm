<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
//use thiagoalessio\TesseractOCR\TesseractOCR;
use JFuentesTgn\OcrSpace\OcrAPI;
use Eastwest\Json\Facades\Json;

class PlanoController extends Controller
{
    //
     public function __construct(){
    	$this->middleware('auth');
        if(!\Session::has('id_proyecto')) \Session::put('id_proyecto',0);

        if(!\Session::has('img_src')) \Session::put('img_src','mara.png');
        if(!\Session::has('color')) \Session::put('color','rojo');
         if(!\Session::has('id_verde')) \Session::put('id_verde',0);
         if(!\Session::has('id_amarillo')) \Session::put('id_amarillo',0);
         if(!\Session::has('id_blanco')) \Session::put('id_blanco',0);
        $array = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0);
        if(!\Session::has('array_id')) \Session::put('array_id',$array);
        if(!\Session::has('nombre_proyecto')) \Session::put('nombre_proyecto','');
        if(!\Session::has('codigo_proyecto')) \Session::put('codigo_proyecto','');
           
    }
    public function index(Request $request){
    	
    	if($request){
    		$query = trim($request->get('search'));
    		$users = User::where('name','LIKE','%'.$query.'%')
    			->orderBy('id','asc')
    			->paginate(10);
    		return view('usuarios.index',['users'=>$users,'search'=>$query]);
    	}
    	//$users = User::all();
    	//return view('usuarios.index',['users'=>$users]);
    }
    public function create(){
        return \Session::get('color');
    	//return view('usuarios.create');	
    }
    public function store(Request $request){
    	$usuario = new User();
    	$usuario->name = request('name');
    	$usuario->email = request('email');
    	$usuario->password = request('password');
    	$usuario->password= Hash::make($usuario->password);
    	//return $usuario;
    	$usuario->save();
    	return redirect('usuarios');
    }
    public function show($id){
    	return view('usuarios.show',['user'=>User::findOrFail($id)]);
    }
    public function edit($id){
		return view('usuarios.edit',['user'=>User::findOrFail($id)]);
    }
    public function update(Request $request, $id){
    	$usuario =User::findOrFail($id);

    	$usuario->name = $request->get('name');
    	$usuario->email = $request->get('email');
    	//return $usuario;
    	$usuario->update();
    	return redirect('usuarios');
    }
    public function destroy($id){
    	$usuario =User::findOrFail($id);
    	$usuario->delete();
    	//	return 1;
    	//User::delete($id);
    	return redirect('usuarios');
    }
    public function plano_verde(){
        return view('planos.verde');
    }
    public function plano_blanco(){
        return view('planos.blanco');
    }
    public function plano_amarillo(){
        return view('planos.amarillo');
    }

    public function post_plano(Request $request, OcrAPI $ocr){
        
        
        if($request->HasFile('img_src')){
            $file = $request->file('img_src');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/planos/',$name);
            \Session::put('img_src',$name);
            
            
            $im_php = imagecreatefromjpeg(public_path().'/planos/'.$name);
            $size_x = imagesx($im_php);
            $size_y = imagesy($im_php);
            $im_php = imagecrop($im_php, ['x' => $size_x*0.75, 'y' => $size_y*0.78, 'width' => $size_x*0.25, 'height' => $size_y*0.22]);
            
            imagejpeg($im_php,public_path().'/planos/a'.$name);

           // $ocr = new OcrAPI('e202229e6f88957');
            $response = $ocr->parseImageFile('C:\xampp\htdocs\sistema-laravel\public\planos'.'\a'.$name);
            //return imagesy($im_php);
            /*
            $strings = (new TesseractOCR('C:\xampp\htdocs\sistema-laravel\public\planos'.'\a'.$name))->userWords('C:\xampp\htdocs\sistema-laravel\public\listado-general.txt')
            ->run();
            */
            //return $response; 
            $pos = strpos($response, "ParsedText");
            $res = substr($response, $pos+13);
            $pos2 = strpos($res, "ErrorMessage");
            $res = substr($res, 0,$pos2-3); 
            $array = explode('\r\n', $res);

            return $array;

            // return 1;
            //$producto->img_producto = $name;    
        }

        \Session::put('color',$request->get('color'));
        
        if($request->get('color')=='verde')
            return redirect('formularios/autor_proyecto');
        if($request->get('color') =="blanco")
            return redirect('formularios/informacion_tecnica_1');
        if($request->get('color') =="amarillo")
            return redirect('formularios/autor_proyecto');
       
         
    }
    public function salir(){
        \Session::put('color','');
        return redirect('proyectos');
    }
    public function autor_proyecto(){
        return view('formularios.autor_proyecto');
    }
    public function datos_control(){
        return view('formularios.datos_control');
    }    
    public function datos_localizacion_planos(){
        return view('formularios.datos_localizacion_planos');
    }
    public function descripcion(){
        return view('formularios.descripcion');
    } 
    public function estado_general_bien(){
        return view('formularios.estado_general_bien');
    }    
    public function fotografia(){
        return view('formularios.fotografia');
    }   
    public function observaciones(){
        return view('formularios.observaciones');
    }    
    public function otros(){
        return view('formularios.otros');
    }    
    public function regimen_propiedad(){
        return view('formularios.regimen_propiedad');
    }    
    public function ubicacion(){
        return view('formularios.ubicacion');
    }    
    public function informacion_tecnica(){
        return view('formularios.informacion_tecnica');
    }
    public function informacion_tecnica_1(){
        return view('formularios.informacion_tecnica_1');
    }
    public function informacion_tecnica_2(){
        return view('formularios.informacion_tecnica_2');
    }
    public function informacion_tecnica_3(){
        return view('formularios.informacion_tecnica_3');
    }
    //metohod post
    public function postautor_proyecto(Request $request){
        $array = ['arquitectura' =>  $request->get('arquitectura'), 
                  'estructuras' =>  $request->get('estructuras'),
                  'instalaciones' =>  $request->get('instalaciones')
                 ];
        $id = DB::table('autor_proyecto')->insertGetId($array
        );
        $array_id =\Session::get('array_id');
        $array_id[0] = $id;
        \Session::put('array_id',$array_id);
        return redirect('formularios/datos_control');
    }
    public function postdatos_control(Request $request){
         $array = ['entidad_investigadora' =>  $request->get('entidad_investigadora'), 
                  'fecha_catalogacion' =>  $request->get('fecha_catalogacion'),
                  'revisado_por' =>  $request->get('revisado_por'),
                  'aprobado_por' =>  $request->get('aprobado_por')
                 ];
         $id = DB::table('datos_control')->insertGetId($array
        );
        $array_id =\Session::get('array_id');
        $array_id[1] = $id;
        \Session::put('array_id',$array_id);
        return redirect('formularios/datos_localizacion_planos');
    }    
    public function postdatos_localizacion_planos(Request $request){
         $array = ['contenedor_inmueble' =>  $request->get('contenedor_inmueble'), 
                  'ciudad' =>  $request->get('ciudad'),
                  'contenedor_mueble' =>  $request->get('contenedor_mueble'),
                  'cantidad_tubos' =>  $request->get('cantidad_tubos'),
                  'direccion' =>  $request->get('direccion'),
                  'numero' =>  $request->get('numero'),
                  'direccion_electronica' =>  $request->get('direccion_electronica'),
                  'propietario_responsable' =>  $request->get('propietario_responsable'),
                  'telefono' =>  $request->get('telefono')
                 ];
         $id = DB::table('datos_localizacion_planos')->insertGetId($array
        );
        $array_id =\Session::get('array_id');
        $array_id[2] = $id;
        \Session::put('array_id',$array_id);
        return redirect('formularios/descripcion');
    }
    public function postdescripcion(Request $request){

                 $otros =   $request->get('otro-formato');
                 $formato = $request->get('formato');
                 if($formato == 'otro'){
                    $formato = $otros;
                 }
                 $tecnica = $request->get('tecnica1') .' '. $request->get('tecnica2') .' '. $request->get('tecnica3'). ' '.$request->get('otro-tecnica');
          $array = ['alto' =>  $request->get('alto'), 
                  'ancho' =>  $request->get('ancho'),
                  'formato' =>  $formato ,
                  'descripcion' =>  $request->get('descripcion'),
                  'material_soporte' =>  $request->get('material_soporte'),
                  'tecnica' =>  $tecnica,
                  'rotulo' =>  $request->get('rotulo'),
                  'firma' =>  $request->get('firma'),
                  'year' =>  $request->get('year')
                
                 ];

         $id = DB::table('descripcion')->insertGetId($array
        );
        $array_id =\Session::get('array_id');
        $array_id[3] = $id;
        \Session::put('array_id',$array_id);
        return redirect('formularios/estado_general_bien');
    } 
    public function postestado_general_bien(Request $request){

                $indicadores =$request->get('indicadores_deterioro') .' '.
                $request->get('indicadores_deterioro1') .' '.
                $request->get('indicadores_deterioro2') .' '.
                $request->get('indicadores_deterioro3') .' '.
                $request->get('indicadores_deterioro4') .' '.
                $request->get('indicadores_deterioro5') .' '.
                $request->get('indicadores_deterioro6') .' '.
                $request->get('indicadores_deterioro7') .' '.
                $request->get('indicadores_deterioro8') .' '.
                $request->get('indicadores_deterioro9') .' '.
                $request->get('indicadores_deterioro10') .' '.
                $request->get('indicadores_deterioro11') .' '.
                $request->get('indicadores_deterioro12') .' '.
                $request->get('indicadores_deterioro13') .' '.
                $request->get('indicadores_deterioro14') .' '.
                $request->get('indicadores_deterioro15') .' '.
                $request->get('indicadores_deterioro16') .' '.
                $request->get('indicadores_deterioro17') .' '.
                $request->get('otros-indicadores_deterioro');


         $array = ['estado_conservacion' =>  $request->get('estado_conservacion'), 
                  'indicadores_deterioro' =>  $indicadores
                 ];
         $id = DB::table('estado_general_bien')->insertGetId($array
        );
        $array_id =\Session::get('array_id');
        $array_id[4] = $id;
        \Session::put('array_id',$array_id);
        return redirect('formularios/fotografia');
    }    
    public function postfotografia(Request $request){
         $array = ['descripcion' =>  $request->get('descripcion'), 
                  'codigo_fotografico' =>  $request->get('codigo_fotografico'),
                  'registro_fotografico' =>  $request->get('registro_fotografico')
                 ];
         $id = DB::table('fotografia')->insertGetId($array
        );
        $array_id =\Session::get('array_id');
        $array_id[5] = $id;
        \Session::put('array_id',$array_id);
        return redirect('formularios/otros');
    }   
    public function postobservaciones(Request $request){
         $array = ['area_predio' =>  $request->get('area_predio'), 
                  'frente' =>  $request->get('frente'),
                  'fondo' =>  $request->get('fondo'), 
                  'ocupada' =>  $request->get('ocupada'),
                  'libre' =>  $request->get('libre'), 
                  'numero_pisos' =>  $request->get('numero_pisos'),
                  'area_construida_por_piso' =>  $request->get('area_construida_por_piso'), 
                  'area_total_construida' =>  $request->get('area_total_construida'),
                  'uso_actual' =>  $request->get('uso_actual'), 
                  'observaciones' =>  $request->get('observaciones')
                 ];
         $id = DB::table('observaciones')->insertGetId($array
        );
        $array_id =\Session::get('array_id');
        $array_id[10] = $id;
        \Session::put('array_id',$array_id);

           //return $array_id[8];

        if(\Session::get('color') == "verde"){
            $array_id =\Session::get('array_id');
            $arr= ['id_autor_proyecto' =>  $array_id[0] ,
                 'id_ubicacion' =>  $array_id[8] ,
                 'id_datos_localizacion' =>  $array_id[2] ,
                 'id_regimen_propiedad' =>  $array_id[7] ,
                 'id_descripcion' =>  $array_id[3] ,
                 'id_estado_general' =>  $array_id[4] ,
                 'id_otros' =>  $array_id[6] ,    
                 'id_fotografia' =>  $array_id[5] ,
                 'id_datos_control' =>  $array_id[1] ,
                 'id_informacion_tecnica' =>  $array_id[9] ,
                 'id_observaciones'=> $array_id[10],
                 'imagen_src' => \Session::get('img_src')];
            $id2 = DB::table('plano_verde')->insertGetId($arr);
            $id_proyecto = DB::table('proyectos')->insertGetId(['nombre_proyecto'=>\Session::get('nombre_proyecto'),
                                            'codigo_proyecto' =>\Session::get('codigo_proyecto'),
                                             'id_plano_verde'=> \Session::get('id2')] );   
           
            \Session::put('id_proyecto',$id_proyecto);
          }
          if(\Session::get('color') == "amarillo"){
            $arr= ['id_autor_proyecto' =>  $array_id[0] ,
                 'id_datos_localizacion' =>  $array_id[2] ,
                 'id_regimen_propiedad' =>  $array_id[7] ,
                 'id_descripcion' =>  $array_id[3] ,
                 'id_estado_general' =>  $array_id[4] ,
                 'id_otros' =>  $array_id[6] ,    
                 'id_fotografia' =>  $array_id[5] ,
                 'id_datos_control' =>  $array_id[1] ,
                 'id_informacion_tecnica' =>  $array_id[9] ,
                 'id_observaciones'=> $array_id[10],
                 'imagen_src' => \Session::get('img_src'),
                 'id_proyecto'=> \Session::get('id_proyecto')];
            $id3 = DB::table('plano_amarillo')->insertGetId($arr
            );
               
               
            }
        return redirect('proyectos/create');
    }    
    public function postotros(Request $request){
         $array = ['intervenciones_inadecuadas' =>  $request->get('intervenciones_inadecuadas'), 
                  'elementos_extranos' =>  $request->get('elementos_extranos'),
                  'estado_integridad' =>  $request->get('estado_integridad'),
                  'digitalizado' =>  $request->get('digitalizado')
                 ];
         $id = DB::table('otros')->insertGetId($array
        );
        $array_id =\Session::get('array_id');
        $array_id[6] = $id;
        \Session::put('array_id',$array_id);
        return redirect('formularios/regimen_propiedad');
    }    
    public function postregimen_propiedad(Request $request){
         $array = ['regimen' =>  $request->get('regimen'), 
                  'nombre_propietario' =>  $request->get('nombre_propietario')
                 ];
        $id = DB::table('regimen_propiedad')->insertGetId($array
        );
        $array_id =\Session::get('array_id');
        $array_id[7] = $id;
        \Session::put('array_id',$array_id);

        if(\Session::get('color') == "amarillo"){
            return redirect('formularios/informacion_tecnica');
        }if(\Session::get('color') == "verde"){
            return redirect('formularios/ubicacion');
        }
    }    
    public function postubicacion(Request $request){
         $array = ['departamento' =>  $request->get('departamento'), 
                  'distrito' =>  $request->get('distrito'),
                  'calle' =>  $request->get('calle'),
                  'numero' =>  $request->get('numero'),
                  'provincia' =>  $request->get('provincia')
                 ];
         $id = DB::table('ubicacion')->insertGetId($array
        );
        $array_id =\Session::get('array_id');
        $array_id[8] = $id;
        \Session::put('array_id',$array_id);
        return redirect('formularios/informacion_tecnica');
    }    
    public function postinformacion_tecnica(Request $request){
         $array = ['proyecto_arquitectura' =>  $request->get('proyecto_arquitectura'), 
                  'proyecto_estructuras' =>  $request->get('proyecto_estructuras'),
                  'proyecto_ins_sanit' =>  $request->get('proyecto_ins_sanit'), 
                  'proyecto_ins_elect' =>  $request->get('proyecto_ins_elect'),
                  'anteproyecto' =>  $request->get('anteproyecto'), 
                  'dib_boc_esq' =>  $request->get('dib_boc_esq'),
                  'otros' =>  $request->get('otros'), 
                  'total' =>  $request->get('total'),
                  'titulo_proyecto' =>  $request->get('titulo_proyecto'), 
                  'otras_denominaciones' =>  $request->get('otras_denominaciones'),
                  'propietario' =>  $request->get('propietario')
                 ];
         $id = DB::table('informacion_tecnica')->insertGetId($array
        );
        $array_id =\Session::get('array_id');
        $array_id[9] = $id;
        \Session::put('array_id',$array_id);

            return redirect('formularios/observaciones');
        
    }
    public function postinformacion_tecnica_1(Request $request){
          $array = ['categoria' =>  $request->get('categoria'), 
                  'titulo' =>  $request->get('titulo'),
                  'autor_dibujo' =>  $request->get('autor_dibujo'), 
                  'proyectista' =>  $request->get('proyectista'),
                  'firmado' =>  $request->get('firmado'), 
                  'numero_cd' =>  $request->get('numero_cd'),
                  'fecha_dibujo' =>  $request->get('fecha_dibujo'), 
                  'num_imagen' =>  $request->get('num_imagen'),
                  'fecha_digitalizacion' =>  $request->get('fecha_digitalizacion')
                 ];
         $id = DB::table('informacion_tecnica_1')->insertGetId($array
        );
        $array_id =\Session::get('array_id');
        $array_id[11] = $id;
        \Session::put('array_id',$array_id);
        return redirect('formularios/informacion_tecnica_2');
    }
    public function postinformacion_tecnica_2(Request $request){
          $array = ['plano_localizacion' =>  $request->get('plano_localizacion'), 
                  'topografia' =>  $request->get('topografia'),
                  'planta' =>  $request->get('planta'), 
                  'elevacion' =>  $request->get('elevacion'),
                  'cortes' =>  $request->get('cortes'), 
                  'estructuras' =>  $request->get('estructuras'),
                  'inst_electricas' =>  $request->get('inst_electricas'), 
                  'inst_sanitarias' =>  $request->get('inst_sanitarias'),
                  'detalles' =>  $request->get('detalles'), 
                  'dib_bocetos' =>  $request->get('dib_bocetos'),
                  'otros' =>  $request->get('otros'),
                  'tradicion_documentaria' =>  $request->get('tradicion_documentaria'),
                  'material_soporte' =>  $request->get('material_soporte'),
                  'tecnica' =>  $request->get('tecnica')
                 ];
        $id = DB::table('informacion_tecnica_2')->insertGetId($array
        );
        $array_id =\Session::get('array_id');
        $array_id[12] = $id;
        \Session::put('array_id',$array_id);
        return redirect('formularios/informacion_tecnica_3');
    }
    public function postinformacion_tecnica_3(Request $request){
         $array = ['alto' =>  $request->get('alto'), 
                  'ancho' =>  $request->get('ancho'),
                  'escalas' =>  $request->get('escalas'), 
                  'estado_conservacion' =>  $request->get('estado_conservacion'),
                  'planoteca' =>  $request->get('planoteca'), 
                  'tubo' =>  $request->get('tubo'),
                  'descripcion_plano' =>  $request->get('descripcion_plano')
                 ];
        $id = DB::table('informacion_tecnica_3')->insertGetId($array
        );
        $array_id =\Session::get('array_id');
        $array_id[13] = $id;
        \Session::put('array_id',$array_id);
         \Session::put('color','blanco');

        $arr= ['id_informacion_tecnica_1' =>  $array_id[11] ,
                 'id_informacion_tecnica_2' =>  $array_id[12] ,
                 'id_informacion_tecnica_3' =>  $array_id[13] ,
                 'imagen_src' => \Session::get('img_src'),
                 'id_proyecto' => \Session::get('id_proyecto')];
            $id2 = DB::table('plano_blanco')->insertGetId($arr
            );
          
        return redirect('proyectos/create');
    }


}
