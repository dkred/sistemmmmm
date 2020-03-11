<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
class Usercontroller extends Controller
{
    //
    public function __construct(){
    	$this->middleware('auth');
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

    	return view('usuarios.create');	
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
}
