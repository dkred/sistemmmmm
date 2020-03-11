<?php

namespace App\Http\Controllers;

use App\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProyectoController extends Controller
{
    //
    public function __construct(){
    	$this->middleware('auth');
    }
    public function index(Request $request){
    	
    	if($request){
    		$query = trim($request->get('search'));
    		$proyectos = Proyecto::where('nombre_proyecto','LIKE','%'.$query.'%')
    			->orderBy('id','asc')
    			->paginate(10);
    		return view('proyectos.index',['proyectos'=>$proyectos,'search'=>$query]);
    	}
        if(!\Session::has('color')) \Session::put('color','rojo');
    	//$users = User::all();
    	//return view('usuarios.index',['users'=>$users]);
    }
    public function create(){

         
    	return view('proyectos.create');	
    }
    public function store(Request $request){
    	$proyecto = new User();
    	$proyecto->name = request('name');
    	$proyecto->email = request('email');
    	$proyecto->password = request('password');
    	$proyecto->password= Hash::make($proyecto->password);
    	//return $proyecto;
    	$proyecto->save();
    	return redirect('proyectos');
    }
    public function show($id){
    	return view('proyectos.show',['user'=>User::findOrFail($id)]);
    }
    public function edit($id){
		return view('proyectos.edit',['user'=>User::findOrFail($id)]);
    }
    public function update(Request $request, $id){
    	$proyecto =User::findOrFail($id);

    	$proyecto->name = $request->get('name');
    	$proyecto->email = $request->get('email');
    	//return $proyecto;
    	$proyecto->update();
    	return redirect('proyectos');
    }
    public function destroy($id){
    	$proyecto =User::findOrFail($id);
    	$proyecto->delete();
    	//	return 1;
    	//User::delete($id);
    	return redirect('proyectos');
    }
}
