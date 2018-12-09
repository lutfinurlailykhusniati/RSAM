<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class PetugasController extends Controller
{
    public function login(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->input();
    		if(Auth::attempt(['name'=>$data['name'],'password'=>$data['password'],'level'=>'admin'])){
    			//echo "Succes"; die;
                return redirect('petugas/dashboard');
    		}

            
            else{
    			//echo "failed"; die;
                return redirect('/petugas')->with('flash_message_error','Invalid Username or Password');
    		} 
    	}
    	return view('petugas.petugas_login');
    }

    public function dashboard(){
        return view('petugas.dashboard');
    }

    public function logout(){
        Session::flush();
        return redirect('/')->with('flash_message_succes','Logout Berhasil');
    }
}
