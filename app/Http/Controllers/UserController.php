<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        User::create($request->all());
        return ['created' => true];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $usu                = new User;
      $usu->usua_nombre   = $request->get('usua_nombre');
      $usu->usua_login    = $request->get('usua_login');
      $usu->usua_password = bcrypt($request->get('usua_password'));
      $usu->tipoUsuario   = $request->get('tipoUsuario');
      $usu->email         = $request->get('email');

      $usu->save();
      return "true";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($usua_login =null,$pwd = null)
    {
        // dd("prueba");
        $res = User::where('email',$usua_login)
        ->where('usua_password',$pwd)->firstOrFail();

        $p = array();
        array_push($p,$res);
        return $p;
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
        $user = User::find($id);
        $user->update($request->all());
        return ['updated' => true];
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
          User::destroy($id);
        return ['deleted' => true];
    }
}
