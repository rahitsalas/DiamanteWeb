<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class logintwoController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
//    function index ()
//    {
//        return view('login');
//    }
//    public function checklogin(Request $request){
//        $this->validate($request,[
//            'usuario' => 'required|alphaNum|min:3',
//            'password' => 'required|alphaNum|min:1'
//        ]);
//        $user_data= array(
//            'usuario' => $request->get('usuario'),
//            'password'=> $request->get('password')
//        );
//        var_dump($user_data);
//        if(Auth::atempt($user_data)){
//            return redirect('login/successlogin');
//        }
//        else{
//            return back()->with('error','Usuario/Contraseña incorrectos');
//        }
//    }
//    public function successlogin(){
//        return view('succeslogin');
//    }

//    function logout(){
//        Auth::logout();
//        return redirect('login');
//    }

    public function temp(){
//        $users = DB::table('usuario')->get();
        //$users = usuario::all();
        // $users = usuario::where('id',0)->orderBy('name','desc')->get();
//        $user = User::getAuthPassword();
//        $auth = getAuthPassword();

//        if(Auth::guest() ){
//            dd("guest");
////        }else
//            if (Auth::check()){
//            dd("validado");
//        }else{
//            dd(" no validado");
//        }
        $user = Auth::user();
        $users = User::all();
        dd($user,$users);

    }

    public function temp2(){
        // Validate the new password length...
        $user = User::Where("usuario","RSALAS")->first();

        $user->fill([
//            $request->user()->fill([
            'password' => Hash::make(2)
        ])->save();

        $asd = User::first();

        dd($asd, Hash::make(2));
    }

    public function temp3(Request $request){
        dd($request);
    }
//    protected function guard()
//    {
//        return Auth::guard('employee');
//    }
}
