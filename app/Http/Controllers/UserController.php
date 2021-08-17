<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\User;
use Auth;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $name = $request->get('buscarpor');

        $user = User::where('name','like',"%$name%")->latest()->paginate(10);

        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            // 'username' => 'required|exists:users,username',
            'password' => 'required'
        ]);
        $user = User::whereEmail($request->email)->first();

        $sub =$user->subscripcion;

        if (!is_null($user)){
           if(Hash::check($request->password, $user->password)){
            $token = $user->createToken('personal')->accessToken;

            return response()->json(['res' => true, 'token' => $token, 'message' => "Bienvenido al sistema"]);
          }else{
              return response()->json(['res' => false, 'message' => "Emai o Contraseña Incorrecta"]);
          }
        }

      }

      public function logout(){
        $user = auth()->user();
        $user->tokens->each(function ($token, $key){
            $token->delete();
        });
        return response()->json(['res' => true, 'message' => "Adios"]);
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'apellido' => 'nullable',
            'carnet' => 'nullable',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'carnet' => $request->carnet,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        session::flash('message','Personal Registrado Exisitosamente!');
        return redirect('/viewRegisUser')->with("message", "Personal creado exitosamente!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function index1()
    {
        return view('user.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function viewRegisUser(){
        return view('user.registerPersonal');
    }
}
