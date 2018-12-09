<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Gate;
use Auth;

class UserController extends Controller
{
    public function viewUser()
    {
    	if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this actions!");
            
        }
    	$users = \App\User::all();
       
	   	return view('petugas.user.view_user')->with(compact('users'));
	
    }

     public function create()
    {
        return view('petugas.user.tambah_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);
         User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return redirect()->intended('/view-user')->with('flash_message_succes','Data User Berhasil Ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        // Redirect to user list if updating user wasn't existed
        if ($user == null ) {
            return redirect()->intended('/view-user');
        }

         return view('petugas.user.edit_user',['users' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $constraints = [
            'name' => 'required|max:20',
            'email'=> 'required|max:60',
 
            ];
        $input = [
            'name' => $request['name'],
            'email' => $request['email'],
         
        ];
        if ($request['password'] != null && strlen($request['password']) > 0) {
            $constraints['password'] = 'required|min:6|confirmed';
            $input['password'] =  bcrypt($request['password']);
        }
        $this->validate($request, $constraints);
        User::where('id', $id)
            ->update($input);
        
        return redirect()->intended('/view-user')->with('flash_message_succes','Data User Berhasil Di Update!');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
         return redirect()->intended('/view-user')->with('flash_message_succes','User Berhasil di Hapus');
    
    }

    private function validateInput($request) {
        $this->validate($request, [
        'name' => 'required|max:20',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',

    ]);
    }
}
