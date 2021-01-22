<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request, Response};
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view("users", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view("user", compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'confirmed'
        ];

        $messages = [
            'name.required' => 'O campo nome deve ser preenchido',
            'name.min' => 'O campo nome deve ter pelo menos 3 caracteres',
            'email.required' => 'O campo email deve ser preenchido',
            'email.email' => 'O campo email deve ser válido',
            'email.unique' => 'O campo email digitado já está cadastrado',
            'password.confirmed' => 'As senhas não conferem'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = bcrypt($request->input("password"));

        $user->save();

        return redirect()->route("users-list");
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view("user", compact('user'));
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
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'confirmed'
        ];

        $messages = [
            'name.required' => 'O campo nome deve ser preenchido',
            'name.min' => 'O campo nome deve ter pelo menos 3 caracteres',
            'email.required' => 'O campo email deve ser preenchido',
            'email.email' => 'O campo email deve ser válido',
            'email.unique' => 'O campo email digitado já está cadastrado',
            'password.confirmed' => 'As senhas não conferem'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = User::find($id);
        $user->name = $request->input("name");
        $user->email = $request->input("email");

        if ($request->input("password")) {
            $user->password = bcrypt($request->input("password"));
        }

        $user->save();

        return redirect()->route("users-list");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route("users-list");
    }
}
